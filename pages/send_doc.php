            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
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

            <div class="card">
              <div class="card-body">
             
                <div class="row">

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="select_hospital" class="col-sm-2 col-form-label">โรงพยาบาล</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" id="select_hospital" placeholder="โรงพยาบาล"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="select_subject" class="col-sm-2 col-form-label">เรื่อง</label>
                      <div class="col-sm-10">
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
                      <label for="select_contact" class="col-sm-2 col-form-label">ผู้ติดต่อ</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" id="select_contact" placeholder="ผู้ติดต่อ "></select>
                      </div>
                    </div>
                  </div>


                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_phone" class="col-sm-2 col-form-label">เบอร์โทร </label>
                      <div class="col-sm-10">
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
                      <label for="txt_email" class="col-sm-2 col-form-label">Email ผู้ส่ง</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_email_send" value="janekootest@gmail.com" placeholder="Email" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_email" class="col-sm-2 col-form-label">Email ผู้รับ</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_email" placeholder="Email">
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_remark" class="col-sm-2 col-form-label">บันทึกช่วยจำ</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_remark" placeholder="บันทึกช่วยจำ">
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">สำเนา</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="Copy_doc" name="Copy_doc" placeholder="สำเนา">
                      </div>
                    </div>
                  </div>
                  
                </div>
                
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-5">
                <div class="form-group row">
                  <label for="select_product" class="col-sm-2 col-form-label">product</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="select_product" placeholder="product"></select>
                  </div>
                </div>
              </div>

              <!-- <div class="col-1">
                <button type="submit" class="btn btn-primary btn-block" id="btn_search">ค้นหา</button>
              </div> -->
            </div>

            <div class="row mt-3">

              <div class="col-4  table-responsive p-0" style="margin-top: 3.3rem!important;">
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

              <div class="col-4">
                <div class="form-group row">
                  <label for="txt_product_center" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="txt_product_center" placeholder="ชื่อสินค้า" disabled>
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
                          <th class="bg_tableAll"><br></th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
              <div class="col-4 ">
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