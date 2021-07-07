<?php
require_once '../db.php';
$getDb = "SELECT * from slideshow";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$cates = $stml->fetchAll();
if(isset($_POST['btnAdd'])){
    $text_name = $_POST['title'];
    $img = $_FILES['img'];
    $text_detail = $_POST['detail'];
    $text_status = $_POST['status'];
    $text_link = $_POST['link'];
    $err = [];
    if($text_name == ""){
        $err[] = "bạn chưa nhập tên";
    }
    if ($img['size'] <= 0) {
        $hinh_anh_err = "* Xin mời bạn nhập ảnh";
    } else
        $ten_anh = uniqid() . '_' . $img['name'];
    move_uploaded_file($img['tmp_name'], "../content/images/" . $ten_anh);

    $luu_anh = "../content/images/" . $ten_anh;
    if($text_detail == ""){
        $err[] = "bạn chưa nhập giao vien";
    }
    if($text_status == ""){
        $err[] = "bạn chưa nhập yêu cầu";
    }
    if($text_link == ""){
        $err[] = "bạn chưa nhập đặc biệt";
    }
    if(empty($err)){
        $getDb = "INSERT INTO slideshow (title, hinh, detail, status, link) values ('$text_name','$luu_anh','$text_detail','$text_status','$text_link')";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "slideshow.php?msg= Thêm thành công");
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
    <?php include_once 'nav.php'; ?>
    <div class="col-md-9">
    <h2 style="color: red; text-align: center;">THÊM MỚI SLIDE</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group">
      <label for="">Tên slide</label>
      <input type="text" name="title" required id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Baner image</label>
      <input type="file" name="img" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Detail</label>
      <input type="text" name="detail" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Status</label>
      <input type="text" name="status" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Link</label>
      <input type="text" name="link" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
        <button class="btn btn-danger" name="btnAdd">Thêm mới</button>
        </div>
    </form>
    </div>
    </div>
</body>

</html>