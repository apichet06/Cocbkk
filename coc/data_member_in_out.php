<?php
ob_start();
include("connectdb.php");

// +++ DELETE DATA +++
$Event = $_GET["del"];
$ID = $_GET["id"];
if (($Event == "true") && ($ID != "")) {
    $cmd = " SELECT * FROM member WHERE m_id='$ID' ";

    $cmd = " DELETE FROM member WHERE m_id='$ID' ";
    $result = mysqli_query($conn, $cmd);
    echo '<script>alert(" ลบข้อมูลเรียบร้อยแล้ว ");</script>';
    echo '<meta http-equiv="refresh" content="0;url=card.php" />';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $Web_Title; ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="font/stylesheet.css">
</head>

<body>

    <style>
        body {
            background-color: rgba(200, 200, 200, 0.4)
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFFF">
        <!--tips: to change the nav placement use .fixed-top,.fixed-bottom,.sticky-top-->

        <a class="navbar-brand" href="#">
            <img src="images/stgp.jpg" width="40" height="40" class="d-inline-block align-top">
        </a>
        <!--<a class="navbar-brand" href="#">
          <img src="..." class="d-inline-block align-top" width="30" height="30" alt="...">My Brand
        </a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <a class="dropdown-item" href="main.php">หน้าหลัก</a>
            </ul>

            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator <i class="fa fa-user-circle fa-lg text-success"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="card2.php">สมาชิก</a>
                        <a class="dropdown-item" href="interest.php">แขกผู้มาเยี่ยม</a>
                        <a class="dropdown-item" href="visitor.php">Visitor</a>
                        <a class="dropdown-item" href="data_member_in_out.php">สมาชิกที่ลงทะเบียนเข้า-ออกงาน</a>
                        <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- <iframe name="my_iframe" src="manage_barcode.php" style="width:0px;height:0px;border:0"></iframe> -->
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <h1 class="p-4">รายชื่อสมาชิกที่ลงทะเบียนเข้า-ออกงานแล้ว</h1>

            <div class="col-md-12 text-center ">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-light table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>รหัส</th>
                                    <th>ชื่อ</th>
                                    <th>เวลาเข้า</th>
                                    <th>เวลาออก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cmd = " SELECT * FROM trans_db a
                                INNER JOIN  member b ON a.Tag_Name = b.id_no
                                 ORDER BY Track_In DESC ";
                                $result = mysqli_query($conn, $cmd);
                                $n = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $n++;
                                ?>
                                    <tr>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $rs['id_no']; ?></td>
                                        <td><?php echo $rs["m_name"] . ' ' . $rs['m_sur']; ?></td>
                                        <td><?php echo $rs["Track_In"]; ?></td>
                                        <td><?php echo $rs["Track_Out"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax.googleapis.js"></script>

    <script>
        $(".edit").click(function(e) {
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                url: "select_update_card.php",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function(response) {
                    console.log(response.data);
                    $('#show_data').html(response.data);
                }
            });
        });

        // $(".update_02").submit(function(e) {
        //   e.preventDefault();
        //   alert("fdsfdfd");
        //   $.ajax({
        //     type: "post",
        //     url: "manages_update.php",
        //     data: $(this).serialize(),
        //     dataType: "json",
        //     success: function(response) {

        //     }
        //   });
        // });
    </script>
    <?php

    $update = $_POST['update'];

    if ($update) {

        $Card_ID    = $_POST["id"];
        $tag_name   = $_POST['txt_name'];
        $barcode_id = $_POST['txt_barcode'];
        $qr_id      = $_POST['txt_qr'];
        $grou_id    = $_POST['Radio1'];

        $sql = mysqli_query($conn, "UPDATE card_db set
Tag_Name   = '$tag_name',
Barcode_ID = '$barcode_id',
QR_ID      = '$qr_id',
Group_ID   = '$grou_id'  Where No = '$Card_ID' ") or die(mysqli_error($conn));
        if ($sql) {

            echo '<script>alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>';
            echo '<meta http-equiv="refresh" content="0;url=card.php" />';
        }
    }

    $Events = $_GET["del"];
    if ($Events == "true") {
        $Card_ID = $_GET["id"];
        $cmd = " DELETE FROM card_db WHERE No='$Card_ID' ";
        $result = mysqli_query($conn, $cmd);  ?>
        <script>
            alert(" ลบข้อมูลเรียบร้อยแล้ว ");
        </script>

    <?php } ?>

</body>

</html>