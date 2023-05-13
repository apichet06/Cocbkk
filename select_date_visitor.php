<?php  require_once 'conn.php';
$c_date = $_POST['c_date'];

if($c_date !==""){

$sql = mysqli_query($conn, "SELECT c_time_1,c_time_2 ,c_quantity_1,c_quantity_2,c_date  FROM visitor_time WHERE c_date ='$c_date' ");
$rs = mysqli_fetch_assoc($sql);
$timestamp_1 = strtotime($rs['c_time_1']);
$new_date_1 = date('h:i', $timestamp_1);
$timestamp_2 = strtotime($rs['c_time_2']);
$new_date_2 = date('h:i', $timestamp_2);
$date_1 = strtotime($rs['c_date'].' '.$rs['c_time_1']);
$date_2 = strtotime($rs['c_date'] .' '. $rs['c_time_2']);

// $sql01 = mysqli_query($conn, "SELECT d_1.c_qty1  FROM register_bose a
// left JOIN (SELECT count(b.c_date)as c_qty1 FROM register_bose b Where b.c_date = '$c_date' and b.around = 1)d_1
// on a.c_date =d_1.c_qty1
// Where a.c_date ='$c_date' ");
$sql01 = mysqli_query($conn, "SELECT count(c_date)as qty1 FROM register_bose b Where c_date = '$c_date' and around = 1 and i_number !='' ");
$sql02 = mysqli_query($conn, "SELECT count(c_date)as qty2 FROM register_bose b Where c_date = '$c_date' and around = 2 and i_number !='' ");
$sum1 = mysqli_fetch_assoc($sql01);
$sum2 = mysqli_fetch_assoc($sql02);
 $s1 = $rs['c_quantity_1'] - $sum1['qty1'];
 $s2 = $rs['c_quantity_2'] - $sum2['qty2'];
 $date_time = date('Y-m-d H:i:s');
echo '<div class="form-group row text-center text-danger bg-warning">';

// echo $date_time .' == ' . $rs['c_date'] .' '. $rs['c_time_1'];
   if(strtotime($date_time) <= $date_1){
    echo '<label class="col-sm-6 col-form-label">รอบที่ 1 เวลา: '. $new_date_1 . ' จำนวนที่นั่ง => '; if($s1 <=0){ echo "เต็ม"; }else{
    echo $s1; } echo '</label>';
    }

   if(strtotime($date_time) <= $date_2){
echo '<label class="col-sm-6 col-form-label">รอบที่ 2 เวลา: '. $new_date_2 . ' จำนวนที่นั่ง => '; if($s2 <=0){ echo "เต็ม"; }else{
    echo $s2; } echo '</label>';
   }
echo '</div>';
    if ($s1 > 0 or $s2 > 0 ) {

  echo '<div class="form-group row">
    <label class="col-sm-4 col-form-label text-right">กรุณาเลือกรอบที่ท่านต้องการ :</label>
    <div class="col-sm-8">
      <select class="form-control" name="around" required>
            <option value="">--- เลือกรอบที่ท่านต้องการ ---</option>';
  if($rs['c_time_1'] and $s1 > 0 and strtotime($date_time) <= $date_1){
    echo '<option value="1,' . $new_date_1 . '">รอบที่ 1 : ' . $new_date_1 . ' </option>';
}
if ($rs['c_time_2'] and $s2 > 0 and strtotime($date_time) <= $date_2) {
          echo '<option value="2,' . $new_date_2 . '">รอบที่ 2 : ' .  $new_date_2 .'</option>'; }
        echo '</select>
        </div>
</div>';

}
echo '<div class="modal-footer">';
if ($s1 > 0 or $s2 > 0) {
   if(strtotime($date_time) <= $date_1 or strtotime($date_time) <= $date_2){
        echo ' <button type="submit" class="btn btn-primary">Confirm</button>';
     }
  }
echo ' <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
</div>';

}
