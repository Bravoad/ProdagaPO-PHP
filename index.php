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
        <table class="table table-info table-responsive">
            <tr>
                <th>Номер товара</th>
                <th>Номер договора</th>
                <th>Наименование товара</th>
                <th>Номер типа ПО</th>
                <th>Номер категории</th>
                <th>Платформа</th>
                <th>Номер типа лицензии ПО</th>
                <th>Язык</th>
                <th>Разработчик</th>
                <th>Количество копий</th>
                <th>Стоимость</th>
            </tr>
            <?php
            $results = $link->query("SELECT * FROM tovar");
            while($row = $results->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$row["Ntov"].'</td>';
                echo '<td>'.$row["Ndog"].'</td>';
                echo '<td>'.$row["NamePO"].'</td>';
                echo '<td>'.$row["NtipPO"].'</td>';
                echo '<td>'.$row["Nkat"].'</td>';
                echo '<td>'.$row["Plat"].'</td>';
                echo '<td>'.$row["Ntiplis"].'</td>';
                echo '<td>'.$row["Yaz"].'</td>';
                echo '<td>'.$row["Razrab"].'</td>';
                echo '<td>'.$row["Kolvokop"].'</td>';
                echo '<td>'.$row["Stomost"].'</td>';
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

