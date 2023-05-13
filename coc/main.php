<?php
ob_start();
include("connectdb.php");

$Max1 = "150"; //Lotus Store
$Max2 = "150"; //Plaza Mall
$date = date("Y-m-d");
$sql = mysqli_query($conn, "SELECT  * FROM church_time Where c_date = '$date' " );
$rs = mysqli_fetch_assoc($sql);

   $date_time_1 =  date('Y-m-d H:i:s', strtotime('+20 minutes', strtotime(date('Y-m-d H:i:s'))));
   $date_time_2 =  date('Y-m-d H:i:s', strtotime('+20 minutes', strtotime(date('Y-m-d H:i:s'))));

//เงื่อนไขที่แสดงจำนวนรอบที่ 1 ได้คือ เวลารอบที่ 1 ต้องมากกว่าเวลาปัจจุบันและเวลารอบที่ 1 ต้องห้ามมากหกว่าเวลารอบที่ 2
if(strtotime(date($rs['c_date'].' '.$rs['c_time_1'])) >  strtotime($date_time) and strtotime(date($rs['c_date'] . ' ' . $rs['c_time_1'])) <  strtotime(date($rs['c_date'] . ' ' . $rs['c_time_2']))){

    $church_max = $rs['c_quantity_1'];

//เงื่อนไขที่แสดงจำนวนรอบที่ 2 ได้คือ มากกว่าเวลาปัจจุบัน แต่น้อยกว่าเวลารอบที่ 2 ห้ามมากกว่าเวลาปัจจุบัน และห้ามน้อยกว่าเวลารอบที่ 1
}else if (strtotime(date($rs['c_date'] . ' ' . $rs['c_time_2'])) >  strtotime($date_time) and strtotime(date($rs['c_date'] . ' ' . $rs['c_time_2'])) <  strtotime(date($rs['c_date'] . ' ' . $rs['c_time_1']))){

    $church_max = $rs['c_quantity_2'];

}else{

    $church_max = "-";

}

////////////////////////////////////////////////////////////////

$sql_ = mysqli_query($conn, "SELECT * FROM visitor_time Where c_date = '$date' ");
$rs_ = mysqli_fetch_assoc($sql_);

$date_time_1 =  date('Y-m-d H:i:s', strtotime('+20 minutes', strtotime(date('Y-m-d H:i:s'))));
$date_time_2 =  date('Y-m-d H:i:s', strtotime('+20 minutes', strtotime(date('Y-m-d H:i:s'))));

//echo  strtotime(date($rs_['c_date'] . ' ' . $rs_['c_time_1'])).' ' .strtotime($date_time_1).'<br>';
echo   (date($rs_['c_date'] . ' ' . $rs_['c_time_1'])) . ' ' .  ($date_time_1).'<br>';

// echo  strtotime(date($rs_['c_date'] . ' ' . $rs_['c_time_2'])) . ' ' . strtotime($date_time) . '<br>';
// echo (date($rs_['c_date'] . ' ' . $rs_['c_time_2'])) . ' ' .  ($date_time);


//เงื่อนไขที่แสดงจำนวนรอบที่ 1 ได้คือ เวลารอบที่ 1 ต้องมากกว่าเวลาปัจจุบันและเวลารอบที่ 1 ต้องห้ามมากหกว่าเวลารอบที่ 2
if(strtotime(date($rs_['c_date'].' '.$rs_['c_time_1'])) <=  strtotime($date_time_1) or strtotime(date($rs_['c_date'] . ' ' . $rs_['c_time_2'])) <= strtotime($date_time_1)){
    $visitor_max = $rs_['c_quantity_1'];
}
//เงื่อนไขที่แสดงจำนวนรอบที่ 2 ได้คือ มากกว่าเวลาปัจจุบัน แต่น้อยกว่าเวลารอบที่ 2 ห้ามมากกว่าเวลาปัจจุบัน และห้ามน้อยกว่าเวลารอบที่ 1
// }else if (strtotime(date($rs['c_date'] . ' ' . $rs_['c_time_2'])) >  strtotime($date_time)){

//     $visitor_max = $rs_['c_quantity_2'];

// }else{
//     $visitor_max = "-";
// }

?>
<!doctype html>
<html lang="en">

<head>
    <title><?php echo $Title_Web; ?></title>
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
        $(function() {
            setInterval(function() {

                var getData = $.ajax({
                    url: "get_total.php?id=1",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#Total1").html(getData);
                    }
                }).responseText;

                var getData = $.ajax({
                    url: "get_total.php?id=2",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#Total2").html(getData);
                    }
                }).responseText;

                var getData = $.ajax({
                    url: "get_track.php?id=1&event=in",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#TrackIn1").html(getData);
                    }
                }).responseText;

                var getData = $.ajax({
                    url: "get_track.php?id=1&event=out",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#TrackOut1").html(getData);
                    }
                }).responseText;

                var getData = $.ajax({
                    url: "get_track.php?id=2&event=in",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#TrackIn2").html(getData);
                    }
                }).responseText;

                var getData = $.ajax({
                    url: "get_track.php?id=2&event=out",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#TrackOut2").html(getData);
                    }
                }).responseText;

                var getData = $.ajax({
                    url: "get_over.php",
                    data: "rev=1",
                    async: false,
                    success: function(getData) {
                        $("div#ShowOver").html(getData);
                    }
                }).responseText;

            }, 1000);
        });
    </script>
    <!-- EOF-Ajax Query -->

</head>

<script language="javascript">
    function datepersec() {
        now = new Date();
        var thday = new Array("อาทิตย์", "จันทร์",
            "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
        var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม",
            "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน",
            "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

        var hour = '' + now.getHours();
        var min = '' + now.getMinutes();
        var sec = '' + now.getSeconds();

        if (sec.length < 2) {
            sec = '0' + sec;
        }
        if (min.length < 2) {
            min = '0' + min;
        }
        if (hour.length < 2) {
            hour = '0' + hour;
        }

        var datenow = hour + ":" + min + ":" + sec;
        var datenow2 = now.getDate() + " " + thmonth[now.getMonth()] + " " + (now.getFullYear() + 543);

        document.getElementById("datetime").innerHTML = datenow;
        document.getElementById("datethai").innerHTML = datenow2;
        console.log(datenow);
    }
    timeout();

    function timeout() {
        setTimeout(function() {
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

        .font_thai {
            font-family: 'js_thanaporn', sans-serif;
            font-size: 23px;
        }

        .card_ {
            background-color: #63d6ae;
        }

        .card {
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
    <?php require_once 'menu.php';  ?>

    <div class="container-fluid">
        <div class="row my-3 ">
            <div class="col-md-8 my-1 ">

                <div class="card card_ ">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-2">
                                <!--<img src="images/coc_logo.png" width="115%" height="135px">-->
                                <center><img src="images/coc_logo2.png" height="145px"></center>
                            </div>
                            <div class="col-10">
                                <h1 class="font02">
                                    <font size="10px">คริสตจักรแห่งพันธสัญญากรุงเทพ</font>
                                </h1>
                                <h1 class="font02">Church of Covenant Bangkok</h1>
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
                                        <img src="images/member_msg.png" width="100%">
                                    </div>
                                    <div class="col-5 col-md-5 col-lg-6  col-xl-5 font03">
                                        <center><strong>
                                                <div id="Total1"></div>
                                            </strong></center>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-12 col-xl-4">
                                        <div class="row">
                                            <div class="col-md-12 my-2 font04">
                                                <b>Max : <?php echo $church_max; ?></b>
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
                                        <img src="images/visitor_msg.png" width="100%">
                                    </div>
                                    <div class="col-5 col-md-5 col-lg-6  col-xl-5 font03">
                                        <center><strong>
                                                <div id="Total2"></div>
                                            </strong></center>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-12 col-xl-4">
                                        <div class="row">
                                            <div class="col-md-12 my-2 font04">
                                                <b>Max : <?php echo $visitor_max; ?></b>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        function myFunction() {

            var bar_code = document.getElementsByClassName("bar_code")[0].value;

            if (document.getElementsByClassName("in")[0].checked) {
                var in_ = document.getElementsByClassName("in")[0].value;
            } else {
                var in_ = '';
            }

            if (document.getElementsByClassName("out")[0].checked) {
                var out = document.getElementsByClassName("out")[0].value;
            } else {
                var out = '';
            }

            $.ajax({
                type: "post",
                url: "manage_barcode.php",
                data: {
                    bar_code: bar_code,
                    in: in_,
                    out: out
                },
                dataType: "json",
                success: function(response) {
                    if (response.show_1 == "1" || response.show_2 == "2") {
                        // Swal.fire({
                        //     title: 'ยืนยันลงทะเบียนเข้างาน',
                        //     text: response.around1,
                        //     icon: 'warning',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#3085d6',
                        //     cancelButtonColor: '#d33',
                        //     confirmButtonText: 'OK'
                        // }).then((result) => {
                        //     if (result.value) {
                        Swal.fire({
                            icon: 'success',
                            title: response.i_name,
                            showConfirmButton: false,
                            timer: 3000
                        })
                        var insert = "insert_register";
                        $.ajax({
                            type: "post",
                            url: "manage_barcode.php",
                            data: {
                                'insert': insert,
                                'id_no': response.id_no,
                                'in': response.in,
                                'out': response.out
                            },
                            success: function(response) {
                                document.getElementById('bar_code').value = "";
                            }
                        });
                        //     }
                        // })
                    } else if (response.show_3 == "3") {

                        Swal.fire({
                            title: response.show3,
                            text: 'ยืนยันลงทะเบียนเข้างาน',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                var insert = "insert_register";
                                $.ajax({
                                    type: "post",
                                    url: "manage_barcode.php",
                                    data: {
                                        'insert': insert,
                                        'id_no': response.id_no,
                                        'in': response.in,
                                        'out': response.out
                                    },
                                    success: function(response) {
                                        document.getElementById('bar_code').value = "";
                                    }
                                });
                            }
                        })
                    } else if (response.show_3 == "30") {

                        Swal.fire({
                            icon: 'success',
                            title: response.i_name,
                            showConfirmButton: false,
                            timer: 3000
                        })
                        var insert = "insert_register";
                        $.ajax({
                            type: "post",
                            url: "manage_barcode.php",
                            data: {
                                'insert': insert,
                                'id_no': response.id_no,
                                'in': response.in,
                                'out': response.out
                            },
                            success: function(response) {
                                document.getElementById('bar_code').value = "";
                            }
                        });
                    } else if (response.data_1 == "11" || response.data_2 == "12") {

                        // Swal.fire({
                        //     title: 'ยืนยันลงทะเบียนเข้างาน',
                        //     text: response.data1 + response.data2,
                        //     icon: 'warning',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#3085d6',
                        //     cancelButtonColor: '#d33',
                        //     confirmButtonText: 'OK'
                        // }).then((result) => {
                        //     if (result.value) {
                        Swal.fire({
                            icon: 'success',
                            title: response.i_name,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        var insert = "insert_register_1";
                        $.ajax({
                            type: "post",
                            url: "manage_barcode.php",
                            data: {
                                'insert': insert,
                                'id_no': response.i_number,
                                'in': response.in,
                                'out': response.out
                            },
                            success: function(response) {
                                document.getElementById('bar_code').value = "";
                            }
                        });
                        //     }
                        // })


                    } else if (response.data_3 == "10") {

                        // Swal.fire({
                        //     icon: 'error',
                        //     title: response.data3,
                        //     text: 'การลงทะเบียนเข้างานไม่สำเร็จ'
                        // })

                        Swal.fire({
                            title: response.data3,
                            text: 'การลงทะเบียนเข้างานไม่สำเร็จ',
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                document.getElementById('bar_code').value = "";
                            }
                        })
                        // Swal.fire({
                        //     title: 'ยืนยันลงทะเบียนเข้างาน',
                        //     text: response.data3,
                        //     icon: 'warning',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#3085d6',
                        //     cancelButtonColor: '#d33',
                        //     confirmButtonText: 'OK'
                        // }).then((result) => {
                        //     if (result.value) {
                        //         var insert = "insert_register_1";
                        //         $.ajax({
                        //             type: "post",
                        //             url: "manage_barcode.php",
                        //             data: {
                        //                 'insert': insert,
                        //                 'i_number': response.i_number,
                        //                 'no_name': response.no_name
                        //             },
                        //             success: function(response) {
                        //                 document.getElementById('bar_code').value = "";
                        //             }
                        //         });
                        //     }
                        // })

                    }
                }
            });

            // $.post("manage_barcode.php", {
            //         bar_code: bar_code,
            //         around: aoud_1
            //     },
            //     dataType: "json",
            //     function(data, status) {
            //         alert("Data: " + data + "\nStatus: " + status);
            //         //document.getElementById('bar_code').value = "";
            //     });

        }
    </script>

</body>

</html>