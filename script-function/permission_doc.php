<script>
$(function() {
  showData_Doc();

  selection_DocDetail();
  selection_Doc();
  })

// show
// function showData_User() {

//     $.ajax({
//       url: "process/permission_doc.php",
//       type: 'POST',
//       data: {
//         'FUNC_NAME': 'showData_User'
//       },
//       success: function(result) {
//         var ObjData = JSON.parse(result);
//         var StrTR = "";
//         if (!$.isEmptyObject(ObjData)) {
//           $.each(ObjData, function(key, value) {


//             var chkUser = "<input class='form-control chk_user' type='radio'  name='id_user' id='id_user" + key + "' value='" + value.ID + "' onclick='showData_Doc(\"" + value.ID + "\")'  style='width: 25%;'>";

//             StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
//                       "<td style='width:15%;text-align: center;'><center>" + chkUser + "</center></td>" +
//                       "<td style='width:70%;text-align: left;'>" + value.UserType + "</td>" +
                      
//                       "</tr>";
//            });
//         }

//         $('#Data_TableLeft tbody').html(StrTR);

//       }
//     });

//   }

function selection_DocDetail(key,DocDetail_ID) {
    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_DocDetail'
        // 'select_Doc_': $("#select_Doc_").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_doctype").empty();
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก ประเภทเอกสาร</option>";

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";
          });
        }

        $("#select_doctype").append(Str);

      }
    });
  }

  function selection_Doc(key,Doc_ID) {
    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Doc'
        // 'select_Doc_': $("#select_Doc_").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_dochead").empty();
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก หัวข้อเอกสาร</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.DocNumber + " : " + value.DocName + "</option>";
          });
        }

        
        $("#select_dochead").html(Str);
  
      }
    });
  }

  // show
  function showData_Doc(ID) {
    var  txtSearch = $('#txtSearch').val();

    var  select_doctype =  $("#select_doctype").val();
    var  select_dochead =  $("#select_dochead").val();

    ID = $(".chk_docA:checked").val();
    var count = 0;
      $(".chk_docA:checked").each(function() {
        count++;
      });
      // if (count == 0) {
      //   text = "กรุณาเลือก User";
      //   showDialogFailed(text);
      //   return;
      // }
    
    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_Doc',
        'txtSearch': txtSearch,
        'ID': ID,
        'select_doctype': select_doctype,
        'select_dochead': select_dochead
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData.documentlist, function(key, value) {

            var chkDoc = "<input class='form-control chk_docA' type='radio'  name='id_docA' id='id_docA" + value.ID + "'  value='" + value.ID + "'  style='width:15%;'>";

            var chkUser_Ad = "<input class='form-control chkUser_Ad' type='checkbox'  name='id_user_Ad' id='id_user_Ad" + key + "' value='" + value.ID + "'  style='width: 15%;'>";
            var chkUser_Pha = "<input class='form-control chkUser_Pha' type='checkbox'  name='id_user_Pha' id='id_user_Pha" + key + "' value='" + value.ID + "'  style='width: 15%;'>";
            var chkUser_Dc = "<input class='form-control chkUser_Dc' type='checkbox'  name='id_user_Dc' id='id_user_Dc" + key + "' value='" + value.ID + "'  style='width: 15%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkDoc + "</center></td>" + 
                      "<td style='width:60%;text-align: left;'>" + value.DocName + "</td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser_Ad + "</center></td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser_Pha + "</center></td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser_Dc + "</center></td>" +
                      
                      "</tr>";
           });


        }

        $('#Data_TableRight tbody').html(StrTR);


        $.each(ObjData.chkUser_Ad,ObjData.chkUser_Pha,ObjData.chkUser_Dc, function(key_chkUser_Ad, value_chkUser_Ad,key_chkUser_Pha, value_chkUser_Pha,key_chkUser_Dc, value_chkUser_Dc) {
             $('#id_docA'+value_chkUser_Ad.DocumentID).prop('checked',true);
             $('#id_docA'+value_chkUser_Pha.DocumentID).prop('checked',true);
             $('#id_docA'+value_chkUser_Dc.DocumentID).prop('checked',true);
          });
      }
    });

  }

  $("#btnSaveDoc").click(function() {

$.confirm({
  title: 'แจ้งเตือน!',
  content: 'ต้องการส่งข้อมูล ใช่ หรือ ไม่?',
  type: 'orange',
  autoClose: 'cancel|8000',
  buttons: {
    cancel:  {text: 'ยกเลิก'},
    confirm: {
      btnClass: 'btn-primary',
      text: 'ตกลง',
      action: function() {
        saveData();
        }
      }
    }
  });
});

function saveData() {
    var chkUser = $('#id_user').val();
    var chkDoc = $('#id_docA').val();
    var count = 0;

    var ID_Doc = [];


    $(".chk_docA:checked").each(function() {
      count++;
    });
    if (count == 0) {
      text = "กรุณาเลือก User";
      showDialogFailed(text);
      return;
    }
      var id_user = $(".chk_docA:checked").val();

    $(".chk_docA:checked").each(function() {
      ID_Doc.push($(this).val());
    });
    




    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'saveData',
      
        'id_user':id_user,
        'ID_Doc':ID_Doc
      },
      success: function(result) {
        text = "สำเร็จ";
        showDialogSuccess(text);
      
      }
    });
  }
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
      title: 'ผิดพลาด!',
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