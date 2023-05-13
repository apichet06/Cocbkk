<?php
error_reporting(~E_NOTICE);
$title = "COCBKK";


$servername = "localhost";
$username = "cp951329_idmc";
$password = "8MVXucn4e";
$db = "cp951329_idmc";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "meeting_registration";

$conn = mysqli_connect($servername, $username, $password, $db);
date_default_timezone_set("Asia/Bangkok");
mysqli_set_charset($conn, "utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศกร์", "เสาร์");
$thai_month_arr = array(
    "0" => "",
    "1" => "ม.ค.",
    "2" => "ก.พ.",
    "3" => "มี.ค.",
    "4" => "เม.ย.",
    "5" => "พ.ค.",
    "6" => "มิ.ย.",
    "7" => "ก.ค.",
    "8" => "ส.ค.",
    "9" => "ก.ย.",
    "10" => "ต.ค.",
    "11" => "พ.ย.",
    "12" => "ธ.ค"
);
function thai_date($time)
{
    global $thai_day_arr, $thai_month_arr;
    $thai_date_return = "" . $thai_day_arr[date("w", $time)];
    $thai_date_return .= " " . date("j", $time);
    $thai_date_return .= " " . $thai_month_arr[date("n", $time)];
    //$thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return .= " " . (date("Y", $time) + 543 - 2500);
    //$thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}

?>
