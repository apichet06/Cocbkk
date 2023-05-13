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

$mainSelect = "active";



$allRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where site_id='$Site' "));

$picRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where pic1!='' and site_id='$Site' "));

$noPicRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where pic1='' and site_id='$Site' "));





 



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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <style type="text/css">

    	.dash {
    		width: 100%;
    		height: 150px;
    		font-size: 30px;
    		font-weight: bolder;
    		border-radius: 20px;
    	}
    	.text-dash{
    		font-weight: 400;
    	}
 

    </style>
</head>
<body>
	<div class="page-content" id="pageheight">
		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
		<div class="form-v1-content" style="width: 90%; min-height: 700px;">
			<div class="wizard-form" style="padding-top: 0px;">

		       <?php include 'nav.php'; ?>

		       <div class="row" style="padding: 30px;">

		       	<div class="col-4 text-center">
		       		<a href="register.php">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$allRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn1?></p>
		       	</div>
		       	<div class="col-4 text-center">
		       		<a href="register.php?attach=true">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$picRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn2?></p>
		       	</div>
		       	<div class="col-4 text-center">
		       		<a href="register.php?attach=false">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$noPicRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn3?></p>
		       	</div>

		       </div>

			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>

<script>

  var x = screen.height ;
  document.getElementById("pageheight").style.height = x+'px';




</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>