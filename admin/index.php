<?php
require_once '../db.php';
$getDb = "SELECT * from nail";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetchAll();
?>

