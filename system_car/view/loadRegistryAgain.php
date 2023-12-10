<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require('../controller/controller.php');
$data = new cCar();
$manv = $_POST['manv'];
$id = $_POST['id'];
$ngayCuGiayDK = $data->cGetNgayMoiGiayDK($id);
$ngayMoiGiayDK = $_POST['ngayMoiGiayDK'];
$goi = $_POST['goi'];
$data->cUpdateDK($id, $manv, $ngayMoiGiayDK, $ngayCuGiayDK, $goi);
echo 'Đăng Kiểm Lại Thành Công';
?>