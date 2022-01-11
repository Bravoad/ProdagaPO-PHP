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
<div class="container" style="float: left; margin-left:;: 90%;">
        <form  method="post"  role="form" class="form-inline" style="float:left;" action="oplach.php">
                    <div class="form-group mb-2 col-5 " style="float: left; ">
                        <fieldset>
                            <legend>Данные об оплате</legend>
                            <label for="" > Дата оплаты</label>
                            <input type="date" class="form-control"  style="margin-left: 20%;" name="opla" placeholder="Введите дату оплаты" requered>
                            <br>
                            <label for=""> Заказ</label>
                            <select name='zaka' style="margin-left:45%; margin-top: 2%; margin-bottom: 5%; ">
                                <?
                                $que=$link->query("select * from zakaz ");
                                while ($row = $que->fetch_array())
                                {
                                    echo '<option value="'.$row['Nzak'].'">'.$row['Nzak'].'</option>';
                                }
                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn-primary" style="float:right; margin-left: 10%">Оплатить заказ</button>
                          </fieldset>
                     </div>
            <img src="img/delivery-van-vector.jpg" alt="" style="width:25%; padding-left: 10% ">

        </form>
</div>
<div class="row">
    <div class="container" style="float: right; margin-left: -100%;">
                <form  method="post"  role="form" class="form-inline"  action="dostav.php">
                <div class="row " >
                        <fieldset>
                            <legend>Данные об оплате</legend>
                            <label for="" > Дата доставки</label>
                            <input type="date" class="form-control"  style="margin-left: -8%;" name="dosta" placeholder="Введите дату оплаты" requered>
                            <br>
                            <label for=""> Заказ</label>
                            <select name='zaka2' style="margin-left: 40%; margin-top: 2%; margin-bottom: 5%; ">
                                <?
                                $que4=$link->query("select * from zakaz ");
                                while ($row = $que4->fetch_array())
                                {
                                    echo '<option value="'.$row['Nzak'].'">'.$row['Nzak'].'</option>';
                                }
                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn-primary" style="float:right;">Доставить заказ</button>
                        </fieldset>
                    </div>
                </form>
    </div>
</div>
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
                <th>Номер заказа</th>
                <th>Номер товара</th>
                <th>Наименование покупателя</th>
                <th>Дата доставки</th>
                <th>Профессия</th>
                <th>Номер телефона</th>
                <th>Количество покупаемых копий</th>
                <th>Адрес доставки</th>
                <th>Способ оплаты</th>
                <th>Дата оплаты</th>
                <th>Дата доставки</th>
                <th>Статус</th>
            </tr>
            <?php
            $results = $link->query("SELECT * FROM zakaz");
            while($row = $results->fetch_array())
            {
            if($row["Stat"]==1) {  echo "<tr class='table-primary'>";}
                if ($row["Stat"]==0) {echo "<tr class='table-danger'>";}
                if ($row["Stat"]==2) {echo "<tr class='table-success'>";}
                    echo '<td>'.$row["Nzak"].'</td>';
                    echo '<td>'.$row["Ntov"].'</td>';
                    echo '<td>'.$row["Namepok"].'</td>';
                    echo '<td>'.$row["Dzak"].'</td>';
                    echo '<td>'.$row["Prof"].'</td>';
                    echo '<td>'.$row["Tel"].'</td>';
                    echo '<td>'.$row["Kookop"].'</td>';
                    echo '<td>'.$row["AdresDost"].'</td>';
                    echo '<td>'.$row["Sposopl"].'</td>';
                    echo '<td>'.$row["Dopl"].'</td>';
                    echo '<td>'.$row["Ddost"].'</td>';
                    echo '<td>'.$row["Stat"].'</td>';
                    echo '</tr>';
            }

            echo '</table>';
            echo' </div>';
            echo '</div>';
            $results->free();
            $link->close();
            ?>

            <?php
            include 'temp/footer.php';
            ?>

