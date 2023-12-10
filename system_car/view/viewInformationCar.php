<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require('../controller/controller.php');
$data = new cCar();
$id = $_GET['id'];
$dataCar = $data->cGetAllDataId($id);
// print_r($dataCar);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registry</title>

  <!-- liên kết css -->
  <link href="../vendor/css/style.css" rel="stylesheet" type="text/css" >
  <link rel="shortcut icon" type="image/png" href="../vendor/img/logo.jpg"/>
  <!-- liên kết bootstrap css -->
  <link href="../vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" >
  <link href="../vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" >
  <link href="../vendor/bootstrap/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" >
  <!-- liên kết datatable css -->
  <link href="../vendor/datatable/dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- liên kết font css -->
  <link rel="stylesheet" href="../vendor/fontawesome/css/all.min.css">
  <link href="../vendor/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/datatable/select.dataTables.css" rel="stylesheet" type="text/css" />

</head>
	<body>
    <div class="col-md-12 ssss flex">
      <div class="abcd w-50">
        <div class="col-md-12">
          <p style="text-align: center;"><span style="font-weight: bold;">1. PHƯƠNG TIỆN</span> <i>(VEHICLE)</i></p>
          <div class="flex">
            <div class="w-50">
              Biển Đăng Ký:<?php echo $dataCar->bienDK; ?><br>
              <i>(Registration Number)</i>
            </div>
            <div class="w-50">
              <span style="float: right;">Số Quản Lý:<?php if($dataCar->id < 10){echo '00000'.$dataCar->id;}else if($dataCar->id < 100 && $dataCar->id >= 10){echo '0000'.$dataCar->id;}else if($dataCar->id < 1000 && $dataCar->id >= 100){echo '000'.$dataCar->id;}else if($dataCar->id < 10000 && $dataCar->id >= 1000){echo '00'.$dataCar->id;}else if($dataCar->id < 100000 && $dataCar->id >= 10000){echo '0'.$dataCar->id;}else if($dataCar->id < 1000000 && $dataCar->id >= 100000){echo $dataCar->id;} ?><br><i>(Vehicle Inspection No.)</i></span>
            </div>
          </div>
          <span>Loại Phương Tiện: <i>(Type)</i> <?php echo $dataCar->loaiPhuongTien; ?></span><br>
          <span>Nhãn Hiệu: <i>(Mark)</i> <?php echo $dataCar->nhanHieu; ?></span><br>
          <span>Số Loại: <i>(Model code)</i> <?php echo $dataCar->soLoai; ?></span><br>
          <span>Số Máy: <i>(Engine Number)</i> <?php echo $dataCar->soMay; ?></span><br>
          <span>Số Khung: <i>(Chassis Number)</i> <?php echo $dataCar->soKhung; ?></span><br>
          <div class="flex">
            <div class="w-75">
              Năm, Nước Sản Xuất:<?php echo $dataCar->namSx.', '.$dataCar->nuocSx; ?><br>
              <i>(Manufactured Year and Country)</i>
            </div>
            <div class="w-25">
              <span style="float: right;">Niên Hạn SD: ??<br><i>(Lifetime limit to)</i></span>
            </div>
          </div>
          <span>Kinh Doan Vận Tải: <i>(Commercail Use) </i></span><?php if($dataCar->mucDich == 'Vận Tải'){?><span class="boxCheck">X</span><?php }else{?><span class="boxCheck">V</span><?php } ?><br>
          <p style="text-align: center;"><span style="font-weight: bold;">2. THÔNG SỐ KỸ THUẬT</span> <i>(SPECIFICATIONS)</i></p>
          <div class="flex">
            <div class="w-50">
              Công Thức Bánh Xe: <?php echo $dataCar->congThuc; ?><br>
              <i>(Wheel Formula)</i>
            </div>
            <div class="w-50">
              <span style="float: right;">Vết Bánh Xe: <?php echo $dataCar->vetBanhXe; ?> (mm)<br><i>(Wheel Tread)</i></span>
            </div>
          </div>
          <span>Kích Thước Bao: <i>(Overall Dimension)</i> <?php echo $dataCar->kichThuoc; ?> (mm)</span><br>
          <span>Kích Thước Lòng Thùng Xe: <i>(Inside cargo container dimension)</i> <?php echo ''; ?> (mm)</span><br>
          <span>Chiều Dài Cơ Sở: <i>(Wheelbase)</i> <?php echo $dataCar->chieuDai; ?> (mm)</span><br>
          <span>Khối Lượng Bản Thân: <i>(Kerb Mass)</i> <?php echo $dataCar->khoiLuong; ?> (kg)</span><br>
          <span>Khối Lượng Hàng CC Theo TK/CP TGGT: <?php echo ''; ?> (kg)</span><br>
          <i>(Design/ Authorized pay load)</i><br>
          <span>Số Người Cho Phép Chở: <?php echo $dataCar->soChoNgoi; ?></span><br>
          <i>(Permissible No. of Pers Carried: seat, stood place, laying place)</i><br>
          <span>Loại Nhiên Liệu: <i>(Type of Fuel Used)</i> <?php echo $dataCar->loaiNhienLieu; ?> (kg)</span><br>
          <span>Thể Tích Làm Việc Của Động Cơ: <i>(Engine Displacement)</i> <?php echo $dataCar->dungTich; ?> (cm3)</span><br>
          <span>Công Suất Lớn Nhất/ Tốc Độ Quay: <i>(Max. output/rpm)</i> <?php echo $dataCar->loaiNhienLieu; ?></span><br>
          <span>Số Seri: <i>(No.)</i> <?php echo ''; ?></span><br>
        </div>
      </div>
      <div class="abcd w-50">
        <div class="col-md-12">
          <span>Số Lượng Lốp, Cỡ Lốp/Trục: <i>(Number of Tires, Tire Size/ Axle)</i><br>
          <?php echo ''; ?></span><br>
        </div>
        <div class="flex">
          <div class="w-33 text-center">
            <br>
            Số Phiếu Kiểm Định<br>
            <i>(Inspection Report No)</i>
            <?php echo ''; ?><br>
            Có Hiệu Lực Đến Ngày<br>
            <i>(Valid Until)</i> <!-- <span style="border: 1px solid;"><?php echo ''; ?></span> -->
          </div>
          <div class="w-67 sssss text-center">
              <div style="position: absolute;">
              Bắc Ninh, Ngày: <?php echo date('d',strtotime($dataCar->ngayMoiGiayDK)); ?> Tháng: <?php echo date('m',strtotime($dataCar->ngayMoiGiayDK)); ?> Năm: <?php echo date('Y',strtotime($dataCar->ngayMoiGiayDK)); ?><br>
              <i>(Issued on Day/Month/Year)</i><br>
              <b>ĐƠN VỊ KIỂM ĐỊNH</b><br>
              <i>(INSPECTION CENTER)</i><br>
              <!-- <img src="../vendor/tgd.jpg"> -->
            </div>
            <div>
              <img src="../vendor/img/sign.jpg">
            </div>
          </div>
        </div>
        <div class="text-center">
          <!-- <div style="padding: 6em 0em; font-size: 21px; font-weight: bold;">
            Xe cơ giới thuộc đối tượng<br>miễn kiểm định lần đầu
          </div> -->
          <div style="width: auto; height: 300px; ">
            <img src="../vendor/img/<?php echo $dataCar->img; ?>" width = '80%' height = '100%'>
          </div>
        </div>
        <div>
          Có Lắp Thiết Bị Giám Sát Hành Trình <i>(Equipped with Tachograph)</i> <span class="boxCheck">X</span><br>
          Có Lắp Camera <i>(Equipped with Camera)</i> <br>
          Không Cấp Tem Kiểm Định <i>(Inspection stamp was not issued)</i><br> 
          Ghi Chú: Biển Đăng Ký Nền <?php if($dataCar->type == 'Xe Cá Nhân'){echo 'Trắng';}else if($dataCar->type == 'Xe Cơ Quan'){echo 'Vàng';} ?>
        </div>
      </div>
    </div>
    <div class="text-center" style="margin-top: -30%;">
      <img src="../vendor/img/sign.jpg">
    </div>

	</body>
</html>