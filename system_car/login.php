<?php
include('controller.php');
$data = new cCar();
	if (isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		$userInfo = $data->cGetCk($token);
		 	if (!empty($userInfo)) {
				header("Location:index.php");
		 	}
		}
		
  	if (isset($_POST['login'])) {
	    $pass = $_POST['psw'];
	    $users = $_POST['uname'];
	    $user = $data->user($users,$pass);
  	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- tiêu đề web -->
	<title>System Login</title>
	<!-- icon web -->
	<link rel="shortcut icon" type="image/png" href="./vendor/img/logo.jpg"/>
	<!-- liên kết css -->
	<link href="vendor/css/style.css" rel="stylesheet" type="text/css" >
	<!-- liên kết bootstrap css -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" >
	<!-- liên kết datatable css -->
	<link href="vendor/datatable/dataTables.min.css" rel="stylesheet" type="text/css" />
	<!-- liên kết font css -->
	<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
	<link href="vendor/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="vendor/datatable/select.dataTables.css" rel="stylesheet" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<style>
		html,body{
		/*background-image: url('hr/vendor/img/bglogin.jpg');
		background-size: cover;*/
		/*background-repeat: no-repeat;*/
		/*background: rgb(237,237,237);*/
		/*background: linear-gradient(180deg, red 0%, white 10%, orange 20%, yellow 30%, cyan 40%, teal 50%, gray 60%, pink 70%, blue 80%, white 90%, green 100%);*/
		background: rgb(110, 110, 110);
		height: 100%;
		font-family: 'Numans', sans-serif;
		}

		.container{
		height: 100%;
		align-content: center;
		}

		.card{
		height: 370px;
		margin-top: 100px;
		margin-bottom: auto;
		width: 400px;
		background-color: rgba(0,0,0,0.5) !important;
		}

		.social_icon span{
		font-size: 60px;
		margin-left: 10px;
		color: #FFC312;
		}

		.social_icon span:hover{
		color: white;
		cursor: pointer;
		}

		.card-header h3{
		color: white;
		}

		.social_icon{
		position: absolute;
		right: 20px;
		top: -45px;
		}

		.input-group-prepend span{
		width: 50px;
		background-color: #437c81;
		color: white;
		border:0 !important;
		}

		input:focus{
		outline: 0 0 0 0  !important;
		box-shadow: 0 0 0 0 !important;

		}

		.remember{
		color: white;
		}

		.remember input
		{
		width: 20px;
		height: 20px;
		margin-left: 15px;
		margin-right: 5px;
		}

		.login_btn{
		color: white;
		background-color: #437c81;
		width: 100px;
		}

		.login_btn:hover{
		color: black;
		background-color: white;
		}

		.links{
		color: white;
		}

		.links a{
			color: #437c81;
		margin-left: 4px;
		}
		.call{
			font-size: 36px;color: #4fa5ac;
			padding: 10px;border: 1px solid white;
			background-color: white;
			border-radius: 50px 50px;
			  -webkit-transition: all 300ms;
  				transition: all 300ms;
		}
		.call:hover{
				transform: scale(0.8);
		}
</style>
</head>
<body>
	<div class="container" >
		<div class="d-flex justify-content-center">
			<div class="card">
				<div class="card-header">
					<h3>Sign In <b style="color: #a0a0f5; font-size: 25px;">System Car</b></h3>
				</div>
				<div class="card-body">
					<form method="POST">
		               <div class="input-group form-group">
		                  <div class="input-group-prepend">
		                     <span class="input-group-text"><i class="fa fa-user"></i></span>
		                  </div>
		                  <input type="text" class="form-control" required placeholder="username" name="uname" autofocus>
		               </div>
		               <div class="input-group form-group">
		                  <div class="input-group-prepend">
		                     <span class="input-group-text"><i class="fa fa-key"></i></span>
		                  </div>
		                  <input type="password" required class="form-control" placeholder="password" name="psw">
		               </div>
		               <div class="row align-items-center remember">
		                  <!-- <input type="checkbox">Remember Me -->
		               </div>
		               <div class="form-group">
		                  <input type="submit" name="login" value="Login" class="btn float-right login_btn">
		               </div>
		            </form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<!-- <a href="#">Sign Up</a> -->
					</div>
					<div class="d-flex justify-content-center links">
						<!-- <a href="#">Forgot your password?</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <div style="position: absolute;bottom: 20px;right: 20px;">
    	<a href="tel:0123456789"><i class="call fas fa-phone-alt"></i></a>
    	<a href='#' target="_blank" rel="noopener noreferrer"><i class=" call fas fa-mail-bulk"></i></a>
    </div>
        <!-- Kết nối thư viện Jquery -->
    <script src="vendor/js/jquery.js"></script>
	<script src="vendor/js/myQuery.js"></script>
	<script src="vendor/js/tree_menu.js"></script>
	<script src="vendor/bootstrap/bootstrap.min.js"></script>
	<script src="vendor/datatable/dataTables.min.js"></script>
	<script src="vendor/datatable/dataTables.select.js"></script>
	<script src="vendor/datatable/dataTables.buttons.min.js"></script>
</body>
</html>