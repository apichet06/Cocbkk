  <?php session_start();
    $sql = mysqli_query($conn, "SELECT * FROM user Where u_id = '" . $_SESSION['id'] . "' ") or die(mysqli_error($conn));
    $lg = mysqli_fetch_assoc($sql);

    if ($lg['u_id'] == "") {

        echo '<meta http-equiv="refresh" content="0;url=admin.php">';
    }
    ?>
  <style>
      .box {
          -webkit-box-shadow: 0 1px 34px rgba(0, 0, 0, 0.10);
          -moz-box-shadow: 0 1px 34px rgba(0, 0, 0, 0.10);
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.10);
      }
  </style>
  <nav class="navbar navbar-expand-lg navbar-light box" style="background-color: #e3f2fd;">

      <!-- <a class="navbar-brand" href="#">LOGO</a> -->

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="index.php">หน้าหลัก</a>
          </ul>

          <ul class="navbar-nav">
              <?php if ($lg['u_name']) { ?>
 
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          เวลาเข้าโบสถ์
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="church_time.php">เวลาเข้าโบสถ์สมาชิก</a>
                          <a class="dropdown-item" href="visitor_time.php">เวลาเข้าโบสถ์แขกที่มาเยี่ยม</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="member.php">สมาชิก</a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          รายการผู้เข้าร่วม
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="member_request_church.php">สมาชิก / Member</a>
                          <a class="dropdown-item" href="visitor.php">แขกผู้มาเยี่ยม / Guest</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="log.php">Log</a>
                  </li>
              <?php  } ?>

              <li class="nav-item">
                  <?php if (!$lg['u_name']) { ?>
                      <a class="nav-link" href="admin.php">เข้าสู่ระบบ</a>
                  <?php  } else { ?>
                      <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                  <?php  } ?>
              </li>
          </ul>
      </div>
  </nav>