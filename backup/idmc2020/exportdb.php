<?php

include 'config.php';

// $DBUSER=$User;
// $DBPASSWD=$Pass;
// $DATABASE=$Database;

// $filename = "backup-" . date("d-m-Y") . ".sql";
// $mime = "application/x-gzip";

// header( "Content-Type: " . $mime );
// header( 'Content-Disposition: attachment; filename="' . $filename . '"' );

// $cmd = "mysqldump -u $DBUSER --password=$DBPASSWD $DATABASE | gzip --best";   

// passthru( $cmd );

// exit(0);


$mysqlDatabaseName =$Database;
$mysqlUserName = $User;
$mysqlPassword = $Pass; 
$mysqlHostName = $Host;

$mysqlExportPath ="Database" . date("d-m-Y") . ".sql";
$mysqlExportPath ="filename.sql.gz";
// $mime = "application/x-gzip";
// header( "Content-Type: " . $mime );
// header( 'Content-Disposition: attachment; filename="' . $mysqlExportPath . '"' );

//Please do not change the following points
//Export of the database and output of the status
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
	$arrayName[] = array('status' => 'ok' );
break;
case 1:
	$arrayName[] = array('status' => 'err' );
break;
case 2:
	$arrayName[] = array('status' => 'err' );
break;
}

echo json_encode($arrayName);

?>