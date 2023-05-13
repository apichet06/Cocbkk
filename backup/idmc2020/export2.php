<?php

include 'config.php';
include 'en.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


ini_set('max_execution_time', 0);
set_time_limit(0);
ini_set('memory_limit', '-1'); 

$str_var = $_POST["data"];
$attach = $_POST["attach"];
$array_var = unserialize(base64_decode($str_var));
if ($attach == 'true') {
    $textFile = $textMainbtn2;
}elseif ($attach == 'false') {
    $textFile = $textMainbtn3;
}elseif ($attach == 'appr') {
    $textFile = $textMainbtn4;
}else{
    $textFile = $textMainbtn1;
}
  
require "PHPExcel/Classes/PHPExcel.php";
require "PHPExcel/Classes/PHPExcel/Writer/Excel5.php"; 
  
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ลำดับ' );
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'ชื่อ-สกุล');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'ชื่อคริสตจักร');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'เบอร์โทรศัพท์');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Slip');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'QR Code');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'ID Code');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'ยืนยันลงทะเบียน');
$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'ของที่ระลึก');

$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$rowCount = 2;
for ($i=0; $i < count($array_var); $i++) { 
    $objPHPExcel->getActiveSheet()->getRowDimension($rowCount)->setRowHeight(100); 
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $i+1 );
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $array_var[$i]['fname']." ".$array_var[$i]['lname'] );
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $array_var[$i]['christ']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $array_var[$i]['email']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $array_var[$i]['phone']);

    if ($array_var[$i]['pic1']=='') {
        
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, 'Empty');

    }else{

        $path = "images/uploads/";
        if(file_exists($path.$array_var[$i]['pic1']))
        {

            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $signature = $path.$array_var[$i]['pic1'];    
            $objDrawing->setPath($signature);
            $objDrawing->setOffsetX(25);                     //setOffsetX works properly
            $objDrawing->setOffsetY(10);                     //setOffsetY works properly
            $objDrawing->setCoordinates('F'.$rowCount);            //set image to cell 
            $objDrawing->setWidth(100);  
            $objDrawing->setHeight(100);                     //signature height  
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 

        }
        else
        {
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $array_var[$i]['pic1']);
        }

    }


    if ($array_var[$i]['pic2']=='') {
        
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, 'Empty');

        }else{

        $path = "images/qrcode/";
        if(file_exists($path.$array_var[$i]['pic2']))
        {

            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $signature = $path.$array_var[$i]['pic2'];    
            $objDrawing->setPath($signature);
            $objDrawing->setOffsetX(25);                     //setOffsetX works properly
            $objDrawing->setOffsetY(10);                     //setOffsetY works properly
            $objDrawing->setCoordinates('G'.$rowCount);            //set image to cell 
            $objDrawing->setWidth(100);  
            $objDrawing->setHeight(100);                     //signature height  
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 


            // $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $array_var[$i]['pic2']);
        }
        else
        {
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $array_var[$i]['pic2']);
        }
     }

    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $array_var[$i]['ref_id']);
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $array_var[$i]['status_regis_text']);
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $array_var[$i]['status_gift_text']);


    $rowCount++; 
}
  
  
$fileName = "" . $textFile . "_" .time() ;  

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fileName.'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output'); 



?>
