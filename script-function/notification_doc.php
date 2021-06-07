<script>
$(function() {
  // showData_exp();
  // showData_exp2();
  var d = new Date();

  var month = d.getMonth()+1;
  var day = d.getDate();

  var output =  (day<10 ? '0' : '') + day + '-' +
    (month<10 ? '0' : '') + month + '-' +
      d.getFullYear();

    $('#txt_Sdate_doc').val(output);
    $('#txt_Edate_doc').val(output);
  })

  // show
  function showData_exp() {
    var  txtSearch = $('#txtSearch').val();
    var  txt_Sdate_doc = $('#txt_Sdate_doc').val();
    var  txt_Edate_doc = $('#txt_Edate_doc').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_exp',
        'txtSearch': txtSearch,
        'txt_Sdate_doc': txt_Sdate_doc,
        'txt_Edate_doc': txt_Edate_doc
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_doc' id='id_doc" + key + "' value='" + value.ID + "'  style='width: 50%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      "<td style='width:7%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:5%; text-align: center;'>" + (key + 1) + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.DocName + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.version + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.diffday + "</td>" +
                      "</tr>";

                      count++;
           });
        }
        // $tree = show_DataLeft($rows);
        $('#exp').text(count);
        $('#exp2').text("");
        $('#contact_Table tbody').html(StrTR);

      }
    });

  }

 
// show
function showData_exp2() {
    var  txtSearch = $('#txtSearch').val();
    var  txt_Sdate_doc = $('#txt_Sdate_doc').val();
    var  txt_Edate_doc = $('#txt_Edate_doc').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_exp',
        'txtSearch': txtSearch,
        'txt_Sdate_doc': $("#txt_Sdate_doc").val(),
        'txt_Edate_doc': $("#txt_Edate_doc").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_doc' id='id_doc" + key + "' value='" + value.ID + "'  style='width: 50%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      "<td style='width:7%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:5%; text-align: center;'>" + (key + 1) + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.DocName + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.version + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.diffday + "</td>" +
                      "</tr>";

                      count++;
           });
        }
        // $tree = show_DataLeft($rows);
        $('#exp').text("");
        $('#exp2').text(count);
        
        $('#contact_Table tbody').html(StrTR);

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