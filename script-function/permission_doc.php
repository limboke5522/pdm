<script>
$(function() {
  showData_Doc();
  
  // $('#tb_contact2').hide();
  // var d = new Date();

  // var month = d.getMonth()+1;
  // var day = d.getDate();

  // var output =  (day<10 ? '0' : '') + day + '-' +
  //   (month<10 ? '0' : '') + month + '-' +
  //     d.getFullYear();

  //   $('#txt_Sdate_doc').val(output);
  //   $('#txt_Edate_doc').val(output);
  })

  // show
  function showData_Doc() {
    var  txtSearch = $('#txtSearch').val();

    $.ajax({
      url: "process/permission_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showData_Doc',
        'txtSearch': txtSearch
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc_Admin = "<input class='form-control chk_docA' type='radio'  name='id_docA' id='id_docA" + key + "' value='" + value.ID + "'  style='width: 10%;'>";
            var chkDoc_Phar = "<input class='form-control chk_docP' type='radio'  name='id_docP' id='id_docP" + key + "' value='" + value.ID + "'  style='width: 10%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                      "<td style='width:70%;text-align: left;'>" + value.DocName + "</td>" +
                      "<td style='width:15%;text-align: center;'><center>" + chkDoc_Admin + "</center></td>" +
                      "<td style='width:15%;text-align: center;'><center>" + chkDoc_Phar + "</center></td>" +
                      "</tr>";
           });
        }

        $('#contact_Table tbody').html(StrTR);

      }
    });

  }

 

  // function showDialogSuccess(text) {
  //   $.confirm({
  //     title: 'สำเร็จ!',
  //     content: text,
  //     type: 'green',
  //     autoClose: 'close|8000',
  //     typeAnimated: true,
  //     buttons: {
  //       close:  {
  //         text: 'ปิด',
  //       }
  //     }
  //   });
  // }
  

  // function showDialogFailed(text) {
  //   $.confirm({
  //     title: 'ผิดพลาด!',
  //     content: text,
  //     type: 'red',
  //     autoClose: 'close|8000',
  //     typeAnimated: true,
  //     buttons: {
  //       close:  {
  //         text: 'ปิด',
  //       }
  //     }
  //   });
  // }
</script>