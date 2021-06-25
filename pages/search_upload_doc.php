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
            <div class="col-12 mt-3">
              <label class="col-2"> ประเภทเอกสาร : </label>
              <label class="col-2"> Product : </label>
              <label class="col-2"> หัวข้อเอกสาร : </label>
                <div class="row">
                      <div class="col-2">
                          <select class="custom-select form-control " id="select_doctype" onchange="show_DataLeft();" ></select>
                      </div>

                      <div class="col-2">
                              <select class="form-control select2" id="select_product" onchange="show_DataLeft();" ></select>
                      </div>

                      <div class="col-2">
                              <select class=" form-control select2" id="select_dochead" onchange="show_DataLeft();" ></select>
                      </div>

                      <div class="col-2">
                        <input type="text"  class="form-control" id="txtSearch" onkeyup="show_DataLeft();" placeholder="ค้นหารายการ">
                      </div>
                
                </div>


            <div class="row">
              <div class="col-12">
                <div class="row mt-2  table-responsive p-0" id="tb_Data" style="height: 620px;max-height: 620px;overflow-y: auto;">
                  <div class="col-12">
                    <table id="Data_TableLeft" class="table table-bordered table-hover w-100 table-head-fixed">
                      <thead>
                        <tr class="text-center">
                          <th  class="bg_tableAll">เอกสาร</th>
                          <th  class="bg_tableAll">Product</th>
                          <th  class="bg_tableAll">ประเภทเอกสาร</th>
                          <th  class="bg_tableAll">Ver.</th>
                          <th  class="bg_tableAll">วันที่ผลิตเอกสาร</th>
                          <th  class="bg_tableAll">วันหมดอายุ</th>
                          <th  class="bg_tableAll">วันที่อัปโหลด</th>
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


            