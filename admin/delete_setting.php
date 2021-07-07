<?php
require_once '../db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$getDb = "DELETE from setting where id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
header("Location:" . "setting.php?msg= Xóa thành công!");
}
?>