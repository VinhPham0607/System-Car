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
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadRow(array());
	}
	// End

	// Data 
	
	public function mGetListProvince(){
		$sql = "SELECT name FROM config WHERE type = 'province'";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadAllRows(array());
	}

	public function mGetListCenter(){
		$sql = "SELECT DISTINCT center FROM user";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadAllRows(array());
	}

	public function mGetListArea(){
		$sql = "SELECT DISTINCT area FROM user";
		// echo $sql;
		$this->setQuery($sql);
		return $this->loadAllRows(array());
	}
	// End
}