<?php
include('./model.php');

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
			// if($result->type == 1){
			// 	header('Location:index.php');
			// }else{
			// 	header('Location:center.php');
			// }
			
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
			// if ($newpass == $cfpass) {
   //              $res = $data->mChangePass($id,$newpass);
   //              echo '<script>alert("Change pass success!");</script>';
   //              header('Location:index');
   //              exit();
   //          } else {
   //              echo '<script>alert("New pass and Pass confirm do not match");</script>';
   //          }
				$all->mEdit($user,$newPass);
				echo '<script>alert("Change pass success!");</script>';
				setcookie('token','', time() - 86400);
				// sleep(2);
				header("Location:index.php");
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

	public function cGetListProvince(){
		$all = new mCar();
		$result = $all->mGetListProvince();
		return $result;
	}

	public function cGetListCenter(){
		$all = new mCar();
		$result = $all->mGetListCenter();
		return $result;
	}

	public function cGetListArea(){
		$all = new mCar();
		$result = $all->mGetListArea();
		return $result;
	}
	// End
}