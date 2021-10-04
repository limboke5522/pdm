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

            <div class="row">
							<div class="container col-12">

                

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" onclick="show_DataLeft();"  data-toggle="tab" href="#little_exp" role="tab" aria-controls="little_exp" aria-selected="false">ค้นหาเอกสารอัพโหลด</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" onclick="show_DataRight();" data-toggle="tab" href="#little_exp2" role="tab" aria-controls="little_exp2" aria-selected="false">อัพโหลดเอกสาร</a>
                    </li>
                </ul>

              <div  id="tb_Data_LL">
                  <div class="col-12 mt-3">
                          <label class="col-2"> ประเภทเอกสาร : </label>
                          <label class="col-2"> Product : </label>
                          <label class="col-2"> หัวข้อเอกสาร : </label>
                      <div class="row">
                            <div class="col-2">
                                <select class="custom-select form-control " id="select_doctype" onchange="check_selection(1);show_DataLeft();" ></select>
                            </div>

                            <div class="col-2">
                                    <select style="width: 100%" class="custom-select form-control select2" id="select_product"  onchange="check_selection(2);" ></select>
                            </div>

                            <div class="col-2">
                                    <select style="width: 100%" class="custom-select form-control select2" id="select_dochead" onchange="check_selection();" ></select>
                            </div>

                            <div class="col-2">
                              <input type="text"  class="form-control" id="txtSearch" onkeyup="show_DataLeft();" placeholder="ค้นหารายการ">
                            </div>
                      
                      </div>


                    <div class="row" >
                      <div class="col-12">
                        <div class="row mt-2  table-responsive p-0" id="tb_Data_L" style="height: 500px;max-height: 500px;overflow-y: auto;">
                          <div class="col-12">
                            <table id="Data_TableLeft" class="table table-bordered table-hover w-100 table-head-fixed">
                              <thead>
                                <tr class="text-center">
                                  <!-- <th  class="bg_tableAll">เลขที่เอกสาร</th> -->
                                  <th  class="bg_tableAll">เอกสาร</th>
                                  <th  class="bg_tableAll">เลขที่เอกสาร</th>
                                  <th  class="bg_tableAll">ประเภทเอกสาร</th>
                                  <th  class="bg_tableAll">รหัสสินค้า</th>
                                  <th  class="bg_tableAll">Product</th>
                                  <th  class="bg_tableAll">หัวข้อเอกสาร</th>
                                  <th  class="bg_tableAll">version</th>
                                  <th  class="bg_tableAll">Ref Doc</th>
                                  <th  class="bg_tableAll">วันที่ผลิตเอกสาร</th>
                                  <th  class="bg_tableAll">วันหมดอายุ</th>
                                  <!-- <th  class="bg_tableAll">วันที่อัปโหลด</th> -->
                                  <th  class="bg_tableAll">Preview</th>
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
          
              <div class="card" id="tb_Data_RR">
              <div class="col-8 mt-3" >
                  <div class="row " style="margin-left: 1px;">

                      <div class="col-3">
                        <input type="text" style="width: 250px;" class="form-control" id="txtSearch2" onkeyup="show_DataRight();" placeholder="ค้นหาเอกสาร">
                      </div>
        
                      <div class="col-6">
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
                <div class="col-12">
                  <div class="row mt-2 card-body table-responsive p-0" id="tb_Data_R" style="height: 500px;max-height: 500px;overflow-y: auto;">
                    <div class="col-12">
                      <table id="Data_TableRight" class="table table-bordered table-hover w-100 table-head-fixed">
                        <thead>
                          <tr class="text-center">
                            <th  style='width:10%;' class="bg_tableAll">เอกสาร</th>
                            <th  style='width:5%;' class="bg_tableAll">ประเภทเอกสาร</th>
                            <th  style='width:5%;' class="bg_tableAll">Product</th>
                            <th  style='width:5%;' class="bg_tableAll">หัวข้อเอกสาร</th>
                            <th  style='width:5%;' class="bg_tableAll">Ref Doc</th>
                            <th  style='width:5%;' class="bg_tableAll">วันที่ผลิตเอกสาร</th>
                            <th  style='width:5%;' class="bg_tableAll">วันหมดอายุ</th>
                            <!-- <th  class="bg_tableAll">วันที่อัปโหลด</th> -->
                            <th  style='width:2%;' class="bg_tableAll"></th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>


                </div>
            
            
          </div>


          <!-- <div  class="modal fade" id="Modaldetail_Doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content col-6" role="document">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">เลือกวันที่</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body ">
                        
                        <div class="row  mb-4 " style="margin-left: 15%">
                      
                          <div class="col-6 mt-3">
                            <label>วันที่ผลิตเอกสาร</label>
                            <input type='text' autocomplete='off' class='form-control  datepicker-here' id='bt_UploadDatee'  value='<?php echo date('d/m/Y'); ?>' data-language='en' data-date-format='dd-mm-yyyy' placeholder='วันที่' readonly>
                            </div>
                            
                            <div class="col-3 mt-5 ">
                              <button style="width: 100px;" type="button" class="btn btn-outline-success" id="btnSaveDoc2" onclick="show_DataRight();">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div> -->
          </div>

 <div class="modal fade" id="Modaldetail_Doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">เพิ่มหัวข้อเอกสาร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-12">
                
                <!-- <div class="row  mt-2 mb-5" style="margin-left: 20%"> -->
              
                <div class="row ml-5 mt-1">
                    <div class="col-5 mt-3">
                            <label>ประเภทเอกสาร :</label>
                            <select class="custom-select form-control " id="select_doctype_popup"  ></select>
                          </div>

                    <div class="col-5 ml-5 mt-3">
                      <label>เลขที่คุมเอกสาร :</label>
                      <input type="text" class="form-control" id="txt_DocNo" placeholder="เลขที่คุมเอกสาร" autocomplete="off">
                    </div>

                   
                </div>

                <div class="row ml-5 mt-1">
                    <div class="col-5 mt-3">
                          <label>ชื่อเอกสาร :</label>
                          <input type="text" class="form-control" id="ID_txt" hidden>
                          <input type="text" class="form-control" id="txt_Doc_name" placeholder="ชื่อเอกสาร" autocomplete="off">
                        </div>

                        <div class="col-5 ml-5 mt-3">
                          <label>เลขสำคัญ :</label>
                          <input type="text" class="form-control" id="txt_Doc_numbar" placeholder="เลขสำคัญ" autocomplete="off">
                        </div>
                </div>

                <div class="row ml-5 mt-1">
                  <div class="col-5  mt-2">
                    <label>เอกสาร :</label>
                      <div class="row ml-2">

                                      <div class=" form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="StatusRadio" id="StatusRadio1" style="width: 20px; height: 20px;" selected="true">
                                        <label class="ml-1" for="StatusRadio1"  > เอกสารภายใน </label>
                                      </div>
                                      <div class=" form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="2" name="StatusRadio" id="StatusRadio2" style="width: 20px; height: 20px;">
                                        <label class="ml-1" for="StatusRadio2" > เอกสารภายนอก </label>
                                      </div>
                      </div>

                  </div>
                  <div class="col-5 ml-5">
                        <label>คำอธิบาย :</label>
                        <textarea  class="form-control" id="txt_detail" rows="3"></textarea>
                      </div>
                </div>

              </div> 
                  

                  <div class="row ml-1 mb-4 justify-content-end">
                      
                      <div class="col-3 mt-2 ">
                        <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDocc" onclick="Save_Doc();">บันทึก</button>
                      </div>
                  </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modaldetail_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">เพิ่ม Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-12">
                
                <!-- <div class="row  mt-2 mb-5" style="margin-left: 20%"> -->
              
                <div class="row ml-2 mt-1 justify-content-center">
                    

                      <div class="col-4 mt-3">
                        <label>รหัสสินค้า :</label>
                        <!-- <input type="text" class="form-control" id="ID_txt" hidden> -->
                        <input type="text" class="form-control" id="txt_item_code" placeholder="รหัสสินค้า">
                      </div>
                      <div class="col-4 mt-3">
                        <label>ชื่อสินค้า :</label>
                        <input type="text" class="form-control" id="txt_item_name" placeholder="ชื่อสินค้า">
                      </div>
                
                </div>

                  <div class="row mb-3  justify-content-end ">
                      <div class="col-4 mt-2 ">
                        <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="Save_product();">บันทึก</button>
                      </div>
                  </div>

            </div>
        </div>
    </div>
</div>