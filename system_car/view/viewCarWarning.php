<?php
	require('../controller/controller.php');
	$data = new cCar();
	$center = $_POST['center'];
	$area = $_POST['area'];
	$dateF = '';
	$dateE = '';
  $overDay = $_POST['overDay'];
	$data_view = $data->cGetDataTotal($center, $area, $dateF, $dateE);
?>
<div class="w-100">
	<table class="table table-bordered text-center line-height middleTH middle" id="viewWar">
		<thead>
			<tr>
        <th>STT</th>
        <th>Chủ Sở Hữu</th>
        <th>Số CMND</th>
        <th>Tỉnh/Thành Phố</th>
        <th>Ngày Đăng Kiểm Mới</th>
        <th>Chu Kỳ Đăng Kiểm</th>
        <th>Hiệu Lực(Day)</th>
        <th>Biển Số Xe</th>
        <th>Loại Phương Tiện</th>
        <th>Nhãn Hiệu</th>
        <th>Khu Vực</th>
        <th>Trung Tâm Đăng Kiểm</th>
        <th>Người Đăng Kiểm</th>
      </tr>
		<tbody id="datasss">
			
		</tbody>
	</table>
</div>
<script type="text/javascript">
$(document).ready(function(){
  let overDay = '<?php echo $overDay; ?>';
  let html = '';
  let stt = 0;
  let data_view = <?php echo json_encode($data_view); ?>;
  for (var i = 0; i < data_view.length; i++) {
    let over = data_view[i].ngayMoiGiayDK;
    let goi = data_view[i].goi;
    let intOver = new Date(over).getTime() + goi*30*86400*1000;
    let now = new Date();
    let abc = parseInt((intOver - now)/86400/1000);
    if(abc<=overDay){
      stt++;
      html += '<tr><td>'+stt+'</td><td>'+data_view[i].ten+'</td><td>'+data_view[i].cmnd+'</td><td>'+data_view[i].noiDk+'</td><td>'+data_view[i].ngayMoiGiayDK+'</td><td>'+data_view[i].goi+'</td><td>'+abc+'</td><td>'+data_view[i].bienDK+'</td><td>'+data_view[i].loaiPhuongTien+'</td><td>'+data_view[i].nhanHieu+'</td><td>'+data_view[i].area+'</td><td>'+data_view[i].center+'</td><td>'+data_view[i].authorReg+'</td></tr>'
    }
  }
  $('#datasss').html(html);
  $('#viewWar').DataTable({
      "lengthMenu": [10, -1],
      dom: 'Bfrtip',
      buttons: [
      ],
    });
});
</script>
