$("#search").submit(function (e) {
    e.preventDefault();
     $.ajax({
         type: "post",
         url: "select.php",
         data: $(this).serialize(),
         success: function (response) {
          $("#show_data").html(response);
         }
     });
});


$("#insert_register_bose").submit(function (e) {
    e.preventDefault();
    var insert = "insert_register_bose";
    var name   = document.getElementsByName('name_')[0].value;
    var c_date = document.getElementsByName('c_date')[0].value;
    var around = document.getElementsByName('around')[0].value;
    var around = around.split(",");
 Swal.fire({
     title: 'ตรวจสอบขัอมูลการจองที่นั่งของท่าน!',
     html: 'คุณ' + name + ' <br>' +
         '' + c_date + '<br>' +
         'รอบที่ ' + around[0] + '  เวลา ' + around[1],
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#07B816',
     cancelButtonColor: '#3085d6',
     cancelButtonText: 'แก้ไขข้อมูล',
     confirmButtonText: 'ข้อมูลถูกต้อง,ตกลง'
 }).then((result) => {
     if (result.value) {
       $.ajax({
           type: "post",
           url: "manages.php",
           data: $(this).serialize() + "&insert=" + insert,
           dataType: "json",
           success: function (data) {
               console.log(data);
               if (data.data == "1") {
                   $("#myModal").hide();
                   Swal.fire({
                       title: 'Registration complete!',
                       html: 'คุณ' + data.name + ' <br>' +
                            data.date + '<br>' +
                           'รอบที่ ' + data.around +
                           '  เวลา ' + data.time + '<br>' +
                           '<b class="text-danger">กรุณามาถึงก่อนเวลาเริ่มโปรแกรมไม่ต่ำกว่า 15 นาที เพื่อรักษาสิทธิ์ในการจองที่นั่งของท่าน</b><br>',
                       icon: 'success',
                       showCancelButton: false,
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'OK'
                   }).then((result) => {
                       if (result.value) {
                           window.location.reload();
                       }
                   });

               } else if (data.data == "10") {

                   Swal.fire({
                       icon: 'error',
                       title: 'แจ้งเตือน',
                       text: 'คุณได้ทำการลงทะเบียนไปแล้ว!',

                   })

               } else if (data.data == "00") {
                   Swal.fire({
                       icon: 'error',
                       title: 'แจ้งเตือน',
                       text: 'ที่นั่งเต็มแล้ว!',

                   })
               }

           }
       });
     }
 });


});

$(".edit_member").click(function(e){

   var id        = $(this).data("id");
   var id_no     = $(this).data("id_no");
   var m_name    = $(this).data("m_name");
   var m_sur     = $(this).data("m_sur");
   var nick_name = $(this).data("nick_name");
   var zone      = $(this).data("zone");
   var area      = $(this).data("area");
   var status    = $(this).data("status");

    $("#m_id01").val(id);
    $("#id_no").val(id_no);
    $("#m_name").val(m_name);
    $("#m_sur").val(m_sur);
    $("#nick_name").val(nick_name);
    $("#zone").val(zone);
    $("#area").val(area);
    $("#status").val(status);

});

 $('#insert_member').submit(function (e) {
    e.preventDefault();
    var insert_member  = "insert_member";
   $.ajax({
       type: "post",
       url: "manages.php",
       data: $(this).serialize()+"&insert_member="+ insert_member,
       dataType: "json",
       success: function (response) {
           if (response.data=="1"){
           window.location.reload();
          }
       }
   });
});

$("#update_member_").submit(function (e) {
    e.preventDefault();
    var  update_member = "update_member"
   $.ajax({
       type: "post",
       url: "manages.php",
       data: $(this).serialize()+ "&update_member=" + update_member,
       dataType: "json",
       success: function (response) {
           if(response.data =="1"){
            window.location.reload();
           }
       }
   });
});

$(".del").click(function (e) {
    e.preventDefault();
    var del = "del";
    var m_id = $(this).data("id");
    Swal.fire({
        title: 'ถามก่อนลบ',
        text: "คุณต้องการลบรายการนี้หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่!',
        cancelButtonText: 'ปิด!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: "manages.php",
                data:{"del":del,"m_id" : m_id},
                dataType: "json",
                success: function (response) {
                    if(response.data =="1"){
                   window.location.reload();
                        Swal.fire(
                            'ยืนยันการลบ!',
                            'คุณได้ทำการลบข้อมูลเรียบร้อยแล้ว.',
                            'success'
                        )
                    }
                    }

            });
    }
 });
});


$("#insert_visitor_time").submit(function (e) {
    e.preventDefault();

    var insert = "insert_visitor_time";
    $.ajax({
        type: "post",
        url: "manages.php",
        data: $(this).serialize() + "&insert_visitor_time=" + insert,
        dataType: "json",
        success: function (response) {
            if (response.data == "1") {
                Swal.fire({
                    title: 'บันทึก',
                    text: "บันทึกข้อมูลสำเร็จ!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ใช่!',
                }).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                })

            } else if (response.data == "10") {
                Swal.fire(
                    'แจ้งเตือน!',
                    'ข้อมูลนี้มีอยู่แล้วไม่สามารถเพิ่มได้.',
                    'error'
                )
            }
        }
    });
});


$("#insert_church_time").submit(function (e) {
    e.preventDefault();

    var insert = "insert_church_time";
    $.ajax({
        type: "post",
        url: "manages.php",
        data: $(this).serialize() + "&insert_church_time=" + insert,
        dataType: "json",
        success: function (response) {
            if (response.data == "1") {
                Swal.fire({
                    title: 'บันทึก',
                    text: "บันทึกข้อมูลสำเร็จ!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ใช่!',
                }).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                })

            }else if(response.data == "10"){
                Swal.fire(
                    'แจ้งเตือน!',
                    'ข้อมูลนี้มีอยู่แล้วไม่สามารถเพิ่มได้.',
                    'error'
                )
            }
        }
    });
});

$(".del_church_time").click(function(e){
    e.preventDefault();
    Swal.fire({
        title: 'ถามก่อนลบ',
        text: "คุณต้องการลบรายการนี้หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่!',
        cancelButtonText: 'ปิด!',
    }).then((result) => {
        if (result.value) {

            var del = "del_time";
            var c_id = $(this).data("id");

            $.ajax({
                type: "post",
                url: "manages.php",
                data: { "del": del, "c_id": c_id },
                dataType: "json",
                success: function (response) {
                    if (response.data =="1") {
                        window.location.reload();
                    }
                }
            });

        }
    });

});

$(".del_visitor_time").click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'ถามก่อนลบ',
        text: "คุณต้องการลบรายการนี้หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่!',
        cancelButtonText: 'ปิด!',
    }).then((result) => {
        if (result.value) {

            var del = "del_visitor_time";
            var c_id = $(this).data("id");

            $.ajax({
                type: "post",
                url: "manages.php",
                data: { "del": del, "c_id": c_id },
                dataType: "json",
                success: function (response) {
                    if (response.data == "1") {
                        window.location.reload();
                    }
                }
            });

        }
    });

});

$("#check_member").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "check.php",
        data: $(this).serialize(),
        success: function (response) {
         $("#show_data_check").html(response)
        }
    });

});


$('#interested_person').submit(function (e) {
    e.preventDefault();
    var insert_person  = "insert_person";
$.ajax({
    type: "post",
    url: "manages.php",
    data: $(this).serialize()+"&insert_person="+insert_person,
    dataType: "json",
    success: function (response) {
      if(response.data == "1"){

          $('#register').hide();
         Swal.fire({
             title: 'Registration complete!',
             html: 'คุณ' + response.name + ' <br>' +
                 response.date + '<br>' +
                 'รอบที่ ' + response.around +
                 '  เวลา ' + response.time + '<br>' +
                 '<b class="text-danger">กรุณาติดต่อเพื่อรับ QR Code และรับของที่ระลึกได้ที่เคาเตอร์ประชาสัมพันธ์ กรุณามาก่อนเวลาเริ่มรอบไม่ต่ำกว่า 15 นาที</b><br>',
             icon: 'success',
             showCancelButton: false,
             confirmButtonColor: '#3085d6',
             confirmButtonText: 'OK!',
         }).then((result) => {
             if (result.value) {
                 window.location.reload();
             }
         })

      } else if (response.data == "10") {

          Swal.fire({
              icon: 'error',
              title: 'แจ้งเตือน',
              text: 'คุณได้ทำการลงทะเบียนไปแล้ว!',

          })

      } else if (response.data == "00") {
          Swal.fire({
              icon: 'error',
              title: 'แจ้งเตือน',
              text: 'ที่นั่งเต็มแล้ว!',
          })
      }
    }
});

});


$('.del_mem').click(function(e){
    e.preventDefault();
    var del = "del_mem";
    Swal.fire({
        title: 'ถามก่อนลบ',
        text: "คุณต้องการลบรายการนี้หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่!',
        cancelButtonText: 'ปิด!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: "manages.php",
                data: { 'id': $(this).data('id'), 'del': del },
                dataType: "json",
                success: function (response) {

                    if(response.data =="1"){
                        window.location.reload();
                    }
                }
            });
        }
    })


})

$('.del_visitor').click(function(e){
  e.preventDefault();
  var del  = "del_visitor";
    Swal.fire({
        title: 'ถามก่อนลบ',
        text: "คุณต้องการลบรายการนี้หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่!',
        cancelButtonText: 'ปิด!',
    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: "post",
                url: "manages.php",
                data: { "del": del, 'id': $(this).data('id') },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.data=="1") {
                        window.location.reload();
                    }
                }
            });
        }
    })

})