            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">ลงทะเบียนเอกสาร</li>
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


            <div class="row mt-2 card-body table-responsive p-0" id="tb_data" style="height: 420px;max-height: 350px;overflow-y: auto;">
              <div class="col-12">
                <table id="data_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 5%;" class="bg_tableAll"></th>
                      <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">เลขที่เอกสาร</th>
                      <th class="bg_tableAll">รายการเอกสาร</th>
                      <th class="bg_tableAll">เลขที่สำคัญ</th>
                      <th class="bg_tableAll">สถานะ</th>
                      <th style="width: 15%;" class="bg_tableAll">วันที่ต่อทะเบียน</th>
                      <th style="width: 15%;" class="bg_tableAll">วันหมดอายุ</th>
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
                <label>เลขที่คุมเอกสาร :</label>
                <input type="text" class="form-control" id="txt_DocNo" placeholder="เลขที่คุมเอกสาร" autocomplete="off">
              </div>

              <div class="col-3 mt-3">
                <label>ชื่อเอกสาร :</label>
                <input type="text" class="form-control" id="ID_txt" hidden>
                <input type="text" class="form-control" id="txt_Doc_name" placeholder="ชื่อเอกสาร" autocomplete="off">
              </div>

              <div class="col-3 mt-3">
                <label>เลขสำคัญ :</label>
                <input type="text" class="form-control" id="txt_Doc_numbar" placeholder="เลขสำคัญ" autocomplete="off">
              </div>

              <div class="col-1 ml-5 mt-3">
                <div class="form-group">
                  <label>เอกสารภายใน :</label>
                  <input class="form-control" type="radio" value="1" name="StatusRadio" id="StatusRadio1" style="width: 25%;height:20px;">
                </div>
              </div>

              <div class="col-1 mt-3">
                <div class="form-group">
                  <label>เอกสารภายนอก :</label>
                  <input class="form-control" type="radio" value="2" name="StatusRadio" id="StatusRadio2" style="width: 25%;height:20px;">
                </div>
              </div>

            </div>
            <div class="row ml-4 mt-1">
              <div class="col-3 mt-3">
                <label>วันที่ต่อทะเบียน :</label>
                <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_date_doc" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
              </div>
              <div class="col-3 mt-3">
                <label>วันหมดอายุ :</label>
                <input type="text" autocomplete="off" class="form-control  datepicker-here " id="txt_expira_date" data-language='en' data-date-format='dd-mm-yyyy' placeholder="วันที่" readonly>
              </div>
              <div class="col-3 mt-5">
                <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-warning ml-2" id="btnEditDoc">แก้ไข</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-danger ml-2" id="btnDeleteDoc">ลบ</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-secondary ml-2" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div>

            </div>

            <div class="row ml-4 mt-1">
              <div class="col-6 mt-3">
                <label>คำอธิบาย :</label>
                <textarea class="form-control" id="txt_detail" rows="4"></textarea>
              </div>
            </div>