<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$time = time();
require('../controller/controller.php');
$data = new cCar();
$listBienSo = $data->cGetListBienSo();
$id = $data->cGetIDMax();
if(empty($id)){
	$id = 1;
}else{
	$id += 1;
}
$manv = $_POST['manv'];
$ten = $_POST['ten'];
$ns = $_POST['ns'];
$cmnd = $_POST['cmnd'];
$address = $_POST['address'];
$type = $_POST['type'];
$maSoGiay = $_POST['maSoGiay'];
$ngayCapGiay = $_POST['ngayCapGiay'];
$ngayMoiGiayDK = $_POST['ngayMoiGiayDK'];
$bienDK = $_POST['bienDK'];
$noiDk = $_POST['noiDk'];
$mucDich = $_POST['mucDich'];
$nhanHieu = $_POST['nhanHieu'];
$loaiPhuongTien = $_POST['loaiPhuongTien'];
$namSx = $_POST['namSx'];
$nuocSx = $_POST['nuocSx'];
$mauSon = $_POST['mauSon'];
$soMay = $_POST['soMay'];
$soKhung = $_POST['soKhung'];
$soLoai = $_POST['soLoai'];
$dungTich = $_POST['dungTich'];
$soChoNgoi = $_POST['soChoNgoi'];
$congThuc = $_POST['congThuc'];
$vetBanhXe = $_POST['vetBanhXe'];
$kickThuoc = $_POST['kickThuoc'];
$chieuDai = $_POST['chieuDai'];
$khoiLuong = $_POST['khoiLuong'];
$loaiNhienLieu = $_POST['loaiNhienLieu'];
$congSuat = $_POST['congSuat'];
$goi = $_POST['goi'];
$tocDoQuay = $_POST['tocDoQuay'];

if (isset($_FILES['img']))
{
	move_uploaded_file($_FILES['img']['tmp_name'], '../vendor/img/'.$time.'-'.$_FILES['img']['name']);
	$img = $time.'-'.$_FILES['img']['name'];
}else{
	$img = '';
}

$checkPlate = 0;
for ($i=0; $i < count($listBienSo); $i++) { 
	if($listBienSo[$i]->bienDK == $bienDK){
		$checkPlate = 1;
	}
}
if($checkPlate == 1){
	echo 'False';
	exit();
}else{

	// $abc = date('Y') - $namSx;
	// if($mucDich == 'Cá Nhân' && $soChoNgoi <= 9){
	// 	if($abc <= 7){
	// 		$goi = 36;
	// 	}else if($abc > 7 && $abc <= 20){
	// 		$goi = 24;
	// 	}else{
	// 		$goi = 12;
	// 	}
		
	// }else if($mucDich == 'Kinh Doanh' || $mucDich == 'Cá Nhân' && $soChoNgoi > 9){
	// 	if($abc <=5){
	// 		$goi = 24;
	// 	}else{
	// 		$goi = 12;
	// 	}
	// }else if($mucDich == 'Vận Tải'){
	// 	if($abc <= 7){
	// 		$goi = 24;
	// 	}else{
	// 		$goi = 12;
	// 	}
	// }else{
	// 	if($abc <= 12){
	// 		$goi = 24;
	// 	}else{
	// 		$goi = 12;
	// 	}
	// }
	$data->cAddRegCar($manv, $id, $ten, $ns, $cmnd, $address, $type, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay);
	echo 'True';
}
?>