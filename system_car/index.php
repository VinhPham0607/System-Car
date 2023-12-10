<?php
include('header.php');
$token = $_COOKIE['token'];
$userInfo = $data->cGetCk($token);
$center = $data->cGetListCenter();
$area = $data->cGetListArea();
$province = $data->cGetListProvince();
$typeUser = $userInfo->type;
$centerr = $userInfo->center;
?>
<div style="height: 2em;">
	
</div>
 <div class="container-fluid">
    <div class="row topnav">
      <div class="col-md-2">
        
      </div>
      <div class="col-md-8">
        <div id="myTopnav">
          <!-- <a href=""  style="border-right: 1px solid white;"><i class="fas fa-home"></i></a> -->
          <a href="index.php" class="active"><i class="fas fa-podcast"></i>
              Total Car</a>
          <a href="reg.php"><i class="fas fa-podcast"></i>
              Warning Over</a>
          <?php
          if($userInfo->type == 1){
          ?>
          <a href="user.php"><i class="fas fa-podcast"></i>
              User System</a>
          <?php
          }
          ?>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <span style="padding-bottom: 10px
          ;"><i class="fa fa-bars"></i></span>
          </a>
        </div>

      </div>
      <div class="col-md-2">
        
      </div>
    </div>
    <div class="row mg-0 mgt-10">
      <div class="width-left bor-r page-left">
        <div class="search">
          <label>Trung Tâm</label>
          <?php
          if($centerr != 'Cục Đăng Kiểm'){
          ?>
          <input type="text" id="center" class="form form-control form-control-sm" value="<?php echo $centerr; ?>" disabled>
          <?php
          }else{
          ?>
          <input type="text" id="center" class="form form-control form-control-sm" placeholder="Trung Tâm" list="listCenter">
          <datalist id="listCenter">
            <?php
            foreach ($center as $key) {
            ?>
            <option value="<?php echo $key->center; ?>"><?php echo $key->center; ?></option>
            <?php
            }
            ?>
          </datalist>
          <?php
          }
          ?>
          <label>Khu Vực</label>
          <input type="text" id="area" class="form form-control form-control-sm" placeholder="Khu Vực" list="listArea">
          <datalist id="listArea">
            <?php
            foreach ($area as $key) {
            ?>
            <option value="<?php echo $key->area; ?>"><?php echo $key->area; ?></option>
            <?php
            }
            ?>
          </datalist>
          <!-- <label>Tỉnh/Thành Phố</label>
          <input type="text" id="province" class="form form-control form-control-sm" placeholder="Tỉnh/Thành Phố" list="listProvince">
          <datalist id="listProvince">
            <?php
            foreach ($province as $key) {
            ?>
            <option value="<?php echo $key->name; ?>"><?php echo $key->name; ?></option>
            <?php
            }
            ?>
          </datalist> -->
          <label>Date From</label>
          <input type="date" id="dateF" class="form form-control form-control-sm">
          <label>Date End</label>
          <input type="date" id="dateE" class="form form-control form-control-sm">
          <div style="float: right; margin-top: 10px;">
            <button class="btn btn-primary btn-sm appy-filter" id="apply"><i class="fa fa-check"></i> Search</button>
          </div>
          <!-- <h3><i class="fa fa-plus" title="Add" id="addCar"></i></h3> -->
          <!-- <i class="fa fa-edit" title="Add" id="addCar"></i> -->
        </div>
      </div>
      <div class="width-right mg0">
        
        <div class="row search-tit table-responsive"  id="show">

        </div>
      </div>
    </div>
  </div>
<?php
include('footer.php');
?>
<script type="text/javascript">
	$(document).ready(function(){
    let typeUser = '<?php echo $typeUser; ?>';
    loadMain(typeUser);
		$('#apply').click(function(){
      loadMain(typeUser);
		});
	});
</script>
