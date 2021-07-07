<?php
require_once '../db.php';
$id = $_GET['id'];
$getDb = "SELECT * from dat_lich";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetch();
if(isset($_POST['btnAdd'])){
    $text_gio = $_POST['gio_den'];
    $trang_thai = $_POST['trang_thai'];
    $xac_nhan = $_POST['xac_nhan'];
    if($text_gio == ""){
        $err[] = "bạn chưa nhập tên";
    }
    if($trang_thai == ""){
        $err[] = "bạn chưa nhập mô tả";
    }
    if($xac_nhan == ""){
        $err[] = "bạn chưa nhập mô tả";
    }
    if(empty($err)){
        $getDb = "UPDATE dat_lich SET gio_den='$text_gio', trang_thai=$trang_thai, xac_nhan=$xac_nhan WHERE id = '$id'";
        $connect = getDbConnect();
        $stml = $connect->prepare($getDb);
        $stml->execute();
        header("Location:" . "dat_lich.php?msg= Thêm thành công");
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
 <!-- tailwindcss -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+sc O/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
    <div class="main-header navbar-expand navbar-white navbar-light">
        <div class="">
    <h2 style="color: red; text-align: center;">CẬP NHẬT ĐẶT LỊCH</h2> 
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="mx-5"> 
        <div>
            <label for="">Giờ đến</label>
            <input type="text" value="<?php echo $product['gio_den'] ?>" name="gio_den" required >
        </div>
        <label for="" class="mt-5">trạng thái</label>
        <div>
            <div class="form-control">
                <input name="trang_thai" value="0" type="radio"> Chưa làm &nbsp;&nbsp;
                <input name="trang_thai" value="1" type="radio"> Đã làm
                <input name="trang_thai" value="2" type="radio"> Đang sử lý
            </div>
        </div>
        <label for="" class="mt-3">Xác nhận</label>
        <div class="form-control">
            <input name="xac_nhan" value="0" type="radio"> Chưa nhận &nbsp;&nbsp;
            <input name="xac_nhan" value="1" type="radio"> Đã nhận
            <input name="xac_nhan" value="2" type="radio"> Đang sử ly
        </div>
        <button class="btn btn-danger mt-5" name="btnAdd">Cập nhật</button>
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
                    <h5 style="color: #fff;"><?php $user = $_SESSION['admin'];  echo $user;?></h5>    
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
