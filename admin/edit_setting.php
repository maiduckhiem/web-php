<?php
require_once '../db.php';
$getDb = "SELECT * from setting";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetch();
$id = $_GET['id'];
if(isset($_POST['btnUpdate'])){
    $text_name = $_POST['name'];
    $text_phone = $_POST['phone'];
    $text_address = $_POST['address'];
    $text_gmail = $_POST['gmail'];
    $img = $_FILES['img'];
    if($text_name == ""){
        $err[] = "bạn chưa nhập tên";
    }
    if ($img['size'] <= 0) {
        $hinh_anh_err = "* Xin mời bạn nhập ảnh";
    } else
        $ten_anh = uniqid() . '_' . $img['name'];
    move_uploaded_file($img['tmp_name'], "../content/images/" . $ten_anh);

    $luu_anh = "../content/images/" . $ten_anh;
    if($text_phone == ""){
        $err[] = "bạn chưa nhập giao vien";
    }
    if($text_address == ""){
        $err[] = "bạn chưa nhập yêu cầu";
    }
    if($text_gmail == ""){
        $err[] = "bạn chưa nhập đặc biệt";
    }
    if(empty($err)){
        $getDb = "INSERT INTO setting (name, phone, address, gmail, logo) values ('$text_name','$text_phone','$text_address','$text_gmail','$ten_anh'  WHERE id = '$id')";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "setting.php?msg= Thêm thành công");
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
    <h2 style="color: red; text-align: center;">THÊM SETTING</h2> 
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <label for="">Tên </label> <br>
        <input type="text" value="<?php echo $product['name'] ?>" name="name"> <br>
        <label for="">Số điện thoại</label> <br>
        <input type="text" value="<?php echo $product['phone'] ?>" name="phone"> <br>
        <label for="">Address</label><br>
        <input type="text" value="<?php echo $product['address'] ?>" name="address" required class="form-control">
        <br>
        <label for="">Gmail</label> <br>
        <input type="text" value="<?php echo $product['gmail'] ?>" name="gmail" required class="form-control"> <br>
        <label for="">Logo</label> <br>
        <input type="File" value="<?php echo $product['logo'] ?>" name="img"> <br>
        <button class="btn btn-danger" name="btnUpdate">Cập nhật</button>
        </div>
        </div>
    </form>
    </div>
</body>

</html>