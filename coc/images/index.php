<?php
ob_start();
include("connectdb.php");

$Max1 = "550"; //Lotus Store
$Max2 = "450"; //Plaza Mall

?>
<!doctype html>
<html lang="en">
<head>
    <title><?php echo $Title_Web;?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="font/stylesheet.css">

    <!-- Ajax Query -->
    <script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript">
        $(function(){
            setInterval(function(){ 

                var getData=$.ajax({ 
                    url:"get_total.php?id=1",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#Total1").html(getData); 
                    }
                }).responseText;

                var getData=$.ajax({ 
                    url:"get_total.php?id=2",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#Total2").html(getData); 
                    }
                }).responseText;

                var getData=$.ajax({ 
                    url:"get_track.php?id=1&event=in",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#TrackIn1").html(getData); 
                    }
                }).responseText;

                var getData=$.ajax({ 
                    url:"get_track.php?id=1&event=out",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#TrackOut1").html(getData); 
                    }
                }).responseText;

                var getData=$.ajax({ 
                    url:"get_track.php?id=2&event=in",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#TrackIn2").html(getData); 
                    }
                }).responseText;

                var getData=$.ajax({ 
                    url:"get_track.php?id=2&event=out",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#TrackOut2").html(getData); 
                    }
                }).responseText;

                var getData=$.ajax({ 
                    url:"get_over.php",
                    data:"rev=1",
                    async:false,
                    success:function(getData){
                        $("div#ShowOver").html(getData); 
                    }
                }).responseText;

            },1000); 
        });
    </script>
    <!-- EOF-Ajax Query -->

</head>

<script language="javascript">
    function datepersec(){
        now = new Date(); 
        var thday = new Array ("อาทิตย์","จันทร์",
            "อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์"); 
        var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
            "เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
            "ตุลาคม","พฤศจิกายน","ธันวาคม");

        var hour=''+ now.getHours();
        var min=''+ now.getMinutes();
        var sec= ''+ now.getSeconds();

        if(sec.length < 2){
            sec = '0' + sec;
        }
        if(min.length < 2){
            min = '0' + min;
        }
        if(hour.length < 2){
            hour = '0' + hour;
        }

        var datenow = hour +":"+ min + ":" + sec ;
        var datenow2 = now.getDate()+ " " + thmonth[now.getMonth()]+ " " + (now.getFullYear()+543) ;

        document.getElementById("datetime").innerHTML = datenow;
        document.getElementById("datethai").innerHTML = datenow2;
        console.log(datenow);
    }
    timeout();
    function timeout(){
        setTimeout(function(){ 
            datepersec(); 
            timeout();
        }, 1000);
    }

</script>

<body onclick="document.myForm.bar_code.focus(); " onload="document.myForm.bar_code.focus();">
    <style>
        body {


            background-color: rgba(200, 200, 200, 0.4)
        }
        .font_thai{
         font-family: 'js_thanaporn', sans-serif;
         font-size: 23px;
     }
     .card_ {
        background-color: #63d6ae;
    }
    .card{
        margin-right: -11px;
        margin-left: -11px;
    }

    .font01 {
        font-size: 7vw;
    }

    .font02 {
        font-size: 4vw;
        color: #FFFF;
    }

    .font03 {
        font-size: 55px;
        color: #FFFF;
    }

    .font04 {
        font-size: 18px;
        color: #FFFF;
    }

    .color {
        color: #FFFF;
    }
</style>
<?php require_once 'menu.php'; ?>

<div class="container-fluid">
    <div class="row my-3 ">
        <div class="col-md-8 my-1 ">

            <div class="card card_ ">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <!--<img src="images/coc_logo.png" width="115%" height="135px">-->
                            <center><img src="images/coc_logo2.png" height="145px"></center>
                        </div>
                        <div class="col-8">
                            <h1 class="font02"><?php echo $Title_System;?></h1>
                            <h1 class="font02"><?php echo $Title_Store;?></h1>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-4 my-1">

            <div class="card">
                <div class="card-body text-center">
                    <h1 class="font01"><span id="datetime"></span></h1>
                    <h5 class="font_thai"><span id="datethai"></span></h5>
                </div>
            </div>

        </div>


        <div class="col-md-8 my-2">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="card card_">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-3 col-md-3 col-lg-6 col-xl-3">
                                    <img src="images/drive_02.png" width="100%">
                                </div>
                                <div class="col-5 col-md-5 col-lg-6  col-xl-5 font03">
                                    <center><strong><div id="Total1"></div></strong></center>
                                </div>
                                <div class="col-4 col-md-4 col-lg-12 col-xl-4">
                                    <div class="row">
                                        <div class="col-md-12 my-2 font04">
                                            <b>Max : <?php echo $Max1;?></b>
                                        </div>
                                        <div class="col-md-12 my-2 font04">
                                            <b>Onsite</b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-12 my-1">
                            <div class="card">
                                <div class="row text-center">
                                    <div class="col-6 my-2 text-secondary">
                                        <h3>Track IN</h3>
                                    </div>
                                    <div class="col-6 my-2 text-secondary">
                                        <h3>Track OUT</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  // -->
                        <div class="col-6 text-center ">
                            <div class="card">
                                <div class="card-body">
                                    <div id="TrackIn1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-center  ">
                            <div class="card">
                                <div class="card-body">
                                    <div id="TrackOut1"></div>
                                </div>
                            </div>
                        </div>

                        <!--  // -->
                    </div>


                </div>

                <div class="col-md-6 mb-2">
                    <div class="card card_">
                        <div class="card-body">

                            <div class="row ">
                                <div class="col-3 col-md-3 col-lg-6 col-xl-3 color">
                                    <img src="images/mall_white.png" width="100%">
                                </div>
                                <div class="col-5 col-md-5 col-lg-6  col-xl-5 font03">
                                    <center><strong><div id="Total2"></div></strong></center>
                                </div>
                                <div class="col-4 col-md-4 col-lg-12 col-xl-4">
                                    <div class="row">
                                        <div class="col-md-12 my-2 font04">
                                            <b>Max : <?php echo $Max2;?></b>
                                        </div>
                                        <div class="col-md-12 my-2 font04">
                                            <b>Onsite</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 my-1">
                            <div class="card">
                                <div class="row text-center">
                                    <div class="col-6 my-2 text-secondary">
                                        <h3>Track IN</h3>
                                    </div>
                                    <div class="col-6 my-2 text-secondary">
                                        <h3>Track OUT</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <div id="TrackIn2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <div id="TrackOut2"></div> 
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-md-4 my-2 text-center text-danger">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                         <b style="font-size: 58px">OVER TIME</b> 
                     </div>
                 </div>
             </div>
             <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- // -->
                            <div id="ShowOver"></div> 
                            <!-- // -->
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <div>

    </div>

</div>
</div>

<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ajax.googleapis.js"></script>
<script type="text/javascript">
   function myFunction(){
         
        var bar_code = document.getElementsByClassName("bar_code")[0].value;
         $.post("manage_barcode.php",
            {
                bar_code: bar_code 
            },
            function(data,status){
              //alert("Data: " + data + "\nStatus: " + status);
               document.getElementById('bar_code').value = "";
          });
  
    }
</script> 
</body>
</html>
