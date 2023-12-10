<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
  require('controller.php');
  $data = new cCar();
  if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $userInfo = $data->cGetCk($token);
    if (empty($userInfo)) {
      header("Location:login.php");
    }
  }else{
    header("Location:login.php");
  }

  if (isset($_POST['logout'])) {
    setcookie('token', md5($token),time() - 100);
    header('Location:login.php');
    exit();
  }

  if (isset($_POST['changePass'])) {
    header('Location:changePass.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Quản Lý Đăng Kiểm</title>

  <!-- liên kết css -->
  <link href="./vendor/css/style.css" rel="stylesheet" type="text/css" >
  <link rel="shortcut icon" type="image/png" href="./vendor/img/logo.jpg"/>
  <!-- liên kết bootstrap css -->
  <link href="./vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" >
  <link href="./vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" >
  <link href="./vendor/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" >
  <!-- liên kết datatable css -->
  <link href="./vendor/datatable/dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- liên kết font css -->
  <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
  <link href="./vendor/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendor/datatable/select.dataTables.css" rel="stylesheet" type="text/css" />

    <style>
        a{color: black;}
        img{max-width: 100%;}
        .para{padding-top: 3.6em;}
        i{
          cursor: pointer;
        }
        .users:hover .user{
              display: block;
            }

        .user{
      display: none;
      position:absolute;
      float: right;
      z-index: 1;
        right: 2%; 
        top: 30px;
      background-color: white;
      padding: 5px;
      color:#046b7b; 
      width: 15rem;
      box-shadow: rgba(0, 0, 0, 0.05) 2px 3px 3px;
      }
        @media screen and (max-width: 768px) {
          .user{
          display: none;
          position:absolute;
          float: left;
          z-index: 10;
            right: 0%; 
            top: -0.5em;
            width: 15rem;
          }
    }
    </style>
</head>
 <div class="fixed-top">
   <nav class="navbar fixed-top navbar-expand-lg bg-light white scrolling-navbar" style="border-bottom: 1px solid #666;font-size:18px;">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="./index.php" style = "text-align:center;">
          <span class = "logo-ad">SYSTEM CAR</span> </br>
          <p class = "sologan_ad">HỆ THỐNG ĐĂNG KIỂM</p>
        </a>
          
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars" style="font-size: 1.5em;color: black;"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <span class="title"><i class="fas fa-phone-alt"></i></span><span class="abc">0123456789</span>
              <span class="title"><i class="fas fa-comments"></i></span><span class="abc">Tư Vấn Chuyên Sâu<span style="color: red;">(24/24)</span></span>
              <span class="title"><i class="fas fa-bus"></i></span><span class="abc">An Toàn</span>
            </li>
           <li class="nav-item users" style="position: relative;">
              <a class="nav-link" href="#"><i style="color: #046b7b;" class="fas fa-user-circle"></i></a>
              <?php
                    if ($userInfo != '') {
                            ?>
                          <div class="user text-center">
                              <p style="font-size: 18px;border-bottom: 1px solid #046b7b;"><?php echo "Hi! ".$userInfo->name; ?><br>
                                <span style="font-size: 14px;"><?php 
                                  echo date('d/m/Y'); 
                                ?></span>
                              </p>
                              <div class="row">
                                <div class="col-md-3">
                                  <form method="POST">
                                    <input type="submit" name="logout" value="Logout" class="btn btn-light">
                                  </form>
                                </div>
                                <div class="col-md-8" style="margin-left: 10px;">
                                  <!-- <button class="btn" style="border: none;" id="changePasss">Change Password</button> -->
                                  <form method="POST">
                                    <input type="submit" name="changePass" value="Change Password" class="btn btn-light">
                                  </form>
                                </div>
                              </div>
                              
                          </div>
                        <?php
                  } else {
                    ?>
                        <div class="user text-center">
                          <p style="font-size: 18px;border-bottom: 1px solid #046b7b;"><?php echo "Hi! Member"; ?><br></p>
                          <button class="btn" style="border: 1px solid green;" id="login">Login</button>
                          <button class="btn" style="border: 1px solid green;" id="register">Register Account</button>
                        </div>
                    <?php
                    }
                    ?>
            </li>
          </ul>

        </div>

      </div>
  </nav>
 </div>
 <div class="modal fade bd-example-modal-xl" id="exampleModal" data-backdrop = "static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="modal-content">
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" id="exampleModalxx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="modal-contentxx">
        </div>
    </div>
</div>
 <body class="para">