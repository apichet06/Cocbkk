<?php
include 'config.php';

$lang = $_GET['lang'];
if ($lang=="") {
	$lang = $_POST['lang'];
}
if ($lang=='en') {
	include 'en.php';
	$lang = 'en';
}else{
	include 'th.php';
	$lang = 'th';
}
$page = basename($_SERVER['PHP_SELF']);


$c_id = $_GET['c_id'];
$search = $_GET['search'];



if (isset($_POST['image1'])) {

	$c_id = $_POST['c_id'];
	$img1 = $_POST['image1'];

	$datenow = date("YmdHis");
	$date_now = date("Y-m-d H:i:s");
    $folderPath = "images/";
    // img1
    $image_parts = explode(";base64,", $img1);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = "Face_".$c_id .'_'.$datenow. '.png';
  
    $file = $folderPath ."face/". $fileName;
    file_put_contents($file, $image_base64);


    
    if (file_put_contents($file, $image_base64) == 0) {
    	?> <script>alert(" ยืนยันลงทะเบียนไม่สำเร็จ !!! กรุณายืนยันการลงทะเบียนใหม่  ");window.history.back();</script> <?php
    	exit();
    }

    $cmd2 = " UPDATE customer_db set pic3='$fileName' , status_regis='$date_now'  where c_id='$c_id' ";
	$result2 = mysqli_query($conn,$cmd2);
	 // echo "$cmd2 $result2";
	echo "<script type=\"text/javascript\"> window.location.href='onsite_index.php?search=$search'; </script>";
    ?> <!-- <script>alert(" ยืนยันการลงทะเบียนเรียบร้อยแล้ว !!! ");window.opener.location.reload();window.close();</script> --> 
    <?php


}


$cmd3 = " SELECT * from customer_db where c_id='$c_id' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {

  $firstname = trim($rs3['fname']);
  $lastname = trim($rs3['lname']);
  $christian = trim($rs3['christian']);
  $phoneNum = trim($rs3['phone']);
  $emailvalue = trim($rs3['email']);
  $ref_id = trim($rs3['ref_id']);
  $pic1 = trim($rs3['pic1']);
  $pic2 = trim($rs3['pic2']);
  $ref_id = trim($rs3['ref_id']);

}







$cmd3 = " SELECT * from setting where site_id='$Site' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {

	$subject = trim($rs3['subject']);

	if ($subject == "logo") {
		$logo = trim($rs3['value']);
	}


} 



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$Title?></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/webcam.js"></script>


	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <style type="text/css">
    	.btn {
    		/*width: 100px;*/
    	}
    	.imgShow { width: 150px; }
    	a:hover {
    		text-decoration: none;
    	}
    	.dash {
    		width: 100%;
    		height: 100px;
    		font-size: 30px;
    		font-weight: bolder;
    		border-radius: 20px;
    	}
    	.text-dash{
    		font-weight: 400;
    	}
    	.textinput{
    		width: 70%;
    		height: 50px;
    		border-radius: 10px;
    		border: 1px solid #cccccc ;
    		margin: 20px;
    		font-size: 20px;
    		text-align: center;
    	}
    	.form-v1-content{
    		margin-top: 50px;
    		margin-bottom: 50px;
    	}
    	.col-6{
    		font-size: 17px;
    		padding: 10px;
    		padding-right: 20px;
    	}

    </style>

</head>
<body id="bodyheight">
<div class="page-content" id="pageheight" >
	<div style="position: absolute; top: 10px; right: 10px;">
		<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
		<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
	</div>
	<div class="form-v1-content" style="width: 95%; min-height: 350px;">
		<div class="wizard-form" style="padding: 20px; text-align: center;">
			<h3>รายละเอียด <a href="register_edit.php?ref_id=<?=$ref_id?>&lang=<?=$lang?>&search=<?=$search?>&page=<?=$page?>"><i class="fas fa-user-edit"></i></a></h3>

			<div class="row">
				<div class="col-6 text-right">
					<?=$fname?>
				</div>
				<div class="col-6 text-left">
					<?=$firstname?> <?=$lastname?>
				</div>
			</div>
			<div class="row">
				<div class="col-6 text-right">
					<?=$christ?>
				</div>
				<div class="col-6 text-left">
					<?=$christian?>
				</div>
			</div>
			<div class="row">
				<div class="col-6 text-right">
					<?=$phone?>
				</div>
				<div class="col-6 text-left">
					<?=$phoneNum?>
				</div>
			</div>

<form action="" method="POST" id="myform" enctype="multipart/form-data">
			<div class="row">
				<div class="col-4 text-center"></div>
				<div class="col-lg-4 col-sm-12 col-12 text-center">
					<br>
					
			<div class="card card-small mb-4" >
                <div class="card card-small h-100">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">ภาพถ่ายใบหน้า</h6>
                    </div>
                    <div class="card-body d-flex py-0" align="center">
                      <div id="my_camera"></div>
                    <input type="hidden" name="image1" id="image1" />
                    <input type="hidden" name="c_id" value="<?=$c_id?>">
                    </div>
                    <div class="card-footer border-top text-center" align="center">
                          <div class="input-group mb-3 text-center">
                              <button class="btn btn-success" style="width: 100%" type="button" onclick="take_snapshot()">ถ่ายรูป</button>
                          </div>
                    </div>
               </div>
        	</div>


				</div>
				<div class="col-4 text-center"></div>
			</div>

			

			<div class="row">
				<div class="col-12 text-center">
					<br>
					<a href="#" class="btn btn-primary" onclick="submit()">&emsp;ยืนยันการลงทะเบียน&emsp;</a>
					<a href="#" class="btn btn-gray" onclick="window.location.href = 'onsite_index.php?search=<?=$search?>'">&emsp;ย้อนกลับ&emsp;</a>
				</div>
			</div>
</form>


		</div>
	</div>
</div>



	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>

var x = screen.height ;
  document.getElementById("pageheight").style.minHeight = x+'px';

function sendMail(ReferId,idlightbox){ 
  document.getElementById(idlightbox).style.display = "block";
  console.log(ReferId);
  $.getJSON("sendmail.php?RefID="+ ReferId, function(data){ 
  	document.getElementById(idlightbox).style.display = "none";
  });
}

$(document).ready(function() {
    $('#dtBasicExample').DataTable();
} );

cam1();

function cam1(){
  Webcam.set({
      width: 280,
      height: 220,
      image_format: 'jpeg',
      jpeg_quality: 90
  });

  Webcam.attach( '#my_camera' );
}

function take_snapshot() {
  if (document.getElementById('image1').value==='') {
    
    Webcam.snap( function(data_uri) {
        document.getElementById('image1').value = data_uri ;
        document.getElementById('my_camera').innerHTML = '<img src="'+data_uri+'"/>';
    } );
  }else{
    document.getElementById('image1').value='';
    cam1(); 
  }
    
}


function submit(){
	if (document.getElementById('image1').value != "") {
		document.getElementById('myform').submit();
	}else{
		alert('กรุณาถ่ายภาพ');
	}
}

</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>