<!DOCTYPE html>

<html lang="en">





<head>

    <?php require_once 'conn.php'; ?>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="font/stylesheet.css" />

    <title><?= $title ?></title>

    <style>
        html {

            background: url(img/register_page2.png) no-repeat center center fixed;

            background-size: cover;

            height: 100%;

            overflow: hidden;

            display: block;



        }



        body {

            background-color: transparent;

        }



        .bg {

            background-color: #EB125F;

            border-radius: 8% / 50%;

            color: #FFFFFF;

            position: absolute;

            margin: 100px;

        }



        .bg_c {

            background-color: #EB125F;

            border-radius: 25px;

            color: #FFFFFF;

            position: absolute;



        }



        /* Small devices (landscape phones, 576px and up) */

        @media (min-width: 576px) {

            .mgd {

                width: 75%;

                height: 50px;

                position: absolute;

                top: 45%;

                left: 50%;

                margin-top: -60px;

                margin-left: -100px;

                font-size: 26px;

            }

        }



        /* // Medium devices (tablets, 768px and up) */

        @media (min-width: 768px) {

            .mgd {

                width: 75%;

                height: 50px;

                position: absolute;

                top: 45%;

                left: 50%;

                margin-top: -60px;

                margin-left: -100px;

                font-size: 26px;

            }

        }



        /* // Large devices (desktops, 992px and up) */

        @media (min-width: 992px) {

            .mgd {

                width: 75%;

                height: 50px;

                position: absolute;

                top: 45%;

                left: 50%;

                margin-top: -60px;

                margin-left: -100px;

                font-size: 26px;

            }

        }



        /* // Extra large devices (large desktops, 1200px and up) */

        @media (min-width: 1200px) {

            .mgd {

                width: 400px;

                height: 50px;

                position: absolute;

                top: 45%;

                left: 60%;

                margin-top: -60px;

                margin-left: -100px;

                font-size: 26px;

            }

        }



        @media all and (max-width:30em) {

            .mgd {

                width: 300px;

                height: 50px;

                position: absolute;

                top: 45%;

                left: 0%;

                margin-top: -60px;

                margin-left: 0 auto;

                font-size: 26px;



            }

        }





        .mb {

            padding: 10px;

            /*height: 100vh;*/

            text-align: center;

        }



        .bg_m {

            background-color: #EB125F;

            border-radius: 50px;

            color: #FFFFFF;

            margin-top: 20px;

            margin-bottom: 20px;

            font-size: 1.5em;

        }



        .font1 {

            color: white;

            font-weight: bolder;

        }

        .font2 {

            color: white;

        }
    </style>

</head>



<body>

    <button type="submit" data-toggle="modal" data-toggle="modal" data-target="#myModal" class="btn bg btn-block mgd d-none d-lg-block d-md-block">ลงทะเบียนร่ามรอบนมัสการ</button>

    <button type="submit" class="btn bg btn-block mgd d-none d-lg-block d-md-block" data-toggle="modal" data-target="#check">ตรวจสอบสิทธิ์ที่จองไว้</button>





    <div class="mb d-block d-lg-none d-md-none">

        <img src="coc/images/coc_logo2.png" style="margin-bottom: 50px;" width="25%">

        <h1 class="font1">REGISTER</h1>

        <h4 class="font2">ระบบลงทะเบียนเข้าร่วมรอบนมัสการ</h4>

        <button type="submit" data-toggle="modal" data-toggle="modal" data-target="#myModal" class="btn bg_m btn-block d-block d-lg-none d-md-none">ลงทะเบียนร่ามรอบนมัสการ</button>

        <button type="submit" class="btn bg_m btn-block d-block d-lg-none d-md-none" data-toggle="modal" data-target="#check">ตรวจสอบสิทธิ์ที่จองไว้</button>

    </div>



    <?php require_once  'modal.php'; ?>

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