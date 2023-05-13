<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="font/stylesheet.css" />
    <?php require_once 'conn.php'; ?>
    <title><?= $title ?></title>
    <style>

    </style>
</head>

<body>
    <?php require_once 'menu.php' ?>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12  my-5">
                <form method="post">
                    <div class="container">
                        <div class="row justify-content-around">
                            <div class="col-md-3">
                                <input type="text" name="id_no" class="form-control" placeholder="MXXXXXX">
                            </div>
                            <div class="col-sm-3 input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="c_date" data-target="#datetimepicker4" placeholder="เลือกวันที่เข้าโบส์" />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <select id="my-select" class="form-control" name="around">
                                    <option value="">-- เลือกรอบ --</option>
                                    <option value="1">รอบที่ 1</option>
                                    <option value="2">รอบที่ 2</option>
                                </select>

                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info">ค้นหาข้อมูล</button>
                            </div>
                            <div class="col-md-12" id="show_data_check">

                            </div>
                        </div><br>
                    </div>

                </form>
            </div>
            <div class="col-md-12">
                <h4>รายการสมาชิกขอเข้าโบสถ์</h4>
                <hr>
                <table class="table table-bordered my-2 " id="example">
                    <thead class="thead-light">
                        <tr>
                            <th>ลำดับ</th>
                            <th>รหัสมาชิก</th>
                            <th>ชื่อ-สกุล</th>
                            <th>วันที่</th>
                            <th>รอบที่1/เวลา</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_no  = $_POST['id_no'];
                        $c_date = $_POST['c_date'];
                        $around = $_POST['around'];
                        $sql = mysqli_query($conn, "SELECT * FROM register_bose a
                        LEFT JOIN member b   ON a.m_id = b.m_id
                        Where (b.id_no like '%$id_no%') and a.c_date like '%$c_date%' and  a.around like '%$around%'
                        Group by a.m_id");
                        $i = 1;
                        while ($rs = mysqli_fetch_assoc($sql)) {
                            $date = strtotime($rs['c_date']);
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $rs['id_no'] ?></td>
                                <td>คุณ<?= $rs['m_name'] . ' ' . $rs['m_sur']?></td>
                                <td><?= thai_date($date); ?></td>
                                <td><?= $rs['around'] == "" ? "" : 'รอบที่ ' . $rs['around'] ?><?= ' เวลา ' . $rs['c_time'] ?></td>
                                <td><a href="#" class="btn btn-danger btn-sm del_mem" data-id = "<?=$rs['m_id']?>">DEL</a></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="java.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker4').datetimepicker({
                format: 'L',
                format: 'YYYY-MM-DD'
            });
            $('#datetimepicker3,#datetimepicker2').datetimepicker({
                format: 'LT',
                format: 'HH:mm'
            });

            $('#example').DataTable();

        });
    </script>
</body>

</html>