            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">จัดการข้อมูลลูกค้า</li>
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


            <div class="row mt-2 card-body table-responsive p-0" id="tb_customers" style="height: 420px;max-height: 350px;overflow-y: auto;">
              <div class="col-12">
                <table id="customers_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 5%;" class="bg_tableAll"></th>
                      <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">ชื่อลูกค้า</th>
                      <th class="bg_tableAll">รหัสลูกค้า</th>
                      <th class="bg_tableAll">สถานะ</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

            </div>
            <hr>


            <div class="row ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>รหัสลูกค้า :</label>
                <input type="text" class="form-control" id="ID_txt" hidden>
                <input type="text" class="form-control" id="txtcustomers_ID" placeholder="รหัสลูกค้า">
              </div>
              <div class="col-3 mt-3">
                <label>ชื่อลูกค้า :</label>
                <input type="text" class="form-control" id="txtcustomers_name" placeholder="ชื่อลูกค้า">
              </div>
              <div class="col-3 mt-5">
                <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-warning ml-2" id="btnEditDoc">แก้ไข</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-danger ml-2" id="btnDeleteDoc">ลบ</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-secondary ml-2" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div>
            </div>
            <div class="row  mt-4">
              <div class="col-1 ml-5">
                <div class="form-group">
                  <label>ลูกค้าใหม่ :</label>
                  <input class="form-control" type="radio" value="1" name="StatusRadio" id="StatusRadio1" style="width: 25%;height:20px;">
                </div>
              </div>
              <div class="col-1">
                <div class="form-group">
                  <label>เปิดบิล :</label>
                  <input class="form-control" type="radio" value="2" name="StatusRadio" id="StatusRadio2" style="width: 25%;height:20px;">
                </div>
              </div>
            </div>