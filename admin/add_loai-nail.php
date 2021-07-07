<?php
require_once '../db.php';
$getDb = "SELECT * from loai_nail";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetchAll();
if (isset($_POST['btnAdd'])) {
    $text_name = $_POST['ten_loai'];
    $err = [];
    if($text_name == "")
    {
        $err[] = "bạn chưa nhập tên";
    }
        
    if(empty($err)){
        $getDb = "INSERT INTO loai_nail (ten_loai) values ('$text_name')";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "loai_nail.php?msg= Thêm thành công");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="row">
    <?php include_once "nav.php";  ?>
    <!----------------------------- end nav ------------------------------------------->
    <div class="col-md-9">
    <h2 style="color: red; text-align: center;">THÊM LOẠI HÀNG</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
        <form action="" method="post">
        <label for="">Tên loại nail</label> <br>
        <input type="text" name="ten_loai" required> <br> <br>
        <button class="btn btn-danger" type="submit" name="btnAdd">Thêm mới</button>
    </form>
        </div>
    </div>
    </div>
    </div>
</body>

</html>