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





$onsiteIndexSelect = "active";

$qry = " where fname='00000' ";

$search = $_POST['search'];
if ($search == "") {
	$search = $_GET['search'];
}

if ($search != "") {
	// $search = $_POST['search'];
	$qry = " where fname like '%$search%' or lname like '%$search%' or christian like '%$search%' or ref_id like '%$search%' ";

}


$cmd3 = " SELECT * from customer_db $qry ";
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
  $pic3 = trim($rs3['pic3']);
  $status_regis = trim($rs3['status_regis']);
  $status_gift = trim($rs3['status_gift']);

  if ($status_regis == '' or $status_regis=='0000-00-00 00:00:00') {
  		$status_regis = "";
		$status_regis_txt = "ยังไม่ได้ยืนยันลงทะเบียน";
		$status_regis_text = "dark";
  }else{
		$status_regis_txt = "ยืนยันลงทะเบียนแล้ว";
		$status_regis_text = "primary";
  }


   if ($status_gift == '' or $status_gift=='0000-00-00 00:00:00') {
		$status_gift = "ยังไม่ได้รับของที่ระลึก";
		$status_gift_text = "dark";
  }else{
		$status_gift = "รับของที่ระลึกแล้ว";
		$status_gift_text = "success";
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
	       		<input type="text" name="search" class="textinput">
	       	</div>

	       	<div class="col-12 text-center">
	       		<button type="submit" name="Submit" class="btn btn-primary" >&emsp;<?=$search_text?>&emsp;</button>
	       	</div>
	       </div>
	       	</form>



<?php if ($RegisterAll) { 
 ?>
<table class="table table-striped table-bordered table-sm"  id="dtBasicExample">
				  <thead class="thead-dark">
				    <tr style="text-align: center;">
				      <th scope="col"></th>
				      <!-- <th scope="col">#</th> -->
				      <th scope="col"><?=$fname?></th>
				      <th scope="col"><?=$christ?></th>
				      <th scope="col"><?=$statusText1?></th>
				      <th scope="col"><?=$statusText2?></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>

				  <tbody>
				<?php 	
					for ($i=0; $i < count($RegisterAll); $i++) { 
				?>
				    <tr style="text-align: center; cursor: pointer;">
				      <td  onclick="window.location.href='onsite_index_detail.php?c_id=<?=$RegisterAll[$i][c_id]?>&search=<?=$search?>'"><?=$i+1?></td>
				      <td  onclick="window.location.href='onsite_index_detail.php?c_id=<?=$RegisterAll[$i][c_id]?>&search=<?=$search?>'"><?=$RegisterAll[$i]['fname']?> <?=$RegisterAll[$i]['lname']?></td>
				      <td  onclick="window.location.href='onsite_index_detail.php?c_id=<?=$RegisterAll[$i][c_id]?>&search=<?=$search?>'"><?=$RegisterAll[$i]['christ']?></td>
				      
				      	<?php if ($RegisterAll[$i]['status_regis'] != "") { ?>
				      		<td onclick="JavaScript:newPopup('images/face/<?=$RegisterAll[$i]['pic3']?>');" class="text-<?=$RegisterAll[$i]['status_regis_text']?>">
				      		<?=$RegisterAll[$i]['status_regis_txt']?>
				      		</td>
				      	<?php }else{ ?>
				      		<td  onclick="window.location.href='onsite_index_detail.php?c_id=<?=$RegisterAll[$i][c_id]?>&search=<?=$search?>'" class="text-<?=$RegisterAll[$i]['status_regis_text']?>">
				      	<?=$RegisterAll[$i]['status_regis_txt']?>
				      		</td>
				      	<?php } ?>
				      		
				      	
				      <td  onclick="window.location.href='onsite_index_detail.php?c_id=<?=$RegisterAll[$i][c_id]?>&search=<?=$search?>'" class="text-<?=$RegisterAll[$i]['status_gift_text']?>"><?=$RegisterAll[$i]['status_gift']?></td>
				      <td  onclick="window.location.href='onsite_index_detail.php?c_id=<?=$RegisterAll[$i][c_id]?>&search=<?=$search?>'">
				      	<a href="#" ><i class="fas fa-search"></i></a>
				      </td>
				    </tr>
				<?php } ?>
				    
				  </tbody>
				</table>
<?php } ?>
	       

	       	


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