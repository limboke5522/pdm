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

  $(function() {

    $('#btnEditDoc').hide();
    $('#btnDeleteDoc').hide();
    $('#btncleanDoc').hide();

    
    $('#ID_txt').val("");
    show_data();
    get_Doctype();
    $("#StatusRadio1").prop("checked", true);
  })




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
        $('#btnSaveDoc').show();
        $('#btnEditDoc').hide();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();

        $('#select_TypeDetail').val(0);
        $('#txt_DocNumber').val("");
        $('#txt_SignificantFigure').val("");
        $('#txt_DocName').val("");
        $('#txt_Description').val("");
        $("#StatusRadio1").prop("checked", true);
        $('#ID_txt').val("");

        $(".chk_Cus").prop("checked", false);
    });


  
    function get_Doctype() {
    $.ajax({
      url: "process/manage_headDoc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'get_Doctype'
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_TypeDetail").empty();
        var Str = "";
        Str += "<option value=0 >เลือก ประเภทเอกสาร</option>";

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.TypeDetail_Name +  "</option>";
          });
        }
        $("#select_TypeDetail").append(Str);

      }
    });
  }
  
  function saveData() {

    var select_TypeDetail= $('#select_TypeDetail').val();
    var txt_DocNumber= $('#txt_DocNumber').val();
    var txt_SignificantFigure= $('#txt_SignificantFigure').val();
    var txt_DocName= $('#txt_DocName').val();
    var txt_Description= $('#txt_Description').val();

    if (document.getElementById("StatusRadio1").checked == true && document.getElementById("StatusRadio2").checked == false) {
      var doctype = 1
    } else {
      var doctype = 2
    }


    var text = "";


    if (select_TypeDetail == "0") {
      text = "กรุณาเลือกประเภทเอกสาร";
      showDialogFailed(text);
      return;
    }

    if (txt_DocName == "") {
      text = "กรุณากรอกชื่อเอกสาร";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/manage_headDoc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'saveData',
        'select_TypeDetail': select_TypeDetail,
        'txt_DocNumber': txt_DocNumber,
        'txt_SignificantFigure': txt_SignificantFigure,
        'txt_DocName': txt_DocName,
        'txt_Description': txt_Description,
        'doctype': doctype
      },
      success: function(result) {

          showDialogSuccess(result);
        
        
        show_data();
        $('#select_TypeDetail').val(0);
        $('#txt_DocNumber').val("");
        $('#txt_SignificantFigure').val("");
        $('#txt_DocName').val("");
        $('#txt_Description').val("");
        $("#StatusRadio1").prop("checked", true);
        $('#ID_txt').val("");
      }
    });
  }

  function editData() {
    var ID_txt = $('#ID_txt').val();
    var select_TypeDetail= $('#select_TypeDetail').val();
    var txt_DocNumber= $('#txt_DocNumber').val();
    var txt_SignificantFigure= $('#txt_SignificantFigure').val();
    var txt_DocName= $('#txt_DocName').val();
    var txt_Description= $('#txt_Description').val();

    if (document.getElementById("StatusRadio1").checked == true && document.getElementById("StatusRadio2").checked == false) {
      var doctype = 1
    } else {
      var doctype = 2
    }
    


    var text = "";

 
    if (select_TypeDetail == "0") {
      text = "กรุณาเลือกประเภทเอกสาร";
      showDialogFailed(text);
      return;
    }

    if (txt_DocName == "") {
      text = "กรุณากรอกชื่อเอกสาร";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/manage_headDoc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'editData',
        'select_TypeDetail': select_TypeDetail,
        'txt_DocNumber': txt_DocNumber,
        'txt_SignificantFigure': txt_SignificantFigure,
        'txt_DocName': txt_DocName,
        'txt_Description': txt_Description,
        'doctype': doctype,
        'ID_txt':ID_txt
      },
      success: function(result) {
        showDialogSuccess(result);
        show_data();

        $('#select_TypeDetail').val(0);
        $('#txt_DocNumber').val("");
        $('#txt_SignificantFigure').val("");
        $('#txt_DocName').val("");
        $('#txt_Description').val("");
        $("#StatusRadio1").prop("checked", true);
        $('#ID_txt').val("");

        $('#btnEditDoc').hide();
        $('#btnSaveDoc').show();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();
        
      }
    });
  }


  function show_data(){
    var  txtSearch =  $("#txtSearch").val();

    $.ajax({
      url: "process/manage_headDoc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_data',
        'Search_txt': txtSearch
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              var StrTR = "" ;
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

                    if(value.DocType==1){
                      var DocType = "เอกสารภายใน";
                    }else{
                      var DocType = "เอกสารภายนอก";
                    }

                    if(value.DocNumber==null){
                      var DocNumber = "-";
                    }else{
                      var DocNumber = value.DocNumber;
                    }

                    if(value.SignificantFigure==null){
                      var SignificantFigure = "-";
                    }else{
                      var SignificantFigure = value.DocNumber;
                    }

                    if(value.Description==null){
                      var Description = "-";
                    }else{
                      var Description = value.DocNumber;
                    }

                  var chkDoc = "<input class='form-control chk_Cus' type='radio' value='1' name='id_Cus' id='id_Cus" + key + "' value='" + value.ID + "' onclick='show_Detail(\"" + value.ID + "\",\"" + key + "\")' style='width: 25%;height:20px;'>";
                  StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:10%;text-align: center;'><center>"+chkDoc+"</center></td>" +
                    "<td style='width:5%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:10%;text-align: left;'>" + DocNumber + "</td>" +
                    "<td style='width:23%;text-align: left;'>" + value.DocName + "</td>" +
                    "<td style='width:23%;text-align: left;'>" + value.TypeDetail_Name + "</td>" +
                    "<td style='width:10%;text-align: left;'>" + SignificantFigure + "</td>" +
                    "<td style='width:23%;text-align: left;'>" + DocType + "</td>" +
                    "<td style='width:23%;text-align: left;'>" + Description + "</td>" +

                    "</tr>";
                });
              }
              $('#Data_Table tbody').html(StrTR);
        
      }
    });

  }

  function show_Detail(ID){
    
    $('#ID_txt').val(ID);

    $.ajax({
      url: "process/manage_headDoc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_Detail',
        'ID': ID
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

             
         
                  $('#select_TypeDetail').val(value.DocType_Detail);
                  $('#txt_DocNumber').val(value.DocNumber);
                  $('#txt_SignificantFigure').val(value.SignificantFigure);
                  $('#txt_DocName').val(value.DocName);
                  $('#txt_Description').val(value.Description);

                  if(value.DocType==1){
                      $("#StatusRadio1").prop("checked", true);
                    }else{
                      $("#StatusRadio2").prop("checked", true);
                    }
                
                  
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
      url: "process/manage_headDoc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'deleteData',
        'ID_txt': ID_txt
      },
      success: function(result) {
        $('#select_TypeDetail').val(0);
        $('#txt_DocNumber').val("");
        $('#txt_SignificantFigure').val("");
        $('#txt_DocName').val("");
        $('#txt_Description').val("");
        $("#StatusRadio1").prop("checked", true);
        $('#ID_txt').val("");

        $('#btnSaveDoc').show();
        $('#btnEditDoc').hide();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();

        show_data();

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
        cancel:  {text: 'ยกเลิก'},
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

  
  // $('#txtSearch').keydown(function(e) {
  //       if (e.keyCode == 13) {
  //         show_data();
  //       }
  //  })
 
</script>