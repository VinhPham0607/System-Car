<div class="modal-header">
  <h5 class="modal-title card-title" style="color: #01b1c1;">UPLOAD CSDL</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php
  require('../controller/controller.php');
  $data = new cCar;

  if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $userInfo = $data->cGetCk($token);
    if (empty($userInfo)) {
      echo '<div class="panel-alert"><i class="fas fa-bell i-right"></i>Login Again Please!</div>';
      exit();
    }
  } else {
    echo '<div class="panel-alert"><i class="fas fa-bell i-right"></i>Login Again Please!</div>';
    exit();
  }
  $authorReg = $userInfo->id;
?>
<div class="modal-body">
  <div class="row" id = "form_pick">	
      <div class="col-md-12">
        <div class="form-group">
        	<div class="input-group input-group-sm mb-3">
              <div class = "input-group-prepend">
                  <label class="input-group-text">File Attach :</label>
              </div>
              <input id="img" type = "file" class="form-control form-control-sm" >
          </div>
          <button class="btn btn-success form-control" id="confirm" style = "margin-bottom:1em;">
              <i class="fas fa-save"></i>
              Xác Nhận
          </button>
          <a href="./vendor/fileExcel/Sample.xlsx" download>     >> Download File Sample</a>
        </div>
      </div>
	</div>
</div>

<script type="text/javascript">
	$("#confirm").click(function(){
    let x = confirm('Upload CSDL?');
    if(x == true){
      let dataG = new FormData();
      let i = $('#img').val();
      if (i != '') {
        let authorReg = '<?php echo $authorReg; ?>';
        var img = $('#img').prop('files')[0];
        var typeImg = img.type;
        match = ['application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','.csv'];
        if (typeImg == match[0] || typeImg == match[1] || typeImg == match[2]) {
          dataG.append('img', img);
          dataG.append('authorReg', authorReg);
          $(".close").click();
          $.ajax({
            url : 'view/loadAddFileExcel.php',
            dataType : 'html',
            data : dataG,
            type : 'post',
            cache : false,
            processData : false,
            contentType : false,
            success : function(res){
              alert(res)
              loadTotalCar()
            }
          });
        } else {
          alert('Kiểm Tra Lại File')
        }
      }else {
        alert('Hãy Chèn File Vào')
      }
    }
	});
</script>
