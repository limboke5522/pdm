<script>
  // userID = "";
  $(function() {
    selection_Product();
    show_DataLeft();
  })

  function selection_Product() {
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Product'
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก Product</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.ProductName + "</option>";

          });
        }
        $("#select_product").html(Str);

      }
    });
  }


  // show

  function show_DataLeft(){

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DataLeft',
        'select_product': $("#select_product").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              var StrTR = "" ;
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

 
                  var chkDoc = "<input class='form-control chk_docLeft' type='radio' value='1' name='id_docLeft' id='id_docLeft" + key + "' value='" + value.ID + "' onclick='show_Detail(\"" + value.ID + "\",\"" + key + "\")' style='width: 50%;'>";
                  
                  StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:10%;text-align: center;'><center>"+chkDoc+"</center></td>" +
                    "<td style='width:5%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:20%;text-align: center;'>" + value.DocName + "</td>" +
                    "<td style='width:20%;text-align: center;'>" + value.DocNumber + "</td>" +
                    "<td style='width:20%;text-align: center;'></td>" +
                    "<td style='width:20%;text-align: center;'></td>" +

                    "</tr>";
                });
              }
              $('#Data_TableLeft tbody').html(StrTR);
        
      }
    });

  }

</script>