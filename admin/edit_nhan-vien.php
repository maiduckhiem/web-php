<?php
require_once '../db.php';
$getDb = "SELECT * from nhan_vien";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$nv = $stml->fetch();
$id = $_GET['id'];
if(isset($_POST['btnAdd'])){
    $text_name = $_POST['ho_ten'];
    $img = $_FILES['image'];
    $text_email = $_POST['email'];
    $text_sdt = $_POST['sdt'];
    $text_tt = $_POST['thong_tin'];
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
    if($text_email == ""){
        $err[] = "bạn chưa nhập giao vien";
    }
    if($text_sdt == ""){
        $err[] = "bạn chưa nhập yêu cầu";
    }
    if($text_tt == ""){
        $err[] = "bạn chưa nhập đặc biệt";
    }
    if(empty($err)){
        $getDb = "UPDATE nhan_vien SET ho_ten='$text_name', image='$ten_anh', email='$text_email', sdt='$text_sdt', thong_tin='$text_tt'  WHERE id = '$id'";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "nhan_vien.php?msg= Thêm thành công");
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
    <h2 style="color: red; text-align: center;">CẬP NHẬT NHÂN VIÊN</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group">
      <label for="">Họ tên</label>
      <input type="text" name="ho_ten" value="<?= $nv['ho_ten'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Ảnh nhân viên</label>
      <input type="file" name="image" value="<?= $nv['image'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="email" value="<?= $nv['email'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Số điện thoại</label>
      <input type="text" name="sdt" value="<?= $nv['sdt'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Thông tin</label>
      <input type="text" name="thong_tin" value="<?= $nv['thong_tin'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
        <button class="btn btn-danger" name="btnAdd">Cập nhật</button>
        </div>
    </form>
    </div>
    </div>
</body>

</html>