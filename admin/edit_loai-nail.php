<?php
require_once '../db.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$getDb = "SELECT * from loai_nail  WHERE id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetch();
if (isset($_POST['btnUpdata'])) {
    $text_name = $_POST['mon_h'];
        $getDb = "UPDATE loai_nail SET ten_loai = '$text_name' WHERE id = '$id'";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "loai_nail.php?msg= Sửa thành công!");
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
    <h2 style="color: red; text-align: center;">CẬP NHẬT DANH MỤC</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
        <form action="" method="post">
        <label for="">Cập nhật loại nai</label> <br>
        <input type="text" value="<?php echo $product['ten_loai'] ?>" name="mon_h"> <br> <br>
        <button class="btn btn-danger" type="submit" name="btnUpdata">cập nhật</button>
    </form>
        </div>
        </div>
    </div>
    </div>
</body>

</html>