<?php
require_once "db.php";
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $passCheck = $_POST['password'];
    $vai_tro = 0; //user
    $kich_hoat = 1; //dang hoat dong
    if ($email == "") {
        $err[] = "Bạn chưa nhập email";
    }
    if ($name == "") {
        $err[] = "Bạn chưa nhập name";
    }
    if ($password == "") {
        $err[] = "Bạn chưa nhập pass";
    }
    if ($password == "") {
        $err[] = "Bạn chưa nhập pass";
    }
    if ($passCheck == "") {
        $err[] = "Bạn chưa nhập passCheck";
    }
    if ($password != $passCheck) {
        $err[] = "Mật khẩu không Khớp";
    }
    else
        $ten_anh = uniqid() . '_' . $img['name'];
    move_uploaded_file($img['tmp_name'], "./content/images/" . $ten_anh);

    $luu_anh = "./content/images/" . $ten_anh;
    $getDb = "INSERT INTO users (email, ho_ten, mat_khau, hinh, kich_hoat, vai_tro) values ('$email','$name','$passCheck','$ten_anh','$kich_hoat',$vai_tro)";
    $connect = getDbConnect();
    $stml = $connect->prepare($getDb);
    $stml->execute();
    header("Location:" . "index.php?msg= Tạo thành công");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    include_once 'content/style.php'
    ?>
    <?php 
    include_once 'content/js.php'
    ?>
</head>

<body>
    <?php include_once 'header1.php' ?>
    <div class="container mx-auto bg-white pb-5">
            <form class="" method="POST" id="register" enctype="multipart/form-data">
                <div class="">
                    <h3 class="mx-auto">Tạo mới tài khoản ngay bây giờ</h3>
                    <?php
                    if (isset($error)) { ?>
                        <p class="alert alert-danger"><?= $error ?></p>
                    <?php } ?>
                    <div class="form-group">
                        <label for="">Email *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Họ và tên *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Mật khẩu *</label>
                        <input type="password" name="pass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Xác nhận mật khẩu *</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <button type="submit" name="register" class="btn" style="background-color:#00A4E1; color: white;">Đăng ký</button>
                <a href="index.php" class="btn btn-danger">Quay lại</a>
            </form>
    </div>
    <?php include_once 'footer.php' ?>
</body>

</html>