<?php
include ('database.php');
class mCar extends database{
	// user
	public function getUser($user,$pass){
		$sql = "SELECT * FROM user WHERE id = '$user' AND pass = '$pass'";
		$this->setQuery($sql);
		return $this->loadRow(array($user,$pass));
	}
	public function mEdit($user,$newPass){
		$sql = "UPDATE user Set pass = '$newPass' WHERE id = '$user'";
		$this->setQuery($sql);
		return $this->execute(array($user,$newPass));
	}
	public function mUpToken($token,$user){
		$sql = "UPDATE user Set token = md5('$token') WHERE id = '$user'";
		$this->setQuery($sql);
		return $this->execute(array());
	}
	public function mGetCk($token){
		$sql = "SELECT * FROM user WHERE token = '$token'";
		$this->setQuery($sql);
		return $this->loadRow(array());
	}
	// End

	// Data  

	public function mUpdateOwnerDK($id, $manv){
		$sql = "UPDATE owner SET authorReg = '$manv' WHERE id = '$id'";
		$this->setQuery($sql);
		$this->execute();
	}

	public function mUpdateCarDK($id, $ngayMoiGiayDK, $ngayCuGiayDK, $goi){
		$sql = "UPDATE car SET ngayMoiGiayDK = '$ngayMoiGiayDK', goi = '$goi', ngayCuGiayDK = '$ngayCuGiayDK' WHERE id = '$id'";
		$this->setQuery($sql);
		$this->execute();
	}

	public function mGetNgayMoiGiayDK($id){
		
		$sql = "SELECT ngayMoiGiayDK FROM car WHERE id = '$id'";
		$this->setQuery($sql);
		return $this->loadRecord();
	}

	public function mGetListBienSo(){
		
		$sql = "SELECT bienDK FROM car";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function mGetAllDataId($id){
		
		$sql = "SELECT owner.id as id, owner.ten as ten, owner.ns as ns, owner.cmnd as cmnd, owner.address as address, owner.type as type, owner.authorReg as authorReg, car.maSoGiay as maSoGiay, car.ngayCapGiay as ngayCapGiay, car.ngayMoiGiayDK as ngayMoiGiayDK, car.bienDK as bienDK, car.noiDk as noiDk, car.mucDich as mucDich, car.img as img, car.nhanHieu as nhanHieu, car.loaiPhuongTien as loaiPhuongTien, car.namSx as namSx, car.nuocSx as nuocSx, car.mauSon as mauSon, car.soMay as soMay, car.soKhung as soKhung, car.soLoai as soLoai, car.dungTich as dungTich, car.soChoNgoi as soChoNgoi, car.congThuc as congThuc, car.vetBanhXe as vetBanhXe, car.kichThuoc as kichThuoc, car.chieuDai as chieuDai, car.khoiLuong as khoiLuong, car.loaiNhienLieu as loaiNhienLieu, car.congSuat as congSuat, car.goi as goi, car.tocDoQuay as tocDoQuay FROM owner JOIN car ON owner.id = car.id WHERE car.id = '$id'";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadRow();
	}

	public function mUpDataExcelInforCar($id, $code_number, $first_date, $plate_reg, $brand, $typeXe, $color, $capa, $origin, $model_code, $capacity, $address, $chassis, $engine){
		$sql = "INSERT INTO information_car (id, code_number, first_date, plate_reg, brand, type, color, capa, origin, model_code, capacity, address, chassis, engine) VALUES ('$id', '$code_number', '$first_date', '$plate_reg', '$brand', '$typeXe', '$color', '$capa', '$origin', '$model_code', '$capacity', '$address', '$chassis', '$engine')";
		$this->setQuery($sql);
		$this->execute();
	}

	public function mUpDataExcelInforOwner($id, $name, $born, $type, $provice, $dateReg, $authorReg, $goi){
		$sql = "INSERT INTO information_owner (id, name, born, type, provice, dateReg, authorReg, goi) VALUES ('$id', '$name', '$born', '$type', '$provice', '$dateReg', '$authorReg', '$goi')";
		$this->setQuery($sql);
		$this->execute();
	}

	public function mGetIDMax(){
		
		$sql = "SELECT max(id) FROM owner";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadRecord();
	}
	
	public function mGetDataCar($id){
		
		$sql = "SELECT information_owner.id as id, information_owner.name as name, information_owner.born as born, information_owner.provice as province, information_owner.dateReg as dateReg, information_car.code_number as code_number, information_car.first_date as first_date, information_car.plate_reg as plate_reg, information_car.brand as brand, information_car.type as type, information_car.color as color, information_car.capa as capa, information_car.origin as origin, information_car.model_code as model_code, information_car.capacity as capacity, information_car.address as address, information_car.engine as engine, information_car.chassis as chassis FROM information_owner JOIN information_car ON information_owner.id = information_car.id WHERE information_car.id = '$id'";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadRow();
	}
	
	public function mAddU($id, $name, $center, $area, $type){
		
		$sql = "INSERT INTO user (id, name, center, area, type) VALUES ('$id', '$name', '$center', '$area', '$type')";
		// echo $sql;
		$this->setQuery($sql);
		$this->execute();
	}
	
	public function mGetListUser(){
		
		$sql = "SELECT id FROM user";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	public function mGetDataUser($center, $area, $status){
		$arr = array();
		if ($center != '') $arr[] = "center = '$center'";
		if ($area != '') $arr[] = "area = '$area'";
		if ($status != '') $arr[] = "status = '$status'";
		$queryArr = implode(" AND ", $arr);
		$sql = "SELECT * FROM user";
		if (count($arr) > 0) $sql =$sql." WHERE ".$queryArr;
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function mAddOwner($manv, $id, $ten, $ns, $cmnd, $address, $type){
		$sql = "INSERT INTO owner (authorReg, id, ten, ns, cmnd, address, type) VALUES ('$manv', '$id', '$ten', '$ns', '$cmnd', '$address', '$type')";
		// echo $sql;
		$this->setQuery($sql);
		$this->execute();
	}

	public function mAddInforCar($id, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay){
		$sql = "INSERT INTO car (id, maSoGiay, ngayCapGiay, ngayMoiGiayDK, bienDK, noiDk, mucDich, nhanHieu, loaiPhuongTien, namSx, nuocSx, mauSon, soMay, soKhung, soLoai, dungTich, soChoNgoi, congThuc, vetBanhXe, kichThuoc, chieuDai, khoiLuong, loaiNhienLieu, congSuat, img, goi, tocDoQuay) VALUES ('$id', '$maSoGiay', '$ngayCapGiay', '$ngayMoiGiayDK', '$bienDK', '$noiDk', '$mucDich', '$nhanHieu', '$loaiPhuongTien', '$namSx', '$nuocSx', '$mauSon', '$soMay', '$soKhung', '$soLoai', '$dungTich', '$soChoNgoi', '$congThuc', '$vetBanhXe', '$kickThuoc', '$chieuDai', '$khoiLuong', '$loaiNhienLieu', '$congSuat', '$img', '$goi', '$tocDoQuay')";
		$this->setQuery($sql);
		$this->execute();
	}

	public function mEditOwner($manv, $id, $ten, $ns, $cmnd, $address, $type){
		$sql = "UPDATE owner SET authorEdit = '$manv', ten = '$ten', ns = '$ns', cmnd = '$cmnd', address = '$address', type = '$type' WHERE id = '$id'";
		// echo $sql;
		$this->setQuery($sql);
		$this->execute();
	}

	public function mEditInforCar($id, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay){
		$sql = "UPDATE car SET maSoGiay = '$maSoGiay', ngayCapGiay = '$ngayCapGiay', ngayMoiGiayDK = '$ngayMoiGiayDK', bienDK = '$bienDK', noiDk = '$noiDk', mucDich = '$mucDich', nhanHieu = '$nhanHieu', loaiPhuongTien = '$loaiPhuongTien', namSx = '$namSx', nuocSx = '$nuocSx', mauSon = '$mauSon', soMay = '$soMay', soLoai = '$soLoai', dungTich = '$dungTich', soChoNgoi = '$soChoNgoi', congThuc = '$congThuc', vetBanhXe = '$vetBanhXe', kichThuoc = '$kickThuoc', chieuDai = '$chieuDai', khoiLuong = '$khoiLuong', loaiNhienLieu = '$loaiNhienLieu', congSuat = '$congSuat', img = '$img', goi = '$goi', tocDoQuay = '$tocDoQuay' WHERE id = '$id'";
		// echo $sql;
		$this->setQuery($sql);
		$this->execute();
	}

	public function mGetListType($type){
		$sql = "SELECT * FROM config WHERE type = '$type'";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

	public function mGetDataTotal($center, $area, $dateF, $dateE){
		$arr = array();
		if ($center != '') $arr[] = "user.center = '$center'";
		if ($area != '') $arr[] = "user.area = '$area'";
		if ($dateF != '' && $dateE != '') $arr[] = "car.ngayMoiGiayDK BETWEEN '$dateF' AND '$dateE'";
		if ($dateF != '' && $dateE == '') $arr[] = "car.ngayMoiGiayDK >= '$dateF'";
		if ($dateF == '' && $dateE != '') $arr[] = "car.ngayMoiGiayDK <= '$dateE'";
		$queryArr = implode(" AND ", $arr);
		$sql = "SELECT user.center as center, user.area as area, owner.authorReg as authorReg, owner.id as id, owner.ten as ten, owner.cmnd as cmnd, car.ngayMoiGiayDK as ngayMoiGiayDK, car.noiDk as noiDk, car.goi as goi, car.bienDK as bienDK, car.loaiPhuongTien as loaiPhuongTien, car.nhanHieu as nhanHieu FROM owner LEFT JOIN user ON user.id = owner.authorReg LEFT JOIN car ON car.id = owner.id";
		if (count($arr) > 0) $sql =$sql." WHERE ".$queryArr;
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	// End
}
