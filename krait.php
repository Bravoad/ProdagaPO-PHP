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
    $esult = $link->query("select vendor,Kat,SUM(zakaz.kookop*tovar.Stomost) as objem 
 from DOGOVOR,TOVAR,KATE,zakaz where  
 zakaz.Ntov=TOVAR.Ntov AND  
TOVAR.Nkat=KATE.NKat and DOGOVOR.Ndog=TOVAR.Ndog AND 
 Dopl between '$d1' and '$d2'
 GROUP BY KATE.Kat, Dogovor.Vendor ORDER BY kat ");
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
                <th>Вендор</th>
                <th>Категория ПО</th>
                <th>Объём продаж</th>
            </tr>
            <?php
            $d1 = $_POST['d1'];
            $d2 = $_POST['d2'];
            $esult = $link->query("select vendor,Kat,SUM(zakaz.kookop*tovar.Stomost) as objem 
 from DOGOVOR,TOVAR,KATE,zakaz where  
 zakaz.Ntov=TOVAR.Ntov AND  
TOVAR.Nkat=KATE.NKat and DOGOVOR.Ndog=TOVAR.Ndog AND 
 Dopl between '$d1' and '$d2'
 GROUP BY KATE.Kat, Dogovor.Vendor ORDER BY kat ");
            while($row = $esult->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$row["vendor"].'</td>';
                echo '<td>'.$row["Kat"].'</td>';
                echo '<td>'.$row["objem"].'</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo'</div>';
            echo'</div>';
            $esult->free();
            $link->close();
            ?>
            <?php
            include 'temp/footer.php';
            ?>
