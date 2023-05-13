<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg_c">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalTitle">กรอกรายการเพื่อเข้าร่วมรอบนมัสการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form id="search">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">กรุณากรอกเลขสมาชิก :</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_no" placeholder="MXXXXXX" required>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-info">ค้นหา</button>
                        </div>

                        <hr>
                    </div>
                </form>
                <form method="post" id="insert_register_bose">
                    <div class="form-group row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12" id="show_data"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="update_member" tabindex="-1" role="dialog" aria-labelledby="update_member-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header ">
                <h5 class="modal-title" id="update_memberTitle">แก้ไขสมาชิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_member_">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">รหัสสมาชิก :</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="m_id" id="m_id01" placeholder="id">
                            <input type="text" class="form-control" name="id_no" id="id_no" placeholder="รหัสสมาชิก">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">ชื่อ-สกุล :</label>
                        <div class="col-sm-4">
                            <input type="text" name="m_name" id="m_name" class="form-control" placeholder="ชื่อ">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="m_sur" id="m_sur" class="form-control" placeholder="สกุล">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="nick_name" id="nick_name" class="form-control" placeholder="ชื่อเล่น">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">โซน :</label>
                        <div class="col-sm-10">
                            <input type="text" name="zone" id="zone" class="form-control" placeholder="โซน">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">พื้นที่ :</label>
                        <div class="col-sm-10">
                            <input type="text" name="area" id="area" class="form-control" placeholder="พื้นที่">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-right">สถานะ :</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status" id="status">
                                <option value="">--- สถานะ ---</option>
                                <?php $sql = mysqli_query($conn, "SELECT * From member group by status");
                                while ($rs = mysqli_fetch_assoc($sql)) { ?>
                                    <option value="<?= $rs['status'] ?>"><?= $rs['status'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="check" tabindex="-1" role="dialog" aria-labelledby="check-label" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content bg_c">
            <div class="modal-header">
                <h5 class="modal-title" id="checkTitle">ตรวจสอบการลงทะเบียน
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="check_member">
                    <div class="container">
                        <div class="row justify-content-around">
                            <div class="col-md-4">
                                <input type="text" name="id_no" class="form-control" placeholder="MXXXXXX">
                            </div>
                            <div class="col-sm-4 input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="c_date" data-target="#datetimepicker4" placeholder="เลือกวันที่เข้าโบส์" />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info">ค้นหา</button>
                            </div>
                            <div class="col-md-12" id="show_data_check">

                            </div>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">ปิด</button></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade " id="register" tabindex="-1" role="dialog" aria-labelledby="register-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg_c">
            <div class="modal-header">
                <h5 class="modal-title" id="registerTitle">แขกผู้สนใจมาเยี่ยมคริสตจักร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="interested_person">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">เลขสมาชิกของผู้แนะนำ :</label>
                        <div class="col-sm-8">
                            <input type="text" name="name_suggest" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">ชื่อ :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="i_name" required>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">หมายเลขโทรศัพท์ :</label>
                        <div class="col-sm-8">
                            <input type="phone" name="tel" class="form-control" maxlength="10" required>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">กรุณาเลือกวันที่ :</label>
                        <div class="col-sm-8">
                            <select name="date_1" id="c_date_visitor_search" name="c_date" class="form-control" required>
                                <option value="">-- กรุณาเลือกวันที่ --</option>
                                <?php $date = date("Y-m-d");
                                $sql = mysqli_query($conn, "SELECT * FROM visitor_time Where c_date >= '$date'");
                                while ($rs_ = mysqli_fetch_assoc($sql)) { ?>
                                    <option value="<?= $rs_['c_date'] ?>"><?= $rs_['c_date'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div id="data2"></div>
                </form>
            </div>
        </div>
    </div>
</div>