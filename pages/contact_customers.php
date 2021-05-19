            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">จัดการข้อมูลติดต่อลูกค้า</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->



            <div class="row">
              <div class="col-3">
                <input type="text" class="form-control" id="txtSearch" onkeyup="show_data();" placeholder="ค้นหารายการ">
              </div>
              <div class="col-3">
                <!-- <button type="submit" class="btn btn-primary" >ค้นหา</button> -->
                <!-- <button type="submit" class="btn btn-success" id="showModalAddUsers">เพิ่มข้อมูล</button> -->
              </div>
            </div>


            <div class="row mt-2 card-body table-responsive p-0" id="tb_contact" style="height: 420px;max-height: 350px;overflow-y: auto;">
              <div class="col-12">
                <table id="contact_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 7%;" class="bg_tableAll"></th>
                      <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">ชื่อลูกค้า</th>
                      <th class="bg_tableAll">ผู้ติดต่อ</th>
                      <th class="bg_tableAll">แผนก</th>
                      <th class="bg_tableAll">E-Mail</th>
                      <th style="width: 15%;" class="bg_tableAll">เบอร์ติดต่อ</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>
            <hr>
            <!-- <div class="row ">
              <div class="col-3">
              </div>
              <div class="col-3">
              </div>
              <div class="col-5" style="margin-left: 8%;">
                <button style="width: 22%;" type="button" class="btn btn-outline-success" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 22%;margin-left: 3%;" type="button" class="btn btn-outline-warning" id="btnEditDoc">แก้ไข</button>
                <button style="width: 22%;margin-left: 3%;" type="button" class="btn btn-outline-danger" id="btnDeleteDoc">ลบ</button>
                <button style="width: 22%;margin-left: 3%;" type="button" class="btn btn-outline-secondary" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div>
            </div> -->

            <div class="row ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>ลูกค้า :</label>
                <select class="form-control" id="select_cus"></select>
              </div>
              <div class="col-3 mt-3">
                <label>ผู้ติดต่อ :</label>
                <input type="text" class="form-control" id="ID_txt" hidden>
                <input type="text" class="form-control" id="txt_contact_name" placeholder="ชื่อผู้ติดต่อ" autocomplete="off">
              </div>
              <div class="col-3 mt-3">
                <label>แผนก :</label>
                <input type="text" class="form-control" id="txt_deb_name" placeholder="ชื่อแผนก" autocomplete="off">
              </div>

            </div>
            <div class="row ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>Email :</label>
                <input type="text" class="form-control enonly" id="txt_email" placeholder="E-Mail" autocomplete="off">
              </div>
              <div class="col-3 mt-3">
                <label>เบอร์ติดต่อ :</label>
                <input type="text" class="form-control numonly" id="txt_phonenumber" placeholder="เบอร์โทร" autocomplete="off">
              </div>
              <div class="col-3 mt-5">
                <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-warning ml-2" id="btnEditDoc">แก้ไข</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-danger ml-2" id="btnDeleteDoc">ลบ</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-secondary ml-2" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div>
            </div>