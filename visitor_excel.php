<?php
require_once 'conn.php';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=รายการแขกผู้มาเยี่ยม " . date('YmdHis') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<table class="table table-bordered my-2 " border="1">
    <thead class="thead-light">
        <tr>
            <th colspan="5">รายการแขกผู้มาเยี่ยม</th>
        </tr>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสมาชิก</th>
            <th>ชื่อ-สกุล</th>
            <th>วันที่</th>
            <th>รอบที่/เวลา</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_no  = $_GET['id_no'];
        $c_date = $_GET['c_date'];
        $around = $_GET['around'];
        $sql = mysqli_query($conn, "SELECT * FROM register_bose a
                        inner JOIN interest c ON a.i_number = c.i_number
                        Where  (a.i_number like '%$id_no%') and a.c_date like '%$c_date%' and  a.around like '%$around%'
                        Group by a.i_number");
        $i = 1;
        while ($rs = mysqli_fetch_assoc($sql)) {
            $date = strtotime($rs['c_date']);
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $rs['i_number'] ?></td>
                <td>คุณ<?= $rs['i_name'] ?></td>
                <td><?= thai_date($date); ?></td>
                <td><?= $rs['around'] == "" ? "" : 'รอบที่ ' . $rs['around'] ?><?= ' เวลา ' . $rs['c_time'] ?></td>

            </tr>
        <?php $i++;
        } ?>
    </tbody>
</table>