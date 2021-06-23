<script>
  userID = "";
  // var DefaultTable = {
  //   language: {
  //     emptyTable: "Data not found"
  //   },
  //   info: false,
  //   scrollX: false,
  //   scrollCollapse: true,
  //   visible: false,
  //   searching: false,
  //   lengthChange: false,
  //   "order": [
  //     [0, "desc"]
  //   ]
  // };


    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output =  ((''+day).length<2 ? '0' : '') + day + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    d.getFullYear();

  $(function() {

    
    $("#txt_date_doc").val(output);
    $("#txt_expira_date").val(output);
    $("#txt_edit_date").val(output);


    $('#btnEditDoc').hide();
    $('#btnDeleteDoc').hide();
    $('#btncleanDoc').hide();

    
    $('#ID_txt').val("");
    $("#StatusRadio1").prop("checked", true);
    $("#StatusRadio11").prop("checked", true);

    $('#select_doctype2').val("");
    show_data();
    Get_customers();
    Get_TypeDetail_Name();



          $('.numonly').on('input', function() {
            this.value = this.value.replace(/[^0-9-]/g, ''); //<-- replace all other than given set of values
          });

          $('.enonly').on('input', function() {
            this.value = this.value.replace(/[^a-zA-Z0-9-/.@_ ]/g, ''); //<-- replace all other than given set of values
          });

          $('.thonly').on('input', function() {
            this.value = this.value.replace(/[^ก-ฮๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ0-9-/. ]/g, ''); //<-- replace all other than given set of values
          });

  })

  function Get_TypeDetail_Name(){
    $.ajax({
      url: "process/register_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'Get_TypeDetail_Name'
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              $("#select_doctype").empty();
              $("#select_doctype2").empty();
              var Str = "";
              Str += "<option value=0 >ทั้งหมด</option>";

              var Str2 = "";
              Str2 += "<option value=0 >-- กรุณาเลือกประเภทเอกสาร --</option>";
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {
                  Str += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";

                  Str2 += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";
                });
              }
              $("#select_doctype").append(Str);

              $("#select_doctype2").append(Str2);
        
      }
    });
  }

  function Get_customers(){
    $.ajax({
      url: "process/contact_customers.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'Get_customers'
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              $("#select_cus").empty();
              var Str = "";
              Str += "<option value=0 >-------กรุณาเลือกลูกค้า------------</option>";
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {
                  Str += "<option value=" + value.ID + " >" + value.CustomerName + "</option>";
            
                });
              }
              $("#select_cus").append(Str);
        
      }
    });
  }

  $("#btnEditDoc").click(function() {

      $.confirm({
        title: 'แจ้งเตือน!',
        content: 'ต้องการจะแก้ไขข้อมูล ใช่ หรือ ไม่?',
        type: 'orange',
        autoClose: 'cancel|8000',
        buttons: {
          cancel:  {text: 'ยกเลิก'},
          confirm: {
            btnClass: 'btn-primary',
            text: 'ตกลง',
            action: function() {
              editData();
            }
          }
        }
      });
  });


  $("#btncleanDoc").click(function() {

    $("#StatusRadio1").prop("checked", true);
    $('#select_doctype2').val(0);

          $('#txt_DocNo').val("");
          $('#txt_Doc_name').val("");
          $('#txt_Doc_numbar').val("");

          $('#txt_date_doc').val(output);
          $('#txt_expira_date').val(output);
          $('#txt_detail').val("");
          $("#txt_DocNo").prop('disabled', false);
        $('#btnSaveDoc').show();
        $('#btnEditDoc').hide();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();
        $(".chk_Cus").prop("checked", false);
    });


  

  
  function saveData() {
    var select_doctype2= $('#select_doctype2').val();

      var txt_DocNo= $('#txt_DocNo').val();
      var txt_Doc_name= $('#txt_Doc_name').val();
      var txt_Doc_numbar= $('#txt_Doc_numbar').val();

      var txt_date_doc= $('#txt_date_doc').val();
      var txt_expira_date= $('#txt_expira_date').val();
      var txt_detail= $('#txt_detail').val();


      if(document.getElementById("StatusRadio1").checked == true && document.getElementById("StatusRadio2").checked == false ){
        var StatusRadio = 1
      }else{
        var StatusRadio = 2
      }

      var text = "";
     if (select_doctype2 == "0") {
        text = "กรุณาเลือกประเภทเอกสาร";
        showDialogFailed(text);
        return;
      }

 
      var text = "";

      if (txt_DocNo == "") {
        text = "กรุณากรอกข้อมูลเลขที่คุมเอกสาร";
        showDialogFailed(text);
        return;
      }

      if (txt_Doc_name == "") {
        text = "กรุณากรอกชื่อเอกสาร";
        showDialogFailed(text);
        return;
      }

      if (txt_Doc_numbar == "") {
        text = "กรุณากรอกเลขสำคัญ :";
        showDialogFailed(text);
        return;
      }



      $.ajax({
        url: "process/register_doc.php",
        type: 'POST',
        data: {
          'FUNC_NAME': 'saveData',
          'select_doctype2': select_doctype2,
          'txt_DocNo': txt_DocNo,
          'txt_Doc_name': txt_Doc_name,
          'txt_Doc_numbar': txt_Doc_numbar,
          'txt_date_doc': txt_date_doc,
          'txt_expira_date': txt_expira_date,
          'txt_detail': txt_detail,
          'StatusRadio': StatusRadio
        },
        success: function(result) {
          if(result=="0"){
            showDialogFailed("รหัสลูกค้าซ้ำ ไม่สามารถเพิ่มข้อมูลได้ !!!");
          }else{
            showDialogSuccess(result);
          }
          
          show_data();
          $('#select_doctype2').val(0);
          $("#StatusRadio1").prop("checked", true);
          $('#txt_DocNo').val("");
          $('#txt_Doc_name').val("");
          $('#txt_Doc_numbar').val("");
          $("#txt_DocNo").prop('disabled', false);
          $('#txt_date_doc').val(output);
          $('#txt_expira_date').val(output);
          $('#txt_detail').val("");
    
        }
      });
  }

  function editData() {
    var ID_txt = $('#ID_txt').val();
    var select_doctype2= $('#select_doctype2').val();
    var txt_DocNo= $('#txt_DocNo').val();
    var txt_Doc_name= $('#txt_Doc_name').val();
    var txt_Doc_numbar= $('#txt_Doc_numbar').val();

    var txt_date_doc= $('#txt_date_doc').val();
    var txt_expira_date= $('#txt_expira_date').val();
    var txt_detail= $('#txt_detail').val();

      if(document.getElementById("StatusRadio1").checked == true && document.getElementById("StatusRadio2").checked == false ){
        var StatusRadio = 1
      }else{
        var StatusRadio = 2
      }
  

    var text = "";
      if (txt_DocNo == "") {
        text = "กรุณากรอกข้อมูลเลขที่คุมเอกสาร";
        showDialogFailed(text);
        return;
      }

      if (txt_Doc_name == "") {
        text = "กรุณากรอกชื่อเอกสาร";
        showDialogFailed(text);
        return;
      }

      if (txt_Doc_numbar == "") {
        text = "กรุณากรอกเลขสำคัญ :";
        showDialogFailed(text);
        return;
      }

      if (select_doctype2 == "0") {
        text = "กรุณาเลือกประเภทเอกสาร";
        showDialogFailed(text);
        return;
      }
    $.ajax({
      url: "process/register_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'editData',
        'txt_DocNo': txt_DocNo,
        'txt_Doc_name': txt_Doc_name,
        'txt_Doc_numbar': txt_Doc_numbar,
        'txt_date_doc': txt_date_doc,
        'txt_expira_date': txt_expira_date,
        'txt_detail': txt_detail,
        'StatusRadio': StatusRadio,
        'select_doctype2': select_doctype2,
        'ID_txt':ID_txt
      },
      success: function(result) {
        showDialogSuccess(result);
        show_data();
        $('#select_cus').val(0);
        $('#select_doctype2').val(0);
        $('#txt_DocNo').val("");
        $('#txt_Doc_name').val("");
        $('#txt_Doc_numbar').val("");

        $('#txt_date_doc').val(output);
        $('#txt_expira_date').val(output);
        $('#txt_detail').val("");
        $("#txt_DocNo").prop('disabled', false);
        $('#btnEditDoc').hide();
        $('#btnSaveDoc').show();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();
        $(".chk_Cus").prop("checked", false);
      }
    });
  }


  function show_data(){
    var  txtSearch =  $("#txtSearch").val();
    var  select_doc =  $("#select_doc").val();
    var  select_doctype =  $("#select_doctype").val();
    $.ajax({
      url: "process/register_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_data',
        'Search_txt': txtSearch,
        'select_doc': select_doc,
        'select_doctype': select_doctype
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              var StrTR = "" ;
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

                if(value.DocType==1){
                  var DocType="เอกสารภายใน";
                }else{
                  var DocType="เอกสารภายนอก";
                }




                  var chkDoc = "<input class='form-control chk_Cus' type='radio' value='1' name='id_Cus' id='id_Cus" + key + "' value='" + value.ID + "' value='" +value.docdetail_id+ "' onclick='show_Detail(\"" + value.ID + "\",\"" + value.docdetail_id + "\",\"" + key + "\")' style='width: 60%;height:20px;'>";
                  StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:3%;text-align: center;'><center>"+chkDoc+"</center></td>" +
                    "<td style='width:3%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:10%;text-align: left;'>" + value.DocNumber + "</td>" +
                    "<td style='width:20%;text-align: left;'>" + value.DocName + "</td>" +
                    "<td style='width:15%;text-align: center;'>" + value.SignificantFigure + "</td>" +
                    "<td style='width:10%;text-align: center;'>" + DocType + "</td>" +
                    "<td style='width:10%;text-align: center;'>" + value.TypeDetail_Name + "</td>" +
                    // "<td style='width:10%;text-align: center;'>" + value.RegistrationDate + "</td>" +
                    // "<td style='width:10%;text-align: center;'>" + value.ValidDate + "</td>" +
                    "</tr>";
                });
              }
              $('#data_Table tbody').html(StrTR);
        
      }
    });

  }

  function show_Detail(ID,docdetail_id){
    
    $('#ID_txt').val(ID);
   

    $.ajax({
      url: "process/register_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_Detail',
        'ID': ID,
        'docdetail_id': docdetail_id
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

                  $("#StatusRadio1").prop("checked", true);

                  $('#txt_DocNo').val(value.DocNumber);
                  $('#txt_Doc_name').val(value.DocName);
                  $('#txt_Doc_numbar').val(value.SignificantFigure);
                  $('#txt_detail').val(value.Description);

                  $('#txt_date_doc').val(value.RegistrationDate);
                  $('#txt_expira_date').val(value.ValidDate);
                  $("#txt_DocNo").prop('disabled', true);
                  
                    if(value.DocType==1){
                      $("#StatusRadio1").prop("checked", true);
                    }else{
                      $("#StatusRadio2").prop("checked", true);
                    }

                    $('#select_doctype2').val(docdetail_id);

                  $('#btnEditDoc').show();
                  $('#btnSaveDoc').hide();
                  $('#btnDeleteDoc').show();
                  $('#btncleanDoc').show();

                });
              }
      }
    });

  }


  function deleteData() {
    var  ID_txt = $('#ID_txt').val();
    $.ajax({
      url: "process/register_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'deleteData',
        'ID_txt': ID_txt
      },
      success: function(result) {
        // feedData();
        $("#StatusRadio1").prop("checked", true);

          $('#txt_DocNo').val("");
          $('#txt_Doc_name').val("");
          $('#txt_Doc_numbar').val("");

          $('#txt_date_doc').val(output);
          $('#txt_expira_date').val(output);
          $('#txt_detail').val("");

          $('#select_doctype2').val(0);

        $('#btnSaveDoc').show();
        $('#btnEditDoc').hide();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();
        $(".chk_Cus").prop("checked", false);
        show_data();
        $("#txt_DocNo").prop('disabled', false);
        showDialogSuccess(result);
      }
    });
  }

  $("#btnDeleteDoc").click(function() {

    $.confirm({
      title: 'แจ้งเตือน!',
      content: 'ต้องการจะลบข้อมูล ใช่ หรือ ไม่?',
      type: 'orange',
      autoClose: 'cancel|8000',
      buttons: {
        cancel:  {
          text: 'ยกเลิก'
        },
        confirm: {
          btnClass: 'btn-primary',
          text: 'ตกลง',
          action: function() {
            deleteData();
          }
        }
      }
    });
  });




  $("#showModalAddUsers").click(function() {
    clearData();
    setErrorInput();
    $("#titleDialog").text("เพิ่มข้อมูล ผู้ใช้งาน");
    $("#modalUsers").modal('show');
    // 
  })

  $('#formAddUsers').validate({
    errorPlacement: function(error, element) {
      $(element).closest("form").find("p[for='" + element.attr("id") + "']").append(error);
    },
    submitHandler: function() {
      saveData();
    }
  });



  function showDialogSuccess(text) {
    $.confirm({
      title: 'สำเร็จ!',
      content: text,
      type: 'green',
      autoClose: 'close|8000',
      typeAnimated: true,
      buttons: {
        close:  {
          text: 'ปิด',
        }
      }
    });
  }

  
  function showDialogFailed(text) {
    $.confirm({
      title: 'ผิดผลาด!',
      content: text,
      type: 'red',
      autoClose: 'close|8000',
      typeAnimated: true,
      buttons: {
        close:  {
          text: 'ปิด',
        }
      }
    });
  }

 
</script>