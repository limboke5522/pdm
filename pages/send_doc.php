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
                      <label for="txt_receive" class="col-sm-2 col-form-label">ผู้รับ</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="txt_receive" placeholder="ผู้รับ"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_subject" class="col-sm-2 col-form-label">เรื่อง</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="txt_subject" placeholder="เรื่อง"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <button type="submit" class="btn btn-success btn-block" id="btn_send">ส่ง</button>
                  </div>

                </div>

                <div class="row">

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_contact" class="col-sm-2 col-form-label">ผู้ติดต่อ</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="txt_contact" placeholder="ผู้ติดต่อ"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_email" placeholder="Email">
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-block" id="btn_draft">เอกสารร่าง</button>
                  </div>

                </div>


                <div class="row">

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_phone" class="col-sm-2 col-form-label">โทร</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_phone" placeholder="โทร">
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <div class="form-group row">
                      <label for="txt_copy" class="col-sm-2 col-form-label">สำเนา</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_copy" placeholder="สำเนา">
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <button type="submit" class="btn btn-danger btn-block" id="btn_cancel">ยกเลิก</button>
                  </div>

                </div>

              </div>
            </div>

            <div class="row mt-4">
              <div class="col-5">
                <div class="form-group row">
                  <label for="txt_product" class="col-sm-2 col-form-label">product</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="txt_product" placeholder="product"></select>
                  </div>
                </div>
              </div>

              <div class="col-1">
                <button type="submit" class="btn btn-primary btn-block" id="btn_search">ค้นหา</button>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-3">
                <table id="table_product" class="table table-bordered table-hover w-100">
                  <thead>
                    <tr class="text-center">
                      <th>ลำดับ</th>
                      <th>product</th>
                      <th>รหัส</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <div class="col-3">
                <div class="row d-flex justify-content-center">
                  <i class="fas fa-arrow-circle-right" style="    font-size: 35px;cursor: pointer;color: gainsboro;" id="arrowRight"></i>
                </div>
                <div class="row d-flex justify-content-center mt-3">
                  <i class="fas fa-arrow-circle-left" style="    font-size: 35px;cursor: pointer;color: gainsboro;" id="arrowLeft"></i>
                </div>
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-12">
                    <table id="table_product_item" class="table table-bordered table-hover w-100">
                      <thead>
                        <tr class="text-center">
                          <th>ลำดับ</th>
                          <th>product</th>
                          <th>รหัส</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                  <div class="col-12">
                    <table id="table_product_list_document" class="table table-bordered table-hover w-100">
                      <thead>
                        <tr class="text-center">
                          <th><br></th>
                          <th>ลำดับ</th>
                          <th>เอกสาร</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
              <div class="col-3">
                <table id="table_product_docment" class="table table-bordered table-hover w-100">
                  <thead>
                    <tr class="text-center">
                      <th>ลำดับ</th>
                      <th>เอกสาร</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>