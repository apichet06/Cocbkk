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

$border_show = "";

if (isset($_GET['get_gift'])) {
	$get_gift = $_GET['get_gift'];
	$dateToday = date('Y-m-d H:i:s');
	$cmd3 = " UPDATE customer_db set status_gift='$dateToday' where ref_id='$get_gift' limit 1 ";
	$result3 = mysqli_query($conn,$cmd3);

	echo "<script type=\"text/javascript\"> window.opener.location.reload();window.close(); </script>";
}


if (isset($_POST['search'])) {
	$n=0;
	$border_show = 'true';
	$search = $_POST['search'];
	$cmd3 = " SELECT * from customer_db where ref_id='$search' ";
	$result3 = mysqli_query($conn,$cmd3);
	while ($rs3 = mysqli_fetch_array($result3)) {
	  $n++;
	  $firstname = trim($rs3['fname']);
	  $lastname = trim($rs3['lname']);
	  $christian = trim($rs3['christian']);
	  $phoneNum = trim($rs3['phone']);
	  $emailvalue = trim($rs3['email']);
	  $ref_id = trim($rs3['ref_id']);
	  $pic1 = trim($rs3['pic1']);
	  $pic2 = trim($rs3['pic2']);

	  $status_regis = trim($rs3['status_regis']);
	  $status_gift = trim($rs3['status_gift']);
	  $get_gift = 'true';

	  if ($status_regis == '' or $status_regis=='0000-00-00 00:00:00') {
			$text_show = "ยังไม่ได้ยืนยันลงทะเบียน";
			$text_style = "text_get_red";
	  }else{
			$status_regis_txt = "ยืนยันลงทะเบียนแล้ว";
			$text_style = "text_get_green";
		  if ($status_gift == '' or $status_gift=='0000-00-00 00:00:00') {
				$text_show = "ยังไม่ได้รับของที่ระลึก";
				$get_gift = "false";
				$text_style = "text_get_red";
		  }else{
				$text_show = "รับของที่ระลึกแล้ว";
				$text_style = "text_get_green";
		  }
	  }


		  

	}

	if ($n==0) {
		$text_show = 'ยังไม่ได้ลงทะเบียน';
		$text_style = "text_get_red";
	}


}





$onsiteReceiveSelect = "active";






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
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <style type="text/css">
    	.btn {
    		padding-left: 50px;
    		padding-right: 50px;
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
    		/*margin-bottom: 50px;*/
    	}
    	.text_get{
    		font-size: 30px;
    		padding: 30px 30px;
    		border-radius: 10px;
    		border: 2px solid black;
    		min-width: 500px;
    	}
    	.text_get_red{
    		border: 2px solid red;
    		color: red;
    	}
    	.text_get_green{
    		border: 2px solid green;
    		color: green;
    	}

    </style>
<style>

.lightbox2{
      display: none;
      position: fixed;
      z-index: 2;
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
<body id="bodyheight">
<div class="page-content" id="pageheight" >
	<div style="position: absolute; top: 10px; right: 10px;">
		<a href="<?=$page?>?lang=th"><img src="images/flag-th.png" style="width: 30px"></a>
		<a href="<?=$page?>?lang=en"><img src="images/flag-uk.png" style="width: 30px"></a>
	</div>
	<div class="form-v1-content" style="width: 90%; min-height: 700px;">
		<div class="wizard-form" style="padding-top: 0px;">
	       <?php include 'onsite_nav.php'; ?>
	       <div style="padding-top: 20px;">


	       	<form action="" method="POST">
	       	<div class="row" style="padding: 30px;">
	       	<div class="col-12 text-center">
	       		<h3><?=$pleaseinput?></h3>
	       	</div>
	       	<div class="col-12 text-center">
	       		<input type="text" name="search" class="textinput" required="">
	       	</div>

	       	<div class="col-12 text-center">
	       		<button type="submit" name="Submit" class="btn btn-primary" >&emsp;<?=$search_text?>&emsp;</button>
	       	</div>
	       </div>
	       	</form>


	       	<?php if ($border_show=="true") { ?>

	       	<div class="row" style="padding: 30px;">
	       		<div class="col-12 text-center">
	       			<span class="text_get <?=$text_style?>"><?=$text_show?></span>
	       		</div>
	       	</div>

	       	<?php if($get_gift == "false"){ ?>
	       	<div class="row" style="padding: 30px;">
	       		<div class="col-12 text-center mb-4">
	       			<a href="onsite_receive.php?get_gift=<?=$ref_id?>" target="_blank">
	       				<button type="button" name="Submit" class="btn btn-success" style="padding: 30px;font-size: 30px; border-radius: 10px; background-color: #0DC183 ;border: none;" > &emsp;&nbsp; รับของที่ระลึก &emsp;&nbsp; </button>
	       			</a>
	       		</div>
	       	</div>

	       	<?php }} ?>

			</div>
		</div>
	</div>
</div>




	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap4.min.js"></script>
	<!-- <script src="js/jquery.steps.js"></script> -->
	<!-- <script src="js/main.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- PopUp Windows -->
<script type="text/javascript">
function newPopup(url) {
	var left = (screen.width/2)-(1040/2);
  	var top = (screen.height/2)-(690/2); 
	// var top = (screen.height)-(190)-150; 
	popupWindow = window.open(url,'Log','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1040,height=690, top='+top+', left='+left);
}
</script>

<script>

  var x = screen.height ;
  document.getElementById("pageheight").style.minHeight = x+'px';
  // document.getElementById("bodyheight").style.height = x+'px';

function sendMail(ReferId,idlightbox){ 
  document.getElementById(idlightbox).style.display = "block";
  console.log(ReferId);
  $.getJSON("sendmail.php?RefID="+ ReferId, function(data){ 
  	document.getElementById(idlightbox).style.display = "none";
  });
}

// // Basic example
// $(document).ready(function () {
// $('#dtBasicExample').DataTable({ 
// 	"searching": true // false to disable search (or any other option)
// });
// $('.dataTables_length').addClass('bs-select');
// });

$(document).ready(function() {
    $('#dtBasicExample').DataTable();
} );


</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>