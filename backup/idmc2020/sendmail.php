<?php

// phpinfo();

include("config.php");


require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

// error_reporting(E_ALL);
// ini_set("display_errors", 1);




$approve = $_GET['approve'];








if (isset($_GET['RefID'])) {


$RefID = $_GET['RefID'];

if ($RefID=="") {
  exit();
}


$cmd3 = " SELECT * from customer_db where ref_id='$RefID' and site_id='$Site' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {
  // $Project_ID = trim($rs3['Project_ID']);
  $Email = trim($rs3['email']);
  $fname = trim($rs3['fname']);
  $lname = trim($rs3['lname']);

  $pic2 = trim($rs3['pic2']);


  }

$cmd3 = " SELECT * from setting where site_id='$Site' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {

	$subject = trim($rs3['subject']);

	if ($subject == "project_name") {
		$project_name = trim($rs3['value']);
	}

	if ($subject == "sj_email_first") {
		$sj_email_first = trim($rs3['value']);
	}

	if ($subject == "dt_email_first") {
		$dt_email_first = trim($rs3['value']);
	}

	if ($subject == "sj_email_second") {
		$sj_email_second = trim($rs3['value']);
	}

	if ($subject == "dt_email_second") {
		$dt_email_second = trim($rs3['value']);
	}

}


$from = "samrcp@sahathaigp.com";

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP

$mail->Debugoutput = 'html';
$mail->CharSet = "UTF-8";
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail  tls , ssl
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587 , 465
$mail->IsHTML(true);
$mail->ClearAllRecipients();
$mail->Username = "$from";
$mail->Password = "t20072007";


// $mail->SetFrom("$from");
$mail->SetFrom("samrcp@sahathaigp.com","[Automatic E-mail] STGP-Registration");
// $mail->AddCC('sk.lerdsappasuk@gmail.com');

if ($approve=="true") {

$mail->AddEmbeddedImage("images/qrcode/".$pic2 , 'picQr' ,"images/qrcode/$pic2");

	// $subject = "[STGP-Registration] IDMC Thailand 2020 แจ้งยืนยันผลการลงทะเบียน ";
	$subject = "[STGP-Registration] ".$sj_email_second;
	$msg = "<meta charset='utf-8'>";
	// $msg = "เรียนคุณ $fname $lname " . "<br>\r\n";
	// $msg = $msg." ยืนยันการลงทะเบียนสำเร็จ ". "<br>\r\n";
	$msg = $msg.$dt_email_second. "<br>\r\n";
	$msg = $msg." รหัสลงทะเบียนของคุณคือ $RefID ". "<br>\r\n";
	$msg = $msg." <img src=\"cid:picQr\" /> ". "<br>\r\n";
}else{
	// $subject = "[STGP-Registration] IDMC Thailand 2020 แจ้งผลการลงทะเบียน ";
	$subject = "[STGP-Registration] ".$sj_email_first;
	$msg = "<meta charset='utf-8'>";
	// $msg = "เรียนคุณ $fname $lname " . "<br>\r\n";
	$msg = $msg.$dt_email_first. "<br>\r\n";
	// $msg = $msg." เมื่อ จนท. ตรวจสอบการชำระเงินและข้อมูลครบถ้วนแล้ว จะส่ง QR Code กลับมายืนยันให้ท่านเป็นขั้นตอนสุดท้าย เพื่อนำไปเป็นหลักฐานรับเอกสารและเข้างานสัมมนา ". "<br>\r\n";
	$msg = $msg." รหัสลงทะเบียนของคุณคือ $RefID ". "<br>\r\n";
}








}






$mail->Subject = $subject;

$mail->Body = $msg;


$mail->AddAddress($Email);
$mail->Send();

$arrayName[] = array('result' => 'success' );

if(!$mail->Send()) {
    // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo json_encode($arrayName);
}


?>
