<?php
  require('../vendor/Classes/PHPExcel.php');
  require('../controller/controller.php');
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $data = new cCar();
    ini_set('memory_limit','4095M');
    ini_set('max_execution_time', 10000);
  $file = $_FILES['img']['tmp_name'];
  $objreader = PHPExcel_IOFactory::createReaderForFile($file); // tạo đối tượng reader
  $objreader->setLoadSheetsOnly('Sheet1');//
  $objExcel = $objreader->load($file);
  $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);

  // lấy dòng cao nhất trong file
  $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
  $arrData = [];
  $id = $data->cGetIDMax();
  if(empty($id)){
    $id = 0;
  }
  $manv = $_POST['authorReg'];
  for($row = 2; $row<=$highestRow; $row++){
    $id ++;
    $ten = $sheetData[$row]['A'];
    $ns = $sheetData[$row]['B'];
    $cmnd = $sheetData[$row]['C'];
    $address = $sheetData[$row]['D'];
    $type = $sheetData[$row]['E'];
    $maSoGiay = $sheetData[$row]['F'];
    $ngayCapGiay = $sheetData[$row]['G'];
    $ngayMoiGiayDK = $sheetData[$row]['H'];
    $bienDK = $sheetData[$row]['I'];
    $noiDk = $sheetData[$row]['J'];
    $mucDich = $sheetData[$row]['K'];
    $nhanHieu = $sheetData[$row]['L'];
    $loaiPhuongTien = $sheetData[$row]['M'];
    $namSx = $sheetData[$row]['N'];
    $nuocSx = $sheetData[$row]['O'];
    $mauSon = $sheetData[$row]['P'];
    $soMay = $sheetData[$row]['Q'];
    $soKhung = $sheetData[$row]['R'];
    $soLoai = $sheetData[$row]['S'];
    $dungTich = $sheetData[$row]['T'];
    $soChoNgoi = $sheetData[$row]['U'];
    $congThuc = $sheetData[$row]['V'];
    $vetBanhXe = $sheetData[$row]['W'];
    $kickThuoc = $sheetData[$row]['X'];
    $chieuDai = $sheetData[$row]['Y'];
    $khoiLuong = $sheetData[$row]['Z'];
    $loaiNhienLieu = $sheetData[$row]['AA'];
    $congSuat = $sheetData[$row]['AB'];
    $goi = $sheetData[$row]['AC'];
    $tocDoQuay = $sheetData[$row]['AD'];
    $img = '';
    $data->cAddRegCar($manv, $id, $ten, $ns, $cmnd, $address, $type, $maSoGiay, $ngayCapGiay, $ngayMoiGiayDK, $bienDK, $noiDk, $mucDich, $nhanHieu, $loaiPhuongTien, $namSx, $nuocSx, $mauSon, $soMay, $soKhung, $soLoai, $dungTich, $soChoNgoi, $congThuc, $vetBanhXe, $kickThuoc, $chieuDai, $khoiLuong, $loaiNhienLieu, $congSuat, $img, $goi, $tocDoQuay);
  }
  
  $objExcel->disconnectWorksheets();
  unset($objExcel);
  echo "Success";
?>