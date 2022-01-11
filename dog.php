<?php
$link = new mysqli('localhost','root','','prodPO');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}

$link->set_charset('utf8');
if (!empty($_POST)) {

    $dat = $_POST['dat'];
    $post = $_POST['post'];
    $vend = $_POST['vend'];
    $bank = $_POST['bank'];
    $sql = $link->query("insert into DOGOVOR(NamePos,vendor,Bankrekv,Dpodpis) values( '$post', '$vend', '$bank','$dat')");
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/dog.php");
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
                    <legend>Договор</legend>
                <div class="row">
                    <label for=""  style="margin-left: 2%"> Дата подписания</label>
                    <label for="" STYLE="margin-left: 4%;"> Наименование поставщика</label>
                    <label for="" STYLE="margin-left: 2%;"> Вендор</label>
                    <label for="" STYLE="margin-left: 11%;"> Банковские реквизиты</label>
                    <div>
                        <div CLASS="col">
                    <input type="date" class="form-control"  name="dat" placeholder="Введите дату подписания" requered>

                    <input type="text" class="form-control"  name="post" placeholder="Введите название поставщика" requered>
                      <input type="text" class="form-control"  name="vend" placeholder="Введите название вендора" requered>

                    <input type="text" class="form-control" id="b" name="bank" placeholder="Введите банковские реквизиты" requered>
                    <button type="submit" class="btn-primary" STYLE="margin-top: 2%">Оформить договор</button>
                </div>
                </fieldset>
                </div>

                <script>
                    $(document).ready(function()
                        {
                            $("#b").mask("9999999999");
                        }
                    );
                </script>
            </form>
        </div>
    </div>
<div class="container">
<div class="row">
        <table class="table table-responsive table-success">
            <tr>
                <th>Номер</th>
                <th>Наименование поставшика</th>
                <th>Наименование вендора</th>
                <th>Банковские реквизиты поставщика</th>
                <th>Дата подписания</th>

            </tr>
            <?php
            $results = $link->query("SELECT * FROM dogovor");
            while($row = $results->fetch_array())
            {
                echo '<tr>';
                echo '<td>'.$row["Ndog"].'</td>';
                echo '<td>'.$row["NamePos"].'</td>';
                echo '<td>'.$row["Vendor"].'</td>';
                echo '<td>'.$row["Bankrekv"].'</td>';
                echo '<td>'.$row["Dpodpis"].'</td>';
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

