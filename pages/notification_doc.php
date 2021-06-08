<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>

            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">Notifications</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card">
              <div class="card-body px-4">
                <div class="row">
                  <div class="col-2">
                    <div class="form-group row">
                      <label for="select_subject" class="col-sm-2 col-form-label">วันที่</label>
                      <div class="col-sm-10">
                        <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_Sdate_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <div class="form-group row">
                      <label for="select_subject" class="col-sm-2 col-form-label">ถึง</label>
                      <div class="col-sm-10">
                      <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_Edate_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="col-1">
                    <button type="submit" class="btn btn-success btn-block" id="btn_search" onclick="showData_exp();" >ค้นหา</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
							<div class="col-md-3">
								<div type="submit" class="card card-stats bg-warning" id="little_exp" onclick="showData_exp();">
									<div class="card-body ">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
												</div>
											</div>

											<div  class="col-7 d-flex align-items-center">
												<div  class="numbers"  >
													<p class="card-category">เอกสารใกล้หมดอายุ</p>
                           <h2 style="text-align: center" id="exp" ></h2>

													
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div type="submit" class="card card-stats bg-danger" id="little_exp2" onclick="showData_exp2();">
									<div class="card-body">
										<div class="row">
											<div class="col-4">
												<div class="icon-big text-center">
													<i class="la la-newspaper-o"></i>
												</div>
											</div>
											<div  class="col-7 d-flex align-items-center">
												<div  class="numbers" >
													<p class="card-category">เอกสารหมดอายุ</p>
													<h2 style="text-align: center" id="exp2"></h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							

						</div>


            <div class="row">
              <div class="col-3">
                <input type="text" class="form-control" id="txtSearch" onkeyup="showData_exp();showData_exp2();" placeholder="ค้นหารายการ">
              </div>
              <div class="col-3">
                <!-- <button type="submit" class="btn btn-primary" >ค้นหา</button> -->
                <!-- <button type="submit" class="btn btn-success" id="showModalAddUsers">เพิ่มข้อมูล</button> -->
              </div>
            </div>


            <div class="row mt-2 card-body table-responsive p-0" id="tb_contact" style="height: 500px;max-height: 500px;overflow-y: auto;">
              <div class="col-6">
                <table id="contact_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 5%;" class="bg_tableAll"></th>
                      <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">ชื่อเอกสาร</th>
                      <th class="bg_tableAll">Version</th>
                      <th class="bg_tableAll">จำนวนวันใกล้หมดอายุ</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>

            <div class="row mt-2 card-body table-responsive p-0" id="tb_contact2" style="height: 500px;max-height: 500px;overflow-y: auto;" >
              <div class="col-6">
                <table id="contact_Table2" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 5%;" class="bg_tableAll"></th>
                      <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">ชื่อเอกสาร</th>
                      <th class="bg_tableAll">Version</th>
                      <th class="bg_tableAll">จำนวนวันหมดอายุ</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>

            <hr>


           