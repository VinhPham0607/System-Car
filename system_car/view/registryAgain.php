<div class="modal-header" style="background-color: #f9d9b9b5;">
  <h4>Đăng Kiểm Lại</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require('../controller/controller.php');
$data = new cCar();
if (isset($_COOKIE['token'])) {
  $token = $_COOKIE['token'];
  $userInfo = $data->cGetCk($token);
  if (empty($userInfo)) {
    echo '<span style = "color: red;">Login Please!</span>';
    exit();
  }
}else{
  echo '<span style = "color: red;">Login Please!</span>';
  exit();
}
$manv = $userInfo->id;
$id = $_POST['id'];
// $dataCar = $data->cGetAllDataId($id);
// print_r($dataCar);
?>
<div class="modal-body flex">
  <div class="col-md-6">
    <div class="input-group-prepend">
      <div class="w-50"><label>Ngày Đăng Kiểm:</label></div>
      <input type="date" class="form form-control form-control-sm" id="ngayMoiGiayDK" value="<?php echo date('Y-m-d'); ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="input-group-prepend">
      <div class="w-50"><label>Chu Kỳ Đăng Kiểm:</label></div>
      <select id="goi" class="form form-control form-control-sm">
        <option value=""></option>
        <option value="6">6 Tháng</option>
        <option value="12">12 Tháng</option>
        <option value="18">18 Tháng</option>
        <option value="24">24 Tháng</option>
        <option value="30">30 Tháng</option>
        <option value="36">36 Tháng</option>
        <option value="60">60 Tháng</option>
      </select>
    </div>
  </div>
</div>
<button class="btn btn-success" id="confirmDK">Xác Nhận Đăng Kiểm</button>
<script type="text/javascript">
  $(document).ready(function(){
    $('#confirmDK').click(function(){
      let id = '<?php echo $id; ?>';
      let manv = '<?php echo $manv; ?>';
      let ngayMoiGiayDK = $('#ngayMoiGiayDK').val();
      let goi = $('#goi').val();
      if(goi == '' || ngayMoiGiayDK == ''){
        alert('Nhập đầy đủ thông tin')
      }else{
          $.post('./view/loadRegistryAgain.php', 
            {id:id, manv:manv, ngayMoiGiayDK:ngayMoiGiayDK, goi:goi},
            function(data){
            $(".close").click();
            alert(data);
            loadMain();
          });
      }
    })
  })
</script>