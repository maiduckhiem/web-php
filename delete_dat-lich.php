<?php
require_once 'db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$getDb = "DELETE from dat_lich where id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
header("Location:" . "lich_su.php?msg= Xóa thành công!");
}
?>