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
    <div class="container  h-75">
        <div class="row justify-content-around">
            <div class="col-md-8  my-5">
                <div class="card box">
                    <div class="card-header">
                        <h5>เพิ่มเวลาเข้าโบสถ์แขกที่มาเยี่ยมชม</h5>
                    </div>
                    <div class="card-body">
                        <form id="insert_visitor_time">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-right">เลือกวันที่</label>
                                <div class="col-sm-9 input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="c_date" data-target="#datetimepicker4" placeholder="เลือกวันที่ที่ต้องการให้เข้าโบสถ์" />
                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-right">เวลาเข้าโบสถ์รอบที่ 1</label>
                                <div class="col-sm-6">
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="c_time_1" value="08:30" data-target="#datetimepicker3" placeholder="เวลาเข้าโบสถ์รอบที่ 1" />
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="c_quantity_1" class="form-control" placeholder="ระบุจำนวนที่นั่ง">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-right">เวลาเข้าโบสถ์รอบที่ 2</label>
                                <div class="col-sm-6">
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="c_time_2" value="10:30" data-target="#datetimepicker2" placeholder="เวลาเข้าโบสถ์รอบที่ 2" />
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="c_quantity_2" class="form-control" placeholder="ระบุจำนวนที่นั่ง">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="reset" class="btn btn-light">ยกเลิก</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
                <h4>รายการลงเวลาเข้าใช้งานโบสถ์แขกที่มาเยี่ยมชม</h4>
                <table class="table table-striped text-center" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>วันที่เข้าโบสถ์</th>
                            <th>เวลาเข้าโบสถ์รอบที่ 1</th>
                            <th>จำนวนที่นั่งรอบที่ 1</th>
                            <th>เวลาเข้าโบสถ์รอบที่ 2</th>
                            <th>จำนวนที่นั่งรอบที่ 2</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = mysqli_query($conn, "SELECT * FROM visitor_time order by c_date DESC ");
                        $i = 1;
                        while ($rs = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $rs['c_date'] ?></td>
                                <td><?= $rs['c_time_1'] ?></td>
                                <td><?= $rs['c_quantity_1'] ?></td>
                                <td><?= $rs['c_time_2'] ?></td>
                                <td><?= $rs['c_quantity_2'] ?></td>
                                <td><a href="" class="btn btn-danger btn-sm del_visitor_time" data-id="<?= $rs['c_id'] ?>">ลบ</a></td>
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