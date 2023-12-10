<div class="modal-header" style="background-color: #f9d9b9b5;">
	<h4>Thêm Xe Đăng Kiểm <b style="color: #a0a0f5; font-size: 25px;"></b></h4>
  <!-- <span></span> -->
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
  <div class="col-md-12">
    <div class="input-group-prepend">
      <div class="w-25"><label>Mã Số Xe</label></div>
      <input type="text" class="form-control" id="uname">
    </div>
    <div class="input-group-prepend">
      <div class="w-25"><label>Tên Chủ Xe</label></div>
      <input type="text" class="form-control" id="uname">
    </div>
  </div>
  <div class="col-md-12">
    <div class="input-group-prepend">
      <div class="w-25"><label>Loại Xe</label></div>
      <input type="text" class="form-control" id="uname">
    </div>
    <div class="input-group-prepend">
      <div class="w-25"><label>Số Chỗ Ngồi</label></div>
      <input type="text" class="form-control" id="uname">
    </div>
  </div>
</div>
<button class="btn btn-success" id="changPas"></button>
<script type="text/javascript">
  $(document).ready(function(){
    $('#changPas').click(function(){
      let uname = $('#uname').val();
      let psw = $('#psw').val();
      let pswNew = $('#pswNew').val();
      let pswCon = $('#pswCon').val();
      if(uname == '' || psw == '' || pswCon == '' || pswNew == ''){
        alert('Check Information Input')
      }else if(pswCon != pswNew){
        alert('New Passwords are not the same')
      }else{
        $.post('./user/changingPass.php', 
            {uname:uname, psw:psw, pswCon:pswCon, pswNew:pswNew},
            function(data){
            if(data == 'false'){
              alert('User Or Password Incorrect');
            }else{
              alert('Change Password Success!')
              window.location.reload();
            }
        });
      }
    })
  })
</script>