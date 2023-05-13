<?php  session_start(); require_once 'conn.php';

    $sql = mysqli_query($conn, "SELECT * FROM user Where u_id = '" . $_SESSION['id'] . "' ") or die(mysqli_error($conn));
    $lg = mysqli_fetch_assoc($sql);
    // if(!$lg['u_id']){
    //     header('Location: admin.php');
    // }

  $m_id      = mysqli_escape_string($conn,$_POST['m_id']);
  $id_no     = mysqli_escape_string($conn,$_POST['id_no']);
  $m_name    = mysqli_escape_string($conn,$_POST['m_name']);
  $nick_name = mysqli_escape_string($conn,$_POST['nick_name']);
  $m_sur     = mysqli_escape_string($conn,$_POST['m_sur']);
  $zone      = mysqli_escape_string($conn,$_POST['zone']);
  $area      = mysqli_escape_string($conn,$_POST['area']);
  $status    = mysqli_escape_string($conn,$_POST['status']);
  $date      = date("Y-m-d");

  if($_POST['insert_member'] =="insert_member"){

  $sql_ = mysqli_query($conn,"SELECT * FROM member Where id_no = '$id_no' ");
  $rows  = mysqli_num_rows($sql_);
  if($row >=1){
     $show = 2;
  }else{

  $sql = mysqli_query($conn, "INSERT INTO member(id_no,m_name,m_sur,nick_name,status,zone,area,m_date)
  values('$id_no','$m_name','$m_sur','$nick_name','$status','$zone','$area','$date')")or die(mysqli_error($conn));

    // เก็บ log
    $d_time = date("Y-m-d H:i:s");
    $l_text = "เพิ่มสมาชิกรหัส " . $id_no . " เวลา " .date('Y/m/d H:i:s') .' โดย '.$lg['u_name'];
    $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','เพิ่มสมาชิก','$d_time')");
    // --->

  if($sql){
    $show = 1;
  }else{
    $show = 0;
  }
}
  $data = array('data' => $show );
  echo json_encode($data);
}


if($_POST['update_member'] == "update_member"){

    $sql_ = mysqli_query($conn, "SELECT * FROM member Where id_no = '$id_no' ");
    $rows  = mysqli_num_rows($sql_);

    if ($row >= 1) {

        $show = 2;

    } else {

    $sql = mysqli_query($conn,"UPDATE member set
    id_no = '$id_no',
    m_name = '$m_name',
    m_sur = '$m_sur',
    nick_name ='$nick_name',
    status ='$status',
    zone = '$zone',
    area = '$area'
     Where m_id = '$m_id' ")or die(mysqli_error($conn));

    // เก็บ log
    $d_time = date("Y-m-d H:i:s");
    $l_text = "แก้ไขสมาชิกรหัส " . $id_no . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
    $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','แก้ไขสมาชิก','$d_time')");
    // --->

        if ($sql) {
            $show = 1;
        } else {
            $show = 0;
        }

    $data = array('data' => $show);
    echo json_encode($data);

    }

}

if($_POST['del'] == "del"){

    $sql = mysqli_query($conn,"DELETE  FROM member Where m_id = '$m_id' ");

  // เก็บ log
  $d_time = date("Y-m-d H:i:s");
  $l_text = "ลบสมาชิกรหัส " . $m_id . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
  $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลบสมาชิก','$d_time')");
  // --->

        if($sql){
        $show = 1;
        } else{
        $show = 0;
        }
    $data = array('data' => $show);
    echo json_encode($data);
}


/* insert ข้อมูล เวลาเข้าใช้งานโบสถ์ */

$c_id           = mysqli_escape_string($conn, $_POST['c_id']);
$c_date         = mysqli_escape_string($conn, $_POST['c_date']);
$c_time_1       = mysqli_escape_string($conn, $_POST['c_time_1']);
$c_quantity_1   = mysqli_escape_string($conn, $_POST['c_quantity_1']);
$c_time_2       = mysqli_escape_string($conn, $_POST['c_time_2']);
$c_quantity_2   = mysqli_escape_string($conn, $_POST['c_quantity_2']);


if($_POST['insert_church_time'] == "insert_church_time"){

  $sql_  = mysqli_query($conn, "SELECT * FROM church_time WHERE c_date = '$c_date' ");
  $row   = mysqli_num_rows($sql_);
  if ($row >= 1) {
    $show = 10;

  } else {

    $sql = mysqli_query($conn, "INSERT INTO church_time (c_date,	c_time_1,c_quantity_1,c_time_2,c_quantity_2,c_date_time)VALUES('$c_date','$c_time_1','$c_quantity_1','$c_time_2','$c_quantity_2','$date')");

    // เก็บ log
    $d_time = date("Y-m-d H:i:s");
    $l_text = "เพิ่มเวลา " .$c_date." เวลา ".$c_time_1." จำนวนที่นั่ง ".$c_quantity_1." เวลา ".$c_time_2." จำนวนที่นั่ง ".$c_quantity_2." เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
    $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','เพิ่มเวลา','$d_time') ");
  // --->

    if ($sql) {
      $show = 1;
    } else {
      $show = 0;
    }
  }
  $data = array('data' => $show );
 echo json_encode($data);

}

if ($_POST['insert_visitor_time'] == "insert_visitor_time") {

  $sql_  = mysqli_query($conn, "SELECT * FROM visitor_time WHERE c_date = '$c_date' ");
  $row   = mysqli_num_rows($sql_);
  if ($row >= 1) {
    $show = 10;
  } else {

    $sql = mysqli_query($conn, "INSERT INTO visitor_time(c_date,c_time_1,c_quantity_1,c_time_2,c_quantity_2,c_date_time)VALUES('$c_date','$c_time_1','$c_quantity_1','$c_time_2','$c_quantity_2','$date')");

    // เก็บ log
    $d_time = date("Y-m-d H:i:s");
    $l_text = "เพิ่มเวลาแขกที่มาเยี่ยม " . $c_date . " เวลา " . $c_time_1 . " จำนวนที่นั่ง " . $c_quantity_1 . " เวลา " . $c_time_2 . " จำนวนที่นั่ง " . $c_quantity_2 . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
    $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','เพิ่มเวลา','$d_time') ");
    // --->

    if ($sql) {
      $show = 1;
    } else {
      $show = 0;
    }
  }
  $data = array('data' => $show);
  echo json_encode($data);
}


if($_POST['del'] == 'del_time'){



   $sql_ = mysqli_query($conn,"SELECT * FROM church_time WHERE c_id ='$c_id' ");
   $rs = mysqli_fetch_assoc($sql_);
  // เก็บ log
  $d_time = date("Y-m-d H:i:s");
  $l_text = "ลบเวลา " . $rs['c_date'] . " เวลา " . $rs['c_time_1'] . " จำนวนที่นั่ง " . $rs['c_quantity_1'] . " เวลา " . $rs['c_time_2'] . " จำนวนที่นั่ง " . $rs['c_quantity_2'] . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
  $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลบเวลา','$d_time')");
  // --->
  $sql = mysqli_query($conn, "DELETE FROM church_time WHERE c_id ='$c_id' ");

    if($sql){

      $show = 1;

    }else{

      $show = 2;

    }

    $data = array('data' => $show);
    echo json_encode($data);

}

if ($_POST['del'] == 'del_visitor_time') {

  $sql_ = mysqli_query($conn, "SELECT * FROM visitor_time WHERE c_id ='$c_id' ");
  $rs_ = mysqli_fetch_assoc($sql_);
  // เก็บ log
  $d_time = date("Y-m-d H:i:s");
  $l_text = "ลบเวลาลงทะเบียนของแขกผู้มาเยี่ยม" . $rs_['c_date'] . " เวลา " . $rs_['c_time_1'] . " จำนวนที่นั่ง " . $rs_['c_quantity_1'] . " เวลา " . $rs_['c_time_2'] . " จำนวนที่นั่ง " . $rs_['c_quantity_2'] . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
  $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลบเวลา','$d_time')");
  // --->
  $sql = mysqli_query($conn, "DELETE FROM visitor_time WHERE c_id ='$c_id' ");

  if ($sql) {

    $show = 1;

  } else {

    $show = 2;

  }

  $data = array('data' => $show);
  echo json_encode($data);
}



    $m_id   = mysqli_escape_string($conn,$_POST['m_id']);
    $id_no  = mysqli_escape_string($conn, $_POST['id_no']);
    $c_date = mysqli_escape_string($conn,$_POST['c_date']);
    $around = mysqli_escape_string($conn,$_POST['around']);

    if($_POST['insert'] === "insert_register_bose"){
       $data = explode(",",$around);

       $sql0 = mysqli_query($conn,"SELECT * From register_bose  Where m_id = '$m_id' and c_date ='$c_date' and c_time ='$data[1]' and around ='$data[0]'");
        $row = mysqli_num_rows($sql0);

 if($row >= "1"){

   $show = 10;

 }else{

    $sql03 = mysqli_query($conn, "SELECT c_time_1,c_time_2 ,c_quantity_1,c_quantity_2  FROM church_time WHERE c_date ='$c_date' ");
    $rs03  = mysqli_fetch_assoc($sql03);

    $sql01 = mysqli_query($conn, "SELECT count(c_date)as qty1 FROM register_bose b Where c_date = '$c_date' and around = 1 and i_number =''");
    $sql02 = mysqli_query($conn, "SELECT count(c_date)as qty2 FROM register_bose b Where c_date = '$c_date' and around = 2 and i_number =''");
    $sum1  = mysqli_fetch_assoc($sql01);
    $sum2  = mysqli_fetch_assoc($sql02);

    if ($data[0]==1 and $sum1['qty1'] >= $rs03['c_quantity_1']){
      $show = 00;
    }elseif ($data[0]==2 and $sum2['qty2'] >= $rs03['c_quantity_2']) {
      $show = 00;
    }else{

     $sql = mysqli_query($conn, "INSERT INTO register_bose(m_id,id_no,c_date,c_time,around)VALUES('$m_id','$id_no','$c_date','$data[1]','$data[0]')");

      // เก็บ log
      $d_time = date("Y-m-d H:i:s");
      $l_text = "ลงทะเบียนเข้านมัสการสมาชิก รหัส " . $id_no . " เวลา " . date('Y/m/d H:i:s');
      $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลงทะเบียน','$d_time')");
    // --->

     if($sql){
       $show = 1;
     }else {
       $show = 0;
     }

    $sql_ = mysqli_query($conn, "SELECT * FROM register_bose a
    INNER JOIN member b
    ON a.m_id = b.m_id
    Where a.m_id = '$m_id' and c_date ='$c_date' and c_time ='$data[1]' and around ='$data[0]' ")or die(mysqli_error($conn));
    $r = mysqli_fetch_assoc($sql_);

    $name   = $r['m_name'].' '.$r['m_sur'];
    $c_date = strtotime($r['c_date']);
    $c_time = $r['c_time'];
    $around = $r['around'];

     }
   }
  $data = array('data' => $show, 'name' => $name, 'date' => thai_date($c_date), 'time' => $c_time, 'around' => $around);
  echo json_encode($data);
  }

if($_POST['insert_person'] == "insert_person"){
  $i_name       = mysqli_escape_string($conn,$_POST['i_name']);
  $tel          = mysqli_escape_string($conn,$_POST['tel']);
  $name_suggest = mysqli_escape_string($conn,$_POST['name_suggest']);
  $date_1       = mysqli_escape_string($conn,$_POST['date_1']);
  $around       = mysqli_escape_string($conn,$_POST['around']);
  $date         = date("Y-m-d");
  $i_around     = explode(",", $around);

  $code = "I";
  $sql_ = "SELECT MAX(i_number) AS last_id FROM interest";
  $qry = mysqli_query($conn,$sql_) or die(mysqli_error($conn));
  $rs = mysqli_fetch_assoc($qry);
  $maxId = substr($rs['last_id'], -5);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
if($maxId==""){
    $nextId ="I10001";
}else{
  $maxId = ($maxId + 1);
  $maxId = substr("00000" . $maxId, -5);
  $nextId = $code.$maxId;
}

  $sql0 = mysqli_query($conn, "SELECT * From interest  Where i_name = '$i_name' and i_date ='$date_1' and i_time ='$i_around[1]' and i_around ='$i_around[0]'");
  $row = mysqli_num_rows($sql0);

  if ($row >= "1") {

    $show = 10;

  } else {

    $sql03 = mysqli_query($conn, "SELECT c_time_1,c_time_2 ,c_quantity_1,c_quantity_2  FROM church_time WHERE c_date ='$date_1' ");
    $rs03  = mysqli_fetch_assoc($sql03);

    $sql01 = mysqli_query($conn, "SELECT count(c_date)as qty1 FROM register_bose b Where c_date = '$date_1' and around = 1  and i_number !='' ");
    $sql02 = mysqli_query($conn, "SELECT count(c_date)as qty2 FROM register_bose b Where c_date = '$date_1' and around = 2  and i_number !='' ");
    $sum1  = mysqli_fetch_assoc($sql01);
    $sum2  = mysqli_fetch_assoc($sql02);

    if ($i_around[0]== 1 and $sum1['qty1'] >= $rs03['c_quantity_1']) {
      $show = 00;
    } elseif ($i_around[0] == 2 and $sum2['qty2'] >= $rs03['c_quantity_2']) {
      $show = 00;
    } else {

      $sql = mysqli_query($conn, "INSERT INTO register_bose(i_number,c_date,c_time,around)
      VALUES('$nextId','$date_1','$i_around[1]','$i_around[0]')") or die(mysqli_error($conn));

   $sql = mysqli_query($conn, "INSERT INTO interest(i_name,i_number,tel,name_suggest,i_date,i_around,i_time,date)
   VALUES('$i_name','$nextId','$tel','$name_suggest','$date_1','$i_around[0]','$i_around[1]','$date')")or die(mysqli_error($conn));


      // เก็บ log
      $d_time = date("Y-m-d H:i:s");
      $l_text = "ลงทะเบียนเข้านมัสการแขก ชื่อ" . $i_name . " เวลา " . date('Y/m/d H:i:s');
      $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลงทะเบียน','$d_time')");
    // --->

  if($sql){

  $show = 1;

  }else{

  $show = 0;

  }
    }
 }
  $arrayName = array('data' => $show,'name' => $i_name,'date'=> thai_date(strtotime($date_1)), 'around' => $i_around[0],'time' => $i_around[1] );
  echo json_encode($arrayName);

}

if($_POST['del'] == "del_mem"){

  $id = mysqli_escape_string($conn,$_POST['id']);


  $sql = mysqli_query($conn, "DELETE FROM register_bose WHERE m_id = '$id'");

 $sql_ = mysqli_query($conn,"SELECT id_no FROM register_bose Where m_id = '$id' ");
 $rs   = mysqli_fetch_assoc($sql_);
  // เก็บ log
  $d_time = date("Y-m-d H:i:s");
  $l_text = "ลบรายการทะเบียนเข้านมัสการรหัส " . $rs['id_no'] . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
  $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลบการลงทะเบียน','$d_time')");
    // --->

  if($sql){
   $show = 1;
  }else {
    $show = 0;
  }

$arrayName = array('data' => $show );
echo json_encode($arrayName);
}

if($_POST['del'] == "del_visitor"){

  $id = mysqli_escape_string($conn, $_POST['id']);

  $sql = mysqli_query($conn, "DELETE FROM interest WHERE i_number = '$id' ");
  $sql = mysqli_query($conn, "DELETE FROM register_bose WHERE i_number = '$id'");

  $sql_ = mysqli_query($conn, "SELECT id_no FROM register_bose Where m_id = '$id' ");
  $rs   = mysqli_fetch_assoc($sql_);
  // เก็บ log
  $d_time = date("Y-m-d H:i:s");
  $l_text = "ลบรายการทะเบียนเข้านมัสการแขกมาเยี่ยม รหัส " . $rs['id_no'] . " เวลา " . date('Y/m/d H:i:s') . ' โดย ' . $lg['u_name'];
  $sql = mysqli_query($conn, "INSERT INTO log (l_text,l_status,l_date)VALUES('$l_text','ลบการลงทะเบียน','$d_time')");
    // --->

  if ($sql) {
    $show = 1;
  } else {
    $show = 0;
  }

  $data = array('data' => $show);
  echo json_encode($data);

}


?>