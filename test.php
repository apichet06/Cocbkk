<?php require_once 'conn.php';

?>
<?php
if (isset($_POST["submit"])) {

    $url = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'meeting_registration';
    $conn = mysqli_connect($url, $username, $password,$db);
    if (!$conn) {
        die('Could not Connect My Sql:' . mysqli_error($conn));
    }
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    $date = date("Y-m-d");
    while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

$id_no         = $filesop[0];
$m_name        = $filesop[1];
$m_sur         = $filesop[2];
$nick_name     = $filesop[3];
$status        = $filesop[4];
$zone          = $filesop[5];
$area          = $filesop[6];

        $sql = "INSERT into member(id_no,m_name,m_sur,nick_name,status,zone,area,m_date) values ('$id_no','$m_name','$m_sur','$nick_name','$status','$zone','$area','$date')";
        $stmt = mysqli_query($conn, $sql);
       // mysqli_stmt_execute($stmt);

        $c = $c + 1;
    }

    if ($sql) {
        echo "sucess";
    } else {
        echo "Sorry! Unable to impo.";
    }
}
?>
<!DOCTYPE html>
<html>

<body>
    <form enctype="multipart/form-data" method="post" role="form">
        <div class="form-group">
            <label for="exampleInputFile">File Upload</label>
            <input type="file" name="file" id="file" size="150">
            <p class="help-block">Only Excel/CSV File Import.</p>
        </div>
        <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
    </form>
</body>

</html>