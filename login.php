<?php
session_start();
require_once "db.php";
$getDb = "SELECT * from users";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
    header("Location:index.php?msg=Đăng nhập thành công !");
}
if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = $_POST['pass'];
    $getDb = "SELECT * FROM users WHERE email = '$user' AND mat_khau = '$password' AND kich_hoat = :kich_hoat AND vai_tro=:vai_tro";
    $connect = getDbConnect();
    $stmt = $connect->prepare($getDb);
    $stmt->execute(array(
        'vai_tro' => 0,
        'kich_hoat' => 1
    ));
    $getDb_admin = "SELECT * FROM users WHERE email = '$user' AND mat_khau = '$password' AND vai_tro= :vai_tro AND kich_hoat = :kich_hoat ";
    $connnect = getDbConnect();
    $stmt_admin = $connect->prepare($getDb_admin);
    $stmt_admin->execute(array(
        ':vai_tro' => 1,
        ':kich_hoat' => 1
    ));
    if ($stmt_admin->rowCount() > 0) {
        $_SESSION['admin'] = $user;
        header("Location:admin/index.php?msg=Đăng nhập quản trị thành công !");
    } elseif ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $user;
        header("location:index.php?msg=Đăng nhập thành công !");
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu chưa đúng hoặc tài khoản của bạn đã bị khóa!";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once "content/style.php"  ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url(./content/images/background-login-2.png) no-repeat;
            background-size: cover;
        }

        .login-box {
            width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .login-box h1 {
            float: left;
            font-size: 40px;
            border-bottom: 6px solid #4ff74f;
            margin-bottom: 50px;
            padding: 5px 0;
        }

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #4ff74f;
        }

        .textbox i {
            width: 26px;
            float: left;
            text-align: center;
        }

        .textbox input {
            border: none;
            outline: none;
            background: none;
            color: white;
            font-size: 18px;
            width: 80%;
            float: left;
            margin: 0 10px;
        }

        .btn {
            width: 100%;
            background: none;
            border: 2px solid #4ff74f;
            color: white;
            padding: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h1>Login</h1><br><br><br>
        <?php if (isset($error)) :  ?>
            <p style="color : red; position: absolute; top: 17%"><?= $error ?></p>
        <?php endif; ?>
        <form action="" id="login" method="post">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="user" id="" placeholder="Username" required>
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" id="" placeholder="Password">
            </div>
            <br>
            <input type="checkbox" name="remember" id="" style="width:20px;height:15px"> Ghi nhớ tài khoản
            <button type="submit" name="login" class="btn btn-danger">Đăng nhập</button>
            <a class="forgot" href="#">Quên mật khẩu ?</a>
            <p>Nếu bạn chưa có tài khoản. Vui lòng đăng ký <a href="dang_ky.php">Tại đây?</a></p>
        </form>
    </div>
    <?php include_once "content/js.php"  ?>
</body>

</html>