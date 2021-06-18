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
                        <select class="form-control select2" id="select_hospital" placeholder="โรงพยาบาล" onchange="show_data()"></select>
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
                    <button type="submit" class="btn btn-success btn-block" id="btn_search" onclick="show_data();" >ค้นหา</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
							<div class="col-md-4">
								<div type="submit" class="card card-stats bg-light" id="docno_" onclick="show_data();">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
											</div>
											<div  class="col-8 d-flex align-items-center">
												<div  class="numbers"  >
													<p class="card-category">รายการส่งเอกสาร</p>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div type="submit" class=" card card-stats bg-light" id="docno_detail" onclick="showData_DocNo_Detail();">
									<div class="card-body">
										<div class="row">
											<div class="col-4">
											</div>
											<div  class="col-8 d-flex align-items-center">
												<div  class="numbers" >
													<p class="card-category">รายละเอียดเอกสาร</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>


            <div class="row ">
              <div class="col-12 mt-2  table-responsive p-0">
                <table id="table_history" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th  class="bg_tableAll" style="width: 5%;">ลำดับ</th>
                      <th  class="bg_tableAll" style="width: 8%;">เลขที่เอกสาร</th>
                      <th  class="bg_tableAll" style="width: 20%;">ชื่อโรงพยาบาล</th>
                      <th  class="bg_tableAll" style="width: 15%;">วัตถุประสงค์</th>
                      <th  class="bg_tableAll" style="width: 12%;">ผู้ติดต่อ</th>
                      <th  class="bg_tableAll" style="width: 20%;">Email</th>
                      <th  class="bg_tableAll" style="width: 10%;">วันที่ส่งเอกสาร</th>
                      <th  class="bg_tableAll" style="width: 10%;">รายละเอียดเอกสาร</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="row ">
              <div class="col-12 mt-2  table-responsive p-0">
                <table id="table_history_detail" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th  class="bg_tableAll" style="width: 5%;">ลำดับ</th>
                      <th  class="bg_tableAll" style="width: 20%;">รายการสินค้า</th>
                      <th  class="bg_tableAll" style="width: 10%;">วันที่ส่ง</th>
                      <th  class="bg_tableAll" style="width: 15%;">เอกสาร</th>
                      <th  class="bg_tableAll" style="width: 15%;">E-mail</th>
                      <th  class="bg_tableAll" style="width: 10%;">Version</th>
                      <th  class="bg_tableAll" style="width: 10%;">Version (NEW)</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>



<!-- Modal -->
<div class="modal fade" id="Modaldetail_Doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width:1162px;">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">รายละเอียดเอกสาร</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                
                    <div class="col-4">
                        <div class="form-group">
                            <h5 style="text-decoration:underline;">รายการเอกสารที่ส่ง</h5>
                        </div>
                    </div>

                    <div class="col-6" style="margin-left: 1.5rem;margin-bottom: 1.5rem;">
                            <!-- <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <label style="margin-right: 1.5rem;margin-top: 0.5rem;">ค้นหารายการ :</label>
                                <input type="text" class="form-control" name="namereport" id="search_item" onkeyup="search_item();" placeholder="ค้นหารายการ" autocomplete="off">
                           </div> -->
                    </div>

                </div>

                <div class="row">

    
                <div style="width: 80%;" >
                    <table class="table table-bordered table-hover" id="table_list_Doc" style="margin-left: 12%;">
                        <thead>
                            <tr class="text-center">
                                <th class="col-center" nowrap>ลำดับ</th>
                                <th class="col-center" nowrap>เลขที่เอกสาร</th>
                                <th class="col-center" nowrap>รายการสินค้า</th>
                                <th class="col-center" nowrap>ชื่อเอกสาร</th>
                                <th class="col-center" nowrap>Version</th>
                                <th class="col-center" nowrap>Preview</th>
                                
                           
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