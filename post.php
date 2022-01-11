<?php
$link = new mysqli('localhost','root','','prodpo');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}
$link->set_charset('utf8');
if (!empty($_POST)) {
    $dg = $_POST['dogo'];
    $kt = $_POST['kat'];
    $tp = $_POST['tip'];
    $tl = $_POST['til'];
    $np = $_POST['nam'];
    $pl = $_POST['pla'];
    $raz = $_POST['razrab'];
    $yz = $_POST['yaz'];
    $kol = $_POST['kolkop'];
    $st = $_POST['stom'];
    $sql = $link->query("INSERT INTO Tovar(Ndog,NamePO,NtipPO,Nkat,Plat,Ntiplis,Yaz,Razrab,Kolvokop,Stomost) 
values('$dg','$np','$tp','$kt','$pl','$tl','$yz','$raz','$kol','$st')");
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/post.php");
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
               <legend>Справочник</legend>
                <div class="form-group mb-lg-0 col-lg-offset-0">
                <select name='dogo'>
                    <?
                     $que=$link->query("select * from  Dogovor ");
                    while ($row = $que->fetch_array())
                    {
                        echo '<option value="'.$row['Ndog'].'">'.$row['NamePos'].'</option>';
                    }
                    ?>
                </select>
                <select name='kat'>
                    <?
                    $query1=$link->query("SELECT * FROM Kate ");
                    while ($row = $query1->fetch_array())
                    {
                        echo '<option value="'.$row['Nkat'].'">'.$row['Kat'].'</option>';
                    }
                    ?>
                </select>
                <select name='tip'>
                    <?
                      $query2=$link->query("SELECT * FROM tippo ");
                    while ($row = $query2->fetch_array())
                    {
                        echo '<option value="'.$row['NtipPO'].'">'.$row['TipPO'].'</option>';
                    }
                    ?>
                </select>
                <select name='til'>
                    <?
                     $query3=$link->query("SELECT * FROM tiplise ");
                    while ($row = $query3->fetch_array())
                    {
                        echo '<option value="'.$row['Ntiplis'].'">'.$row['Tiplis'].'</option>';
                    }
                    ?>
                </select>
                </div>
           </fieldset>
                <div class="container" style="float: left;">
                <div class="form-group" >
                <fieldset style="width: 150%;">
                    <legend>Сведения о товаре</legend>
                    <label for="" style="margin-left:-13%;">Наименование программы </label>
                    <input type="text" class="form-control"  name="nam" placeholder="Введите название программы" requered>
                    <label for="" style="margin-left:-12%;">Платформа</label>
                    <input type="text" class="form-control"  name="pla" placeholder="Введите платформу" requered>
                     <label for="" style="margin-left:-12%;">Разработчик</label>
                     <input type="text" class="form-control"  name="razrab" placeholder="Введите разработчика ПО" requered>
                    <label for="" style="margin-left:-13%;">Язык интерфейса</label>
                    <input type="text" class="form-control"  name="yaz" placeholder="Введите язык интерфейса ПО" requered>
                </fieldset>
                </div>
                <img src="img/1920x1200_1229770_%5Bwww.ArtFile.ru%5D.jpg" style="width:50%; padding-left: 10% ">
                <div class="form-group" style="float: right;">
                    <fieldset style="width: 150%;">
                        <legend>Цена</legend>
                    <label for="" style="margin-left:-12%;">Количество копий</label>
                    <input type="text" class="form-control"  name="kolkop" placeholder="Введите количество копий" requered>
                    <label for="" style="margin-left:-12%;">Стоимость</label>
                    <input type="text" class="form-control"   name="stom" placeholder="Введите стоимость ПО" requered>
                    <BR>
                        <button type="submit" class="btn-primary" style="margin-left: 15%">Добавить товар</button>
                    </fieldset>
                </div>
                <BR>
                </div>

            </form>

        </div>
</div>
<br>
<br>

<?

$link = new mysqli('localhost','root','','prodPO');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}
$link->set_charset('utf8');
?>
<div class="container">
    <div class="row">
        <table class="table table-responsive">
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

