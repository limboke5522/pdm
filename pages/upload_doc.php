            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">อัพโหลดเอกสาร</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card">
            <div class="card-body">
            <div class="row">
              
              <div class="col-6">
                <div class="row " style="margin-left: 1px;">

                  <div class="col-4">
                    <input type="text" style="width: 250px;" class="form-control" id="txtSearch2" onkeyup="show_DataRight();" placeholder="ค้นหาเอกสาร">
                  </div>
    
                  <div class="col-5">
                  <div class="form-group" id="div_upload">
                          <div class="custom-file ">
                            <input type="file" class="custom-file-input" name="inputFile" id="upload_fileRight" accept="application/pdf">
                            <label class="custom-file-label" for="inputFile">เลือกไฟล์</label>
                          </div>
                   
                  </div>

        
                      </div>
                      <div class="col-3">
                  <button style="width: 50%;margin-left: 50px;" type="button" class="btn btn-outline-primary" onclick="upload_Doc();">Upload</button>
                  
                  </div>
                      
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-12">
                <div class="row mt-2 card-body table-responsive p-0" id="tb_Data" style="height: 620px;max-height: 620px;overflow-y: auto;">
                  <div class="col-12">
                    <table id="Data_TableRight" class="table table-bordered table-hover w-100 table-head-fixed">
                      <thead>
                        <tr class="text-center">
                          <th  class="bg_tableAll">เอกสาร</th>
                          <th  class="bg_tableAll">ประเภทเอกสาร</th>
                          <th  class="bg_tableAll">Product</th>
                          <th  class="bg_tableAll">หัวข้อเอกสาร</th>
                          <th  class="bg_tableAll">วันที่ผลิตเอกสาร</th>
                          <th  class="bg_tableAll">วันหมดอายุ</th>
                          <th  class="bg_tableAll">วันที่อัปโหลด</th>
                          <th  class="bg_tableAll"></th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>


              </div>
            </div>
            </div>
          </div>


          <div  class="modal fade" id="Modaldetail_Doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">เลือกวันที่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row  mt-2 mb-5" style="margin-left: 20%">
              
                  <div class="col-3 mt-3">
                  <label>วันที่ผลิตเอกสาร :</label>
                  <input type='text' autocomplete='off' class='form-control  datepicker-here' id='bt_UploadDate_"+key+"' onclick="show_DataRight();" value='<?php echo date('d/m/Y'); ?>' data-language='en' data-date-format='dd-mm-yyyy' placeholder='วันที่' readonly>
                  </div>
                  <div class="col-3 mt-5 ">
                    <button style="width: 100px;" type="button" class="btn btn-outline-success" id="btnSaveDoc2" onclick="saveData2();">บันทึก</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>