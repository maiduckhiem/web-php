<?php
require_once '../db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$getDb = "DELETE from users where id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
header("Location:" . "users.php?msg= Xóa thành công!");
}
?>