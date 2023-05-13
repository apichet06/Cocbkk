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

$col1 = "2";
$col2 = "2";
$col3 = "2";
$col4 = "2";
$col5 = "2";

if ($_GET['attach'] == 'true') {
	$qry = " where pic1!='' and site_id='$Site' ";
	$textHeader = $textMainbtn2;
	$col2 = "4";
	$attach = $_GET['attach'];
}elseif ($_GET['attach'] == 'false') {
	$qry = " where pic1='' and site_id='$Site' ";
	$textHeader = $textMainbtn3;
	$attach = $_GET['attach'];
	$col3 = "4";
}elseif ($_GET['attach'] == 'appr') {
	$qry = " where approved='1' and site_id='$Site' ";
	$textHeader = $textMainbtn4;
	$attach = $_GET['attach'];
	$col4 = "4";
}elseif ($_GET['attach'] == 'noappr') {
	$qry = " where approved!='1' and site_id='$Site'";
	$textHeader = $textMainbtn5;
	$attach = $_GET['attach'];
	$col5 = "4";
}else{
	$qry = " where site_id='$Site'";
	$textHeader = $textMainbtn1;
	$attach = '';
	$col1 = "4";
}


$allRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where site_id='$Site'"));

$picRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where pic1!='' and site_id='$Site' "));

$noPicRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where pic1='' and site_id='$Site' "));

$apprRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where approved='1' and site_id='$Site' "));
$noapprRegister = mysqli_num_rows(mysqli_query($conn, " SELECT * FROM customer_db where approved!='1' and site_id='$Site' "));


$registerSelect = "active";


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

$RegisterAll[] = array(
	'fname' => $firstname , 
	'lname' => $lastname , 
	'christ' => $christian , 
	'phone' => $phoneNum , 
	'email' => $emailvalue , 
	'ref_id' => $ref_id , 
	'pic1' => $pic1 , 
	'pic2' => $pic2 
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

		       <?php include 'nav.php'; ?>

		       <div style="padding-top: 20px;">

		       	<div class="row" style="padding: 30px;">

		       	<div class="col-<?=$col1?> text-center">
		       		<a href="register.php">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$allRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn1?></p>
		       	</div>
		       	<div class="col-<?=$col2?> text-center">
		       		<a href="register.php?attach=true">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$picRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn2?></p>
		       	</div>
		       	<div class="col-<?=$col3?> text-center">
		       		<a href="register.php?attach=false">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$noPicRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn3?></p>
		       	</div>
		       	<div class="col-<?=$col4?> text-center">
		       		<a href="register.php?attach=appr">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$apprRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn4?></p>
		       	</div>
		       	<div class="col-<?=$col5?> text-center">
		       		<a href="register.php?attach=noappr">
		       			<button type="button" class="btn btn-light dash mb-2"><?=$noapprRegister?></button>
		       		</a>
		       		<p class="text-dash"><?=$textMainbtn5?></p>
		       	</div>

		       </div>



		       	<div class="row">
		       		<div class="col-6">
		       			<h5>&emsp; <?=$textHeader?> </h5>
		       		</div>
		       		<div class="col-6 text-right">
		       			<form action="export.php" name="form" method="POST" target="_blank">
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
				      <!-- <th scope="col">#</th> -->
				      <th scope="col"><?=$fname?></th>
				      <th scope="col"><?=$christ?></th>
				      <th scope="col">Email</th>
				      <th scope="col"><?=$phone?></th>
				      <th scope="col">Slip</th>
				      <th scope="col">QR Code</th>
				    </tr>
				  </thead>

				  <tbody>
				<?php 	
					for ($i=0; $i < count($RegisterAll); $i++) { 
				?>
				    <tr style="text-align: center;">
				      <td scope="row">
				      	<span style="color: transparent;display: none;"><?=$i+1?></span>

<!-- Large modal -->
<button style="background-color: transparent;" type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg<?=$i+1?>"><i class="fas fa-search"></i></button>

<div class="modal fade bd-example-modal-lg<?=$i+1?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row p-4">
      	<div class="col-12">
      		<h5><?=$text05?> <a href="register_edit.php?ref_id=<?=$RegisterAll[$i]['ref_id']?>&lang=<?=$lang?>"><i class="fas fa-user-edit"></i></a></h5>
      	</div>
      </div>
      <div class="row p-4">
      	<div class="col-6">
      		<?=$fname?>
      	</div>
      	<div class="col-6">
      		<?=$RegisterAll[$i]['fname']?> <?=$RegisterAll[$i]['lname']?>
      	</div>
      </div>
      <div class="row p-4">
      	<div class="col-6">
      		<?=$christ?>
      	</div>
      	<div class="col-6">
      		<?=$RegisterAll[$i]['christ']?>
      	</div>
      </div>
      <div class="row p-4">
      	<div class="col-6">
      		Email
      	</div>
      	<div class="col-6">
      		<?=$RegisterAll[$i]['email']?>
      	</div>
      </div>
      <div class="row p-4">
      	<div class="col-6">
      		<?=$phone?>
      	</div>
      	<div class="col-6">
      		<?=$RegisterAll[$i]['phone']?>
      	</div>
      </div>
      <div class="row p-4">
      	<div class="col-6">
      		<?php if ($RegisterAll[$i]['pic1']!="") { ?>
				<a href="images/uploads/<?=$RegisterAll[$i]['pic1']?>" target="_blank" ><img src="images/uploads/<?=$RegisterAll[$i]['pic1']?>" class="imgShow"></a>
			<?php }else{ ?>
				<img src="images/icon-image.png" class="imgShow">
			<?php } ?>
      	</div>
      	<div class="col-6">
      		<?php if ($RegisterAll[$i]['pic2']!="") { ?>
      			<a href="images/qrcode/<?=$RegisterAll[$i]['pic2']?>" target="_blank" ><img src="images/qrcode/<?=$RegisterAll[$i]['pic2']?>" class="imgShow"></a>
			<?php }else{ ?>
				<i class="far fa-qrcode"></i>
			<?php } ?>
      	</div>
      </div>

      <div class="row p-4">
      	<div class="col-12">
      		<?php if ($RegisterAll[$i]['email']!=="") { ?>
      			<a href="#" onclick="sendMail('<?=$RegisterAll[$i][ref_id]?>','lightbox2<?=$i+1?>');"><i class="far fa-envelope"></i> <?=$sendmailagain ?></a>
      		<?php } ?>
      	</div>
      </div>

    <div id="lightbox2<?=$i+1?>" class="lightbox2" align="center">
		<div class="loader" id="loader"></div>
		<p style="font-weight: bolder; color: white;">กำลังส่ง Email...</p>
	</div>

    </div>
  </div>
</div>
				      </td>
				      <!-- <td><?=$i+1?></td> -->
				      <td><?=$RegisterAll[$i]['fname']?> <?=$RegisterAll[$i]['lname']?></td>
				      <td><?=$RegisterAll[$i]['christ']?></td>
				      <td><?=$RegisterAll[$i]['email']?></td>
				      <td><?=$RegisterAll[$i]['phone']?></td>
				      <td>
				      	<?php if ($RegisterAll[$i]['pic1']!="") { ?>
				      	<a href="images/uploads/<?=$RegisterAll[$i]['pic1']?>" target="_blank" ><i class="far fa-image"></i></a>
				      	<?php } ?>
				      </td>
				      <td><a href="images/qrcode/<?=$RegisterAll[$i]['pic2']?>" target="_blank" ><i class="fas fa-qrcode"></i></a></td>
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

  // var x = screen.height ;
  // document.getElementById("pageheight").style.height = x+'px';
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