            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">ระบบ</a></li>
                      <li class="breadcrumb-item active">จัดการหัวข้อเอกสาร</li>
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


            <div class="row mt-2 card-body table-responsive p-0" id="tb_Data" style="height: 420px;max-height: 350px;overflow-y: auto;">
              <div class="col-12">
                <table id="Data_Table" class="table table-bordered table-hover w-100 table-head-fixed">
                  <thead>
                    <tr class="text-center">
                      <th style="width: 5%;" class="bg_tableAll"></th>
                      <th style="width: 5%;" class="bg_tableAll">ลำดับ</th>
                      <th class="bg_tableAll">เลขที่คุมเอกสาร</th>
                      <th class="bg_tableAll">ชื่อเอกสาร</th>
                      <th class="bg_tableAll">ประเภทเอกสาร</th>
                      <th class="bg_tableAll">เลขที่สำคัญ</th>
                      <th class="bg_tableAll">รูปแบบเอกสาร</th>
                      <th class="bg_tableAll">คำอธิบาย</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <hr>


            <div class="row ml-4 mt-1">
              <!-- <div class="col-3 mt-3">
                <label>รหัสสินค้า :</label> -->
                <input type="text" class="form-control" id="ID_txt" hidden>
                <!-- <input type="text" class="form-control" id="txt_item_code" placeholder="รหัสสินค้า"> -->
              <!-- </div> -->
              <div class="col-3">
                <div class="form-group">
                <label for="">ประเภทเอกสาร :</label>
                  <select class="custom-select form-control " id="select_TypeDetail" ></select>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">เลขที่คุมเอกสาร :</label>
                  <input type="text" class="form-control" id="txt_DocNumber" placeholder="เลขที่คุมเอกสาร" autocomplete="off">
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="">เลขที่สำคัญ :</label>
                  <input type="text" class="form-control" id="txt_SignificantFigure" placeholder="เลขที่สำคัญ" autocomplete="off">
                </div>
              </div>


              <div class="col-3 " style="margin-top:30px;">
                <button style="width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc" onclick="saveData();">บันทึก</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-warning ml-2" id="btnEditDoc">แก้ไข</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-danger ml-2" id="btnDeleteDoc">ลบ</button>
                <button style="width: 100px;" type="button" class="btn btn-outline-secondary ml-2" id="btncleanDoc" onclick="clean();">ล้างข้อมูล</button>
              </div>
            </div>


            <div class="row ml-4 mt-1">
           
                
              <div class="col-3">
                <div class="form-group">
                  <label for="">ชื่อเอกสาร :</label>
                  <input type="text" class="form-control" id="txt_DocName" placeholder="ชื่อเอกสาร" autocomplete="off">
                </div>
              </div>


              <div class="col-3">
                <div class="form-group">
                  <label for="">คำอธิบาย :</label>
                  <textarea class="form-control" id="txt_Description" rows="3"></textarea>
                </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <div class="form-group">
                    <label for="">รูปแบบเอกสาร</label>
                  </div>
                  <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="1" name="StatusRadio" id="StatusRadio1" style="width: 20px; height: 20px;">
                    <label class="ml-2" for="StatusRadio1"> เอกสารภายใน </label>
                  </div>
                  <div class=" form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="2" name="StatusRadio" id="StatusRadio2" style="width: 20px; height: 20px;">
                    <label class="ml-2" for="StatusRadio2"> เอกสารภายนอก </label>
                  </div>
                </div>
              </div>
            </div>