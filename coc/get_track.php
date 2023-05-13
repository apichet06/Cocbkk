<?php
include("connectdb.php");
	
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

$Group_ID = $_GET["id"];
$Event = $_GET["event"];

if($_GET['rev']==1) {
    $Table = "trans_db";
    $Today = date("Y-m-d");
    if ($Event=="in") {
        $FC = "#63D6AE";
        $cmd = " SELECT Tag_Name FROM $Table WHERE Group_ID='$Group_ID' AND Track_In LIKE '$Today%' AND Track_Out='0000-00-00 00:00:00' ORDER By Track_In DESC LIMIT 6 ";
    } elseif ($Event=="out") {
        $FC = "#F79862";
        $cmd = " SELECT Tag_Name FROM $Table WHERE Group_ID='$Group_ID' AND Track_Out LIKE '$Today%' ORDER By Track_Out DESC LIMIT 6 ";
    }
    $result = mysqli_query($conn,$cmd);
    $Str = "";
    while ($rs = mysqli_fetch_array($result)) {             
        $Tag_Name = $rs["Tag_Name"] ; 	 
        $Str = $Str."<h2><font color=\"$FC\">$Tag_Name</font></h2>";             
    }

    echo "$Str";

    exit;

}
?>