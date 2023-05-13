<?php
require_once 'conn.php';

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=รายการสมาชิกขอเข้าโบสถ์ " . date('YmdHis') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<table width="100%" border="1" align="center">
    <thead class="thead-light">
        <tr>
            <th colspan="5">รายการสมาชิกขอเข้าโบสถ์</th>
        </tr>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสมาชิก</th>
            <th>ชื่อ-สกุล</th>
            <th>วันที่</th>
            <th>รอบที่1/เวลา</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_no  = $_GET['id_no'];
        $c_date = $_GET['c_date'];
        $around = $_GET['around'];
        $sql = mysqli_query($conn, "SELECT * FROM register_bose a
                        INNER JOIN member b ON a.id_no = b.id_no
                        Where (a.id_no like '%$id_no%') and a.c_date like '%$c_date%' and a.around like '%$around%'");
        $i = 1;
        while ($rs = mysqli_fetch_assoc($sql)) {
            $date = strtotime($rs['c_date']);
            if (!$rs['i_number']) {

        ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $rs['id_no'] ?></td>
                    <td><?= $rs['m_name'] . ' ' . $rs['m_sur'] ?></td>
                    <td><?= thai_date($date); ?></td>
                    <td><?= $rs['around'] == "" ? "" : 'รอบที่ ' . $rs['around'] ?><?= ' เวลา ' . $rs['c_time'] ?></td>

                </tr>
        <?php $i++;
            }
        }

        ?>
    </tbody>
</table>