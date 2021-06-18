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



            <div class="card" id="Search_Product">
              <div class="card-body">

                <div class="row">

                  <div class="col-5" >
                    <div class="form-group row">
                      <label for="txt_receive" class="col-sm-2 col-form-label">Product</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_product" onchange ="show_DataLeft();show_DataRight();"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <button type="submit" class="btn btn-primary w-50" id="btn_search">ค้นหา</button>
                  </div>

                </div>
              </div>
            </div>

            <div class="card">
            <div class="card-body">
            <div class="row">
              <div class="col-6">
                <input type="text" style="width: 400px;" class="form-control" id="txtSearch" onkeyup="show_DataLeft();" placeholder="ค้นหารายการ">
              </div>
              <div class="col-6">
                <div class="row " style="margin-left: 1px;">

                  <div class="col-4">
                    <input type="text" style="width: 250px;" class="form-control" id="txtSearch2" onkeyup="show_DataRight();" placeholder="ค้นหาเอกสาร">
                  </div>

                  <div class="col-4">
                  <div class="form-group" id="div_upload">
                          <div class="custom-file ">
                            <input type="file" class="custom-file-input" name="inputFile" id="upload_fileRight" accept="application/pdf">
                            <label class="custom-file-label" for="inputFile">เลือกไฟล์</label>
                          </div>
                   
                  </div>

        
                      </div>
                      <div class="col-4">
                  <button style="width: 50%;margin-left: 50px;" type="button" class="btn btn-outline-primary" onclick="upload_Doc();">Upload</button>
                  </div>
                      
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-6">
                <div class="row mt-2  table-responsive p-0" id="tb_Data" style="height: 620px;max-height: 620px;overflow-y: auto;">
                  <div class="col-12">
                    <table id="Data_TableLeft" class="table table-bordered table-hover w-100 table-head-fixed">
                      <thead>
                        <tr class="text-center">
                          <th style="width: 5%;" class="bg_tableAll"></th>
                          <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                          <th style="width: 30%;" class="bg_tableAll">เอกสาร</th>
                          <th style="width: 5%;" class="bg_tableAll">Preview</th>
                          <th style="width: 20%;" class="bg_tableAll">เลขที่คุมเอกสาร</th>
                          <th style="width: 10%;" class="bg_tableAll">version</th>
                          <th style="width: 15%;" class="bg_tableAll">วันที่อัพโหลด</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="row mt-2 card-body table-responsive p-0" id="tb_Data" style="height: 620px;max-height: 620px;overflow-y: auto;">
                  <div class="col-12">
                    <table id="Data_TableRight" class="table table-bordered table-hover w-100 table-head-fixed">
                      <thead>
                        <tr class="text-center">
                          
                          <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                          <th  class="bg_tableAll">ชื่อไฟล์เอกสาร</th>
                          <th  class="bg_tableAll">เลขที่คุมเอกสาร</th>
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


            <!-- <div class="col-5 ml-5">
                <div class="row " style="margin-left: 1px;">
                  <div class="form-group col-7" id="div_upload">
                    <label>แผนก</label>
                    <div class="custom-file ">
                      <input type="file" class="custom-file-input" name="inputFile" id="inputFile" accept="application/pdf">
                      <label class="custom-file-label" for="inputFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group col-5 " style="margin-top: 31px;">
                    <button style="width: 50%;margin-left: 50px;" type="button" class="btn btn-outline-primary" id="btn_upload_Doc" onclick="upload_Doc();">Upload</button>
                  </div>
                </div>

                <table id="doc_Table" class="table table-bordered table-hover w-100 ml-2 mt-2">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 20%;"></th>
                      <th style="width: 20%;">ลำดับ</th>
                      <th>เอกสาร</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div> -->