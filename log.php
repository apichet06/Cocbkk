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
            <div class="col-md-12 p-4">

                <h4>log การใช้งานระบบ</h4>
                <hr>
                <table class="table table-striped" id="example">
                    <thead class="align-middle text-nowrap">
                        <tr>
                            <th>ลำดับ</th>
                            </th>
                            <th class="text-center">รายละเอียด</th>
                            <th>---- สถานะ ----</th>
                            <th>วันเวลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = mysqli_query($conn, "SELECT * FROM log order by l_date DESC ");
                        $i = 1;
                        while ($rs = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td class="text-right"><?= $i ?>.</td>
                                <td><?= $rs['l_text'] ?></td>
                                <td><?= $rs['l_status'] ?></td>
                                <td><?= $rs['l_date'] ?></td>
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

    <script type="text/javascript">
        $(function() {
            $('#example').DataTable();

        });
    </script>
</body>

</html>