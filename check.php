<?php require_once 'conn.php';


$c_date = mysqli_escape_string($conn, $_POST['c_date']);
$id_no = mysqli_escape_string($conn, $_POST['id_no']);
$sql = mysqli_query($conn, "SELECT * FROM register_bose a
INNER JOIN member b
ON a.m_id = b.m_id
Where c_date  = '$c_date' and b.id_no = '$id_no'
Group by a.m_id");

$sql_ = mysqli_query($conn, "SELECT * FROM register_bose a
INNER JOIN member b
ON a.m_id = b.m_id
Where c_date  = '$c_date' and b.id_no = '$id_no'
Group by a.m_id");
$rs_ = mysqli_fetch_assoc($sql_);

echo '<hr><h4 class="text-center"> คุณ' . $rs_['m_name'] .'</h4>';

?>

<table class="table table-striped text-light">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>วันที่</th>
            <th>รอบ</th>
            <th>เวลา</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        while ($rs = mysqli_fetch_assoc($sql)) {
            $c_date = strtotime($rs['c_date']); ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= thai_date($c_date) ?></td>
                <td><?= $rs['around'] ?></td>
                <td><?= $rs['c_time'] ?></td>
            </tr>
        <?php $i++;
        } ?>

    </tbody>
</table>