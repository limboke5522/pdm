<script>
$(function() {
  

  selection_DocDetail();
  selection_Product();
  selection_Doc();

  $(".select2").select2();
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

  function selection_Product(key,Product_ID) {

var  select_doctype =  $("#select_doctype").val();
var  select_product =  $("#select_product").val();
var  select_dochead =  $("#select_dochead").val();


$.ajax({
  url: "process/permission_doc.php",
  type: 'POST',
  data: {
    'FUNC_NAME': 'selection_Product',
    'select_doctype':select_doctype,
    'select_product':select_product,
    'select_dochead':select_dochead
    // 'select_Doc_': $("#select_Doc_").val()
  },
  success: function(result) {
    var ObjData = JSON.parse(result);
    $("#select_product").empty();
    var Str = "";
    Str += "<option value=0 >กรุณาเลือก เอกสาร</option>";
    
    if (!$.isEmptyObject(ObjData)) {
      $.each(ObjData, function(key, value) {
        Str += "<option value=" + value.ID  + " >" + value.ProductCode + " : " + value.ProductName + "</option>";
      });
    }

    $("#select_product").append(Str);
  }
});
}

  function selection_Doc(key,Doc_ID) {

    var  select_doctype =  $("#select_doctype").val();
    var  select_product =  $("#select_product").val();
    var  select_dochead =  $("#select_dochead").val();

    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Doc',
        'select_doctype':select_doctype,
        'select_product':select_product,
        'select_dochead':select_dochead
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
  function showData_Doc() {
    var  txtSearch = $('#txtSearch').val();

    var  select_doctype =  $("#select_doctype").val();
    var  select_product =  $("#select_product").val();
    var  select_dochead =  $("#select_dochead").val();

    // ID = $(".chk_docA:checked").val();
    // var count = 0;
    //   $(".chk_docA:checked").each(function() {
    //     count++;
    //   });

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
        // 'ID': ID,
        'select_doctype': select_doctype,
        'select_product': select_product,
        'select_dochead': select_dochead
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData.documentlist, function(key, value) {
           

            var userAd_1 = "";
            var userPha_2 = "";
            var userDc_3 = "";
            if (!$.isEmptyObject(ObjData.userdoc)) {
            $.each(ObjData.userdoc[value.ID], function(key2, value2) {
                        if(value2.UserTypeID == 1 ){
                          userAd_1 = "checked";
                        }
                      });
            $.each(ObjData.userdoc[value.ID], function(key2, value2) {
                        if(value2.UserTypeID == 2){
                          userPha_2 = "checked";
                        }       
                      });
            $.each(ObjData.userdoc[value.ID], function(key2, value2) {
                        if(value2.UserTypeID == 3){
                          userDc_3 = "checked";
                        }       
                      });
            }
            var chkDoc = "<input class='form-control chk_docA' type='radio'  name='id_docA' id='id_docA" + value.ID + "'  value='" + value.ID + "'  style='width:15%;'>";

            var chkUser_Ad = "<input class='form-control chkUser_Ad' "+userAd_1+" type='checkbox'  name='id_user_Ad' id='id_user_Ad" + value.ID + "' value='" + value.ID + "'  onclick='saveData("+value.ID+",1);' style='width: 15%;'>";
            var chkUser_Pha = "<input class='form-control chkUser_Pha' "+userPha_2+" type='checkbox'  name='id_user_Pha' id='id_user_Pha" + value.ID + "' value='" + value.ID + "' onclick='saveData("+value.ID+",2);' style='width: 15%;'>";
            var chkUser_Dc = "<input class='form-control chkUser_Dc' "+userDc_3+" type='checkbox'  name='id_user_Dc' id='id_user_Dc" + value.ID + "' value='" + value.ID + "' onclick='saveData("+value.ID+",3);' style='width: 15%;'>";


            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      // "<td style='width:10%;text-align: center;'><center>" + chkDoc + "</center></td>" + 
                      "<td style='width:60%;text-align: left;'>" + value.DocName + "</td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser_Ad + "</center></td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser_Pha + "</center></td>" +
                      "<td style='width:10%;text-align: center;'><center>" + chkUser_Dc + "</center></td>" +
                      
                      "</tr>";

                      $('#Data_TableRight tbody').html(StrTR);
                    });
        }
      }
    });

  }

  function check_selection(numm){
  var select_doctype= $('#select_doctype').val();
  var select_product= $('#select_product').val();
  var select_dochead= $('#select_dochead').val();

  if(numm==1){
          if(select_doctype != 2){
                      $('#select_product').attr('disabled',false);
                      
                      selection_Product();
                      selection_Doc();
                    }else{
                      
                      selection_Doc();
                      $('#select_product').attr('disabled',true);
                      $('#select2-select_product-container').text("ทุก Product");
                      $('#select2-select_product-container').val(0);
                      showData_Doc();
                    } 

  }else if(numm==2){
    selection_Doc();
    showData_Doc();
  }else{
    showData_Doc();
  }       
                                    
          
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

function saveData(UserTypeID,DocumentID) {
    var chkUser = $('#id_user').val();
    var chkDoc = $('#id_docA').val();

    var id_user_Ad = $('#id_user_Ad').val(); 
    var id_user_Pha = $('#id_user_Pha').val(); 
    var id_user_Dc= $('#id_user_Dc').val(); 

    
    var count = 0;

    var ID_Doc = [];

$(".id_userAD:checked").each(function() {
      count++;
    });
    $(".id_userPHA:checked").each(function() {
      count++;
    });
    $(".id_userDC:checked").each(function() {
      count++;
    });
    // if (count == 0) {
    //   text = "กรุณาเลือก User";
    //   showDialogFailed(text);
    //   return;
    // }
      var id_AD = $(".id_userAD:checked").val();
      var id_PHA = $(".id_userPHA:checked").val();
      var id_DC = $(".id_userDC:checked").val();

    $(".id_userAD:checked").each(function() {
      ID_Doc.push($(this).val());
    });
    $(".id_userPHA:checked").each(function() {
      ID_Doc.push($(this).val());
    });
    $(".id_userDC:checked").each(function() {
      ID_Doc.push($(this).val());
    });


    // $(".chk_docA:checked").each(function() {
    //   count++;
    // });
    // if (count == 0) {
    //   text = "กรุณาเลือก User";
    //   showDialogFailed(text);
    //   return;
    // }
    //   var id_user = $(".chk_docA:checked").val();

    // $(".chk_docA:checked").each(function() {
    //   ID_Doc.push($(this).val());
    // });
    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'saveData',
        'ID_Doc':ID_Doc,
        'UserTypeID':UserTypeID,
        'DocumentID':DocumentID,
        'id_AD':id_AD,
        'id_PHA':id_PHA,
        'id_DC':id_DC
        
      },
      // success: function(result) {
      //   text = "สำเร็จ";
      //   showDialogSuccess(text);
      
      // }

      
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