<script>
$(function() {
  // showData_exp();
  // showData_exp2();
  $('#tb_contact2').hide();
  $('#tb_contact3').hide();

  $('#txtSearch2').hide();
  $('#txtSearch3').hide();

  showData_exp_1();
  showData_exp2_1();
  // showData_exp3_1();
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
                      // "<td style='width:7%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:5%; text-align: center;'>" + (key + 1) + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.DocName + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.LastVersion + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.diffday + "</td>" +
                      "</tr>";

                      count++;
           });
        }
        // $tree = show_DataLeft($rows);
        $('#exp').text(count);
        $('#exp2').text("");
        $('#exp3').text("");

        $('#tb_contact').show();
        $('#txtSearch').show();
        $('#contact_Table tbody').html(StrTR);

        $('#tb_contact2').hide();
        $('#tb_contact3').hide();

        $('#txtSearch2').hide();
        $('#txtSearch3').hide();

        $('#bells').hide();
        $('#exp_1').hide();

        $('#bells2').show();
        $('#exp2_1').show();

        $('#bells3').show();
        $('#exp3_1').show();
      }
    });

  }

  function showData_exp_1() {
    var  txtSearch = $('#txtSearch').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_exp',
        'txtSearch': txtSearch,
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR2 = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
                      count++;
           });
        }
        
        $('#bells').show();
        $('#exp_1').show();

        $('#exp_1').text(count);

 


      }
    });

  }

 
// show
function showData_exp2() {
    var  txtSearch2 = $('#txtSearch2').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_exp2',
        'txtSearch2': txtSearch2,
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR2 = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_doc2' id='id_doc2" + key + "' value='" + value.ID + "'  style='width: 50%;'>";

            StrTR2 += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      // "<td style='width:7%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:5%; text-align: center;'>" + (key + 1) + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.DocName + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.version + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.diffdayexp + "</td>" +
                      "</tr>";

                      count++;
           });
        }
        // $tree = show_DataLeft($rows);
        $('#exp').text("");
        // $('#exp2_1').text(count);
        $('#exp2').text(count);
        $('#exp3').text("");

        $('#tb_contact2').show();
        $('#txtSearch2').show();
        $('#contact_Table2 tbody').html(StrTR2);

        $('#tb_contact').hide();
        $('#tb_contact3').hide();

        $('#txtSearch').hide();
        $('#txtSearch3').hide();

        $('#bells').show();
        $('#exp_1').show();

        $('#bells2').hide();
        $('#exp2_1').hide();

        $('#bells3').show();
        $('#exp3_1').show();
      }
    });

  }
  function showData_exp2_1() {
    var  txtSearch2 = $('#txtSearch2').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_exp2',
        'txtSearch2': txtSearch2,
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR2 = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
                      count++;
           });
        }
        
        $('#bells2').show();
        $('#exp2_1').show();

        $('#exp2_1').text(count);

    


      }
    });

  }

  // show
function showData_exp3() {
    var  txtSearch3 = $('#txtSearch3').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_exp3',
        'txtSearch3': txtSearch3,
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR2 = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_doc3' id='id_doc3" + key + "' value='" + value.ID + "'  style='width: 50%;'>";

            StrTR2 += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      // "<td style='width:5%;text-align: center;'><center>" + chkDoc + "</center></td>" +
                      "<td style='width:5%; text-align: center;'>" + (key + 1) + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.CustomerName + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.fileName + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.version + "</td>" +
                      "<td style='width:20%;text-align: center;'>" + value.newVersion + "</td>" +
                      "</tr>";

                      count++;
           });
        }
        // $tree = show_DataLeft($rows);
        $('#exp').text("");
        $('#exp2').text("");
        $('#exp3').text(count);

        $('#tb_contact3').show();
        $('#txtSearch3').show();
        $('#contact_Table3 tbody').html(StrTR2);

        $('#tb_contact').hide();
        $('#tb_contact2').hide();

        $('#txtSearch').hide();
        $('#txtSearch2').hide();

        $('#bells').show();
        $('#exp_1').show();

        $('#bells2').show();
        $('#exp2_1').show();

        $('#bells3').hide();
        $('#exp3_1').hide();
      }
    });

  }

  function showData_exp3_1() {
    var  txtSearch3 = $('#txtSearch3').val();

    $.ajax({
      url: "process/notification_doc.php",
      type: 'POST',
        data: {
          'FUNC_NAME': 'showData_exp3',
          'txtSearch3': txtSearch3,
        },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var count = 0;
        var StrTR2 = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
                      count++;
           });
        }
        $('#bells3').show();
        $('#exp3_1').show();

        $('#exp3_1').text(count);

     

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