<script>
$(function() {
  showData_Doc();

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

  // show
  function showData_Doc(ID) {
    var  txtSearch = $('#txtSearch').val();
    ID = $(".chk_user:checked").val();
    var count = 0;
      $(".chk_user:checked").each(function() {
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
        'ID': ID
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData.documentlist, function(key, value) {

            var chkUser = "<input class='form-control chk_user' type='radio'  name='id_user' id='id_user" + key + "' value='" + value.ID + "'  style='width: 15%;'>";
            var chkDoc = "<input class='form-control chk_docA' type='checkbox'  name='id_docA' id='id_docA" + value.ID + "' value='" + value.ID + "'  style='width:15%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser + "</center></td>" + 
                      "<td style='width:60%;text-align: left;'>" + value.DocName + "</td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      
                      "</tr>";
           });


        }

        $('#Data_TableRight tbody').html(StrTR);


        $.each(ObjData.userdoc, function(key_userdoc, value_userdoc) {
             $('#id_docA'+value_userdoc.DocumentID).prop('checked',true);
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


    $(".chk_user:checked").each(function() {
      count++;
    });
    // if (count == 0) {
    //   text = "กรุณาเลือก User";
    //   showDialogFailed(text);
    //   return;
    // }
      var id_user = $(".chk_user:checked").val();

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