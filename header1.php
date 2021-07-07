<?php

require_once "db.php";
$getDb = "SELECT * from loai_nail";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$nail = $stml->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
</head>

<body>
<section class="bg-gray-200">
        <section class="container-full">
            <div class="hearder">
                <div class="bg-pink-500 py-5">
                    <div class="images">
                        <img src="./content/images/111.png" alt="" class="mx-auto">
                    </div>
                </div>
                <ul class="text-center bg-white border-gray-400">
                    <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="index.php">TRANG CHỦ</a></li>
                    <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="bang_gia.php">DỊCH VỤ</a></li>
                    <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="https://www.instagram.com/everly.vn/">MÓNG ĐẸP</a></li>
                    <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="dao_tao.php">ĐÀO TẠO</a></li>
                    <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="tuyen_dung.php">TUYỂN DỤNG</a></li>
                    <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="">TIN TỨC</a></li>
 
                    <?php if (isset($_SESSION['admin'])) {   ?>
                        <a style="color: blue;" href="index.php">Xin chào, <?= $_SESSION['admin']; ?></a> <a href="logout.php" style="color: blue;" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')"> | Đăng xuất</a><a href="lich_su.php"> | lịch sử</a>
                    <?php } elseif (isset($_SESSION['user'])) {   ?>
                        <a style="color: blue;" href="index.php">Xin chào, <?= $_SESSION['user']; ?></a> <a href="logout.php" style="color: blue;" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')"> | Đăng xuất</a><a href="lich_su.php"> | lịch sử</a>

                    <?php } else {   ?>
                        <li class="inline-block mx-6 my-5 uppercase font-bold "><a href="login.php">LOGIN<i class="fas fa-user ml-2 text-xl"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
</body>

</html>