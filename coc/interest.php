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
      <h1>ข้อมูลแขกผู้มาเยี่ยม</h1>
      <!--
      <div class="col-md-12 my-5">
        <center>
          <a class="btn btn-info" href="card_new.php" data-target="#insert_data" data-toggle="modal">[+] เพิ่มข้อมูลใหม่</a>
          <hr>
        </center>
      </div>
      -->
      <div class="col-md-12 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-light table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>ประเภท</th>
                  <th>รหัส</th>
                  <th>ชื่อ</th>
                  <th>เบอร์ติดต่อ</th>
                  <th>ผู้แนะนำ</th>
                  <th>วันที่นมันสการ</th>
                  <!--<th>ลบข้อมูล</th>-->
                </tr>
              </thead>
              <tbody>
                <?php
                $cmd = " SELECT * FROM interest WHERE i_name!='' ORDER BY i_date DESC ";
                $result = mysqli_query($conn, $cmd);
                $n = 0;
                while ($rs = mysqli_fetch_array($result)) {
                  $n++;
                  $Group_Name = "ผู้สนใจ";
                ?>
                  <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $Group_Name; ?></td>
                    <td><?php echo $rs["i_number"]; ?></td>
                    <td><?php echo $rs["i_name"]; ?></td>
                    <td><?php echo $rs["tel"]; ?></td>
                    <td><?php echo $rs["name_suggest"]; ?></td>
                    <td><?php echo $rs["i_date"]; ?> <?php echo $rs["i_time"]; ?></td>
                    <!--<td> -->
                    <!--<a class='btn btn-warning btn-sm edit' data-id="<?= $rs['m_id'] ?>" data-target="#update_data" data-toggle="modal">แก้ไข</a>
                      <a href="card.php?del=true&id=<?= $rs["m_id"]; ?>" class='btn btn-danger btn-sm' onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')">ลบ</a>-->

                    <!--<a class='btn btn-warning btn-sm edit'  href="http://samregis.com/member.php" target="_blank" >แก้ไข</a>-->

                    <!--</td>-->
                  </tr>
                <?php } ?>
              </tbody>

            </table>

          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="modal fade" id="update_data" tabindex="-1" role="dialog" aria-labelledby="update_data-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="update_dataTitle">แก้ไขข้อมูล</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <div id="show_data">

          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="insert_data" tabindex="-1" role="dialog" aria-labelledby="insert_data-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insert_dataTitle">เพิ่มข้อมูลใหม่</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="card_new.php">
            <div class="form-group">
              <label for="uname1">รหัสสมาชิก</label>
              <input type="text" class="form-control rounded-0" name="txt_name" id="uname1" placeholder="M2000x">
            </div>
            <div class="form-group">
              <label>Barcode ID</label>
              <input type="text" class="form-control rounded-0" name="txt_barcode" placeholder="">
            </div>
            <div class="form-group">
              <label>QR Code</label>
              <input type="text" class="form-control rounded-0" name="txt_qr" placeholder="">
            </div>

            <div class="form-group">
              <label>ประเภทบัตร : </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Radio1" id="inlineRadio1" value="1" checked>
                <label class="form-check-label" for="inlineRadio1">Member</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Radio1" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">Visitor</label>
              </div>
            </div>
            <hr>
            <input type="hidden" id="txt_summit" name="txt_summit" value="true">
            <div class="text-center">
              <button type="submit" class="btn btn-success btn-lg" id="btnLogin">บันทึกข้อมูล</button>
              <button type="button" class="btn btn-light btn-lg" data-dismiss="modal">ปิด</button>
            </div>
          </form>
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