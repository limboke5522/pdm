            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-5">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">ส่งเอกสาร</li>
                    </ol>
                  </div><!-- /.col -->

                  <div class="col-6 d-flex justify-content-end">
                    <div class="form-group row">
                        <label for="txt_email" class=" col-form-label">Email ผู้ส่ง : </label>
                      <div class="col-8" >
                        <input type="text" style="width: 150%;" class="form-control" id="txt_email_send" placeholder="Email" disabled>
                      </div>
                    </div>
                  </div>

                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card">
              <div class="card-body" style=" background-color: #b5efec57;">
             
                <div class="row">

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="select_hospital" class="col-2 col-form-label">โรงพยาบาล</label>
                      <div class="col-10">
                        <select class="form-control select2" id="select_hospital" placeholder="โรงพยาบาล"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="select_subject" class="col-2 col-form-label">เรื่อง</label>
                      <div class="col-10">
                        <select class="form-control select2" id="select_subject" placeholder="เรื่อง"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <button type="submit" class="btn btn-success btn-block" id="btn_save_send">ส่ง</button>
                  </div>

                </div>

                <div class="row">

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="select_contact" class="col-2 col-form-label">ผู้ติดต่อ
                      </label>
                      <div class="col-10">
                        
                        <select class="form-control select2" id="select_contact" placeholder="ผู้ติดต่อ "></select>
                      </div>
                    </div>
                  </div>


                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_phone" class="col-2 col-form-label">เบอร์โทร </label>
                      <div class="col-10">
                        <input type="text" class="form-control" id="txt_phone" placeholder="โทร">
                      </div>
                    </div>
                  </div>

                 

                  <div class="col-2">
                    <button type="submit" class="btn btn-danger btn-block" id="btn_cancel">ยกเลิก</button>
                  </div>

                </div>


                <div class="row">
                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_email" class="col-sm-2 col-form-label">Email ผู้รับ</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_email" placeholder="Email">
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="email" class="col-2 col-form-label">สำเนา</label>
                      <div class="col-10">
                        <input type="text" class="form-control" id="Copy_doc" name="Copy_doc" placeholder="สำเนา">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-10">
                    <div class="form-group row">
                        
                          <input style="width:20px; height: 20px; margin-left: 10px; margin-top: 13px" type="checkbox" id="chk_remark" onclick="chkremark();">
                        
                      <label for="txt_remark" class="col-2 col-form-label">บันทึกช่วยจำ</label>
                      <div class="col-12" >
                        <textarea style="height: 80px;" class="form-control" id="txt_remark" placeholder="บันทึกช่วยจำ"></textarea>
                      </div>
                    </div>
                  </div>

                  
                  
                </div>
                
              </div>
            </div>

            <!-- <div class="row mt-4">
              <div class="col-4">
                <div class="form-group row">
                  <label for="select_product" class="col-sm-2 col-form-label">product</label>
                  <div class="col-sm-8">
                    <select class="form-control select2" id="select_product" placeholder="product"></select>
                  </div>
                </div>
              </div>

              <!-- <div class="col-1">
                <button type="submit" class="btn btn-primary btn-block" id="btn_search">ค้นหา</button>
              </div> -->
            <!-- </div>  -->
            
            <div class="row mt-3">
                
              <div class="col-4">
              <div class="card-body" >
              <div class="form-group row">
                    <label for="select_product" class="col-sm-2 col-form-label">product</label>
                    <div class="col-sm-8">
                      <select class="form-control select2" id="select_product" placeholder="product"></select>
                    </div>
                  </div>
                <table id="table_product" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th  class="bg_tableAll" style="width: 7%;"></th>
                      <th  class="bg_tableAll" style="width: 10%;">ลำดับ</th>
                      <th  class="bg_tableAll" style="width: 50%;">product</th>
                      <th  class="bg_tableAll" style="width: 10%;"></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
                </div>
              </div>

              <div class="col-4">
                <div class="card-body" >
                <div class="form-group row">
                  <label for="txt_product_center" class="col-sm-2 col-form-label">ชื่อสินค้า</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="txt_product_center" placeholder="ชื่อสินค้า" onkeyup="checkProduct(id,name);" disabled>
                  </div>
                </div>
                <div class="row ">
                  <div class="col-12">
                    <table id="table_product_list_document" class="table table-bordered table-hover w-100 table-head-fixed">
                      <thead>
                        <tr   class="text-center">
                          <th class="bg_tableAll">ลำดับ</th>
                          <th class="bg_tableAll">เอกสาร</th>
                          <th class="bg_tableAll">version</th>
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