<?php
require_once '../db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$getDb = "DELETE from nail where id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
header("Location:" . "index.php?msg= Xóa thành công!");
}
?>