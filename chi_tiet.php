<?php
session_start();
require_once "db.php";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
$cate = $_GET['cate'];
$getDb = "SELECT * from nail WHERE id = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$products = $stml->fetch();
$getDb = "SELECT binh_luan.id, binh_luan.noi_dung, binh_luan.id_nail, binh_luan.id_user, binh_luan.ngay_bl, nail.title,
 users.ho_ten, users.email  From binh_luan JOIN nail ON binh_luan.id_nail = nail.id 
 JOIN users ON binh_luan.id_user = users.id  WHERE id_nail = '$id'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$pro = $stml->fetchall();
$getDb = "SELECT * from nhan_vien";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$cates = $stml->fetchAll();
$getDb = "SELECT * from nail  WHERE dac_biet = 0 LIMIT 0,5";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$productss = $stml->fetchAll();
if (isset($_GET['id_comment'])) {
  $id_cmt = $_GET['id_comment'];
  $getDb = "DELETE from binh_luan where id = '$id_cmt'";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  header("Location:" . "chi_tiet.php?id=$id&cate=$cate?msg= Xóa thành công!");
}
if (isset($_SESSION['user']) && isset($_POST['btnAdd'])) {
  $ho_ten = $_POST['name'];
  $sdt = $_POST['sdt'];
  $date = date("Y/m/d");
  $ngay_den = $_POST['ngay_den'];
  $gio_den = $_POST['gio'];
  $id = $_GET['id'];
  $user = $_SESSION['user'];
  $nguoi_lam = $_POST['nhan_vien'];
  $ghi_chu = $_POST['ghi_chu'];
  $getDb = "SELECT * from users WHERE email = '$user'";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  $product = $stml->fetchAll();
  foreach ($product as $key => $row) {
    $id_user = $row['id'];
  }
  $getDb = "INSERT INTO dat_lich (ten_nguoi_dat, sdt, ngay_dat, ngay_den, gio_den, id_loai, id_user, id_nv, ghi_chu) values ('$ho_ten','$sdt','$date','$ngay_den','$gio_den','$id','$id_user','$nguoi_lam','$ghi_chu')";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  header("Location:" . "index.php?msg= Thêm thành công");
} else if (isset($_SESSION['admin']) && isset($_POST['btnAdd'])) {
  $ho_ten = $_POST['name'];
  $sdt = $_POST['sdt'];
  $date = date("Y/m/d");
  $ngay_den = $_POST['ngay_den'];
  $gio_den = $_POST['gio'];
  $id = $_GET['id'];
  $admin = $_SESSION['admin'];
  $nguoi_lam = $_POST['nhan_vien'];
  $ghi_chu = $_POST['ghi_chu'];
  $getDb = "SELECT * from users WHERE email = '$admin'";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  $product = $stml->fetchAll();
  foreach ($product as $key => $row) {
    $id_admin = $row['id'];
  }
  $getDb = "INSERT INTO dat_lich (ten_nguoi_dat, sdt, ngay_dat, ngay_den, gio_den, id_loai, id_user, id_nv, ghi_chu) values ('$ho_ten','$sdt','$date','$ngay_den','$gio_den','$id','$id_admin','$nguoi_lam','$ghi_chu')";
$connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  header("Location:" . "chi_tiet.php?id=$id&cate=$cate?msg= Thêm thành công");
}
if (isset($_SESSION['user']) && isset($_POST['comment'])) {
  $date = date("Y/m/d");
  $content = $_POST['commentPro'];
  $id = $_GET['id'];
  $user = $_SESSION['user'];
  $getDb = "SELECT * from users WHERE email = '$user'";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  $prod = $stml->fetchAll();
  foreach ($prod as $key => $row) {
    $id_user = $row['id'];
  }
  $getDb = "INSERT INTO binh_luan (noi_dung,id_nail,id_user,ngay_bl) VALUES ('$content','$id','$id_user','$date')";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  header("Location:" . "chi_tiet.php?id=$id&cate=$cate?msg= Thêm thành công");
} elseif (isset($_SESSION['admin']) && isset($_POST['comment'])) {
  $date = date("Y/m/d");
  $content = $_POST['commentPro'];
  $id = $_GET['id'];
  $admin = $_SESSION['admin'];
  $getDb = "SELECT * from users WHERE email = '$admin'";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  $prod = $stml->fetchAll();
  foreach ($prod as $key => $row) {
    $id_admin = $row['id'];
  }
  $getDb = "INSERT INTO binh_luan (noi_dung,id_nail,id_user,ngay_bl) VALUES ('$content','$id','$id_admin','$date')";
  $connect = getDbConnect();
  $stml = $connect->prepare($getDb);
  $stml->execute();
  header("Location:" . "chi_tiet.php?id=$id&cate=$cate?msg= Thêm thành công");
} elseif (!isset($_SESSION['user']) && isset($_POST['comment'])) {
  echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
}
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
  <?php require_once "header1.php"; ?>
    <section class="container mx-auto bg-white pb-5">
      <div class="dlink clearfix" style="padding: 14px; color: #000000;"><a class='cmaTite' style="padding: 14px; color: #000000;" href='/'>Trang chủ</a>><a class='cmaTite' style="padding: 14px; color: #000000;" href='tuyen_dung.php'>Tuyển dụng</a></div>
        <div class="grid grid-cols-12 mx-32">
            <div class="col-span-5 mt-5">
                <img class="mx-auto slides rounded-full" src="content/images/anh-mau-nail-dep-nhat_040605503.jpg" alt="" width="70%">
                <img class="mx-auto slides rounded-full" src="./content/images/1336566194413344537061282032379468015649670n-160930656652352240833.jpg" alt="" width="70%">
                <img class="mx-auto slides rounded-full" src="./content/images/40c2a64386bad722dd3515e9052a0d56.png" alt="" width="70%">
<h6 class="uppercase mt-10 font-bold text-white text-center bg-pink-500"><?php echo $products['price'] ?></h6>
                        <a href=""><p class="uppercase font-bold mt-3"><?php echo $products['title'] ?></p></a>
<p class="uppercase mt-3"><?php echo $products['intro'] ?>
                        <p class="uppercase mt-3"><?php echo $products['detail'] ?>
            </div>
            <div class="col-span-2">
            </div>
           <div class="col-span-5 border-2 p-5">
                <h3 class="font-bold text-2xl mt-5">Đặt lịch ngay</h3>
                <p class="border-b-2 border-pink-500 w-32 mt-2 "></p>
                <form action="" method="post" class="mt-10">
                <div class="form-group grid grid-cols-12 ">
                  <label for="" class="col-span-4 mt-3">Họ tên</label>
                  <input type="text" name="name" id="" required class="form-control border-2 col-span-8 my-3 hover:border-pink-500" name="ho_ten" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group grid grid-cols-12 ">
                  <label for="" class="col-span-4 mt-3">Số điện thoại</label>
                  <input type="text" name="sdt" id="" required class="form-control border-2 col-span-8 my-3 hover:border-pink-500" name="sdt" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group grid grid-cols-12 ">
                  <label for="" class="col-span-4 mt-3">Ngày đến</label>
                  <input type="date" name="ngay_den" id="" required class="form-control border-2 col-span-8 my-3 hover:border-pink-500" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group grid grid-cols-12 ">
                  <label for="" class="col-span-4 mt-3">Giờ đến</label>
                  <input type="time" name="gio" id="" required class="form-control border-2 col-span-8 my-3 hover:border-pink-500" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group grid grid-cols-12 my-3">
                  <label for="" class="col-span-3">Chọn Người Làm</label> <br>
                  <select name="nhan_vien" class="border-2 col-span-8 hover:border-pink-500">
                    <?php foreach ($cates as $item) { ?>
                      <option value="<?php echo $item['id'] ?>"><?= $item['ho_ten'] ?><img src="./content/images/<?php echo $rows['image'] ?>" alt="" width="25%"></option>
                      <img src="<?php echo $item['id'] ?>./content/images/<?php echo $rows['image'] ?>" alt="" width="25%">
                    <?php } ?>
                  </select>
                </div>
                <div class="">
                  <label for="">Ghi chú</label>
                  <textarea name="ghi_chu" id="inputcommentPro" class="border-2 border-black mt-2 w-full p-2" rows="3" required></textarea>
                </div>
<button name="btnAdd" class="mt-5 mx-auto hover:text-pink-500 border-2 p-2 hover:border-pink-500">Đặt Lịch</button>
                </form>
                </div>
            </div>
          </div>
         <div class="border mt-12 mx-20">
               <!-- giới thiệu -->
          <div class="mx-8 mt-10 mb-10 ">
                      <h3 class="font-bold ml-4 text-xl text-pink-500">Thông tin sản phẩm :</h3>
                      <div class="mt-5 border p-5 py-12">
                        <h5 class="font-bold">1. Bộ gel khô 12 màu Handan</h5>
                        <p class="mt-2">Bộ gel khô 12 màu là một phụ liệu trong bộ vẽ trang trí móng được sử dụng phổ biến trong việc nặn hoa nổi 3D, hoa fantasy, hoạt hình, búp bê,.. trang trí trên nền sơn gel,phom móng gel hoặc phom móng bột. Sản phẩm thay thế cho cách đắp bột thông thường với lưu huỳnh, dành cho những người bị dị ứng với hóa chất. Sản phẩm sử dụng kết hợp cùng với cọ đắp hoa bột, que gỗ, nước lau gel,...được dùng cho những người mới học cũng như chuyên nghiệp trong các tiệm nail.</p>
                        <h5 class="font-bold">2. Mô tả về bộ gel khô 12 màu Handan</h5>
                        <p class="mt-2">Bộ gel khô 12 màu Handan được sản xuất với nguyên liệu là dòng sơn gel với chất lượng gel khô, dẻo, mịn, chuẩn độ màu sắc. Sản phẩm được thiết kế với dáng lọ nhỏ gọn có dung tích 10ml, thuận tiện cho quá trình sử dụng, di chuyển và cất giữ. Gồm 2 bộ phận chính là thân lọ chứa sơn và nắp bảo vệ. Phần thân lọ được làm từ nhựa cứng màu đen, có chiều cao 3cm, rộng 3cm. Phần nắp bảo vệ có phần khấc xoáy liên kết với thân lọ giúp bảo quản tốt chất lượng của sản phẩm.</p>
                        <p class="mt-2">- Chất liệu mực: Gel màu khô đặc</p>
                        <p class="mt-2">- Khối lượng: 8g</p>
                        <p class="mt-2">- Kích thước: 3x3cm</p>
                        <p class="mt-2">- Màu sắc: Màu sắc đa dạng gồm 12 màu: xanh, đỏ, vàng, trắng, đen,...</p>
                        <h5 class="font-bold">3. Cách sử dụng bộ gel khô 12 màu Handan</h5>
                        <p class="mt-2">Bộ gel khô 12 màu Handan được sử dụng trên nền sơn gel, phom móng gel hoặc phom móng bột, kết hợp với cọ đắp hoa bột số 2, que gỗ, nước lau gel, máy sấy gel,...Sau khi hoàn thành xong quá trình tạo phom móng với sơn gel, gel hoặc bột...ta tiếp tục với công đoạn nặn đắp hoa trang trí lên móng. Đầu tiên, ta dùng nước lau gel làm ẩm tay để tránh trường hợp gel bết dính vào da tay, ta dùng que gỗ để lấy một lượng gel khô vừa đủ lên tay tùy theo màu sắc và nhu cầu muốn trang trí hoa nổi 3D, hoa fantasy, búp bê, hoạt hình,...Nếu làm hoa nổi 3D, ta dùng 2 đầu ngón tay vê tròn gel và đặt lên móng, sau đó dùng bút đắp hoa bột đã được làm ẩm bằng nước lau gel để tán trực tiếp cách hoa trên móng. Nếu làm hoa Fantasy ta sẽ đặt gel lên thân que gỗ rồi dùng tay nặn nhẹ thành cánh hoa mỏng và đặt xếp từng cánh ghép thành hoa. Khi làm hoa, để tránh trường hợp cánh hoa bị hỏng do va chạm, ta sẽ sấy khô từng cánh hoa một với thời gian thích hợp từ 30s- 40s tùy thuộc vào độ dày mỏng. Đối với kĩ thuật làm búp bê, ta sẽ làm mặt búp bê màu da trước trên móng rồi sấy khô gel, dùng màu gel để vẽ các chi tiết mắt, mũi, môi,...sau đó sơn bóng để giữ nét vẽ và tiếp tục với công đoạn làm tóc, thân, váy,... Cuối cùng là sơn bóng để tạo độ bền và giữ cho sản phẩm không bị bẩn và mất nét.</p>
                        <h5 class="font-bold">4. Chú ý khi sử dụng gel khô</h5>
                        <p class="mt-2">- Bảo quản sản phẩm nơi khô ráo, thoáng mát.</p>
                        <p class="mt-2">- Vệ sinh, lau chùi sạch sẽ lớp sơn bám trên thành lọ với nước lau gel sau khi sử dụng</p>
                        <p class="mt-2">- Trong quá trình sử dụng, đặt gel và các loại bút cách xa máy hơ gel để tránh trường hợp ánh sáng đèn chiếu vào làm cứng hỏng ảnh hưởng đến chất lượng của sản phầm.</p>
                        <p class="mt-2">- Mọi chi tiết về sản phẩm Bộ gel khô 12 màu Handan, cách sử dụng Bộ gel khô 12 màu Handan, cách làm kĩ thuật bằng Bộ gel khô 12 màu Handan: Các bạn vui lòng liên hệ theo các thông tin cuối website để được hướng dẫn và giải đáp thắc mắc.</p>
                        <p class="mt-2">- Mọi sản phẩm mua tại Phương Lê shop, bạn sẽ được hướng dẫn sử dụng chi tiết, đảm bảo hiệu quả, tối ưu nhất về chi phí!</p>
                        <p class="mt-2">Mua sản phẩm gel tại các cửa hàng bán đồ nail, cửa hàng bán đồ làm nail tại Hà Nội bạn sẽ rất dễ có thể lựa chọn được sản phẩm ưng ý. Tại Phương Lê Shop chúng tôi bán đầy đủ đồ làm móng tay chân, bán đồ làm nail với giá cả hợp lý nhất với chất lượng mà bạn có!</p>

                      </div>
                      <form action="" class="mt-10 ml-5">
                        <laber class="mt-10">Sắp xếp theo</laber>
                        <select name="" id="" class="border-2">
                          <option value="">mới nhất</option>
                          <option value="">cũ nhất</option>
                        </select>
                      </form>
          </div>
          <p class="border-b-2"></p>
        <!-- bình luận -->
        <div class="mx-12 mt-5 pb-10">
<h3 class="font-bold text-pink-500 text-2xl">Bình luận</h3>
          <form  action="" method="post">
            <textarea name="commentPro" id="inputcommentPro" class="border-2 border-black w-full p-2" rows="3" required></textarea> <br>
            <button type="submit" name="comment" class="text-white hover:border-blue-500 border-2 px-2 bg-black">Bình luận</button>
          </form>
          <?php foreach ($pro as $key => $rows) { ?>
            <div class="row">
              <div class="col-md-12 border-t-2 mt-10 pt-3 border-blue-300"> <b><?= $rows['ho_ten'] ?></b>
                <span style="float:right;font-size:10px"><?= $rows['ngay_bl'] ?></span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p class="mt-5"><?= $rows['noi_dung'] ?></p>
                <?php
                if (isset($_SESSION['user'])) {
                  if ($rows['email'] == $_SESSION['user']) { ?>
                    <a class="text-red-500" style="float:right;font-size:10px" href="chi_tiet.php?id=<?= $rows['id_nail'] ?>&cate=<?= $cate ?>&id_comment=<?= $rows['id'] ?>" style="font-size:10px">Xoa</a>
                  <?php

                  }
                } else if (isset($_SESSION['admin']))
                  if ($rows['email'] == $_SESSION['admin']) { ?>
                  <a class="text-red-500" style="float:right;font-size:10px" href="chi_tiet.php?id=<?= $rows['id_nail'] ?>&cate=<?= $cate ?>&id_comment=<?= $rows['id'] ?>" style="font-size:10px" onclick="tai_lai_trang()">Xoa</a>
                <?php
                  }
                ?>
              </div>
            </div>
          <?php } ?>
        </div>
          <!-- bình luận -->
         </div>
      </div>
  <?php include_once 'footer.php' ?>
  <script src="js.js"></script>
</body>

</html>