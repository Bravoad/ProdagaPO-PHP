<?php
$link = new mysqli('localhost','root','','prodpo');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}
$link->set_charset('utf8');
if (!empty($_POST)) {
    $tr = $_POST['tovo'];
    $dz = $_POST['dzaka'];
    $np = $_POST['nampok'];
    $pr = $_POST['pro'];
    $te = $_POST['tele'];
    $kol = $_POST['kolkop'];
    $ad = $_POST['adrd'];
    $sp = $_POST['spos'];
     $sql = $link->query("insert into zakaz(Ntov,dzak,Namepok,Prof,Tel,Kookop,AdresDost,sposopl,stat) 
values('$tr','$dz','$np','$pr','$te','$kol','$ad','$sp',0)");

    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/upd_zak.php");
}
include 'temp/head.php';
include 'temp/header.php';
include 'temp/navbar.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form  method="post"  role="form" class="form-inline">
            <div class="container">
            <div class="form-group mb-2 col-5 " style="float: left;">
                    <fieldset>
                        <legend>Данные о покупателе</legend>
                        <label for="" style="margin-left: -15%;"> Дата заказа</label>
                    <input type="date" class="form-control"  style="margin-left:13%;" name="dzaka" placeholder="Введите дату заказа" requered>
                    <br>
                        <label for="" style="margin-left: -9%;"> Наименование покупателя</label>
                    <input type="text" class="form-control" style="margin-left:13%;" name="nampok" placeholder="Введите наименование покупателя" requered>
                    <label for="" style="margin-left: -15%;"> Профессия</label>
                    <input type="text" class="form-control"  style="margin-left:13%;" name="pro" placeholder="Введите профессию" requered>
                    <label for="" style="margin-left: -15%;"> Телефон</label>
                    <input type="text" class="form-control"  style="margin-left:13%;" id="tel" name="tele" placeholder="Введите телефон" requered>
                    <script>
                        $(document).ready(function()
                            {
                                $("#tel").mask("+7-999-999-99-99");
                            }
                        );
                    </script>
                    </fieldset>
                </div>
            <img src="img/retail-finance-page_512.png" style="width: 10%; margin-top: 15%">
            <div class="form-group mb-2 col-5 " style="float: right;">
                <fieldset>
                 <legend>Данные о товаре</legend>
                  <br>
                    <label for="" style="margin-left:-20%;"> Товар</label>
                    <select name='tovo' style="margin-left:13%;">
                        <?
                        $que2=$link->query("select * from Tovar ");
                        while ($row = $que2->fetch_array())
                        {
                            echo '<option value="'.$row['Ntov'].'">'.$row['NamePO'].'</option>';
                        }
                        ?>
                    </select>
                <label for="" style="margin-top: -1%; margin-left: -12%;">Количество копий</label>
                    <input type="text" class="form-control" style="margin-left:13%;" name="kolkop" placeholder="Введите количество копий" requered>
                    <label for="" style="margin-top: -1%; margin-left: -12%;"> Адрес доставки</label>
                    <input type="text" class="form-control" style="margin-left:13%;" name="adrd" placeholder="Введите Адрес доставки" requered>
                    <label for="" style="margin-top: -1%; margin-left: -12%;"> Способ оплаты </label>
                    <input type="text" class="form-control" style="margin-left:13%;"  name="spos" placeholder="Введите способ оплаты" requered>
                </fieldset>
                <button type="submit" class="btn-primary" id="button" style="float:right" onclick="">Оформить заказ</button>
                <script>
                    button.onclick = function() {
                        alert("Заказ оформлен,подтвердите оплату!");
                    };
                </script>
                </div>
            </form>
        </div>

    </div>
    <div class="form-inline">
        <form  method="post"  style="float: right" role="form" class="form-inline" action="upd_zak.php">
            <button type="submit" class="btn-primary"  style="float:right">Изменить статусы заказа</button>
        </form>
        <form  method="post"  style="float: right" role="form" class="form-inline" action="spisok.php">
            <button type="submit" class="btn-primary"  style="float:right">Список ПО для отправки</button>
        </form>
    </div>

    </div>

<?
$link = new mysqli('localhost','root','','prodPO');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}
$link->set_charset('utf8');
$link->close();

?>

            <?php
            include 'temp/footer.php';
            ?>

