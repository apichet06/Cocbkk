<?php
include 'config.php';

$settingSelect = "active";
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




if (isset($_POST['Submit'])) {


	if (isset($_FILES['myfile']["tmp_name"])) {
		$imageFileType = explode('/', $_FILES['myfile']['type']);

		if ($imageFileType[1]=="octet-stream") {
			$imageFileType[1] = "png";
		}

		$target_dir = "images/logo/";
		$file_name = date("YmdHis").".".$imageFileType[1];
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
		}else{
			$cmd1 = "  UPDATE `setting` set value='$file_name' where site_id='$Site' and subject='logo' ";
			$result1 = mysqli_query($conn,$cmd1);
		}
		

	}


	$project_name = $_POST['project_name'];
	$sj_email_first = $_POST['sj_email_first'];
	$dt_email_first = $_POST['dt_email_first'];
	$sj_email_second = $_POST['sj_email_second'];
	$dt_email_second = $_POST['dt_email_second'];


$cmd1 = "  UPDATE `setting` set value='$project_name' where site_id='$Site' and subject='project_name' ";
$result1 = mysqli_query($conn,$cmd1);

$cmd1 = "  UPDATE `setting` set value='$sj_email_first' where site_id='$Site' and subject='sj_email_first' ";
$result1 = mysqli_query($conn,$cmd1);

$cmd1 = "  UPDATE `setting` set value='$dt_email_first' where site_id='$Site' and subject='dt_email_first' ";
$result1 = mysqli_query($conn,$cmd1);

$cmd1 = "  UPDATE `setting` set value='$sj_email_second' where site_id='$Site' and subject='sj_email_second' ";
$result1 = mysqli_query($conn,$cmd1);

$cmd1 = "  UPDATE `setting` set value='$dt_email_second' where site_id='$Site' and subject='dt_email_second' ";
$result1 = mysqli_query($conn,$cmd1);


	
}




$cmd3 = " SELECT * from setting where site_id='$Site' ";
$result3 = mysqli_query($conn,$cmd3);
while ($rs3 = mysqli_fetch_array($result3)) {

	$subject = trim($rs3['subject']);

	if ($subject == "logo") {
		$logo = trim($rs3['value']);
	}

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
    	.btn { color: #297afc; }
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
    	
    	.form-v1-content{
    		margin-top: 50px;
    		/*margin-bottom: 50px;*/
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

.input {
	width: 100%;
	border: 1px solid #cccccc;

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

		       <?php include 'nav.php'; ?>
<form accept="" method="POST"  enctype="multipart/form-data" >
	       	<div class="row" style="padding: 30px;padding-top: 50px; padding-right: 50px;">

		       	<div class="col-3 text-right">
		       		<p class="text-dash">Logo</p>
		       	</div>
		       	<div class="col-3 text-left">
		       		<input type="file" name="myfile" >
		       	</div>
		       	<div class="col-3 text-right">
		       		<p class="text-dash">ชื่อ Project</p>
		       	</div>
		       	<div class="col-3 text-left">
		       		<textarea name="project_name" class="input"><?=$project_name?></textarea>
		       		<!-- <input type="text" name="project_name" class="input" value="<?=$project_name?>"> -->
		       	</div>


		       	<div class="col-3 text-right">
		       		<p class="text-dash">หัวข้อ Email เมื่อกดสมัคร</p>
		       	</div>
		       	<div class="col-3 text-left">
		       		<textarea name="sj_email_first" class="input"><?=$sj_email_first?></textarea>
		       		<!-- <input type="text" name="sj_email_first" class="input" value="<?=$sj_email_first?>"> -->
		       	</div>
		       	<div class="col-3 text-right">
		       		<p class="text-dash">รายละเอียด Email เมื่อกดสมัคร</p>
		       	</div>
		       	<div class="col-3 text-left">
		       		<textarea name="dt_email_first" class="input"><?=$dt_email_first?></textarea>
		       		<!-- <input type="text" name="dt_email_first" class="input" value="<?=$dt_email_first?>"> -->
		       	</div>


		       	<div class="col-3 text-right">
		       		<p class="text-dash">หัวข้อ Email เมื่อกดอนุมัติ</p>
		       	</div>
		       	<div class="col-3 text-left">
		       		<textarea name="sj_email_second" class="input"><?=$sj_email_second?></textarea>
		       		<!-- <input type="text" name="sj_email_second" class="input" value="<?=$sj_email_second?>"> -->
		       	</div>
		       	<div class="col-3 text-right">
		       		<p class="text-dash">รายละเอียด Email เมื่อกดอนุมัติ</p>
		       	</div>
		       	<div class="col-3 text-left">
		       		<textarea name="dt_email_second" class="input"><?=$dt_email_second?></textarea>
		       		<!-- <input type="text" name="dt_email_second" class="input" value="<?=$dt_email_second?>"> -->
		       	</div>


		       	<div class="col-12 text-center" style="margin-top: 40px;">
		       		<button type="submit" name="Submit" class="btn" >Submit</button>
		       	</div>

			</div>
</form>			



<div class="row" style="padding: 20px;">
	<div class="col-6">
	</div>
	<div class="col-6 text-right">
		<a href="#" onclick="loadDB()"><button class="btn" style="background-color: green;color: white;font-weight: bolder;" >Export Database</button></a>
		<br><br>
		<span id="linkload" style="display: none;"><a href="filename.sql.gz">Dowmload ไฟล์ที่นี่</a></span>
		<span id="linkloadErr" style="display: none;">บีบอัดไฟล์ไม่สำเร็จ</span>
	</div>
</div>

<div id="lightbox2" class="lightbox2" align="center">
	<div class="loader" id="loader"></div>
	<p style="font-weight: bolder; color: white;">กำลังส่งบีบอัดไฟล์...</p>
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

<script>

var x = screen.height ;
 document.getElementById("pageheight").style.minHeight = x+'px';




function loadDB(){ 
  document.getElementById('lightbox2').style.display = "block";
  $.getJSON("exportdb.php", function(data){ 
  	if (data[0].status === "ok") {
  		document.getElementById('lightbox2').style.display = "none";
  		document.getElementById('linkload').style.display = "block";
  	}else{
  		document.getElementById('lightbox2').style.display = "none";
  		document.getElementById('linkloadErr').style.display = "block";
  	}
  	
  });
}



$(document).ready(function() {
    $('#dtBasicExample').DataTable();
} );


</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>