<?php
$link = new mysqli('localhost','root','','prodPO');
if ($link->connect_error)
{
    echo 'ошибка при попытке установки связи с сервером: '.$link->connect_error.'<br>';
    die ('Cоединение не установлено');
}
$link->set_charset('utf8');
if (!empty($_POST)) {
    $dos = $_POST['dosta'];
    $za2 = $_POST['zaka2'];
    $sql = $link->query("Update Zakaz SET Stat=2,  Ddost='$dos' where Nzak='$za2'");
    $results = $link->query("SELECT * FROM Zakaz");
    $results->free();
    $link->close();
    header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/upd_zak.php");
}
?>