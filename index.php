<?php
require_once "db.php";
$getDb = "SELECT * from nail  WHERE dac_biet = 1 LIMIT 0,5";
$connect = getDbConnect();
$stml = $connect->prepare($getDb);
$stml->execute();
$product = $stml->fetchAll();
$getDb = "SELECT * from nail  WHERE dac_biet = 0 LIMIT 0,5";
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
    <?php require_once "header.php"; ?>
    <div class="mx-44">
            <section class="container mx-auto bg-white pb-5">
            <div class=" bg-pink-500">
                <div class="text-center">
                    <h2 class="text-3xl text-white py-10 font-black ">COMBO DỊCH VỤ NỔI BẬT TẠI EVERLY</h2>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-12 mx-8 mt-10">
            
            <?php foreach ($product as $key => $row) { ?>
                <div class="col-span-2 ">
                    <img class="mx-auto" src="./content/images/<?php echo $row['img'] ?>" alt="" width="70%">
                    <div>
                        <h6 class="uppercase font-bold text-center text-white bg-pink-500"><?php echo $row['price'] ?></h6>
                        <a href="chi_tiet.php?id=<?= $row['id'] ?>&cate=<?= $row['id_loai'] ?>"><p class="uppercase font-bold text-center mt-3"><?php echo $row['title'] ?></p></a>
                    </div>
                </div>
                <?php } ?>
                <div class="col-span-2 ">
                    <a href="bang_gia.php">
                        <img class="mx-auto" src="content/images/158.png" alt="" width="70%">
                        <div>
                            <h4 class="uppercase font-bold text-center text-white bg-pink-500">bảng giá</h4>
                            <p class="uppercase font-bold text-center mt-3">các loại dịch vụ khác</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="border-b-4 border-gray-400 mt-14">
            </div>
            <div class="mx-8 mt-10">
                <div class="">
                    <h3 class="font-bold uppercase text-2xl">các sản phẩm khác</h3>
                    <h5 class="border-b-4 border-pink-500 w-36 mt-3"></h5>
                </div>
                <div class="grid grid-cols-12 mt-10 gap-5">
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/cnd-coolblue-hand-sanitiser_320x320 (1).jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">HAC011 Gel làm sạch da tay và móng Cool Blue</a></h4>
                            <p class="text-sm mt-2"><em>Gel làm sạch da tay và móng cao cấp chính hãng CND Nhà sản...</em></p>
                            <h5 class="mt-3 text-pink-600">460.000 ₫</h5>
                        </div>
                     </div>
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/30741198_798431030350648_7862428386881175552_n_320x320.jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">Cọ đắp bột 2 đầu, cọ đắp bột BUT012</a></h4>
                            <p class="text-sm mt-2"><em>Cọ đắp bột 2 đầu, cọ đắp bột Nhà sản xuất: China Chủng...</em></p>
                            <h5 class="mt-3 text-pink-600">280.000 ₫</h5>
                        </div>
                     </div>
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/16976243_1073157179497687_1082978195_n_320x320.jpg" alt="">
                        <div class="border-t mt-3 pt-2 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">Cốp nhựa đựng đồ nail PUK</a></h4>
                            <p class="text-sm mt-2"><em>Cốp nhựa đựng đồ nail Nhà sản xuất: CHINA Chủng loại: Phụ...</em></p>
                            <h5 class="mt-3 text-pink-600">120.000 ₫</h5>
                        </div>
                     </div>
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/103973867_300983040936105_429407277616325826_n_320x320.jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">G4 Set đồ học gel loang vân đá</a></h4>
                            <p class="text-sm mt-2"><em>G4 Set đồ học gel loang vân đá Xuất xứ: PL Bao Gồm: 1máy...</em></p>
                            <h5 class="mt-3 text-pink-600">2.100.000 ₫</h5>
                        </div>
                     </div>
            </div>
            <div class="grid grid-cols-12 gap-5 mt-5">
                    <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/cnd-hot-shot_320x320.jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">Dũa móng CND Hot Shot PUK066</a></h4>
                            <p class="text-sm mt-2"><em>Dũa móng CND Hot Shot Nhà sản xuất: CND Chủng loại: Chính...</em></p>
                            <h5 class="mt-3 text-pink-600">34.000 đ</h5>
                        </div>
                     </div>
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/26112485_823991961118062_3650604036494924258_n_320x320.jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">Gel nối móng úp, gel gôm, gel nối móng SON182</a></h4>
                            <p class="text-sm mt-2"><em>Gel nối móng úp, gel gôm, gel nối móng Nhà sản xuất:...</em></p>
                            <h5 class="mt-3 text-pink-600">150.000 ₫</h5>
                        </div>
                     </div>
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/48w-led-ccfl-uv-font-b-nail-b-font-lamp-with-timer-for-uv-gel-polish_320x320.jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">MAY001 Máy sấy gel 48W cảm ứng</a></h4>
                            <p class="text-sm mt-2"><em>Máy sấy gel 48W cảm ứng dùng cho dịch vụ làm móng nail Xuất xứ:...</em></p>
                            <h5 class="mt-3 text-pink-600">1.500.000 ₫</h5>
                        </div>
                     </div>
                     <div class="col-span-3 border border-pink-500 p-5">
                        <img src="content/images/base4_320x320.jpg" alt="">
                        <div class="border-t pt-2 mt-3 border-pink-500">
                            <h4 class="text-pink-500 font-bold "><a href="#">SON015 Sơn liên kết CND - Base Coat</a></h4>
                            <p class="text-sm mt-2"><em>Sơn liên kết cao cấp chính hãng CND - Base Coat Nhà sản xuất:...</em></p>
                            <h5 class="mt-3 text-pink-600">451.000 ₫</h5>
                        </div>
                     </div>
            </div>

            <div class="border-b-4 border-gray-400 mt-14">
            </div>

            <!-- //chuyên đề -->
            <div class="mt-10">
                <div class="">
                    <h3 class="font-bold uppercase text-2xl">chuyên đề làm đẹp</h3>
                    <h5 class="border-b-4 border-pink-500 w-36 mt-3"></h5>
                </div>
                <div class="mt-10">
                <?php foreach ($products as $key => $rows) { ?>
                    <div class="flex gap-4">
                        <img src="./content/images/<?php echo $rows['img'] ?>" alt="" width="25%">
                        <div>
                            <h3 class="font-bold text-pink-500"><?php echo $rows['title'] ?></h3>
                            <p class="mt-2 ml-auto"><?php echo $rows['detail'] ?></p> 
                        </div>
                    </div>
                    <br>
                    <?php } ?>
                </div>
            </div>
            <div class="border-b-4 border-gray-400 mt-14">
            </div>
            
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-7">
                    <h2 class="text-xl font-bold">EVERLY COMBO 7 BƯỚC DỊCH VỤ</h2>
                    <h5 class="border-b-4 border-pink-500 w-36 mt-3"></h5>
                    <div class="bg-pink-400 mt-10 pl-5">
                        <div class=" pt-8 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">01</span>
                            <span class="mt-1  border-b border-white w-4/5 text-white ">Tư vấn kiểu dáng và thiết kế mẫu
                                móng phù hợp</span>
                        </div>
                        <div class=" pt-5 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">02</span>
                            <span class="mt-1  border-b border-white w-4/5 text-white ">Xử lý móng ban đầu, ủ móng đưa về nguyên trạng.</span>
                        </div>
                        <div class=" pt-5 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">03</span>
                            <span class="mt-1  border-b border-white w-4/5 text-white ">Chăm sóc móng, nhặt da kỹ càng.</h5>
                        </div>
                        <div class=" pt-5 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">04</span>
                            <span class="mt-1  border-b border-white w-4/5 text-white ">Sửa dáng và làm mịn bề mặt móng, ngâm tay.</span>
                        </div>
                        <div class=" pt-5 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">05</span>
                            <span class="mt-1  border-b border-white w-4/5 text-white ">Sơn gel tạo kiểu chuyên nghiệp.</span>
                        </div>
                        <div class=" pt-5 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">06</span>
                            <span class="mt-1  border-b  border-white w-4/5 text-white ">Massage thả lỏng và thư giãn bằng kem dưỡng da TN</span>
                        </div>
                        <div class=" pt-5 pb-10 flex">
                            <span class="bg-white rounded-full p-1 w-8 text-center ml-2 mx-5 font-bold">07</span>
                            <span class="mt-1 text-white">Phục hồi và giữ cho móng bóng sáng bằng tinh dầu CC.</span>
                        </div>
                    </div>
                </div>
                <div class="col-span-5 mx-5">
                    <h2 class="text-xl font-bold ">DANH SÁCH CỬA HÀNG (9H-21H)</h2>
                    <h5 class="border-b-4 border-pink-500 w-36 mt-3"></h5>
                    <div class="border-2 mt-10 mr-5 flex">
                        <div class="mt-5">
                            <div class="flex">
                                <h6 class="font-bold text-xl ml-14">TP. HÀ NỘI</h6>
                                <h6 class="font-bold text-xl ml-16 pl-10 border-l-2 border-black">TP. HỒ CHÍ MINH</h6>
                            </div>
                            <div class="mt-10 ml-2">
                                <div class="grid grid-cols-12 mt-5">
                                    <div class="col-span-6 text-center mx-auto flex">
                                        <span class="font-bold text-2xl mx-3  mt-1">1.</span>
                                        <p>47 Dương Quảng Hàm
                                            Q. Cầu Giấy</p>
                                    </div>
                                    <div class="col-span-6 mx-auto mt-2">
                                        <i class="fas fa-phone-alt bg-yellow-400 p-2 rounded-full"></i>
                                        <span
                                            class="bg-yellow-400 font-bold p-1 rounded-tr-md rounded-tl-md rounded-br-md  rounded-bl-lg">0949239499</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 mt-5">
                                    <div class="col-span-6 text-center mx-auto flex">
                                        <span class="font-bold text-2xl mx-3 mt-1">2.</span>
                                        <p>42 Hàng Giấy
                                        Q. Hoàn Kiếm</p>
                                    </div>
                                    <div class="col-span-6 mx-auto mt-2">
                                        <i class="fas fa-phone-alt bg-yellow-400 p-2 rounded-full"></i>
                                        <span
                                            class="bg-yellow-400 font-bold p-1 rounded-tr-md rounded-tl-md rounded-br-md  rounded-bl-lg">0949239499</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 mt-5 mb-5">
                                    <div class="col-span-6 text-center mx-auto flex">
                                        <span class="font-bold text-2xl mx-3 mt-1">3.</span>
                                        <p>12 Ngõ Tràng Tiền
                                        Q.Hoàn Kiếm</p>
                                    </div>
                                    <div class="col-span-6 mx-auto mt-2">
                                        <i class="fas fa-phone-alt bg-yellow-400 p-2 rounded-full"></i>
                                        <span
                                            class="bg-yellow-400 font-bold p-1 rounded-tr-md rounded-tl-md rounded-br-md  rounded-bl-lg">0949239499</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
        </section>
        
    </section>
           
    </div>
    <?php include_once 'footer.php' ?>
</body>

</html>