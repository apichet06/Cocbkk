<?php
include("connectdb.php");
	
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

$Group_ID = $_GET["id"];
$Event = $_GET["event"];

$Now = date("Y-m-d H:i:s");
$Default = "0000-00-00 00:00:00";

if($_GET['rev']==1) {

    $Today = date("Y-m-d");
    $Count = 0;
    $Str = "<div class=\"row\">";
    
    $cmd = " SELECT * FROM trans_db WHERE Track_In LIKE '$Today%' AND Track_Out='0000-00-00 00:00:00' ORDER By Track_In ASC ";
    $result = mysqli_query($conn,$cmd);
    while ($rs = mysqli_fetch_array($result)) {    
        $Tag_Name = $rs["Tag_Name"] ;          
        $IN = $rs["Track_In"] ; 	 
        $to_time = strtotime($Now);
        $from_time = strtotime($IN);
        $diff_time = round(abs($to_time - $from_time) / 60,2);        
        if ($diff_time>150) {
            if ($Count<=10) {
                $Count++;
                $Str = $Str."<div class=\"col-6 mb-1\">
                    <button type=\"button\" class=\"btn btn-danger btn-lg btn-block\"><h2>$Tag_Name</h2></button>
                </div>";
            } else {
                break;
            }
        }                  
    }

    if ($Count<10) {
        $cmd = " SELECT * FROM trans_db WHERE Track_In LIKE '$Today%' AND Track_Out='0000-00-00 00:00:00' ORDER By Track_In ASC ";
        $result = mysqli_query($conn,$cmd);
        while ($rs = mysqli_fetch_array($result)) {    
            $Tag_Name = $rs["Tag_Name"] ;          
            $IN = $rs["Track_In"] ; 	 
            $to_time = strtotime($Now);
            $from_time = strtotime($IN);
            $diff_time = round(abs($to_time - $from_time) / 60,2);        
            if (($diff_time>140)&&($diff_time<150)) {
                if ($Count<=10) {
                    $Count++;
                    $Str = $Str."<div class=\"col-6 mb-1\">
                        <button type=\"button\" class=\"btn btn-warning btn-lg btn-block\"><h2>$Tag_Name</h2></button>
                    </div>";
                } else {
                    break;
                }
            }                  
        }
    }
    $Str = $Str."</div>";

    echo "$Str";

    exit;

}
?>