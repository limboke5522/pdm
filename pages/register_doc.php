            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">ลงทะเบียนเอกสาร</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->



            <div class="row px-2">
              <div class="col-3">
                <div class="form-group">
                  <label for="select_doc">เอกสาร :</label>
                  <select class="custom-select form-control " id="select_doc" onchange="show_data();">
                    <option value="0" selected>ทั้งหมด</option>
                    <option value="1">เอกสารภายใน</option>
                    <option value="2">เอกสารภายนอก</option>
                  </select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="select_productt">Product :</label>
                  <select class="form-control select2" id="select_productt" onchange="show_data();"></select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="select_doctype">ประเภทเอกสาร :</label>
                  <select class="form-control select2" id="select_doctype" onchange="show_data();"></select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="select_doctype">ค้นหารายการ :</label>
                  <input type="text" class="form-control" id="txtSearch" onkeyup="show_data();" placeholder="ค้นหารายการ">
                </div>
              </div>


            </div>


            <div class="row mt-3 table-responsive p-0" id="tb_data" style="height: 420px;max-height: 350px;overflow-y: auto;">
              <div class="col-12">
                <table id="data_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 3%;" class="bg_tableAll"></th>
                      <th style="width: 3%;" class="bg_tableAll">ลำดับ</th>
                      <th style="width: 10%;" class="bg_tableAll">เลขที่เอกสาร</th>
                      <th style="width: 15%;" class="bg_tableAll">ประเภทเอกสาร</th>
                      <th style="width: 15%;" class="bg_tableAll">หัวข้อเอกสาร</th>
                      <th style="width: 10%;" class="bg_tableAll">Product</th>
                      <th style="width: 10%;" class="bg_tableAll">Ref Doc</th>
                      <th style="width: 10%;" class="bg_tableAll">วันที่ผลิตเอกสาร</th>
                      <th style="width: 10%;" class="bg_tableAll">วันหมดอายุ</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
            <hr>


            <div class="row  mt-1">

              <div class="col-3">
                <div class="form-group">
                  <label for="">เลขที่คุมเอกสาร :</label>
                  <input type="text" class="form-control" id="txt_DocNo" placeholder="เลขที่คุมเอกสาร" autocomplete="off">
                  <input type="text" class="form-control" id="ID_txt" hidden>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">ไฟล์ :</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file_upload">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">Ref Doc :</label>
                  <input type="text" class="form-control" id="txt_refDoc" placeholder="Ref Doc" autocomplete="off">
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <div class="form-group">
                    <label for="">เอกสาร</label>
                  </div>
                  <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="1" name="StatusRadio" id="StatusRadio1" style="width: 20px; height: 20px;">
                    <label class="ml-2" for="StatusRadio1"> เอกสารภายใน </label>
                  </div>
                  <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="2" name="StatusRadio" id="StatusRadio2" style="width: 20px; height: 20px;">
                    <label class="ml-2" for="StatusRadio2"> เอกสารภายนอก </label>
                  </div>
                </div>
              </div>







            </div>

            <div class="row mt-1">



              <div class="col-3">
                <div class="form-group">
                  <label for="">ประเภทเอกสาร :</label>
                  <select class="custom-select form-control " id="select_doctype2" onchange="chk_selectDoc(1);"></select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">หัวข้อเอกสาร :</label>
                  <select class="custom-select form-control " id="select_headdoc"></select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">Product :</label>
                  <select class="custom-select form-control select2" id="select_Product"></select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">วันที่ผลิตเอกสาร :</label>
                  <input type='text' class='form-control datepicker-here' data-language='en' data-date-format='dd-mm-yyyy' id="MFGDate" placeholder="วว/ดด/ปปปป">
                </div>
              </div>

            </div>


            <div class="row  mt-1">

              <div class="col-3">
                <div class="form-group">
                  <label for="">วันหมดอายุ :</label>
                  <input type='text' class='form-control  datepicker-here' data-language='en' data-date-format='dd-mm-yyyy' id="ExpireDate" placeholder="วว/ดด/ปปปป">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <label for="">คำอธิบาย :</label>
                  <textarea class="form-control" id="txt_detail" rows="3"></textarea>
                </div>
              </div>


              <div class="col-3 mt-5">
                <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-warning ml-2" id="btnEditDoc">แก้ไข</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-danger ml-2" id="btnDeleteDoc">ลบ</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-secondary ml-2" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div>
            </div>

            <div class="modal fade" id="Modaldetail_Doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                        <label>ประเภทเอกสาร :</label>
                        <input type="text" class="form-control" id="txt_detail_name" placeholder="ชื่อประเภทเอกสาร">
                      </div>

                      <div class="col-6 mt-5 ">
                        <button style="width: 100px;" type="button" class="btn btn-outline-success" id="btnSaveDoc2" onclick="saveData2();">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>