<?php
	require('../controller/controller.php');
	$data = new cCar();
	$center = $_POST['center'];
	$area = $_POST['area'];
	$dateF = $_POST['dateF'];
	$dateE = $_POST['dateE'];
	$data_view = $data->cGetDataTotal($center, $area, $dateF, $dateE);

?>
<div class="w-100">
	<table class="table table-bordered text-center line-height middleTH middle" id="viewTotal">
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
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div>
<script type="text/javascript">
$(document).ready(function(){
  arr = [];
  let i =1;
  let data_view = <?php echo json_encode($data_view); ?>;
  let viewTotal1 = $('#viewTotal').DataTable({
      "lengthMenu": [[15, -1]],
      dom: 'Bfrtip',
      buttons: [
      {
        text: 'Đăng Kiểm Mới',
        action: function ( e, dt, node, config ) {
          window.open("./view/registry.php", "_blank", "scrollbars=yes,resizable=yes,width = "+screen.availWidth*3/4+",top=20, left ="+screen.availWidth/5+",height="+screen.availWidth+"");
        }
      },
      {
        text: 'Đăng Kiểm Lại',
        action: function ( e, dt, node, config ) {
          if(arr.length != 1){
            alert('Chọn 1 Thông Tin Xe Để Đăng Kiểm Lại')
          }else{
            $.post('./view/registryAgain.php', {id:arr[0]},
              function(data){
              $("#modal-content").html(data);
              $('#exampleModal').modal('show');
            });
          }
        }
      },
      {
        text: 'Sửa Thông Tin',
        action: function ( e, dt, node, config ) {
          if(arr.length !=1){
            alert('Chọn 1 Thông Tin Xe Để Sửa')
          }else{
            window.open("./view/editRegistry.php?id="+arr[0], "_blank", "scrollbars=yes,resizable=yes,width = "+screen.availWidth*3/4+",top=20, left ="+screen.availWidth/5+",height="+screen.availWidth+"");
          }
        }
      },
      {
        text: 'Xem Thông Tin',
        action: function ( e, dt, node, config ) {
	        if(arr.length != 1){
	        	alert('Chọn 1 Thông Tin Xe Để Xem')
	        }else{
            window.open("./view/viewInformationCar.php?id="+arr[0], "_blank", "scrollbars=yes,resizable=yes,width = "+screen.availWidth*3/4+",top=20, left ="+screen.availWidth/5+",height="+screen.availWidth+"");
	        	// $.post('./view/viewInformationCar.php', {id:arr[0]},
	         //    function(data){
	         //    	$("#modal-content").html(data);
	         //    	$('#exampleModal').modal('show');
	         //  	});
	        }
        }
      },
      ],
      data: data_view,
      columns:[
      {
        "data": function(row, type, set){
          return i++;
        }
      },
      {data:"ten"},
      {data:"cmnd"},
      {data:"noiDk"},
      {data:"ngayMoiGiayDK"},
      {
        "data": function(row, type, set){
          let goi = row['goi'];
          return goi+' Tháng';
        }
      },
      {
        "data": function(row, type, set){
          let dateReg = new Date(row['ngayMoiGiayDK']).getTime()+row['goi']*86400*30*1000;
          let now = new Date().getTime();
          let over = parseInt((dateReg - now)/86400/1000);
          return over;
        }
      },
      {data:"bienDK"},
      {data:"loaiPhuongTien"},
      {data:"nhanHieu"},
      {data:"area"},
      {data:"center"},
      {data:"authorReg"},
      ],
      select: {
        style: 'multi'
      }
    });

    viewTotal1
    .on( 'select', function ( e, dt, type, indexes ) {
      var rowData = viewTotal1.rows( indexes ).data().toArray();
      for (var i = 0; i < rowData.length; i++) {
        var x = arr.indexOf(rowData[i]['id']);
        if (x === -1) //neu ko ton tai
          arr.unshift(rowData[i]['id']); //thi push 
      }
    })
    .on( 'deselect', function ( e, dt, type, indexes ) {
      var rowDataUn = viewTotal1.rows( indexes ).data().toArray();
      for (var i = 0; i < rowDataUn.length; i++) {
        var x = arr.indexOf(rowDataUn[i]['id']);
        arr.splice(x, 1);
      }
    })
});
</script>
