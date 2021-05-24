            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">ประวัติเอกสาร</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card">
              <div class="card-body px-2">

                <div class="row">
                  <div class="col-5">
                    <div class="form-group row">
                      <label for="select_hospital" class="col-sm-2 col-form-label">โรงพยาบาล</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" id="select_hospital" placeholder="โรงพยาบาล"></select>
                      </div>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group row">
                      <label for="select_subject" class="col-sm-2 col-form-label">วันที่</label>
                      <div class="col-sm-10">
                        <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_Sdate_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group row">
                      <label for="select_subject" class="col-sm-2 col-form-label">ถึง</label>
                      <div class="col-sm-10">
                      <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_Edate_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <button type="submit" class="btn btn-success btn-block" id="btn_search">ค้นหา</button>
                  </div>
                </div>
              </div>
            </div>


            <div class="row ">
              <div class="col-12 mt-2  table-responsive p-0">
                <table id="table_history" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th  class="bg_tableAll" style="width: 7%;">ลำดับ</th>
                      <th  class="bg_tableAll" style="width: 30%;">ชื่อโรงพยาบาล</th>
                      <th  class="bg_tableAll" style="width: 20%;">วัตถุประสงค์</th>
                      <th  class="bg_tableAll" style="width: 20%;">ผู้ติดต่อ</th>
                      <th  class="bg_tableAll" style="width: 15%;">ผู้ติดต่อ</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>