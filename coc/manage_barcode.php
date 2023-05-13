<?php
ob_start();
include "connectdb.php";


  $XID    = $_POST["bar_code"];
  $in = $_POST["in"];
  $out = $_POST["out"];
  $Today  = date("Y-m-d");

if ($XID != "") {

    $sql_ = mysqli_query($conn, "SELECT * From member  WHERE id_no = '$XID' ");
    $row = mysqli_fetch_assoc($sql_);

    if ($row['id_no']) {

        $sql = mysqli_query($conn, "SELECT * FROM register_bose WHERE id_no = '" . $row['id_no'] . "'  ") or die(mysqli_error($conn));
        $rs  = mysqli_fetch_assoc($sql); //and c_date like '$Today%'

        if ($rs['around'] =="1") {

            $show1  = "มีที่นั่งรอบที่ 1";
            $show_1 = 1;

        }
            if($rs['around'] =="2"){

                $show2 = ",มีที่นั่งรอบที่ 2";
                $show_2 = 2;
        }

        if($rs['around'] != "1" and $rs['around'] != "2"){

             $sql_10 = mysqli_query($conn, "SELECT * FROM trans_db
             WHERE Tag_Name = '".$row['id_no']. "' and date(Track_In) like '$Today'   order by Track_In DESC")or die(mysqli_error($conn));
               $row_ = mysqli_fetch_assoc($sql_10);
              //ถ้ามีการลงทะเบียนเข้างานไปแล้วไม่ต้องแสดง
             if($row_['Track_In']){

                $show3 = '';
                $show_3 = 30;

             }else{

                $sql = mysqli_query($conn, "SELECT * FROM member Where id_no  = '" . $row['id_no'] . "' ");
                $ck  = mysqli_fetch_assoc($sql);
                $str = substr($ck['id_no'], 0, 2);

                if ($str == "21") {
                    $show3 = '';
                    $show_3 = 30;
                   //กลุ่ม visitor

                }else{

                    $show3 = 'สมาชิกไม่ได้ลงทะเบียนนมัสการ';
                    $show_3 = 3;

                }

             }

        }

        $arrayName = array('around1' => $show1, 'around2' => $show2,'id_no' => $row['id_no'],'show_1' => $show_1,'show_2' => $show_2,'show_3'=>$show_3 ,'show3'=> $show3,'i_name' => $row['m_name'],'in'=> $in,'out'=>$out);
        echo json_encode($arrayName);

    } else {

        $sql_1 = mysqli_query($conn, "SELECT * FROM interest WHERE i_number = '$XID'");
        $rs_ = mysqli_fetch_assoc($sql_1);

        if ($rs_['i_around'] == "1") {

            //echo ' insert รายการที่มีการลงทะเบียน';
            $data1 = "สมาชิกที่มาเยี่ยมชม มีที่นั่งรอบที่ 1";
            $data_1 = 11;

        }else{

            $data1 = "";

        }

        if ($rs_['i_around'] == "2") {

            //echo ' insert รายการที่มีการลงทะเบียน';
            $data2 = "สมาชิกที่มาเยี่ยมชม มีที่นั่งรอบที่ 2";
            $data_2 = 12;
        }else{
            $data2 = "";

        }

        if($rs_['i_around'] != "1" and $rs_['i_around']!= "2") {

            $data3  = "ไม่มีข้อมูล กรุณาสมัครสมาชิก!";
            $data_3 = 10;
            $no_name = $XID;

        }

        $arrayName = array('data1' => $data1,'data_1' => $data_1 ,'data2' => $data2,'data_2'=> $data_2 ,'data_3' => $data_3,'i_number' => $rs_['i_number'], 'data3'=> $data3, 'no_name' => $no_name, 'i_name' => $rs_['i_name'], 'in' => $in, 'out' => $out);
        echo json_encode($arrayName);
    }

}



// if($_POST['insert'] == "insert_register"){
//     // echo 'insert รายการที่มีในการลงทะเบียน แจ้งรอบที่ลงทะเบียน';

//     $id_no = mysqli_escape_string($conn,$_POST['id_no']);

//     $cmd = mysqli_query($conn, "SELECT * FROM trans_db WHERE Barcode_ID = '$id_no' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ");
//     $rs = mysqli_fetch_array($cmd);


// //echo strtotime(date($rs['Track_In'])) .' != '. "-62170009200".' and'. strtotime(date($rs['Track_Out'])). ' == '. "-62170009200";



//     if (strtotime(date($rs['Track_In'])) != "-62170009200" and strtotime(date($rs['Track_Out'])) == "-62170009200") {


//         $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$id_no' AND Track_Out='$Default' ";
//         $result = mysqli_query($conn, $cmd);

//     } else {

//     $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
//     $cmd = $cmd . "(null,'$id_no','$id_no','$id_no','1','$Now','$Default') ";
//     $result = mysqli_query($conn, $cmd);

//     }
// }

// if ($_POST['insert'] == "insert_register_1") {
//     // echo 'insert รายการที่มีในการลงทะเบียน แจ้งรอบที่ลงทะเบียน';

//      $data = mysqli_escape_string($conn, $_POST['id_no']);
//     if($data){
//     echo   $i_number = mysqli_escape_string($conn, $_POST['id_no']);
//     }else{
//         $i_number = mysqli_escape_string($conn, $_POST['no_name']);
//     }

//     $cmd = mysqli_query($conn,"SELECT * FROM trans_db WHERE Barcode_ID = '$i_number' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ");
//     $rs = mysqli_fetch_array($cmd);

//     if (strtotime(date($rs['Track_In'])) != '-62170009200' and strtotime(date($rs['Track_Out'])) == '-62170009200') {

//         $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$i_number' AND Track_Out='$Default' ";
//         $result = mysqli_query($conn, $cmd);

//     } else {

//         $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
//         $cmd = $cmd . "(null,'$i_number','$i_number','$i_number','2','$Now','$Default') ";
//         $result = mysqli_query($conn, $cmd);

//     }

// }
$Now = date("Y-m-d H:i:s");
$Today = date("Y-m-d");
$Default = "0000-00-00 00:00:00";

if($_POST['insert'] == "insert_register"){

    // echo 'insert รายการที่มีในการลงทะเบียน แจ้งรอบที่ลงทะเบียน';

    $XID     = mysqli_escape_string($conn, $_POST['id_no']);
    $in      = mysqli_escape_string($conn, $_POST['in']);
    $out     = mysqli_escape_string($conn, $_POST['out']);

    $sql = mysqli_query($conn, "SELECT * FROM member Where id_no  = '$XID' ");
    $ck  = mysqli_fetch_assoc($sql);
    $str = substr($ck['id_no'], 0, 2);
    $id_no = $ck['id_no'];

    if ($str == "21") {

        $Group_ID = "2";

    } else {

        $Group_ID = "1";

    }

 if($in =="in"){

        $cmd    = "SELECT * FROM trans_db WHERE Barcode_ID = '$XID' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
        $result = mysqli_query($conn, $cmd);
        $rs     = mysqli_fetch_array($result);
        $sq =  $rs['Track_In'];

        $date_time =  date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($sq)));

        if(strtotime($date_time) <= strtotime($Now) or (strtotime($rs['Track_Out']) != strtotime($Default))){

        $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
        $cmd = $cmd . "(null,'$id_no','$id_no','$id_no','$Group_ID','$Now','$Default') ";
        $result = mysqli_query($conn, $cmd);

    }

 }elseif($out=="out"){

        $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$XID' AND Track_Out='$Default' ";
        $result = mysqli_query($conn, $cmd) or die(mysqli_error($conn));

 }

    // $cmd = mysqli_query($conn," SELECT * FROM member WHERE id_no='$XID'");
    // $n = 0;
    // while ($rs = mysqli_fetch_assoc($cmd)) {
    //     $n++;
    //        $id_no = $rs['id_no'];
    // }

    // if ($n>0) {



    //     $cmd = "SELECT * FROM trans_db WHERE Barcode_ID='$XID' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
    //     $result = mysqli_query($conn,$cmd);
    //     while ($rs = mysqli_fetch_array($result)) {
    //         $IN = $rs["Track_In"];
    //         $OUT = $rs["Track_Out"];
    //     }




    //     if (strtotime($OUT) == strtotime($Default)) {
    //         // +++ Transaction OUT +++
    //         $to_time = strtotime($Now);
    //         $from_time = strtotime($IN);
    //         $diff_time = round(abs($to_time - $from_time) / 60,2);

    //         if ($diff_time>1) {

    //             echo 'update01';
    //             $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$XID' AND Track_Out='$Default' ";
    //             $result = mysqli_query($conn,$cmd)or die(mysqli_error($conn));
    //         } else {
    //             //+++ Transaction IN +++
    //             echo "insert 2";
    //             $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //             $cmd = $cmd."(null,'$id_no','$id_no','$id_no','$Group_ID','$Now','$Default') ";
    //             $result = mysqli_query($conn,$cmd);
    //         }


    //     } else {
    //         // +++ Transaction IN +++

    //         $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //         $cmd = $cmd . "(null,'$id_no','$id_no','$id_no','$Group_ID','$Now','$Default') ";
    //         $result = mysqli_query($conn,$cmd);
    //         echo "insert 3";
    //     }
    // }

    // echo "$diff_time";

}


if ($_POST['insert'] == "insert_register_1") {
    // echo 'insert รายการที่มีในการลงทะเบียน แจ้งรอบที่ลงทะเบียน';

       $x = mysqli_escape_string($conn,$_POST['id_no']);

    // if($data){
    //     $XID = mysqli_escape_string($conn, $_POST['id_no']);
    // }else{
    //     $XID = mysqli_escape_string($conn, $_POST['no_name']);
    // }
    $in      = mysqli_escape_string($conn, $_POST['in']);
    $out     = mysqli_escape_string($conn, $_POST['out']);

    $cmd = mysqli_query($conn, " SELECT * FROM register_bose WHERE i_number ='$x' ");
   $rs = mysqli_fetch_assoc($cmd);
       $x_1 = $rs['i_number'];
    if ($in == "in") {

        $cmd    = "SELECT * FROM trans_db WHERE Barcode_ID = '$x' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
        $result = mysqli_query($conn, $cmd);
        $rs     = mysqli_fetch_array($result);
        $sq =  $rs['Track_In'];

        $date_time =  date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($sq)));

        if (strtotime($date_time) <= strtotime($Now) or (strtotime($rs['Track_Out']) != strtotime($Default))) {

            $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
                $cmd = $cmd."(null,'$x_1','$x_1','$x_1','2','$Now','$Default') ";
                $result = mysqli_query($conn,$cmd);

        }
    } elseif ($out == "out") {

        $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$x_1' AND Track_Out='$Default' ";
        $result = mysqli_query($conn, $cmd) or die(mysqli_error($conn));
    }



    // $cmd = "SELECT * FROM trans_db WHERE Barcode_ID = '$XID' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
    // $result = mysqli_query($conn, $cmd);
    // while ($rs = mysqli_fetch_array($result)) {
    //     $IN = $rs["Track_In"];
    //     $OUT = $rs["Track_Out"];
    // }

    // $n = 0;
    // $cmd = mysqli_query($conn, " SELECT * FROM interest WHERE i_number='$XID'");
    // while ($rs = mysqli_fetch_assoc($cmd)) {
    //     $n++;
    //     $id_no = $rs['i_number'];
    // }

    // if ($n > 0) {

    //     $cmd = "SELECT * FROM trans_db WHERE Barcode_ID='$XID' AND Track_In LIKE '$Today%' ORDER BY No DESC LIMIT 1 ";
    //     $result = mysqli_query($conn, $cmd);
    //     while ($rs = mysqli_fetch_array($result)) {
    //         $IN = $rs["Track_In"];
    //         $OUT = $rs["Track_Out"];
    //     }
    //     if (strtotime($OUT) == strtotime($Default)) {
    //         // +++ Transaction OUT +++
    //         $to_time = strtotime($Now);
    //         $from_time = strtotime($IN);
    //         $diff_time = round(abs($to_time - $from_time) / 60, 2);

    //         if ($diff_time > 1) {
    //             $cmd = "UPDATE trans_db SET Track_Out='$Now' WHERE Barcode_ID='$XID' AND Track_Out='$Default' ";
    //             $result = mysqli_query($conn, $cmd);
    //         } else {
    //             // +++ Transaction IN +++
    //             echo "insert 2";
    //             $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //             $cmd = $cmd."(null,'$id_no','$id_no','$id_no','2','$Now','$Default') ";
    //             $result = mysqli_query($conn,$cmd);
    //         }
    //     } else {
    //         // +++ Transaction IN +++
    //         echo "insert 3";
    //         $cmd = " INSERT INTO trans_db (No,Tag_Name,Barcode_ID,QR_ID,Group_ID,Track_In,Track_Out) VALUES ";
    //         $cmd = $cmd . "(null,'$id_no','$id_no','$id_no','2','$Now','$Default') ";
    //         $result = mysqli_query($conn, $cmd);
    //     }
    // }

    // echo "$diff_time";
}

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
    // echo "$diff_time";
?>
