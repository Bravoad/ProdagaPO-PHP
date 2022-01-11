<?php
$link = new mysqli('localhost','root','','prodPO');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}

$link->set_charset('utf8');
if (!empty($_POST)) {

    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $results = $link->query("select zakaz.Nzak,zakaz.Dopl,TOVAR.NamePO,
TIPLISE.Tiplis,TipPO.TipPO,DOGOVOR.vendor,zakaz.
Namepok,TOVAR.Stomost from zakaz,TIPLISE,TIPPO,TOVAR,DOGOVOR 
where zakaz.Ntov=TOVAR.Ntov AND  
 TOVAR.Ntiplis=TIPLISE.Ntiplis 
AND TOVAR.NtipPO=TIPPO.NtipPO AND DOGOVOR.Ndog=TOVAR.Ndog
AND Dopl between '$d1' and '$d2' ORDER BY Nzak");
}
include 'temp/head.php';
include 'temp/header.php';
include 'temp/navbar.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form  method="post"  role="form" class="form-inline">
                <fieldset>
                    <legend>Выбор периода</legend>
                    <div class="row">
                        <label for=""  style="margin-left: 2%; margin-right: 1% "> Дата начала периода</label>
                        <br>
                        <input type="date" class="form-control"  name="d1" placeholder="Введите дату подписания" requered>
                        <br>
                        <label for="" STYLE="margin-left: 4%; margin-right: 1%; "> Дата конца периода</label>
                        <br>
                        <input type="date" class="form-control"  name="d2" placeholder="Введите дату подписания" requered>
                        <button type="submit" class="btn-primary" STYLE="margin-left: 2%;">Отобразить книгу продаж</button>
                </fieldset>
        </div>

        </form>
    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table table-responsive table-success">
            <tr>
                <th>Номер счета-фактуры</th>
                <th>Дата</th>
                <th>Наименование товара</th>
                <th>Тип лицензии</th>
                <th>Тип ПО</th>
                <th>Вендор</th>
                <th>Наимнеование покупателя</th>
                <th>Стоимость продаж, освобождёееых от налогов</th>

            </tr>
            <?php
            $d1 = $_POST['d1'];
            $d2 = $_POST['d2'];
            $results = $link->query("select zakaz.Nzak,zakaz.Dopl,TOVAR.NamePO,
TIPLISE.Tiplis,TipPO.TipPO,DOGOVOR.vendor,zakaz.
Namepok,TOVAR.Stomost from zakaz,TIPLISE,TIPPO,TOVAR,DOGOVOR 
where zakaz.Ntov=TOVAR.Ntov AND  
 TOVAR.Ntiplis=TIPLISE.Ntiplis 
AND TOVAR.NtipPO=TIPPO.NtipPO AND DOGOVOR.Ndog=TOVAR.Ndog
AND Dopl between '$d1' and '$d2' ORDER BY Nzak");

            while($row = $results->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$row["Nzak"].'</td>';
                echo '<td>'.$row["Dopl"].'</td>';
                echo '<td>'.$row["NamePO"].'</td>';
                echo '<td>'.$row["Tiplis"].'</td>';
                echo '<td>'.$row["TipPO"].'</td>';
                echo '<td>'.$row["vendor"].'</td>';
                echo '<td>'.$row["Namepok"].'</td>';
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

