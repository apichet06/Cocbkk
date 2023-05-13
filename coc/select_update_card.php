<?php require_once  'connectdb.php';
$id = $_POST['id'];


$sql = mysqli_query($conn,"SELECT * FROM card_db Where No = '$id' ");
 $rs = mysqli_fetch_assoc($sql);

 if($rs['Group_ID'] ==1){
    $gp1 = "checked";
 }else if($rs['Group_ID'] == 2){
    $gp2 = "checked";
 }
$show ='<form method="POST" action="card.php" id="update_">
    <div class="form-group">
        <label for="uname1">ชื่อบัตร</label>
        <input type="text" class="form-control rounded-0" name="txt_name" value = "'.$rs['Tag_Name'].'" placeholder="A000">
    </div>
    <div class="form-group">
        <label>Barcode ID</label>
        <input type="text" class="form-control rounded-0" name="txt_barcode" value="'.$rs['Barcode_ID'].'" placeholder="">
    </div>
    <div class="form-group">
        <label>QR Code</label>
        <input type="text" class="form-control rounded-0" name="txt_qr" valuse="'.$rs['QR_ID']. '" placeholder="">
    </div>

    <div class="form-group">
        <label>ประเภทบัตร : </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Radio1" value="1"  '.$gp1. '>
            <label class="form-check-label" for="inlineRadio1">Lotus Store</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Radio1" value="2" ' . $gp2 . '>
            <label class="form-check-label" for="inlineRadio2">Shopping Mall</label>
        </div>
    </div>
    <hr>
    <input type="hidden" name="update" value="true">
    <input type="hidden" name="id" value="'.$id.'">
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg" id="btnLogin">บันทึกข้อมูล</button>
        <button type="button" class="btn btn-light btn-lg" data-dismiss="modal">ปิด</button>
    </div>
</form>';

 $arrayName = array('data' => $show);
echo json_encode($arrayName);
?>