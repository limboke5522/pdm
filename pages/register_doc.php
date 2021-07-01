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



            <div class="row">

              <div class="ml-3">
                      <label> เอกสาร : </label>
              </div>       
              <div class="col-2">
                      <select class="custom-select form-control " id="select_doc" onchange="show_data();">
                          <option value="0" selected >ทั้งหมด</option>
                          <option value="1">เอกสารภายใน</option>
                          <option value="2">เอกสารภายนอก</option>
                      </select>
              </div>
              
              <div class="ml-1">
                <label> Product : </label>
              </div> 
              <div class="col-2">
                       <select class="form-control select2" id="select_productt"  onchange="show_data();" ></select>
              </div>

              <div class="ml-1">
                      <label> ประเภทเอกสาร : </label>
                      
              </div>       
              <div class="col-2">
                      <select class="custom-select form-control " id="select_doctype" onchange="show_data();" ></select>
              </div>
              

              <div class="col-2">
                <input type="text" class="form-control" id="txtSearch" onkeyup="show_data();" placeholder="ค้นหารายการ">
              </div>
              <div class="col-2">
                <!-- <button type="submit" class="btn btn-primary" >ค้นหา</button> -->
                <!-- <button type="submit" class="btn btn-success" id="showModalAddUsers">เพิ่มข้อมูล</button> -->
              </div>
            </div>


            <div class="row mt-2 card-body table-responsive p-0" id="tb_data" style="height: 420px;max-height: 350px;overflow-y: auto;">
              <div class="col-12">
                <table id="data_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 3%;" class="bg_tableAll"></th>
                      <th style="width: 3%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">เลขที่เอกสาร</th>
                      <th class="bg_tableAll">รายการเอกสาร</th>
                      <th class="bg_tableAll">เลขที่สำคัญ</th>
                      <th class="bg_tableAll">สถานะ</th>
                      <th class="bg_tableAll">ประเภทเอกสาร</th>
                      <!-- <th style="width: 15%;" class="bg_tableAll">วันที่ต่อทะเบียน</th>
                      <th style="width: 15%;" class="bg_tableAll">วันหมดอายุ</th> -->
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
            <hr>


            <div class="row ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>เลขที่คุมเอกสาร :</label>
                <input type="text" class="form-control" id="txt_DocNo" placeholder="เลขที่คุมเอกสาร" autocomplete="off">
              </div>

              <div class="col-3 mt-3">
                <label>ชื่อเอกสาร :</label>
                <input type="text" class="form-control" id="ID_txt" hidden>
                <input type="text" class="form-control" id="txt_Doc_name" placeholder="ชื่อเอกสาร" autocomplete="off">
              </div>

              <div class="col-3 mt-3">
                <label>เลขสำคัญ :</label>
                <input type="text" class="form-control" id="txt_Doc_numbar" placeholder="เลขสำคัญ" autocomplete="off">
              </div>

             

            </div>

            <div class="row col-12 ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>เอกสาร :</label>
                  <div class="row ">

                                  <div class=" form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="1" name="StatusRadio" id="StatusRadio1" style="width: 20px; height: 20px;" >
                                    <label class="ml-2" for="StatusRadio1"  > เอกสารภายใน </label>
                                  </div>
                                  <div class=" form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="2" name="StatusRadio" id="StatusRadio2" style="width: 20px; height: 20px;">
                                    <label class="ml-2" for="StatusRadio2" > เอกสารภายนอก </label>
                                  </div>
                  </div>

              </div>
              <div class="col-3 mt-3">
                <label>ประเภทเอกสาร :</label>
                <div class="row ">

                                  <div class="col-10 form-check form-check-inline">
                                      <select class="custom-select form-control "  id="select_doctype2" onchange="chk_selectDoc(1);"></select>
                                  </div>
                  </div>
              </div>

              <div class="col-3 mt-3">
                <label>Product :</label>
                <div class="row ">

                                  <div class="col-10 form-check form-check-inline">
                                      <select class="custom-select form-control select2" id="select_Product"></select>
                                  </div>
                  </div>
              </div>
              
              
              </div>  
            <!-- <div class="row ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>เอกสาร :</label>
                <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_date_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
              </div>
              <div class="col-3 mt-3">
                <label>ประเภทเอกสาร :</label>
                <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_expira_date" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
              </div>
              <div class="col-3 mt-5">
                <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-warning ml-2" id="btnEditDoc">แก้ไข</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-danger ml-2" id="btnDeleteDoc">ลบ</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-secondary ml-2" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div> -->
            <!-- </div> -->

            <div class="row ml-4 mt-1">
              <div class="col-6 mt-3">
                <label>คำอธิบาย :</label>
                <textarea  class="form-control" id="txt_detail" rows="3"></textarea>
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