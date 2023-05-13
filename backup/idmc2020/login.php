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





if (isset($_POST['username'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$num = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM user_admin where username='$username' and password='$password' and site_id='$Site' "));

if ($num==0) {
	echo "<script type=\"text/javascript\">window.alert(' $notiPass ');history.back(); </script>"; 
}else{
	echo "<script type=\"text/javascript\"> window.location.href='register.php?lang=$lang'; </script>";  
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

@media screen and (min-width: 600px) {
	
}
 

    </style>
</head>
<body>
	<div class="page-content" id="pageheight">
		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
		<div class="form-v1-content" style="">
			<div class="wizard-form">


		        		<form accept="" method="post">
<div class="form-register">
<div id="form-total">
			            <section>
			                <div class="inner" style="padding: 30px;">
			                	<div class="wizard-header" style="text-align: center;">
									<h3 class="heading">LOG IN</h3>
								</div>
								<div class="form-row">
									<div class="form-holder" style="width: 100%;">
										<fieldset>
											<legend style="font-size: 1em;"><?=$textuser?></legend>
											<input type="text" class="form-control" name="username" placeholder="" required>
											<input type="hidden" name="lang" value="<?=$lang?>">
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder" style="width: 100%;">
										<fieldset>
											<legend style="font-size: 1em;"><?=$textpass?></legend>
											<input type="password" class="form-control" name="password" placeholder="" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder" style="width: 100%;text-align: center;">
										<button type="submit" class="btn" style="background-color: green;border: none;color: white;font-size: 1.3em;"><?=$textlogin?></button>
									</div>
								</div>


							</div>
			            </section>
						

		        	</div>
					</div>

			            </form>

			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<!-- <script src="js/jquery.steps.js"></script> -->
	<script src="js/main.js"></script>

<script>

  var x = screen.height ;
  document.getElementById("pageheight").style.height = x+'px';




</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>