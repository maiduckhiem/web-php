<?php
require_once '../db.php';
$getDb = "SELECT * from users";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetchAll();
if(isset($_POST['btnAdd'])){
    $text_name = $_POST['ho_ten'];
    $img = $_FILES['hinh'];
    $email = $_POST['email'];
    $mat_khau = $_POST['mat_khau'];
    $vai_tro = $_POST['vai_tro'];
    $dac_biet = $_POST['dac_biet'];
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
    if($email == ""){
        $err[] = "bạn chưa nhập giao vien";
    }
    if($mat_khau == ""){
        $err[] = "bạn chưa nhập yêu cầu";
    }
    if($vai_tro == ""){
        $err[] = "bạn chưa nhập đặc biệt";
    }
    if($dac_biet == ""){
        $err[] = "bạn chưa nhập mô tả";
    } 
    if(empty($err)){
        $getDb = "INSERT INTO users (mat_khau, ho_ten, kich_hoat, hinh, email, vai_tro) values ('$mat_khau','$text_name', $dac_biet,'$ten_anh','$email', $vai_tro)";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "users.php?msg= Thêm thành công");
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
    <h2 style="color: red; text-align: center;">THÊM MỚI USERS</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <label for="">Họ tên</label> <br>
        <input type="text" name="ho_ten" required> <br>
        <label for="">Ảnh đại diện</label><br>
        <input type="file" name="hinh" required> <br>
        <label for="price">Email</label><br>
        <input type="text" name="email" required class="form-control">
        <br>
        <label for="sale">Mật khẩu</label> <br>
        <input type="text" name="mat_khau" required class="form-control"> <br><br>
        <label for="">Vai trò</label>
        <div class="form-control">
            <input name="vai_tro" value="0" type="radio"> Khách hàng &nbsp;&nbsp;
            <input name="vai_tro" value="1" type="radio"> Admin
        </div>
        <br>
        <label for="">Kích hoạt</label>
        <div class="form-control">
            <input name="dac_biet" value="0" type="radio"> Bị khóa &nbsp;&nbsp;
            <input name="dac_biet" value="1" type="radio"> Hoạt động
        </div>
        <br>
        
        <button class="btn btn-danger" name="btnAdd">add</button>
        </div>
    </form>
    </div>
    </div>
</body>

</html>