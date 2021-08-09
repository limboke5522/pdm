<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<!-- <link rel="stylesheet" href="assets/css/ready.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
</head>

            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">การแจ้งเตือน</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="card">
              <div class="card-body">
                <div class="row">
                        <div class="col-4">
                          <div class="form-group row">
                            <label for="select_subject" class="col-sm-2 col-form-label">วันที่</label>
                            <div class="col-sm-10">
                              <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_Sdate_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col-4 ml-3">
                          <div class="form-group row">
                            <label for="select_subject" class="col-sm-1 col-form-label">ถึง</label>
                            <div class="col-sm-10">
                            <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_Edate_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col-1">
                          <button type="submit" class="btn  btn-block bg-primary text-white" id="btn_search" onclick="showData_exp();" >ค้นหา</button>
                        </div>
                </div>
              </div>
            </div>

           
            <div class="row ml-3">
              <div class="col-sm-3">
                <div class="card" onclick="showData_exp();" style="height: 200px; background: lightyellow">
                  <div class="card-body">
                      <img type="submit" src="img/delay.png" alt="AdminLTE Logo" class="brand-image col-center img_ref" style="width:80px;" id="little_exp" onclick="showData_exp();"></img>
                       <br>
                            <label style="font-size: 30px;" class="mt-2 ml-2">เอกสารใกล้หมดอายุ</label>
                            <p class="ml-2 ">เอกสารการแจ้งเตือนใกล้หมดอายุ</p>
                            <i type="submit" id="bells" class="fasbell fas fa-bell bellClapper" onclick="showData_exp();" >  </i>
                            <span class="number" id="exp_1" onclick="showData_exp();"></span>
                            <h2 class="number2"  id="exp" ></h2>
                  </div>
                </div>
              </div>

               <div class="col-sm-3">
                <div class="card" onclick="showData_exp2();" style="height: 200px; background: lightpink">
                  <div class="card-body">
                      <img type="submit" src="img/date-expired.png" alt="AdminLTE Logo" class="brand-image col-center img_ref" style="width:67px;" id="little_exp" onclick="showData_exp();"></img>
                      <br>
                            <label style="font-size: 30px;" class="mt-2 ml-2">เอกสารหมดอายุ</label>
                            <p class="ml-2 ">เอกสารการแจ้งเตือนหมดอายุ</p>
                            <i type="submit" id="bells2"  class="fasbell_2 fas fa-bell bellClapper"> </i>  
                            <span class="number_2" id="exp2_1" onclick="showData_exp2();"></span> 
                            <h2 class="number2_2"  id="exp2"></h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
							<div class="col-6">							   
                <div class="card-body " >
                      <div class="row">
                        <div class="col-5">

                        <img type="submit" src="img/Group 59.png" alt="AdminLTE Logo" class="brand-image col-center img_ref" style="margin-left: 40px; width:250px;" id="little_exp" onclick="showData_exp();">
                        <i type="submit" id="bells" class="fasbell fas fa-bell bellClapper" onclick="showData_exp();" >  </i>
                            <span class=" number" id="exp_1" onclick="showData_exp();"></span>
                            <h2 class="number2"  id="exp" ></h2>
                          </img>

                        </div>
                        <div class="col-5">

                        <img type="submit" src="img/Group 58.png" alt="AdminLTE Logo" class="brand-image col-center img_ref" style="margin-left: 40px; width:250px;" id="little_exp" onclick="showData_exp2();">
                        
                             <i type="submit" id="bells2"  class="fasbell_2 fas fa-bell bellClapper"> </i>  
                              <span class="number_2" id="exp2_1" onclick="showData_exp2();"></span> 
                              <h2 class="number2_2"  id="exp2"></h2>
                        </img>      
                      
                      </div>
                        <div  class="col-2 d-flex align-items-center">
                          <div  class="numbers"  >
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
							</div>
						</div> -->

            <div class="card">
              <div class="card-body">
                    <div class="row" id="left">
                      <label class="col-6 ml-2 mt-1"> ค้นหารายการ </label>
                    
                      <div class="col-4 ml-5">
                        <input type="text" class="form-control ml-5" id="txtSearch" onkeyup="showData_exp();" placeholder="ค้นหารายการ">
                      </div>
                      <div class="col-1 ml-3">
                        <button type="submit" class="btn  btn-block bg-primary text-white ml-5" id="btn_search" onclick="showData_exp();" >ค้นหา</button>
                      </div>
                    </div>

                 
                    <div class="row mt-2 card-body table-responsive p-0" id="tb_contact" style="height: 500px;max-height: 500px;overflow-y: auto;" >
                      <div class="col-12">
                        <table id="contact_Table" class="table  table-hover w-100 table-head-fixed">
                          <thead>
                            <tr class="text-center">
                              <th class="" style="background: lightgray"></th>
                              <th class="" style="background: lightgray">ลำดับ</th>
                              <th class="" style="background: lightgray">ชื่อเอกสาร</th>
                              <th class="" style="background: lightgray">Version</th>
                              <th class="" style="background: lightgray">จำนวนวันใกล้หมดอายุ</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                      </div>

                    </div>



                    
                    <div class="row"  id="right" >
                      <label class="col-6 ml-2 mt-1"> ค้นหารายการ </label>
                    
                      <div class="col-4 ml-5">
                        <input type="text" class="form-control ml-5" id="txtSearch2" onkeyup="showData_exp2();" placeholder="ค้นหารายการ">
                      </div>
                      <div class="col-1 ml-3">
                        <button type="submit" class="btn  btn-block bg-primary text-white ml-5" id="btn_search" onclick="showData_exp2();" >ค้นหา</button>
                      </div>
                    </div>

                    <div class="row mt-2 card-body table-responsive p-0" id="tb_contact2" style="height: 500px;max-height: 500px;overflow-y: auto;" >
                      <div class="col-12">
                        <table id="contact_Table2" class="table  table-hover w-100 table-head-fixed">
                          <thead>
                            <tr class="text-center">
                              <th class="" style="background: lightgray"></th>
                              <th class="" style="background: lightgray">ลำดับ</th>
                              <th class="" style="background: lightgray">ชื่อเอกสาร</th>
                              <th class="" style="background: lightgray">Version</th>
                              <th class="" style="background: lightgray">จำนวนวันหมดอายุ</th>
                            </tr>
                          </thead>
                          <tbody >

                          </tbody>
                        </table>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-3">
                        <input type="text" class="form-control" id="txtSearch3" onkeyup="showData_exp3();" placeholder="ค้นหารายการ">
                      </div>
                      <div class="col-3">
                        <!-- <button type="submit" class="btn btn-primary" >ค้นหา</button> -->
                        <!-- <button type="submit" class="btn btn-success" id="showModalAddUsers">เพิ่มข้อมูล</button> -->
                      </div>
                    </div>

                    <div class="row mt-2 card-body table-responsive p-0" id="tb_contact3" style="height: 450px;max-height: 450px;overflow-y: auto;" >
                      <div class="col-12">
                        <table id="contact_Table3" class="table table-bordered table-hover w-100 table-head-fixed">
                          <thead>
                            <tr class="text-center">
                              
                              <th class="bg_tableAll">ลำดับ</th>
                              <th class="bg_tableAll">ชื่อโรงพยาบาล</th>
                              <th class="bg_tableAll">เอกสารส่ง</th>
                              <th class="bg_tableAll">Version เอกสาร</th>
                              <th class="bg_tableAll">เอกสาร Version อัพเดท</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                      </div>

                    </div>
          
     


           
