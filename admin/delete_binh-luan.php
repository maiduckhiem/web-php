<?php
require_once '../db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$getDb = "DELETE from binh_luan where id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
header("Location:" . "binh_luan.php?msg= Xóa thành công!");
}
?>