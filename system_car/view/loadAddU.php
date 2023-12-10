<?php
  require('../controller/controller.php');
  $data = new cCar();
  $id = $_POST['id'];
  $name = $_POST['name'];
  $center = $_POST['center'];
  $area = $_POST['area'];
  $type = $_POST['type'];
  $data->cAddU($id, $name, $center, $area, $type);
  echo 'Thêm User Success';
?>