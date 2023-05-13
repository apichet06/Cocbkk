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


if (isset($_GET['ref_id'])) {

$ReferId = $_GET['ref_id'];

$cmd3 = " SELECT * from customer_db where ref_id='$ReferId' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {

  $pic2 = trim($rs3['pic2']);
  $pic1 = trim($rs3['pic1']);
  $inputfname = trim($rs3['fname']);
  $inputlname = trim($rs3['lname']);
  $inputchrist = trim($rs3['christian']);
  $inputphone = trim($rs3['phone']);
  $inputemail = trim($rs3['email']);

  }


	if ($inputchrist=="") {
		$inputchrist = "-";
	}
	if ($inputemail=="") {
		$inputemail = "-";
	}
	if ($inputphone=="") {
		$inputphone = "-";
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
  /*border: 2px solid gray;*/
  color: white;
  background-color: #4fac40 ;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}


@media screen and (min-width: 600px) {
	
}
 

    </style>
<style>

.lightbox2{
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 50px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
    }

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 150px;
  height: 150px;
  -webkit-animation: spin 1s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

</head>
<body>
	<div class="page-content" id="pageheight">
		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="index.php?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="index.php?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
		<div class="form-v1-content">
			<div class="wizard-form">


<div class="form-register">
<div id="form-total">
		        		
			            <section>
			                <div class="inner" style="padding-top: 30px;">
			                	<div class="wizard-header" style="text-align: center;">
									<h3 class="heading"><?=$text04?></h3>
								</div>
								<div class="form-row" style="padding-top: 0px;">
			                		<div class="form-holder form-holder-2">
			                			<div class="plan-total ">

			                				<div class="form-row">
												<div class="form-holder" style="text-align: right;padding-right: 50px;">
													<p class="plan-text"><?=$fname?>-<?=$lname?></p>&emsp;&emsp;&emsp;
												</div>
												<div class="form-holder">
													<span class="plan-title" id="sum-first-name"><?=$inputfname?> <?=$inputlname?></span>
												</div>
											</div>

			                				<div class="form-row">
												<div class="form-holder" style="text-align: right;padding-right: 50px;">
													<p class="plan-text"><?=$christ?></p>&emsp;&emsp;&emsp;
												</div>
												<div class="form-holder">
													<span class="plan-title" id="sum-first-name"><?=$inputchrist?></span>
												</div>
											</div>

			                				<div class="form-row">
												<div class="form-holder" style="text-align: right;padding-right: 50px;">
													<p class="plan-text"><?=$email?></p>&emsp;&emsp;&emsp;
												</div>
												<div class="form-holder">
													<span class="plan-title" id="sum-first-name"><?=$inputemail?></span>
												</div>
											</div>

			                				<div class="form-row">
												<div class="form-holder" style="text-align: right;padding-right: 50px;">
													<p class="plan-text"><?=$phone?></p>&emsp;&emsp;&emsp;
												</div>
												<div class="form-holder">
													<span class="plan-title" id="sum-first-name"><?=$inputphone?></span>
												</div>
											</div>

											<div class="form-row">
												<div class="form-holder" style="text-align: right;padding-right: 50px;">
													<p class="plan-text"><?=$AttachSliptext?></p>&emsp;&emsp;&emsp;
												</div>
												<div class="form-holder" style="vertical-align: top;">
													<?php if ($pic1) { ?>
														<img src="images/uploads/<?=$pic1?>" style="width: 150px;">
													<?php }else{ ?>
														<span class="plan-title" id="sum-phone"><?=$NotAttachSliptext?></span>
													<?php } ?>
													<!-- </div> -->
												</div>
											</div>

											<div class="form-row">
												<div class="form-holder" style="text-align: right;padding-right: 50px;">
													<p class="plan-text"><?=$refName?></p>&emsp;&emsp;&emsp;
												</div>
												<div class="form-holder" style="vertical-align: top;"> 
														<span class="plan-title" id="sum-phone"><?=$ReferId?></span><br>
														<!-- <img src="images/qrcode/<?=$pic2?>" style="width: 150px;"> -->
												</div>
											</div>

											<div class="form-row">
												<div class="form-holder" style="text-align: center;width: 100%;padding-top: 20px;">
													<a href="index.php?lang=<?=$lang?>"><button class="btn"><?=$backtohome?></button></a>
												</div>
											</div>
 
											
			                			</div>
			                		</div>
			                	</div>
							</div>
			            </section>
						

		        	</div>
</div>


			</div>
		</div>
	</div>

<div id="lightbox2" class="lightbox2" align="center">
	<div class="loader" id="loader"></div>
	<p style="font-weight: bolder; color: white;">กำลังส่ง Email...</p>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- <script src="js/jquery-3.3.1.min.js"></script> -->
	<!-- <script src="js/jquery.steps.js"></script> -->
	<!-- <script src="js/main.js"></script> -->

<script>

  // var x = screen.height ;
  // document.getElementById("pageheight").style.height = x+'px';

sendMail("<?=$ReferId?>");
function sendMail(ReferId){ 
  document.getElementById("lightbox2").style.display = "block";
  console.log(ReferId);
  $.getJSON("sendmail.php?RefID="+ ReferId, function(data){ 
  	document.getElementById("lightbox2").style.display = "none";
  });
}


</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>