<?php

$Site = '1';

error_reporting (E_ALL ^ E_NOTICE);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// +++++++++++++++++++++++++++++++++
// +         Database Config       +
// +++++++++++++++++++++++++++++++++
$Host = "localhost";
$User = "root";
$Pass = "root";
$Database = "idmc";



$User = "cp951329_idmc";
$Pass = "8MVXucn4e";
$Database = "cp951329_idmc";




$conn = mysqli_connect($Host,$User,$Pass,$Database);
if( !$conn ) {     
    die("connection object not created: ".mysqli_error($conn));
}
if( mysqli_connect_errno() ) { 
    die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
mysqli_query($conn,"SET NAMES UTF8");
date_default_timezone_set('Asia/Bangkok');


// +++++++++++++++++++++++++++++++++
// +         WebSite Config        +
// +++++++++++++++++++++++++++++++++
$Title = "STGP-Registration";


function ranStr($n) { 
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
}

function ranNum($n) { 
    $characters = '0123456789'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
}



?>