<?php
session_start();
require_once "db.php";
if(isset($_SESSION['admin'])){
    $user = $_SESSION['admin'];
}else if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
$getDb = "SELECT * from users WHERE email = '$user'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetchAll();
foreach ($product as $key => $row) {
  $id_user = $row['id'];
}
$getDb = "SELECT dat_lich.id, dat_lich.ten_nguoi_dat, dat_lich.sdt, dat_lich.email, dat_lich.ngay_dat, dat_lich.ngay_den, dat_lich.gio_den, dat_lich.trang_thai, dat_lich.xac_nhan, dat_lich.id_loai, dat_lich.id_user, dat_lich.id_nv, nhan_vien.ho_ten, nail.title From dat_lich JOIN nhan_vien ON dat_lich.id_nv = nhan_vien.id JOIN nail ON dat_lich.id_loai = nail.id WHERE id_user = '$id_user'";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$products = $stml->fetchAll();
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
<div class="">
<?php include_once "header1.php" ?>
<div class="container mx-auto " style="background-color: #fff;">
    <div class="mx-auto">
            <h2 style="color: red; text-align: center;">DANH SÁCH SẢN PHẨM ĐÃ ĐẶT</h2>
            <table class="mx-auto border-2">
                <thead class="border-2 mt-10">
                    <th class="py-2">stt</th>
                    <th class="py-2">TÊN</th>
                    <th class="py-2">Phone</th>
                    <th class="py-2">Ngày đặt</th>
                    <th class="py-2">Ngày đến</th>
                    <th class="py-2">Giờ làm</th>
                    <th class="py-2">Trạng thái</th>
                    <th class="py-2">Xác nhận</th>
                    <th class="py-2">Người làm</th>
                    <th class="py-2">Dịch vụ</th>
                    <th class="py-2"width="160">QUẢN LÍ</th>
                </thead>
                <tbody >
                    <?php foreach ($products as $key => $value) { ?>
                        <tr class="border-b-2">
                            <td class="py-5 px-5"><?php echo ($key + 1) ?></td>
                            <td class="py-5 px-5"><?php echo $value['ten_nguoi_dat'] ?></td>
                            <td class="py-5 px-5"><?php echo $value['sdt'] ?></td>
                            <td class="py-5 px-5"><?php echo $value['ngay_dat'] ?></td>
                            <td class="py-5 px-5"><?php echo $value['ngay_den'] ?></td>
                            <td class="py-5 px-5"><?php echo $value['gio_den'] ?></td>
                            <td class="py-5 px-5"><?php echo ($value['trang_thai'] == 1) ? 'Đã Làm' : 'Chưa Làm' ?></td>
                            <td class="py-5 px-5"><?php echo ($value['xac_nhan'] == 1) ? 'Đã nhận]' : 'Đang sử lý' ?></td>
                            <td class="py-5 px-5"><?php echo $value['ho_ten'] ?></td>
                            <td class="py-5 px-5 text-center">
                            <?php echo $value['title'] ?>
                                </td>
                            <td class="text-center hover:text-red-500 duration-500">
                                <a href="<?= BASE_URL ?>delete_dat-lich.php?id=<?= $value['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy ?')" class="btn btn-info">Hủy</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
        <?php include_once "footer.php" ?>
</div>
</body>
</html>
