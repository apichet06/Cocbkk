<?php require_once 'connectdb.php';
session_start();
if ($_POST['user'] != "" and $_POST['password'] != "") {

    $user = mysqli_escape_string($conn, $_POST['user']);
    $pass = mysqli_escape_string($conn, $_POST['password']);

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE  u_user ='$user' and u_pass = '$pass' ") or die(mysqli_error($conn));

    if (mysqli_num_rows($sql) >= 1) {

        $row = mysqli_fetch_array($sql);

        $_SESSION["id"] = $row["u_id"];
        header('Location: main.php');
        exit;
    } else {
        echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="font/stylesheet.css" />
    <title>COCBKK</title>
    <style>

    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container ">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <div class="card text-center " style="background-color: #E6E3E2;">
                    <div class="card-body">
                        <form method="post" action="">
                            <h4>ล็อกอินเข้าสู่ระบบ</h4>
                            <hr>
                            <div class="form-group ">
                                <input type="text" name="user" class="form-control" placeholder="ชื่อล็อกอิน">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>