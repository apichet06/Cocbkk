<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
            <div class="col-md-9  my-5">

                <div class="card box">
                    <div class="card-header">
                        <h5>เพิ่มสมาชิก</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible fade " role="alert">
                            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="insert_member">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">รหัสสมาชิก :</label>
                                <?php $sql = mysqli_query($conn,"SELECT * FROM member");

                                ?>
                                <div class="col-sm-10">
                                    <input type="text" name="id_no" class="form-control" placeholder="รหัสสมาชิก">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">ชื่อ-สกุล :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="m_name" class="form-control" placeholder="ชื่อ">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="m_sur" class="form-control" placeholder="สกุล">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nick_name" class="form-control" placeholder="ชื่อเล่น">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">โซน :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="zone" class="form-control" placeholder="โซน">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">พื้นที่ :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="area" class="form-control" placeholder="พื้นที่">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">สถานะ :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="status">
                                        <option value="">--- สถานะ ---</option>
                                        <?php $sql = mysqli_query($conn, "SELECT * From member group by status");
                                        while ($rs = mysqli_fetch_assoc($sql)) { ?>
                                            <option value="<?= $rs['status'] ?>"><?= $rs['status'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
                <h4><u>รายการสมาชิก</u></h4>
                <table class="table table-bordered" id="example">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>#</th>
                            <th>รหัสสมาชิก</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ชื่อเล่น</th>
                            <th>โซน</th>
                            <th>พื้นที่</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = mysqli_query($conn, "SELECT * From member order by m_id desc");
                        $i = 1;
                        while ($rs = mysqli_fetch_assoc($sql)) { ?>
                            <tr class="text-center">
                                <td><?= $i; ?></td>
                                <td><?= $rs['id_no'] ?></td>
                                <td><?= $rs['m_name'] . ' ' . $rs['m_sur'] ?></td>
                                <td><?= $rs['nick_name'] ?></td>
                                <td><?= $rs['zone'] ?></td>
                                <td><?= $rs['area'] ?></td>
                                <td><?= $rs['status'] ?></td>
                                <td><a href="" class="btn btn-warning btn-sm edit_member" data-id="<?= $rs['m_id'] ?>" data-id_no="<?= $rs['id_no'] ?>" data-m_name="<?= $rs['m_name'] ?>" data-m_sur="<?= $rs['m_sur'] ?>" data-nick_name="<?= $rs['nick_name'] ?>" data-zone="<?= $rs['zone'] ?>" data-area="<?= $rs['area'] ?>" data-status="<?= $rs['status'] ?>" data-toggle="modal" data-target="#update_member">แก้ไข</a>
                                    <a href="" class="btn btn-danger btn-sm del" data-id="<?= $rs['m_id'] ?>">ลบ</a></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>

    <?php require_once 'modal.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="java.js"> </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
</body>

</html>