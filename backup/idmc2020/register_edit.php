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
$registerSelect = "active";

$pagetogo = $_GET['page'];
if ($pagetogo=="") {
	$pagetogo = $_POST['page'];
}
$search = $_GET['search'];
if ($search=="") {
	$search = $_POST['search'];
}

$textHeader = $text06;
$ref_id = $_GET['ref_id'];
if ($ref_id=="") {
	$ref_id = $_POST['ref_id'];
}


if (isset($_GET['del'])) {
	$cmd1 = " DELETE from customer_db  where ref_id='$ref_id' ";
	$result1 = mysqli_query($conn,$cmd1);

	echo "<script type=\"text/javascript\"> window.location.href='register.php?lang=$lang'; </script>"; 
	exit();

}



if (isset($_POST['appr'])) {
	$c_id = $_POST['c_id'];
	$ReferId = $_POST['ref_id'];
	$inputfname = $_POST['first-name'];
	$inputlname = $_POST['last-name'];
	$inputchrist = $_POST['christ'];
	$inputemail = $_POST['your_email'];
	$inputphone = $_POST['phone'];

	$file = $_FILES['myfile'];
	if (isset($_FILES['myfile']["tmp_name"])) {
		$imageFileType = explode('/', $_FILES['myfile']['type']);
		$target_dir = "images/uploads/";
		$file_name = date("YmdHis").'.'.$imageFileType[1];
		$target_file = $target_dir.$file_name ;
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if ($_FILES["myfile"]["size"] > 2000000) {
		    echo "<script type=\"text/javascript\">window.alert(' $noteuploadNotice ');history.back(); </script>"; 
        exit();
		}else{
			move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);
		}

		if ($imageFileType[1]=="") {
			$file_name = "";
		}else{
			$file_name = " ,pic1='$file_name' ";
		}



	}



	$cmd1 = "  UPDATE `customer_db` set fname='$inputfname' , lname='$inputlname' , christian='$inputchrist' , phone='$inputphone' , email='$inputemail' , approved='1' $file_name  where ref_id='$ref_id' ";
	$result1 = mysqli_query($conn,$cmd1);

	$sendmail = 1;

	// echo "<script type=\"text/javascript\"> sendMail('$ReferId','lightbox2'); </script>"; 

}



if (isset($_POST['submit'])) {
	//Refer ID : XXYYMMDDNN
	$c_id = $_POST['c_id'];
	$ReferId = $_POST['ref_id'];
	$inputfname = $_POST['first-name'];
	$inputlname = $_POST['last-name'];
	$inputchrist = $_POST['christ'];
	$inputemail = $_POST['your_email'];
	$inputphone = $_POST['phone'];

	$file = $_FILES['myfile'];
	if (isset($_FILES['myfile']["tmp_name"])) {
		$imageFileType = explode('/', $_FILES['myfile']['type']);
		$target_dir = "images/uploads/";
		$file_name = date("YmdHis").'.'.$imageFileType[1];
		$target_file = $target_dir.$file_name ;
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if ($_FILES["myfile"]["size"] > 2000000) {
		    echo "<script type=\"text/javascript\">window.alert(' $noteuploadNotice ');history.back(); </script>"; 
        exit();
		}else{
			move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);
		}

		if ($imageFileType[1]=="") {
			$file_name = "";
		}else{
			$file_name = " ,pic1='$file_name' ";
		}



	}



$cmd1 = "  UPDATE `customer_db` set fname='$inputfname' , lname='$inputlname' , christian='$inputchrist' , phone='$inputphone' , email='$inputemail'  $file_name  where ref_id='$ReferId' ";
$result1 = mysqli_query($conn,$cmd1);

// echo "<script type=\"text/javascript\"> sendMail('$ReferId','lightbox2'); </script>"; 
if ($pagetogo!="") {
	echo "<script type=\"text/javascript\"> window.location.href='$pagetogo?lang=$lang&c_id=$c_id&search=$search'; </script>";
}else{
	echo "<script type=\"text/javascript\"> window.location.href='register.php?lang=$lang'; </script>";
}

}





$cmd3 = " SELECT * from customer_db where ref_id='$ref_id' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {
  $c_id = trim($rs3['c_id']);
  $firstname = trim($rs3['fname']);
  $lastname = trim($rs3['lname']);
  $christian = trim($rs3['christian']);
  $phoneNum = trim($rs3['phone']);
  $emailvalue = trim($rs3['email']);
  $ref_id = trim($rs3['ref_id']);
  $pic1 = trim($rs3['pic1']);
  $pic2 = trim($rs3['pic2']);

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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <style type="text/css">
    	.btn { color: #297afc; }
    	.imgShow { width: 150px; }
 		.page-content {
			/*padding-top: 60px;*/
			/*vertical-align: top;*/
		}
		.form-v1-content{
    		margin-top: 50px;
    		margin-bottom: 50px;
    	}

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
  font-size: 1em;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 130px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
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
	<div class="page-content" id="pageheight" >
		<div style="position: absolute; top: 10px; right: 10px;">
			<a href="<?=$page?>?lang=th&ref_id=<?=$ref_id?>"><img src="images/flag-th.png" style="width: 30px"></a>
			<a href="<?=$page?>?lang=en&ref_id=<?=$ref_id?>"><img src="images/flag-uk.png" style="width: 30px"></a>
		</div>
		<div class="form-v1-content" style="width: 90%;">
			<div class="wizard-form" style="padding-top: 0px;min-height: 700px;">

		       <?php //include 'nav.php'; ?>

		       <div style="padding-top: 30px;">

		       	<h5>&emsp; <?=$textHeader?> </h5>
		       	<form action="" method="POST" enctype="multipart/form-data" >

		       	<div class="row p-4">
		       		<div class="col-6">
		       			<legend><?=$fname?> &nbsp;<span style="color: red;">*</span></legend>
						<input type="text" class="form-control" id="first-name" name="first-name" value="<?=$firstname?>" required>
						<input type="hidden" name="lang" value="<?=$lang?>">
						<input type="hidden" name="c_id" value="<?=$c_id?>">
						<input type="hidden" name="ref_id" value="<?=$ref_id?>">
						<input type="hidden" name="pagetogo" value="<?=$pagetogo?>">
						<input type="hidden" name="search" value="<?=$search?>">
		       		</div>
		       		<div class="col-6">
		       			<legend><?=$lname?></legend>
						<input type="text" class="form-control" id="last-name" name="last-name" value="<?=$lastname?>" >
		       		</div>
		       	</div>

		       	<div class="row p-4">
		       		<div class="col-6">
		       			<legend><?=$christ?></legend>
						<input type="text" name="christ" id="christ" class="form-control" value="<?=$christian?>" >
		       		</div>
		       		<div class="col-6">
		       			<legend><?=$email?></legend>
						<input type="text" name="your_email" id="your_email" class="form-control" value="<?=$emailvalue?>" >
		       		</div>
		       	</div>

		       	<div class="row p-4">
		       		<div class="col-6">
		       			<legend><?=$phone?></legend>
						<input type="text" class="form-control" id="phone" name="phone" value="<?=$phoneNum?>" >
		       		</div>
		       		<div class="col-3">
		       			<legend><?=$upload?></legend>
						<div class="upload-btn-wrapper">
							<button class="btn"><?=$upload?></button>
							<input type="file" name="myfile" accept="image/jpeg,image/png" />
						</div>
		       		</div>
		       		<div class="col-3">
		       			<legend> </legend>
						<div class="upload-btn-wrapper">
							<a href="images/uploads/<?=$pic1?>" target="_blank" ><img src="images/uploads/<?=$pic1?>" class="imgShow"></a>
						</div>
		       		</div>
		       	</div>

		       	<div class="row p-4">
		       		<div class="col-12 text-center">
		       			<?php if ($pagetogo=="") { ?>
		       			<button type="submit" name="appr" class="btn" style="background-color: green;border: none;color: white;font-size: 1.3em;">&emsp;&emsp;<?=$textsubmitappr?>&emsp;&emsp;</button>
		       			<?php } ?>
		       			<button type="submit" name="submit" class="btn" style="background-color: blue;border: none;color: white;font-size: 1.3em;">&emsp;&emsp;<?=$textsubmitedit?>&emsp;&emsp;</button>
		       			<a href="register_edit.php?del=true&ref_id=<?=$ref_id?>" onclick="return confirm('<?=$textDel?>');">
		       				<button type="button" class="btn" style="background-color: red;border: none;color: white;font-size: 1.3em;">&emsp;&emsp;<?=$textsubmitdel?>&emsp;&emsp;</button>
		       			</a>
		       		</div>
		       	</div>

					
		       	</form>

				</div>
			</div>
		</div>
	</div>
<div id="lightbox2" class="lightbox2" align="center">
	<div class="loader" id="loader"></div>
	<p style="font-weight: bolder; color: white;">กำลังส่ง Email...</p>
</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

var x = screen.height ;
  document.getElementById("pageheight").style.minHeight = x+'px';

<?php if ($sendmail == 1) { ?>
	sendMail("<?=$ReferId?>",'lightbox2');
<?php } ?>

function sendMail(ReferId,idlightbox){ 
  document.getElementById(idlightbox).style.display = "block";
  console.log(ReferId);
  $.getJSON("sendmail.php?RefID="+ ReferId + "&approve=true", function(data){ 
  	document.getElementById(idlightbox).style.display = "none";
  	window.location.href='register.php?lang=<?=$lang?>';
  });
}




</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>