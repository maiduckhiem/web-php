<?php
require_once '../db.php';
$getDb = "SELECT * from nhan_vien";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$cates = $stml->fetchAll();
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
        $getDb = "INSERT INTO nhan_vien (ho_ten, image, email, sdt, thong_tin) values ('$text_name','$ten_anh','$text_email','$text_sdt','$text_tt')";
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
<!-- CSS only -->
<!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            </div>
          </form>
        </div>
      </li>
    <div class="main-header  navbar-expand navbar-white navbar-light">
      <div class="">
    <h2 style="color: red; text-align: center;">THÊM MỚI NHÂN VIÊN</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group">
      <label for="">Họ tên</label>
      <input type="text" name="ho_ten" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Ảnh nhân viên</label>
      <input type="file" name="image" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="text" name="email" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Số điện thoại</label>
      <input type="text" name="sdt" id="" required class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Thông tin</label>
      <input type="text" name="thong_tin" required id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
        <button class="btn btn-danger" name="btnAdd">Thêm mới</button>
        </div>
    </form>
    </div>
  </div>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Control sidebar content goes here -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="">
          <div class="info">
                <?php if (isset($_SESSION['admin'])) { ?>
            <h5 class="text-white"><?php $user = $_SESSION['admin'];  echo $user;?></h5>
          <? }else { ?>
            <h2> <?php echo ""; ?></h2>
          <?php } ?>
          </div>
        </div>
      </div>
      <!-- code -->
      <div>
        <?php include_once "nav.php";  ?>
    <!----------------------------- end nav ------------------------------------------->
      </div>
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
 

  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- JavaScript Bundle with Popper -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 <script src="https://kit.fontawesome.com/978924ea4f.js
                                " crossorigin="anonymous"></script>
</body>
</html>
