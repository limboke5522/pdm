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
          <li class="breadcrumb-item active">กำหนดสิทธ์เอกสาร</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<div class="row">
  <div class="col-12">
    <label class="col-2"> ประเภทเอกสาร : </label>
    <!-- <label class="col-2"> Product : </label> -->
    <label class="col-2"> หัวข้อเอกสาร : </label>
    <div class="row">
      <div class="col-2">
        <select class="custom-select form-control " id="select_doctype" onchange="check_selection(1);showData_Doc();"></select>
      </div>
      <!-- <div class="col-2">
        <select style="width: 100%" class="custom-select form-control select2" id="select_product" onchange="check_selection(2);"></select>
      </div> -->
      <div class="col-2">
        <select class=" form-control select2" id="select_dochead" onchange="check_selection();"></select>
      </div>

      <div class="col-3">
        <input type="text" class="form-control" id="txtSearch" onkeyup="showData_Doc();" placeholder="ค้นหารายการ">
      </div>

    </div>


    <div class="row mt-2 card-body table-responsive p-0" id="tb_Data2" style="height: 500px;max-height: 500px;overflow-y: auto;">
      <div class="col-12">
        <table id="Data_TableRight" class="table table-bordered table-hover w-100 table-head-fixed">
          <thead>
            <tr class="text-center" id="headtable">

            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>

<!-- <div class="row ml-4 mt-5 text-right">
              
              <div class="col-12 mt-5">
                <button style=" width: 100px;" type="button" class="btn btn-outline-success ml-2" id="btnSaveDoc">บันทึก</button>
              </div>
            </div> -->

<hr>