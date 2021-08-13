            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row ">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">ส่งเอกสาร</li>
                    </ol>
                  </div><!-- /.col -->



                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card ">
              <div class="card-body " style=" background-color: #b5efec57;">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group row">
                      <label for="select_hospital" class="col-sm-3 col-form-label">โรงพยาบาล</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="select_hospital" placeholder="โรงพยาบาล"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group row">
                      <label for="select_subject" class="col-sm-3 col-form-label">เรื่อง</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="select_subject" placeholder="เรื่อง"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-3 ">
                    <div class="form-group row ">
                      <label for="select_contact" class=" col-sm-3 col-form-label">ผู้ติดต่อ</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="select_contact" placeholder="ผู้ติดต่อ "></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <button type="submit" class="btn btn-success btn-block" id="btn_save_send">ส่ง</button>
                  </div>

                </div>

                <div class="row ">

                  <div class="col-4">
                    <div class="form-group row">
                      <label for="txt_phone" class="col-sm-3 col-form-label">โทร </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="txt_phone" placeholder="โทร">
                      </div>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group row">
                      <label for="txt_email" class="col-sm-3 col-form-label">Email ผู้รับ</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="txt_email" placeholder="Email">
                      </div>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group row ">
                      <label for="Copy_doc" class="col-sm-3 col-form-label">สำเนา</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="Copy_doc" name="Copy_doc" placeholder="สำเนา">
                      </div>

                    </div>
                  </div>

                  <div class="col-1 ">
                    <button type="submit" class="btn btn-danger btn-block" id="btn_cancel">ยกเลิก</button>
                  </div>

                </div>

                <div class="row ">

                  <div class="col-4">
                    <!-- <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="chk_remark" onclick="chkremark();">
                      <label class="form-check-label" for="inlineCheckbox1">บันทึกช่วยจำ</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="chk_headdoc" onclick="chkremark();">
                      <label class="form-check-label" for="inlineCheckbox2">หัวเรื่อง E-Mail</label>
                    </div> -->
                    <div class="form-group row">
                      <label for="txt_phone" class="col-sm-3 col-form-label"> </label>
                      <input class="" style="width:20px; height: 20px;  margin-top: 10px" type="checkbox" id="chk_remark" onclick="chkremark();">
                      <label for="txt_remark" class="col-sm-3 col-form-label">บันทึกช่วยจำ</label>

                      <!-- <input style="width:20px; height: 20px;   margin-top: 10px" type="checkbox" id="chk_headdoc" onclick="chkremark();">
                      <label for="txt_remark" class="col-sm-3 col-form-label">หัวเรื่อง E-Mail</label> -->
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group row">
                      <label for="txt_email" class="col-sm-3 col-form-label">Email ผู้ส่ง :</label>
                      <div class="col-sm-9">
                        <u style="font-size: 18px;" id="txt_email_send"> </u>
                      </div>
                    </div>
                  </div>



                  <div class="col-3">
                    <div class="form-group row ">
                    </div>
                  </div>

                  <div class="col-1 ">
                  </div>

                </div>



                <div class="row">
                  <div class="col-6 mt-2" style="margin-left: 70px;">
                    <div class="form-group row ">
                      <div class="col-6 ml-5">
                        <textarea style="height: 80px;" class="form-control" id="txt_remark" placeholder="บันทึกช่วยจำ"></textarea>
                      </div>

                      <div class="col-6 mt-1 " style="margin-left: 48px;">
                        <textarea style="height: 80px;" class="form-control" id="txt_headdoc" placeholder="หัวเรื่อง E-Mail"></textarea>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>


            <div class="row mt-3">

              <div class="col-4">
                <div class="card-body">
                  <div class="form-group row">

                    <div class="col-10">
                      <div class="form-group row">
                        <label for="select_subject" class="col-4 col-form-label">ประเภทเอกสาร</label>
                        <div class="col-8 ">
                          <select class="form-control select2" id="select_DocTypeID_L" onchange="check_selection(1);"></select>
                          <input type="text" class="form-control" id="select_DocTypeID_L_hide" hidden />
                        </div>
                      </div>
                    </div>



                    <div class="col-10">
                      <div class="form-group row">
                        <label for="select_subject" class="col-4  col-form-label">เลือกProduct </label>
                        <div class="col-8 mt-2 ">
                          <select class="form-control select2" id="select_product" placeholder="product" onchange="check_selection(2);"></select>
                        </div>
                      </div>
                    </div>


                  </div>
                  <table id="table_product" class="table table-bordered table-hover w-100 table-head-fixed">
                    <thead>
                      <tr class="text-center">
                        <th class="bg_tableAll" style="width: 7%;"></th>
                        <th class="bg_tableAll" style="width: 10%;">ลำดับ</th>
                        <th class="bg_tableAll" style="width: 50%;">product</th>
                        <th class="bg_tableAll" style="width: 10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="col-4">
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-10">
                      <div class="form-group row">
                        <label for="select_subject" class="col-4 col-form-label">หัวข้อเอกสาร</label>
                        <div class="col-8 ">
                          <select class="form-control select2" id="select_Doclist" onchange="checkProduct(1);"></select>
                          <input type="text" class="form-control" id="select_DocTypeID_hide" hidden />
                        </div>
                      </div>
                    </div>
                    <div class="col-2 ">
                      <input type="checkbox" style=" margin-left: 15px; width: 20px; height: 20px;" class="btn btn-danger btn-block " id="checkbox_all" onclick="selection_Doclist()">ทั้งหมด</input>
                    </div>
                  </div>





                  <!-- <div class="form-group row">
                    <label for="select_subject" class="col-3 col-form-label">หัวข้อเอกสาร</label>
                    <div class="col-9">
                      <select class="form-control select2" id="select_Doclist" onchange="checkProduct();" disabled></select>
                      <input type="text" class="form-control" id="select_DocTypeID_hide" hidden>
                    </div>
                  </div> -->

                  <div class="row ">
                    <div class="col-12">
                      <table id="table_product_list_document" class="table table-bordered table-hover w-100 table-head-fixed">
                        <thead>
                          <tr class="text-center">
                            <th class="bg_tableAll">ลำดับ</th>
                            <th class="bg_tableAll">เอกสาร</th>
                            <!-- <th class="bg_tableAll">version</th> -->
                            <th class="bg_tableAll">สิทธิ</th>
                            <th class="bg_tableAll">Preview</th>
                            <th class="bg_tableAll"><br></th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-4 ">
                <div class="card-body" style="background-color: #b5efec57;">
                  <div class="form-group row">
                    <label for="txt_product_center" class="col-sm-4 col-form-label">รายการเอกสารที่จะส่ง</label>
                  </div>
                  <table id="table_product_docment" class="table table-bordered table-hover w-100 table-head-fixed">
                    <thead>
                      <tr class="text-center">
                        <th class="bg_tableAll">ลำดับ</th>
                        <th class="bg_tableAll">เอกสาร</th>
                        <th class="bg_tableAll">version</th>
                        <th class="bg_tableAll"></th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="Modaldetail_Doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content" role="document">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">เพิ่มผู้ติดต่อ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ">

                    <div class="row  mt-2 mb-4" style="margin-left: 15%">

                      <div class="col-5 mt-3">
                        <label>ผู้ติดต่อ :</label>
                        <input type="text" class="form-control" id="ID_txt" hidden>
                        <input type="text" class="form-control" id="txt_contact_name" placeholder="ชื่อผู้ติดต่อ" autocomplete="off">
                      </div>
                      <div class="col-5 mt-3">
                        <label>แผนก :</label>
                        <input type="text" class="form-control" id="txt_deb_name" placeholder="ชื่อแผนก" autocomplete="off">
                      </div>

                    </div>
                    <div class="row   mb-3" style="margin-left: 15%">
                      <div class="col-5 ">
                        <label>Email :</label>
                        <form>
                          <input type="email" class="form-control enonly" id="txt_email2" placeholder="E-Mail" autocomplete="off">
                        </form>
                      </div>
                      <div class="col-5 ">
                        <label>เบอร์ติดต่อ :</label>
                        <input type="text" class="form-control numonly" id="txt_phonenumber" placeholder="เบอร์โทร" autocomplete="off">
                      </div>

                    </div>

                    <div class="row  mb-3" style="margin-left: 42%">

                      <div class="col-5 ">
                        <button style="width: 100px;" type="button" class="btn btn-outline-success " id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="modal fade" id="Modaldetail_Doc2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                <div class="modal-content" role="document">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">เพิ่มหัวข้อเรื่อง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="row  mt-2 mb-5" style="margin-left: 20%">

                      <div class="col-6 mt-3">
                        <label>วัตถุประสงค์ :</label>
                        <input type="text" class="form-control" id="txt_purpose_name" placeholder="ชื่อวัตถุประสงค์">
                      </div>
                      <div class="col-6 mt-5 ">
                        <button style="width: 100px;" type="button" class="btn btn-outline-success" id="btnSaveDoc2" onclick="saveData2();">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade " data-keyboard="false" data-backdrop="static" id="Modaldetail_Preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                <div class="modal-content " role="document">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">รายละเอียดข้อมูลการส่งเอกสาร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ">

                    <div class="row ">
                      <div class="row ml-3 mt-1">
                        <input type="text" class="form-control" id="chk_sender" hidden>
                        <label>POSEINT :</label>
                        <div class="col-8  ">
                          <h5 id="POSEINT"> </h5> <!-- ชื่ออีเมลผู้ส่ง  -->
                        </div>
                      </div>
                    </div>

                    <div class="row  ">
                      <div class="row ml-3 ">
                        <label>วันที่ส่ง : </label>
                        <div class="row ml-4 ">
                          <h5 id="date_upload"> </h5> <!-- วันที่ส่ง  -->
                        </div>
                      </div>
                    </div>

                    <div class="row  ">
                      <div class="row ml-1 col-10">
                        <label class=" col-1 ">ถึง :</label>
                        <div class="col-8 ml-3">
                          <h5 id="send_name" style="margin-left: 5px;"> </h5> <!-- ชื่อไอเท็ม  -->
                        </div>
                      </div>
                    </div>



                    <div class="divider"></div> <!-- ขีดเส้นใต้ -->

                    <div class="row  ">
                      <div class="row ml-1 col-12">
                        <label class="col-1 mt-1">เรื่อง :</label>
                        <div class="col-11  ">
                          <input type="text" class="form-control" id="txtPopup_purpose_name"> <!-- ชื่อเรื่อง  -->
                        </div>
                      </div>
                    </div>

                    <label id="detail" style="margin-top: 25px; ">รายละเอียด</label>
                    <div class="row  ">
                    
                        <div class="col-12" style=" height: 200px;" id="div_editor">
                          <div id="toolbar"></div>
                          <div id="editor"></div>
                        </div>
                  
                    </div>
                    <br><br>


                    <div class="row mt-3" id="p_file_img">

                    </div>

                    <div div class="divider"></div>

                    <div class="row ">
                      <div class="col-12 ml-2 mt-3">
                        <div class="col-8  ">
                          <label id="footer_title"> </label> <!-- footer_title  -->
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-12 ml-2 ">
                        <div class="col-8  ">
                          <label id="f_l_name"> </label> <!-- f_l_name  -->
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="row ml-4 ">
                        <label>Tel :</label>
                        <div class="row ml-2 ">
                          <label id="Tel"> </label> <!-- Tel  -->
                        </div>
                      </div>
                    </div>

                    <div div class="divider"></div> <!-- ขีดเส้นใต้ -->
                    <div class="row mt-1 ml-2 justify-content-end">
                      <button type="button" class="btn btn-outline-success" id="btnSaveDoc_Preview">บันทึก</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>