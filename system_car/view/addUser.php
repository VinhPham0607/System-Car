<div class="modal-header" style="background-color: #f9d9b9b5;">
	<h4>Thêm User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
  require('../controller/controller.php');
  $data = new cCar();
  $listUser = $data->cGetListUser();
?>
<div class="modal-body">
  <div class="col-md-12">
    <div class="input-group-prepend">
      <div class="w-25"><label>ID</label></div>
      <input type="text" class="form-control" id="id">
    </div>
    <div class="input-group-prepend">
      <div class="w-25"><label>Họ Tên</label></div>
      <input type="text" class="form-control" id="name">
    </div>
  </div>
  <div class="col-md-12">
    <div class="input-group-prepend">
      <div class="w-25"><label>Trung Tâm</label></div>
      <select id="center" class="form-control">
        <option></option>
        <option value="Cục Đăng Kiểm">Cục Đăng Kiểm</option>
        <?php for ($i=1; $i < 10; $i++) { 
        ?>
        <option value="<?php echo 'Trung Tâm '.$i; ?>"><?php echo 'Trung Tâm '.$i; ?></option>
        <?php
        } ?>
      </select>
    </div>
    <div class="input-group-prepend">
      <div class="w-25"><label>Khu Vực</label></div>
      <select class="form-control" id="area">
        <option value=""></option>
        <option value="Cả Nước">Cả Nước</option>
        <option value="Miền Bắc">Miền Bắc</option>
        <option value="Miền Trung">Miền Trung</option>
        <option value="Miền Nam">Miền Nam</option>
      </select>
    </div>
  </div>
</div>
<button class="btn btn-success" id="addU">Xác Nhận</button>
<script type="text/javascript">
  $(document).ready(function(){
    let listUser = <?php echo json_encode($listUser); ?>;
    $('#addU').click(function(){
      let id = $('#id').val();
      let name = $('#name').val();
      let center = $('#center').val();
      let area = $('#area').val();
      if(id == '' || name == '' || center == '' || area == ''){
        alert('Nhập đầy đủ thông tin')
      }else if(center != 'Cục Đăng Kiểm' && area == 'Cả Nước' || center == 'Cục Đăng Kiểm' && area != 'Cả Nước'){
        alert('Kiểm tra lại thông tin Trung Tâm và Khu Vực')
      }else{
        let check = listUser.find(a=>a.id == id);
        let type = 2;
        if(check != null){
          alert('ID đã tồn tại')
        }else{
          if(center == 'Cục Đăng Kiểm'){
            type = 1;
          }
          $.post('./view/loadAddU.php', 
            {id:id, name:name, center:center, area:area, type:type},
            function(data){
            $(".close").click();
            alert(data);
            loadUser();
          });
        }
      }
    })
  })
</script>