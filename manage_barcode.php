<?php
ob_start();
include "connectdb.php";


  $XID    = $_POST["bar_code"];
$around = $_POST["around"];
//$cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
// $cmd = $cmd."(null,'$Tag_Name','$XID','$QR_ID','$Group_ID','$Now','$Default') ";
// $result = mysqli_query($conn,$cmd);
//echo "$XID<br>$cmd";
$Now = date("Y-m-d H:i:s");
$Today = date("Y-m-d");
$Default = "0000-00-00 00:00:00";

if ($XID != "") {

    $sql_ = mysqli_query($conn, "SELECT * From member  WHERE id_no = '$XID' ");
    $row = mysqli_fetch_assoc($sql_);

    if ($row['id_no']) {

        $sql = mysqli_query($conn, "SELECT * FROM register_bose WHERE id_no = '" . $row['id_no'] . "'") or die(mysqli_error($conn));
        $rs  = mysqli_fetch_assoc($sql);

        if ($rs['around'] =="1") {
            $show1 = "ลงทะเบียนรอบที่ 1";

        }else{

            $show1 = '';
        }
            if($rs['around'] =="2"){
            $show2 = "และรอบที่ 2";
        }else{
            $show2 = '';
        }

        $arrayName = array('around1' => $show1, 'around2' => $show2,'id_no' => $row['id_no'] );
        echo json_encode($arrayName);

    } else {

        $sql_1 = mysqli_query($conn, "SELECT * FROM interest WHERE i_number = '$XID'");
        $rs_ = mysqli_fetch_assoc($sql_1);

        if ($rs_['i_number']) {

            //echo ' insert รายการที่มีการลงทะเบียน';

        } else {

            echo 'ไม่มีข้อมูลลงทะเบียน';
            $show = 10;
        }
    }


    //         $cmd = "SELECT * FROM trans_db WHERE Barcode_ID = '$XID' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
    //         $result = mysqli_query($conn, $cmd);
    //         while ($rs = mysqli_fetch_array($result)) {
    //             $IN = $rs["Track_In"];
    //             $OUT = $rs["Track_Out"];
    //         }
    //         if ($OUT == "$Default") {
    //             // +++ Transaction OUT +++
    //             $to_time = strtotime($Now);
    //             $from_time = strtotime($IN);
    //             $diff_time = round(abs($to_time - $from_time) / 60, 2);

    //             if ($diff_time > 1) {
    //                 $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$Barcode_ID' AND Track_Out='$Default' ";
    //                 $result = mysqli_query($conn, $cmd);

    //             } else {

    //                 // +++ Transaction IN +++
    //                 $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //                 $cmd = $cmd . "(null,'$Tag_Name','$Barcode_ID','$QR_ID','$Group_ID','$Now','$Default') ";
    //                 $result = mysqli_query($conn, $cmd);

    //             }

    //    }



    // $n = 0;
    // $cmd = mysqli_query($conn," SELECT * FROM register_bose WHERE Tag_Name='$XID' OR Barcode_ID='$XID' OR QR_ID='$XID' ");
    // while ($rs = mysqli_fetch_assoc($cmd)) {
    //     $n++;
    //         $Tag_Name   = $rs["Tag_Name"];
    //         $Barcode_ID = $rs["Barcode_ID"];
    //         $QR_ID      = $rs["QR_ID"];
    //         $Group_ID   = $rs["Group_ID"];

    // }

    // if ($n>0) {
    //     $cmd = "SELECT * FROM trans_db WHERE Barcode_ID='$XID' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
    //     $result = mysqli_query($conn,$cmd);
    //     while ($rs = mysqli_fetch_array($result)) {
    //         $IN = $rs["Track_In"];
    //         $OUT = $rs["Track_Out"];
    //     }
    //     if ($OUT=="$Default") {
    //         // +++ Transaction OUT +++
    //         $to_time = strtotime($Now);
    //         $from_time = strtotime($IN);
    //         $diff_time = round(abs($to_time - $from_time) / 60,2);

    //         if ($diff_time>1) {
    //             $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$Barcode_ID' AND Track_Out='$Default' ";
    //             $result = mysqli_query($conn,$cmd);
    //         } else {
    //             // +++ Transaction IN +++
    //             $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //             $cmd = $cmd."(null,'$Tag_Name','$Barcode_ID','$QR_ID','$Group_ID','$Now','$Default') ";
    //             $result = mysqli_query($conn,$cmd);
    //         }
    //     } else {
    //         // +++ Transaction IN +++
    //         $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //         $cmd = $cmd."(null,'$Tag_Name','$Barcode_ID','$QR_ID','$Group_ID','$Now','$Default') ";
    //         $result = mysqli_query($conn,$cmd);
    //     }
    // }
    //echo "$diff_time";
}




if($_POST['insert'] == "insert_register"){
    // echo 'insert รายการที่มีในการลงทะเบียน แจ้งรอบที่ลงทะเบียน';
    $id_no = mysqli_escape_string($conn,$_POST['id_no']);
$cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
$cmd = $cmd . "(null,'$id_no','$id_no','$id_no','1','$Now','$Default') ";
$result = mysqli_query($conn, $cmd);

}
?>
