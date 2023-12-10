<?php
include ('../model/model.php');
class cCar {
	// User
	public function user($user,$pass){
		$all = new mCar();
		$result = $all->getUser($user,$pass);
		if ($result) {
			$sTime = date("Y-m-d h:i:s");
			$token = $result->id.$sTime;
			setcookie('token', md5($token),time() + 7*24*3600);
			$all->mUpToken($token,$user);
			if (isset($_SESSION['logError'])) {
				unset($_SESSION['logError']);
						}
			header('Location:index.php');
			exit();

		}else {
			echo '<script>alert("Sai Thông Tin Tài Khoản");</script>';
		}
	}

	public function edit($user,$pass,$newPass){
		$all = new mCar();
		$result = $all->getUser($user,$pass);
		// echo $user;
		if ($result) {
				$all->mEdit($user,$newPass);
				echo '<script>alert("Đổi Mật Khẩu Thành Công");</script>';
				unset($_SESSION['id']);
				session_unset();
				session_destroy();
				setcookie('token','', time() - 86400);
				header("Location:login.php");
			exit();
		}else {
			echo '<script>alert("Sai Thông Tin Tài Khoản");</script>';
		}
	}
	public function cGetCk($token){
		$all = new mCar();
		$result = $all->mGetCk($token);
		return $result;
	}
	// End

	// Data  

	public function cUpdateDK($id, $manv, $ngayMoiGiayDK, $ngayCuGiayDK, $goi){
		$all = new mCar();
		$all->mUpdateCarDK($id, $ngayMoiGiayDK, $ngayCuGiayDK, $goi);
		$all->mUpdateOwnerDK($id, $manv);
	}

	public function cGetNgayMoiGiayDK($id){
		$all = new mCar();
		$result = $all->mGetNgayMoiGiayDK($id);
		return $result;
	}

	public function cGetListBienSo(){
		$all = new mCar();
		$result = $all->mGetListBienSo();
		return $result;
	}

	public function cGetAllDataId($id){
		$all = new mCar();
		$result = $all->mGetAllDataId($id);
		return $result;
	}

	public function cUpDataExcel($id, $name, $born, $type, $provice, $dateReg, $goi, $code_number, $first_date, $plate_reg, $brand, $typeXe, $color, $capa, $origin, $model_code, $capacity, $address, $chassis, $engine, $authorReg){
		$all = new mCar();
		$all->mUpDataExcelInforCar($id, $code_number, $first_date, $plate_reg, $brand, $typeXe, $color, $capa, $origin, $model_code, $capacity, $address, $chassis, $engine);
		$all->mUpDataExcelInforOwner($id, $name, $born, $type, $provice, $dateReg, $authorReg, $goi);
	}

	public function cGetIDMax(){
		$all = new mCar();
		$result = $all->mGetIDMax();
		return $result;
	}
	
	public function cGetDataCar($id){
		$all = new mCar();
		$result = $all->mGetDataCar($id);
		return $result;
	}
	
	public function cAddU($id, $name, $center, $area, $type){
		$all = new mCar();
		$all->mAddU($id, $name, $center, $area, $type);
	}
	
	public function cGetListUser(){
		$all = new mCar();
		$result = $all->mGetListUser();
		return $result;
	}
	
	public function cGetDataUser($center, $area, $status){
		$all = new mCar();
		$result = $all->mGetDataUser($center, $area, $status);
		return $result;
	}

	public function cAddRegCar($manv, $id, $ten, $ns, $cmnd, $address, $type, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay){
		$all = new mCar();
		$all->mAddOwner($manv, $id, $ten, $ns, $cmnd, $address, $type);
		$all->mAddInforCar($id, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay);
	}

	public function cEditRegCar($manv, $id, $ten, $ns, $cmnd, $address, $type, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay){
		$all = new mCar();
		$all->mEditOwner($manv, $id, $ten, $ns, $cmnd, $address, $type);
		$all->mEditInforCar($id, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay);
	}

	public function cGetListType($type){
		$all = new mCar();
		$result = $all->mGetListType($type);
		return $result;
	}
	
	public function cGetDataTotal($center, $area, $dateF, $dateE){
		$all = new mCar();
		$result = $all->mGetDataTotal($center, $area, $dateF, $dateE);
		return $result;
	}
	// End
}