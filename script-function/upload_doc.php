<script>
  // userID = "";
  $(function() {
    selection_Product();
    show_DataLeft();

    // แสดงชื่อไฟล์
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
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

  function upload_Doc() {

    var upload_fileRight = $('#upload_fileRight').prop('files')[0];
    var select_product = $("#select_product").val();
    var id_docLeft = $('input[name=id_docLeft]:checked').val();

    console.log(upload_fileRight);
    var form_data = new FormData();
    form_data.append('FUNC_NAME', 'upload_Doc');
    form_data.append('upload_fileRight', upload_fileRight);
    form_data.append('select_product', select_product);
    form_data.append('id_docLeft', id_docLeft);

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: function(result) {

        show_DataRight();
        $('#upload_fileRight').val('');
        $('.custom-file-label').html('เลือกไฟล์');
        // var ObjData = JSON.parse(result);


      }
    });
  }

  // show
  function show_DataLeft() {

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DataLeft',
        'select_product': $("#select_product").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_docLeft' id='id_docLeft" + key + "' value='" + value.ID + "'  style='width: 50%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              "<td style='width:10%;text-align: center;'><center>" + chkDoc + "</center></td>" +
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

  function show_DataRight() {

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DataRight',
        'select_product': $("#select_product").val(),
        'id_docLeft': $('input[name=id_docLeft]:checked').val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            // var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_docLeft' id='id_docLeft" + key + "' value='" + value.ID + "'  style='width: 50%;'>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              "<td style='width:10%;text-align: center;'><center></center></td>" +
              "<td style='width:5%;text-align: center;'>" + (key + 1) + "</td>" +
              "<td >" + value.fileName + "</td>" +

              "</tr>";
          });
        }
        $('#Data_TableRight tbody').html(StrTR);

      }
    });

  }
</script>