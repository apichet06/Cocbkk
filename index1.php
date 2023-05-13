<!doctype html>
<html lang="en">
<?php require_once 'conn.php'; ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font/stylesheet.css" />
    <title><?= $title ?></title>

</head>

<body style="background-color:#fcfcfc; height:100vh;">

    <?php require_once 'menu.php'; ?>
    <div class="container h-75">
        <div class="row align-items-center h-100">
            <div class="col-md-6 mx-auto ">
                <div class="jumbotron box">
                    <button type="button" data-toggle="modal" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block btn-lg box">ลงทะเบียนร่วมประชุม</button>
                    <button type="button" class="btn btn-info btn-block btn-lg box" data-toggle="modal" data-target="#check">ตรวจสอบสิทธิ์ที่จองไว้</button>
                </div>
            </div>
        </div>
    </div>

    <?php require_once  'modal.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="java.js"></script>
    <script>
        $('#datetimepicker4').datetimepicker({
            format: 'L',
            format: 'YYYY-MM-DD'
        });
    </script>

</body>

</html>