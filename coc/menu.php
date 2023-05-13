<?php session_start();
$sql_ = mysqli_query($conn, "SELECT * FROM user Where u_id = '" . $_SESSION["id"] . "' ");
$rs_ = mysqli_fetch_array($sql_);
if (!$rs_['u_id']) {
    header('Location: index.php');
}
?>

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
            <li class="nav-item active">
                <!--<form class="form-inline  my-lg-0 my-3">-->
                <form id="myForm" name="myForm" method="post" onsubmit="myFunction(); return false">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-barcode"></i></span>
                        </div>
                        <input class="form-control font_thai bar_code" name="bar_code" id="bar_code" type="text" placeholder="สแกนบาร์โค้ดเพื่อลงทะเบียน" style="width: 60rem;" autocomplete="off">
                        <div class="form-check form-check-inline">
                            &nbsp; &nbsp; &nbsp;
                            <input class="form-check-input in" type="radio" name="in_out" value="in" checked>
                            <label class="form-check-label">IN</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input out" type="radio" name="in_out" value="out">
                            <label class="form-check-label">OUT</label>
                        </div>
                    </div>

                </form>
            </li>
        </ul>

        <ul class="navbar-nav ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator <i class="fa fa-user-circle fa-lg text-success"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="card2.php">สมาชิก</a>
                    <a class="dropdown-item" href="interest.php">แขกผู้มาเยี่ยม</a>
                    <a class="dropdown-item" href="visitor.php">Visitor</a>
                    <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- <iframe name="my_iframe" src="manage_barcode.php" style="width:0px;height:0px;border:0"></iframe> -->
</nav>