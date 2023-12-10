<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require('../controller/controller.php');
$data = new cCar();
$id = $_GET['id'];
$dataAllID = $data->cGetAllDataId($id);
if (isset($_COOKIE['token'])) {
  $token = $_COOKIE['token'];
  $userInfo = $data->cGetCk($token);
  if (empty($userInfo)) {
    echo '<span style = "color: red;">Login Please!</span>';
    exit();
  }
}
$manv = $userInfo->id;
if($userInfo->type != 1 && $dataAllID->authorReg != $manv){
  echo 'Bạn Không Thể Sửa';
  exit();
}
$province = $data->cGetListType('province');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Registry</title>

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
  <link href="../vendor/chart/chartist.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="col-md-12" style="border: 1px solid black;">
  <div class="text-center">
    <h5>Thông Tin Chủ Sở Hữu</h5>
  </div>
  <div class="flex">
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Tên:</label><input type="text" id="ten" class="form form-control form-control-sm" placeholder="Tên" value="<?php echo $dataAllID->ten; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Ngày Tháng Năm Sinh:</label><input type="date" id="ns" class="form form-control form-control-sm" value="<?php echo $dataAllID->ns; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Số CMND:</label><input type="text" id="cmnd" class="form form-control form-control-sm" placeholder="Số CMND" value="<?php echo $dataAllID->cmnd; ?>">
      </div>
    </div>
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Địa Chỉ Thường Trú:</label><input type="text" id="address" class="form form-control form-control-sm" placeholder="Địa Chỉ Thường Trú" value="<?php echo $dataAllID->address; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Hình Thức:</label>
        <select class="form form-control form-control-sm" id="type">
          <option value="Xe Cá Nhân" <?php if($dataAllID->type == 'Xe Cá Nhân'){ echo 'selected'; }; ?>>Xe Cá Nhân</option>
          <option value="Xe Cơ Quan" <?php if($dataAllID->type == 'Xe Cơ Quan'){ echo 'selected'; }; ?>>Xe Cơ Quan</option>
        </select>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12" style="border: 1px solid black;">
  <div class="text-center">
    <h5>Thông Tin Giấy Chứng Nhận Đăng Ký</h5>
  </div>
  <div class="flex">
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Mã Số Giấy Chứng Nhận:</label><input type="text" id="maSoGiay" class="form form-control form-control-sm" placeholder="Mã Số Giấy Chứng Nhận" value="<?php echo $dataAllID->maSoGiay; ?>">
      </div>
    </div>
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Ngày Cấp Giấy Chứng Nhận:</label><input type="date" id="ngayCapGiay" class="form form-control form-control-sm" value="<?php echo $dataAllID->ngayCapGiay; ?>">
      </div>
    </div>
  </div>
</div>
<div class="col-md-12" style="border: 1px solid black;">
  <div class="text-center">
    <h5>Thông Tin Đăng Kiểm</h5>
  </div>
  <div class="flex">
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Ngày Đăng Kiểm:</label><input type="date" id="ngayMoiGiayDK" class="form form-control form-control-sm" value="<?php echo $dataAllID->ngayMoiGiayDK; ?>">
      </div>
    </div>
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Chu Kỳ Đăng Kiểm:</label>
        <select id="goi" class="form form-control form-control-sm">
          <option value="6" <?php if($dataAllID->goi == '6'){ echo 'selected'; }; ?>>6 Tháng</option>
          <option value="12" <?php if($dataAllID->goi == '12'){ echo 'selected'; }; ?>>12 Tháng</option>
          <option value="18" <?php if($dataAllID->goi == '18'){ echo 'selected'; }; ?>>18 Tháng</option>
          <option value="24" <?php if($dataAllID->goi == '24'){ echo 'selected'; }; ?>>24 Tháng</option>
          <option value="30" <?php if($dataAllID->goi == '30'){ echo 'selected'; }; ?>>30 Tháng</option>
          <option value="36" <?php if($dataAllID->goi == '36'){ echo 'selected'; }; ?>>36 Tháng</option>
          <option value="60" <?php if($dataAllID->goi == '60'){ echo 'selected'; }; ?>>60 Tháng</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12" style="border: 1px solid black;">
  <div class="text-center">
    <h5>Thông Tin Xe</h5>
  </div>
  <div class="flex">
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Biển Số Xe:</label><input type="text" id="bienDK" class="form form-control form-control-sm" placeholder="Biển Số Xe" value="<?php echo $dataAllID->bienDK; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Nơi Đăng Ký Xe:</label><input type="text" id="noiDk" class="form form-control form-control-sm" placeholder="Nơi Đăng Ký Xe" value="<?php echo $dataAllID->noiDk; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Mục Đích Sử Dụng:</label>
        <select id="mucDich" class="form form-control form-control-sm">
          <option value=""></option>
          <option value="Cá Nhân" <?php if($dataAllID->mucDich == 'Cá Nhân'){ echo 'selected'; }; ?>>Cá Nhân</option>
          <option value="Kinh Doanh" <?php if($dataAllID->mucDich == 'Kinh Doanh'){ echo 'selected'; }; ?>>Kinh Doanh</option>
          <option value="Vận Tải" <?php if($dataAllID->mucDich == 'Vận Tải'){ echo 'selected'; }; ?>>Vận Tải</option>
          <option value="Quân Sự" <?php if($dataAllID->mucDich == 'Quân Sự'){ echo 'selected'; }; ?>>Quân Sự</option>
        </select>
      </div>
      <div class="flex">
        <label class="w-33">Ảnh Xe:</label><input type="file" id="img" class="form form-control form-control-sm">
      </div>
      <div class="flex">
        <label class="w-33">Nhãn Hiệu:</label><input type="text" id="nhanHieu" class="form form-control form-control-sm" placeholder="Nhãn Hiệu" value="<?php echo $dataAllID->nhanHieu; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Loại Phương Tiện:</label><input type="text" id="loaiPhuongTien" class="form form-control form-control-sm" placeholder="Loại Phương Tiện" value="<?php echo $dataAllID->loaiPhuongTien; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Năm Sản Xuất Xe:</label><input type="number" id="namSx" class="form form-control form-control-sm" placeholder="Năm Sản Xuất" value="<?php echo $dataAllID->namSx; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Nước Sản Xuất Xe:</label><input type="text" id="nuocSx" class="form form-control form-control-sm" placeholder="Nước Sản Xuất" value="<?php echo $dataAllID->nuocSx; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Màu Xe:</label><input type="text" id="mauSon" class="form form-control form-control-sm" placeholder="Màu Xe" value="<?php echo $dataAllID->mauSon; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Số Máy:</label><input type="text" id="soMay" class="form form-control form-control-sm" placeholder="Số Máy" value="<?php echo $dataAllID->soMay; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Số Khung:</label><input type="text" id="soKhung" class="form form-control form-control-sm" placeholder="Số Khung" value="<?php echo $dataAllID->soKhung; ?>">
      </div>
    </div>
    <div class="col-md-6 margin">
      <div class="flex">
        <label class="w-33">Số Loại:</label><input type="text" id="soLoai" class="form form-control form-control-sm" placeholder="Số Loại" value="<?php echo $dataAllID->soLoai; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Dung Tích:</label><input type="text" id="dungTich" class="form form-control form-control-sm" placeholder="Dung Tích" value="<?php echo $dataAllID->dungTich; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Số Chỗ Ngồi:</label><input type="number" id="soChoNgoi" class="form form-control form-control-sm" placeholder="Số Chỗ Ngồi" value="<?php echo $dataAllID->soChoNgoi ?>">
      </div>
      <div class="flex">
        <label class="w-33">Công Thức Bánh Xe:</label><input type="text" id="congThuc" class="form form-control form-control-sm" placeholder="Công Thức Bánh Xe" value="<?php echo $dataAllID->congThuc; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Vết Bánh Xe:</label><input type="text" id="vetBanhXe" class="form form-control form-control-sm" placeholder="Vết Bánh Xe" value="<?php echo $dataAllID->vetBanhXe; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Kích Thước Bao:</label><input type="text" id="kickThuoc" class="form form-control form-control-sm" placeholder="Kích Thước Bao" value="<?php echo $dataAllID->kichThuoc; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Chiều Dài Cơ Sở:</label><input type="text" id="chieuDai" class="form form-control form-control-sm" placeholder="Chiều Dài Cơ Sở" value="<?php echo $dataAllID->chieuDai; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Khối Lượng Bản Thân:</label><input type="text" id="khoiLuong" class="form form-control form-control-sm" placeholder="Khối Lượng Bản Thân" value="<?php echo $dataAllID->khoiLuong; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Loại Nhiên Liệu:</label><input type="text" id="loaiNhienLieu" class="form form-control form-control-sm" placeholder="Loại Nhiên Liệu" value="<?php echo $dataAllID->loaiNhienLieu; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Công Suất:</label><input type="text" id="congSuat" class="form form-control form-control-sm" placeholder="Công Suất" value="<?php echo $dataAllID->congSuat; ?>">
      </div>
      <div class="flex">
        <label class="w-33">Tốc Độ Quay:</label><input type="text" id="tocDoQuay" class="form form-control form-control-sm" placeholder="Tốc Độ Quay" value="<?php echo $dataAllID->tocDoQuay; ?>">
      </div>
    </div>
  </div>
</div>
<div class="text-center">
  <button class="btn btn-success" id="editRegistry">Sửa Thông Tin Đăng Kiểm</button>
</div>
<script src="../vendor/js/jquery.js"></script>
  <script src="../vendor/js/myQuery.js"></script>
  <script src="../vendor/js/tree_menu.js"></script>
  <script src="../vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../vendor/datatable/dataTables.min.js"></script>
  <script src="../vendor/datatable/dataTables.select.js"></script>
  <script src="../vendor/datatable/dataTables.buttons.min.js"></script>
<script type="text/javascript">
  $('#editRegistry').click(function(){
    let dataG = new FormData();
    let manv = '<?php echo $manv; ?>';
    let id = '<?php echo $id; ?>';
    let img_old = '<?php echo $dataAllID->img; ?>';
    let ten = $('#ten').val();
    let ns = $('#ns').val();
    let cmnd = $('#cmnd').val();
    let address = $('#address').val();
    let type = $('#type').val();
    let maSoGiay = $('#maSoGiay').val();
    let ngayCapGiay = $('#ngayCapGiay').val();
    let ngayMoiGiayDK = $('#ngayMoiGiayDK').val();
    let bienDK = $('#bienDK').val();
    let noiDk = $('#noiDk').val();
    let mucDich = $('#mucDich').val();
    let nhanHieu = $('#nhanHieu').val();
    let loaiPhuongTien = $('#loaiPhuongTien').val();
    let namSx = $('#namSx').val();
    let nuocSx = $('#nuocSx').val();
    let mauSon = $('#mauSon').val();
    let soMay = $('#soMay').val();
    let soKhung = $('#soKhung').val();
    let soLoai = $('#soLoai').val();
    let dungTich = $('#dungTich').val();
    let soChoNgoi = $('#soChoNgoi').val();
    let congThuc = $('#congThuc').val();
    let vetBanhXe = $('#vetBanhXe').val();
    let kickThuoc = $('#kickThuoc').val();
    let chieuDai = $('#chieuDai').val();
    let khoiLuong = $('#khoiLuong').val();
    let loaiNhienLieu = $('#loaiNhienLieu').val();
    let congSuat = $('#congSuat').val();
    let i = $('#img').val();
    let goi = $('#goi').val();
    let tocDoQuay = $('#tocDoQuay').val();
    if(ten == '' || ns == '' || cmnd == '' || address == '' || type == '' || maSoGiay == '' || ngayMoiGiayDK == '' || bienDK == '' || noiDk == '' || mucDich == '' || nhanHieu == '' || loaiPhuongTien == '' || namSx == '' || nuocSx == '' || mauSon == '' || soMay == '' || soKhung == '' || soLoai == '' || dungTich == '' || soChoNgoi == '' || congThuc == '' || vetBanhXe == '' || kickThuoc == '' || chieuDai == '' || khoiLuong == '' || loaiNhienLieu == '' || congSuat == ''|| goi == '' || tocDoQuay == ''){
      alert('Điền Đầy Đủ Thông Tin')
    }else{
      if(i != ''){
        let img = $('#img').prop('files')[0];
        dataG.append('img',img);
      }
      dataG.append('img_old',img_old);
      dataG.append('manv',manv);
      dataG.append('id',id);
      dataG.append('ten',ten);
      dataG.append('ns',ns);
      dataG.append('cmnd',cmnd);
      dataG.append('address',address);
      dataG.append('type',type);
      dataG.append('maSoGiay',maSoGiay);
      dataG.append('ngayCapGiay',ngayCapGiay);
      dataG.append('ngayMoiGiayDK',ngayMoiGiayDK);
      dataG.append('bienDK',bienDK);
      dataG.append('noiDk',noiDk);
      dataG.append('mucDich',mucDich);
      dataG.append('nhanHieu',nhanHieu);
      dataG.append('loaiPhuongTien',loaiPhuongTien);
      dataG.append('namSx',namSx);
      dataG.append('nuocSx',nuocSx);
      dataG.append('mauSon',mauSon);
      dataG.append('soMay',soMay);
      dataG.append('soKhung',soKhung);
      dataG.append('soLoai',soLoai);
      dataG.append('dungTich',dungTich);
      dataG.append('soChoNgoi',soChoNgoi);
      dataG.append('congThuc',congThuc);
      dataG.append('vetBanhXe',vetBanhXe);
      dataG.append('kickThuoc',kickThuoc);
      dataG.append('chieuDai',chieuDai);
      dataG.append('khoiLuong',khoiLuong);
      dataG.append('loaiNhienLieu',loaiNhienLieu);
      dataG.append('congSuat',congSuat);
      dataG.append('goi',goi);
      dataG.append('tocDoQuay',tocDoQuay);
      $.ajax({
        url : 'loadEditRegitry.php',
        dataType : 'html',
        data : dataG,
        type : 'post',
        cache : false,
        processData : false,
        contentType : false,
        success : function(res){
          alert(res);
          window.close();
        }
      });
    }
  });
</script>
  </body>
</html>