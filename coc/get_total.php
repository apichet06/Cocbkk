<?php
include("connectdb.php");
	
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

$Group_ID = $_GET["id"];

if($_GET['rev']==1) {
    $Table = "trans_db";
    $Today = date("Y-m-d");
	$cmd = " SELECT No FROM $Table WHERE Group_ID='$Group_ID' AND Track_In LIKE '$Today%' AND Track_Out='0000-00-00 00:00:00' ";
    $result = mysqli_query($conn,$cmd);
    $Total = mysqli_num_rows($result);

    echo "<font style=\"color: #FFFFFF; font-size: 58px;\">$Total</font>";

    exit;

}
?>