<?php
require_once '../db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$getDb = "SELECT * from users WHERE id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetch();
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
    if ($img['size'] > 0) {
        $ten_anh = uniqid() . '_' . $img['name'];
    move_uploaded_file($image['tmp_name'], "../public/images/" . $ten_anh);

    $luu_anh = "../public/images/" . $ten_anh;            } 
    else{
        $luu_anh = $product['hinh'];
    }
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
        $getDb = "UPDATE users SET ho_ten='$text_name', hinh='$ten_anh', email='$email', mat_khau='$mat_khau', vai_tro=$vai_tro, dac_biet=$dac_biet WHERE id = '$id'";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "users.php?msg= Cập nhật thành công");
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
    <h2 style="color: red; text-align: center;">CẬP NHẬT USERS</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <label for="">Họ tên</label>
        <input type="text" value="<?php echo $product['ho_ten'] ?>" name="ho_ten"> <br>
        <label for="">Img</label>
        <input type="file" value="<?php echo $product['hinh'] ?>" name="hinh"> <br>
        <label for="price">Email</label><br>
        <input type="text" value="<?php echo $product['email'] ?>" name="email" class="form-control">
        <br>
        <label for="sale">Mật khẩu</label> <br>
        <input type="text" value="<?php echo $product['mat_khau'] ?>" name="mat_khau" class="form-control"> <br><br>
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
        
        <button class="btn btn-danger" name="btnAdd">Cập nhật</button>
        </div>
    </form>
    </div>
    </div>
</body>

</html>