<script>

    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output =  ((''+day).length<2 ? '0' : '') + day + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    d.getFullYear();

  $(function() {
    $("#txt_Sdate_doc").val(output);
    $("#txt_Edate_doc").val(output);

    $(".select2").select2();
    selection_Customer();
    show_data();

  })


  function selection_Customer() {
    $.ajax({
      url: "process/history_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Customer'
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก โรงพยาบาล</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.CustomerName + "</option>";

          });
        }
        $("#select_hospital").html(Str);

      }
    });
  }



  function show_data(){
    var select_hospital =  $("#select_hospital").val();
    var txt_Sdate_doc =  $("#txt_Sdate_doc").val();
    var txt_Edate_doc =  $("#txt_Edate_doc").val();

   $.ajax({
      url: "process/history_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_data',
        'select_hospital': select_hospital,
        'txt_Sdate_doc': txt_Sdate_doc,
        'txt_Edate_doc': txt_Edate_doc
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            var btn_preview = '<a href="javascript:void(0)"  onclick="show_Modaldetail(\'' + value.SendDocNo + '\');"><img src="img/search_detail2.png" style="width:35px;"></a>';
            // var bt = ' <button type="button" style="font-size: 10px;" class="btn btn-outline-primary" id="btn_send_'+key+'"  onclick="add_DocProduct(\'' + key + '\',\'' + value.ID + '\',\'' + value.DocName + '\',\'' + value.version + '\',\'' + id_product + '\')" >เลือก >> </button>';
            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:5%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:20%;text-align: left;'>" + value.CustomerName + "</td>" +
                    "<td style='width:15%;text-align: center;'>" + value.Purpose + "</td>" +
                    "<td style='width:12%;text-align: center;'>"+value.ContactName+"</td>" +
                    "<td style='width:20%;text-align: center;'><center>"+value.email+"</center></td>" +
                    "<td style='width:10%;text-align: center;'><center>"+value.DocDate+"</center></td>" +
                    "<td style='width:10%;text-align: center;'><center>"+btn_preview+"</center></td>" +
                    "</tr>";

          });
        }else{
          StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:5%;text-align: center;' colspan='7'> ยังไม่มีรายการ </td>" +
                   
                    "</tr>";
        }
        $('#table_history tbody').html(StrTR);

        setTimeout(() => {
          chk_btn(id_product);
        }, 100);
      }
    });
  
   
  }



 function show_Modaldetail(SendDocNo){
  $('#Modaldetail_Doc').modal('toggle');

  $.ajax({
      url: "process/history_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_Docdetail',
        'SendDocNo': SendDocNo
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            var btn_preview = '<a href="javascript:void(0)"  onclick="show_preview(\'' + value.fileName + '\');"><img src="img/pdf.png" style="width:35px;"></a>';
            if(value.version==value.newVersion){
              var style_bgcolor ="";
            }else{
              var style_bgcolor ="background-color: #FF0000;";
            }
            // var bt = ' <button type="button" style="font-size: 10px;" class="btn btn-outline-primary" id="btn_send_'+key+'"  onclick="add_DocProduct(\'' + key + '\',\'' + value.ID + '\',\'' + value.DocName + '\',\'' + value.version + '\',\'' + id_product + '\')" >เลือก >> </button>';
            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px; "+style_bgcolor+" '>" +
                    "<td style='width:5%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:20%;text-align: left;'>" + value.ProductName + "</td>" +
                    "<td style='width:15%;text-align: center;'>" + value.DocName + "</td>" +
                    "<td style='width:12%;text-align: center;'>"+value.version+"</td>" +
                    "<td style='width:10%;text-align: center;'><center>"+btn_preview+"</center></td>" +
                    "</tr>";

          });
        }else{
          StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:5%;text-align: center;' colspan='5'> ยังไม่มีรายการ </td>" +
                   
                    "</tr>";
        }
        $('#table_list_Doc tbody').html(StrTR);

        setTimeout(() => {
          chk_btn(id_product);
        }, 100);
      }
    });
 }

 function show_preview(fileName) {
    var url="process/file/"+fileName;
    window.open(url);
  }














</script>