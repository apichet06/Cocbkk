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


if ($_GET['attach'] == 'registered') {
	$qry = " where pic3!='' and site_id='$Site' ";
	$textHeader = 'ผู้สมัครที่ยืนยันลงทะเบียนแล้ว';
	$attach = $_GET['attach'];
}elseif ($_GET['attach'] == 'gift') {
	$qry = " where status_gift!=null and site_id='$Site' ";
	$textHeader = 'ผู้สมัครที่รับของที่ระลึกแล้ว';
	$attach = $_GET['attach'];
}else{
	$qry = " where site_id='$Site'";
	$textHeader = $textMainbtn1;
	$attach = '';
}


$allRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where site_id='$Site'"));

$allRegistered = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where pic3!='' and site_id='$Site' "));

$allRegisterGift = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where status_gift!=null and site_id='$Site' "));



$onsiteReportSelect = "active";


$cmd3 = " SELECT * from customer_db $qry ";
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
  $pic3 = trim($rs3['pic3']);
  $pic3 = trim($rs3['pic3']);
  $status_regis = trim($rs3['status_regis']);
  $status_gift = trim($rs3['status_gift']);

  if ($status_regis == '' or $status_regis=='0000-00-00 00:00:00') {
  		// $status_regis = "";
		// $status_regis_txt = "";
		$status_regis_text = "ยังไม่ได้ยืนยันลงทะเบียน";
  }else{
		$status_regis_txt = "<i class='far fa-check-circle'></i>";
		$status_regis_text = "ยืนยันลงทะเบียนแล้ว";
  }


   if ($status_gift == '' or $status_gift=='0000-00-00 00:00:00') {
		$status_gift = "";
		$status_gift_text = "ยังไม่ได้รับของที่ระลึก";
  }else{
		$status_gift = "<i class='far fa-check-circle'></i>";
		$status_gift_text = "รับของที่ระลึกแล้ว";
  }

$RegisterAll[] = array(
	'c_id' => $c_id , 
	'fname' => $firstname , 
	'lname' => $lastname , 
	'christ' => $christian , 
	'phone' => $phoneNum , 
	'email' => $emailvalue , 
	'ref_id' => $ref_id , 
	'pic1' => $pic1 , 
	'pic2' => $pic2 ,
	'pic3' => $pic3 ,
	'status_regis' => $status_regis ,
	'status_regis_txt' => $status_regis_txt,
	'status_regis_text' => $status_regis_text,
	'status_gift' => $status_gift,
	'status_gift_text' => $status_gift_text,
	);

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
    		margin-bottom: 50px;
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

		       	<div class="row" style="padding: 30px;">

		       	<div class="col-4 text-center">
		       		<a href="<?=$page?>">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$allRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn1?></p>
		       	</div>
		       	<div class="col-4 text-center">
		       		<a href="<?=$page?>?attach=registered">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$allRegistered?></button>
		       		</a>
		       		<p class="text-dash">ผู้สมัครที่ยืนยันลงทะเบียนแล้ว</p>
		       	</div>
		       	<div class="col-4 text-center">
		       		<a href="<?=$page?>?attach=gift">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$allRegisterGift?></button>
		       		</a>
		       		<p class="text-dash">ผู้สมัครที่รับของที่ระลึกแล้ว</p>
		       	</div>

		       </div>



		       	<div class="row">
		       		<div class="col-6">
		       			<h5>&emsp; <?=$textHeader?> </h5>
		       		</div>
		       		<div class="col-6 text-right">
		       			<form action="export2.php" name="form" method="POST" target="_blank">
		       				<input type="hidden" name="data" value="<?php print base64_encode(serialize($RegisterAll)) ?>">
		       				<input type="hidden" name="attach" value="<?=$attach?>">
		       				<span onclick="document.forms.form.submit()" style="color: green;cursor: pointer;font-size: 1.3em;"> <i class="fas fa-file-excel"></i> Export Excel &emsp; </span>
		       			</form>
		       		</div>
		       	</div>

		       	<table class="table table-striped table-bordered table-sm"  id="dtBasicExample">
				  <thead class="thead-dark">
				    <tr style="text-align: center;">
				      <th scope="col"></th>
				      <th scope="col"><?=$fname?></th>
				      <th scope="col"><?=$christ?></th>
				      <th scope="col"><?=$phone?></th>
				      <th scope="col">Slip</th>
				      <th scope="col">QR Code</th>
				      <th scope="col">ลงทะเบียน</th>
				      <th scope="col">รับของขวัญ</th>
				    </tr>
				  </thead>

				  <tbody>
				<?php 	
					for ($i=0; $i < count($RegisterAll); $i++) { 
				?>
				    <tr style="text-align: center;">
				      <td scope="row">
				      	<span style=""><?=$i+1?></span>
				      </td>
				      <!-- <td><?=$i+1?></td> -->
				      <td><?=$RegisterAll[$i]['fname']?> <?=$RegisterAll[$i]['lname']?></td>
				      <td><?=$RegisterAll[$i]['christ']?></td>
				      <td><?=$RegisterAll[$i]['phone']?></td>
				      <td>
				      	<?php if ($RegisterAll[$i]['pic1']!="") { ?>
				      	<a href="images/uploads/<?=$RegisterAll[$i]['pic1']?>" target="_blank" ><i class="far fa-image"></i></a>
				      	<?php } ?>
				      </td>
				      <td><a href="images/qrcode/<?=$RegisterAll[$i]['pic2']?>" target="_blank" ><i class="fas fa-qrcode"></i></a></td>
				      <td>
				      	<?php if ($RegisterAll[$i]['pic3']!="") { ?>
				      	<a href="images/face/<?=$RegisterAll[$i]['pic3']?>" target="_blank" ><i class="fas fa-portrait"></i></a>
				      	<?php } ?>
				      </td>
				      	<td>
				      		<?=$RegisterAll[$i]['status_gift']?>
				      	</td>
				    </tr>
				<?php } ?>
				    
				  </tbody>
				</table>


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