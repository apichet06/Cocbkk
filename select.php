<?php require_once 'conn.php';
$id_no = mysqli_escape_string($conn, $_POST['id_no']);

$sql = mysqli_query($conn, "SELECT * FROM member Where id_no  like '$id_no' ");
$rs = mysqli_fetch_assoc($sql);
$date = date("Y-m-d");
if ($rs['id_no']) {
    echo '<div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">ยินดีต้อนรับ :</label>
                        <h4 class="col-sm-8 col-form-label">' . $rs['m_name'].'</h4>
                        <input type="hidden" class="form-control" name="name_" value="' . $rs['m_sur'] . ' - ' . $rs['nick_name'] . '">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">กรุณาเลือกวันที่ :</label>
                        <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="m_id" value="'.$rs['m_id']. '">
                        <input type="hidden" class="form-control" name="id_no" value="' . $rs['id_no'] . '">
                                <select class="form-control" id="c_date_search" name="c_date">
                                <option value="">--- กรุณาเลือกวันที่ ---</option>';
  $sql_  = mysqli_query($conn, "SELECT * From church_time Where c_date >= '$date' ");
  while ($rs_ = mysqli_fetch_assoc($sql_)) {
    echo '<option value="' . $rs_['c_date'] . '">' . $rs_['c_date'] . '</option>';
  }
  echo '</select>
                       </div>
                    </div>
                     <div id="data2"></div>';

} else {
    echo '<hr><div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>แจ้งเตือน!</strong> ไม่พบข้อมูลที่ค้นหา.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

//$arrayName = array('data' => $show);
//echo json_encode($arrayName);
?>

<script>
    $("#c_date_search").change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "select_date.php",
            data: {"c_date": $(this).val()},

            success: function(response) {
              $("#data2").html(response)
            }
        });
    });
</script>
