<?php
ob_start();
include("connectdb.php");

$Summit = $_POST["txt_summit"];
if ($Summit=="true") {
    $Name = $_POST["txt_name"];
    $Barcode = $_POST["txt_barcode"];
    $QR = $_POST["txt_qr"];
    $Group = $_POST["Radio1"];

    if (($Name!="")&&($Barcode!="")) {
        $cmd = " INSERT INTO card_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID) VALUES (null,'$Name','$Barcode','$QR','$Group') ";
        $result = mysqli_query($conn,$cmd);
        echo '<script>alert(" บันทึกข้อมูลเรียบร้อยแล้ว ");</script>';
        echo '<meta http-equiv="refresh" content="0;url=card.php" />';
    } else {
        echo '<script>alert(" กรุณากรอกข้อมูลผู้ใช้งานให้ครบถ้วน !!! ");history.back();</script>';
    }
}

?>
