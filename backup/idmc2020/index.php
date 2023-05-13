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


if (isset($_POST['first-name'])) {
	//Refer ID : XXYYMMDDNN
	$ReferId = ranStr(2).date("ymd").ranNum(2);
	$inputfname = $_POST['first-name'];
	$inputlname = $_POST['last-name'];
	$inputchrist = $_POST['christ'];
	$inputemail = $_POST['your_email'];
	$inputemail2 = $_POST['your_email2'];
	$inputphone = $_POST['phone'];

	if ($inputemail!=$inputemail2 || $inputemail=="") {
		echo "<script type=\"text/javascript\">window.alert(' Your Email Not Match!!  ');history.back(); </script>"; 
        	exit();
	}

	$file = $_FILES['myfile'];
	if (isset($_FILES['myfile']["tmp_name"])) {
		$imageFileType = explode('/', $_FILES['myfile']['type']);
		$target_dir = "images/uploads/";
		$file_name = date("YmdHis").'.'.$imageFileType[1];
		$target_file = $target_dir.$file_name ;
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if ($_FILES["myfile"]["size"] > 2000000) {
		    echo "<script type=\"text/javascript\">window.alert(' File Is Too Large!! ');history.back(); </script>"; 
        	exit();
		}else{
			move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);
		}

		if ($imageFileType[1]=="") {
			$file_name = "";
		}

	}


	include "phpqrcode/qrlib.php";  
	$prod_id = "Qr_".$ReferId.'.png'; 
	$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'Qrcode'.DIRECTORY_SEPARATOR;
	$qr_code = "images/qrcode/".$prod_id; //ไฟล์
	QRcode::png( $ReferId , $qr_code, "L", 10, 2);


$cmd1 = "  INSERT INTO `customer_db`
(`ref_id`,`fname`, `lname`, `christian`, `phone`, `email`, `pic1`, `pic2`, `approved`, `site_id`) VALUES 
('$ReferId','$inputfname','$inputlname','$inputchrist','$inputphone','$inputemail','$file_name','$prod_id','','$Site')  ";
$result1 = mysqli_query($conn,$cmd1);

echo "<script type=\"text/javascript\"> window.location.href='result.php?ref_id=$ReferId&lang=$lang'; </script>"; 


	// if ($inputlname=="") {
	// 	$inputlname = "-";
	// }
	if ($inputchrist=="") {
		$inputchrist = "-";
	}
	if ($inputemail=="") {
		$inputemail = "-";
	}
	if ($inputphone=="") {
		$inputphone = "-";
	}
	// if ($inputfname=="") {
	// 	$inputfname = "-";
	// }


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
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <style type="text/css">

.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 30px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 130px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

.page-content {
	/*padding-top: 160px;*/
	min-height: 780px;
}

.form-v1-content{
	margin-top: 30px;
}
 

.lightbox{
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
    } 


@media screen and (max-width: 991px){
	.card {
	background-color: white;
	margin: 15px;
	border-radius: 20px;
	padding: 35px;

}
}

@media screen and (min-width: 991px){
	.card {
	background-color: white;
	margin: 150px;
	border-radius: 20px;
	padding: 35px;

}
}

    </style>
</head>
<body>
	<div class="page-content" id="pageheight">
		<div class="form-v1-content">
			<div class="wizard-form">
<?php 

if ($ReferId=="") {


?>
		        <form class="form-register" action="" method="post" id="theForm" enctype="multipart/form-data" >
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>01</span></p>
			            	<span class="step-text"><?=$text01?></span>
			            </h2>
			            <section>
			                <div class="inner" style="position: relative;">

		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
			                	<div class="wizard-header">
			                		<div style="width: 100%; text-align: center;">
			                			<img src="images/logo/<?=$logo?>" width="20%" style="">
			                		</div>
									<h3 class="heading"><?=$text01?></h3>
									<!-- <p>Please enter your infomation and proceed to the next step.  </p> -->
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend><?=$fname?> &nbsp;<span style="color: red;">*</span></legend>
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="<?=$fname?>" required>
											<input type="hidden" name="lang" value="<?=$lang?>">
										</fieldset>
										<span id="nameError" style="color: red;display: none;">กรุณากรอกชื่อ</span>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend><?=$lname?></legend>
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="<?=$lname?>" >
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend><?=$christ?></legend>
											<input type="text" name="christ" id="christ" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="<?=$christ?>" >
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend><?=$email?> &nbsp;<span style="color: red;">*</span></legend>
											<input type="email" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="<?=$emailExample?>"  onkeyup="ValidateEmail();" >
										</fieldset>
											<span id="lblError" style="color: red"></span>
									</div>
								</div>


								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend><?=$emailconfirm?> &nbsp;<span style="color: red;">*</span></legend>
											<input type="email" name="your_email2" id="your_email2" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="<?=$emailExample?>"  onkeyup="ValidateEmail();" >
										</fieldset>
											<span id="lblError2" style="color: red"></span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend><?=$phone?></legend>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="<?=$phoneExample?>" >
										</fieldset>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text"><?=$text02?></span>
			            </h2>
			            <section style="position: relative;">

		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
			                <div class="inner" style="text-align: center;">
			                	<div class="wizard-header">
									<h3 class="heading"><?=$text02?></h3>
								</div>
								<br>
								<div class="plan-total ">
								<div class="upload-btn-wrapper">
									<span id="picError" style="color: red;display: none;">กรุณาแนบไฟล์ภาพ!</span>
									<button class="btn"><?=$upload?></button>
									<input type="file" name="myfile" id="myfile" accept="image/jpeg,image/png" />
								</div>
								</div>

									<p style="color: red;"><?=$noteupload?></p>
							</div>
			            </section>

			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>03</span></p>
			            	<span class="step-text"><?=$text03?></span>
			            </h2>
			            <section>
			                <div class="inner" style="position: relative;">

		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
			                	<div class="wizard-header">
									<h3 class="heading"><?=$text03?></h3>
								</div>
								<div class="form-row">
			                		<div class="form-holder form-holder-2">
			                			<div class="plan-total ">

			                				<div class="form-row">
												<div class="form-holder">
													<p class="plan-text"><?=$fname?></p>
			                						<span class="plan-title" id="sum-first-name"></span>
												</div>
												<div class="form-holder">
													<p class="plan-text"><?=$lname?></p>
			                						<span class="plan-title" id="sum-last-name"></span>
												</div>
											</div>

											<div class="form-row">
												<div class="form-holder">
													<p class="plan-text"><?=$christ?></p>
			                						<span class="plan-title" id="sum-christ"></span>
												</div>
											</div>

											<div class="form-row">
												<div class="form-holder">
													<p class="plan-text"><?=$email?></p>
			                						<span class="plan-title" id="sum-email"></span>
												</div>
											</div>

											<div class="form-row">
												<div class="form-holder">
													<p class="plan-text"><?=$phone?></p>
			                						<span class="plan-title" id="sum-phone"></span>
												</div>
											</div>
											
			                			</div>
			                		</div>
			                	</div>
							</div>
			            </section>


<div id="lightbox" class="lightbox" align="center">
	<div class="row card" style="">
		<div class="col-12" style="margin-bottom: 10px;font-size: 1.2em; text-align: left;">
				&emsp;&emsp;&emsp; <?=$textConfirm?>
		</div>
		<div class="col-12" style="margin-bottom: 10px; background-color: black;height: 2px;">
		</div>
		<div class="col-12" style="margin-bottom: 10px;">
			<input type="checkbox" name="accept" id="accept" style="font-size: 1.2em;"> <label for="accept" style="font-size: 1.2em;"> <?=$textAccept?></label>
		</div>
		<div class="col-12" style="margin-bottom: 10px;">
			<button type="button" style="font-size: 1em; color: white; padding: 10px 20px; background-color: #4fab40; border-radius: 10px; border: none;width: 100px;" onclick="submitForm()"><?=$textBtnOk?></button>
			&emsp;
			<button type="button" style="font-size: 1em; color: white; padding: 10px 20px; background-color: #cccccc; border-radius: 10px; border: none;width: 100px;" onclick="document.getElementById('lightbox').style.display = 'none';"><?=$textBtncancel?></button>
		</div>
	</div>
</div>


		        	</div>
		        </form>
<?php } ?>

			</div>
		</div>
	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.3.js"></script>
	<script src="js/main.js"></script>

<script>

$('input[type=email]').on('keypress', function (e) {
    var re = /[A-Z0-9a-z@\._]/.test(e.key);
    if (!re) {
        return false;
    }
});

function ValidateEmail() {
        var email = document.getElementById("your_email").value;
        var email2 = document.getElementById("your_email2").value;
        var lblError = document.getElementById("lblError");
        var lblError2 = document.getElementById("lblError2");
        var sumEmail = document.getElementById("sum-email");
        lblError.innerHTML = "";
        lblError2.innerHTML = "";
        sumEmail.style.color = 'black';
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email) ) {
            lblError.innerHTML = "Invalid email address.";
        	sumEmail.style.color = 'red';
        }else if ( !expr.test(email2) ) {
            lblError2.innerHTML = "Invalid email address.";
        	sumEmail.style.color = 'red';
        }else{
        	if (email!==email2) {
        		lblError.innerHTML = "Your Email Not Match.";
        		sumEmail.style.color = 'red';
        	}
        }
}


function submitForm(){
	if (document.getElementById('accept').checked == true) {
		document.getElementById('theForm').submit();
	}else{
		alert('กรุณายืนยันก่อนกดตกลง!');
	}
}



  // var x = screen.height ;
  // document.getElementById("pageheight").style.height = x+'px';




</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>