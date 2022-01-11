<?php
$link = new mysqli('localhost','root','','prodpo');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}
$link->set_charset('utf8');
include 'temp/head.php';
include 'temp/header.php';
include 'temp/navbar.php';
?>

<div class="container">
    <div class="row">
        <table class="table table-responsive">
            <tr>
                <th>Номер счета-фактуры</th>
                <th>Дата</th>
                <th>Наименование ПО</th>
                <th>Тип лицензии ПО</th>
                <th>Наименование покупателя</th>
                <th>Адрес доставки</th>
                <th>Способ оплаты</th>
                <th>Сумма</th>
            </tr>
            <?php
            $results = $link->query("select zakaz.Nzak,zakaz.Dopl,TOVAR.NamePO,TIPLISE.Tiplis, 
zakaz.Namepok,zakaz.AdresDost,zakaz.sposopl,
(zakaz.kookop*tovar.Stomost) as summa from 
zakaz,TIPLISE,TIPPO,TOVAR,DOGOVOR 
where  zakaz.Ntov=TOVAR.Ntov AND  
 TOVAR.Ntiplis=TIPLISE.Ntiplis 
AND TOVAR.NtipPO=TIPPO.NtipPO  AND DOGOVOR.Ndog=TOVAR.Ndog
AND zakaz.Dopl is not null and zakaz.Ddost is null AND Stat=1 ORDER BY nzak");
            while($row = $results->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$row["Nzak"].'</td>';
                echo '<td>'.$row["Dopl"].'</td>';
                echo '<td>'.$row["NamePO"].'</td>';
                echo '<td>'.$row["Tiplis"].'</td>';
                echo '<td>'.$row["Namepok"].'</td>';
                echo '<td>'.$row["AdresDost"].'</td>';
                echo '<td>'.$row["sposopl"].'</td>';
                echo '<td>'.$row["summa"].'</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo'</div>';
            echo'</div>';
            $results->free();
            $link->close();

            ?>
            <?php
            include 'temp/footer.php';
            ?>

