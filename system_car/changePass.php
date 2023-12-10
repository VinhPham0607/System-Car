<?php
include('controller.php');
$data = new cCar();
  if (isset($_POST['login'])) {
    $pass = $_POST['psw'];
    $newPass = $_POST['new_psw'];
    $users = $_POST['uname'];
    $data->edit($users,$pass,$newPass);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- tiêu đề web -->
	<title>Change Password</title>
	<!-- icon web -->
	<link rel="shortcut icon" type="image/png" href="vendor/img/logoag.jpg"/>
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
		background: rgb(237,237,237);
		background: linear-gradient(180deg, rgba(237,237,237,1) 0%, rgba(82,178,186,1) 32%, rgba(55,78,80,1) 69%, rgba(34,34,34,1) 100%);
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
		<div class="logo-company" style="border-bottom: 1px solid #a5c9cc;"	>
			<div class="logo"><img id = "logo" style="height: 70px; float: left; padding-right: 10px;" src="vendor/img/logo.jpg" alt="">
			</div>
			 <div class="company">
	            <div class="company-name">
	              <span style="font-size: 25px;">Change Password</span>
	            </div>
	          <!--   <div class="sologan">
	              <h6 style="color: #999;">BUSAN VIET NAM INDUSTRIALS CO.,LTD</h6>
	              <p>Factory : E5 Lot, Dong Tho industrial park, Yen Phong, Bac Ninh</p>
	            </div> -->
	          </div>
			</div>
		<div class="d-flex justify-content-center">
			<div class="card">
				<div class="card-header">
					<h3>Change Password</h3>
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
		               <div class="input-group form-group">
		                  <div class="input-group-prepend">
		                     <span class="input-group-text"><i class="fa fa-key"></i></span>
		                  </div>
		                  <input type="password" required class="form-control" placeholder="New password" name="new_psw">
		               </div>

		               <div class="form-group">

		                  <input type="submit" name="login" value="Change" class="btn float-right login_btn">
		               </div>
		            </form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						<a href="index.php">Home </a> / 
						Don't have an account?<a href="#">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div style="position: absolute;bottom: 20px;right: 20px;">
    	<!-- <a href="tel:0948338592"><i class="call fas fa-phone-alt"></i></a> -->
    	<a href='https://mail.google.com/mail/u/0/?view=cm&fs=1&to=@gmail.com&su=I need support AGT system&tf=1' target="_blank" rel="noopener noreferrer"><i class=" call fas fa-mail-bulk"></i></a>
    	
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