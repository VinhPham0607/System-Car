<?php
	require('../controller/controller.php');
	$data = new cCar();
	$center = $_POST['center'];
	$area = $_POST['area'];
  $status = $_POST['status'];
	$data_user = $data->cGetDataUser($center, $area, $status);
?>
<div class="w-100">
	<table class="table table-bordered text-center line-height middleTH middle" id="viewUser1">
		<thead>
			<tr>
				<th>STT</th>
				<th>ID NV</th>
				<th>Tên NV</th>
				<th>Trung Tâm</th>
				<th>Khu Vực</th>
        <!-- <th>Trạng Thái</th> -->
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
  let data_user = <?php echo json_encode($data_user); ?>;
  let viewUser = $('#viewUser1').DataTable({
      "lengthMenu": [[10, -1]],
      dom: 'Bfrtip',
      buttons: [
      {
        text: 'Add User',
        action: function ( e, dt, node, config ) {
        	$.post('./view/addUser.php',
            function(data){
            	$("#modal-content").html(data);
            	$('#exampleModal').modal('show');
          	});
        }
      },
      ],
      data: data_user,
      columns:[
      {
        "data": function(row, type, set){
          return i++;
        }
      },
      {data:"id"},
      {data:"name"},
      {data:"center"},
      {data:"area"},
      // {
      //   "data": function(row, type, set){
      //     let status = row['status'];
      //     if(status == 0){
      //       return 'Đang Hoạt Động';
      //     }else{
      //       return 'Dừng Hoạt Động';
      //     }
      //   }
      // },
      ],
      select: {
        style: 'multi'
      }
    });

    viewUser
    .on( 'select', function ( e, dt, type, indexes ) {
      var rowData = viewUser.rows( indexes ).data().toArray();
      for (var i = 0; i < rowData.length; i++) {
        var x = arr.indexOf(rowData[i]['id']);
        if (x === -1) //neu ko ton tai
          arr.unshift(rowData[i]['id']); //thi push 
      }
    })
    .on( 'deselect', function ( e, dt, type, indexes ) {
      var rowDataUn = viewUser.rows( indexes ).data().toArray();
      for (var i = 0; i < rowDataUn.length; i++) {
        var x = arr.indexOf(rowDataUn[i]['id']);
        arr.splice(x, 1);
      }
    })
});
</script>
