<script>

// <html>
// <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
// </html>

  // userID = "";
  $(function() {
    
    // selection_Product();
    
    
    // show_DataLeft();
    
    show_DataRight();
    // แสดงชื่อไฟล์
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  })

 

  function selection_DocDetail(key,DocDetail_ID) {
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_DocDetail'
        // 'select_Doc_': $("#select_Doc_").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก ประเภทเอกสาร</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";

          });
        }

        

        $("#select_DocDetail_"+key).html(Str);

        

              if(DocDetail_ID==null || DocDetail_ID==0){
                $('#select_DocDetail_'+key).val(0);
                $('.btn_deletedocc').show();
              }else{
                $('#select_DocDetail_'+key).val(DocDetail_ID);
              }

            
           
      }
    });
  }
 
  function selection_Product(key,Product_ID) {
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Product'
        // 'select_Doc_': $("#select_Doc_").val()
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

        

        $("#select_Product_"+key).html(Str);


              if(Product_ID==null || Product_ID==0){
                $('#select_Product_'+key).val(0);
                $('.btn_deletedocc').show();
              }else{
                $('#select_Product_'+key).val(Product_ID);
              }

              
      }
    });
  }


  function selection_Doc(key,Doc_ID) {
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Doc'
        // 'select_Doc_': $("#select_Doc_").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก หัวข้อเอกสาร</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.DocNumber + " : " + value.DocName + "</option>";

          });
        }

        

        $("#select_Doc_"+key).html(Str);


              if(Doc_ID==null || Doc_ID==0){
                $('#select_Doc_'+key).val(0);
                $('.btn_deletedocc').show();
              }else{
                $('#select_Doc_'+key).val(Doc_ID);
              }

              
      }
    });
  }


  function upload_Doc() {

    var upload_fileRight = $('#upload_fileRight').prop('files')[0];
    // var select_Product = $("#select_Product").val();
    // var id_docLeft = $('input[name=id_docLeft]:checked').val();

    // if(select_product == 0){
    //   text = "กรุณาเลือก Product";
    //         showDialogFailed(text);
    //         return;
    // }

    if(upload_fileRight == undefined){
      text = "กรุณาเลือก File ที่จะอัพโหลด";
            showDialogFailed(text);
            return;
    }



    console.log(upload_fileRight);
    var form_data = new FormData();
    form_data.append('FUNC_NAME', 'upload_Doc');
    form_data.append('upload_fileRight', upload_fileRight);
    // form_data.append('select_Product', select_Product);
    // form_data.append('id_docLeft', id_docLeft);

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
    var  txtSearch = $('#txtSearch').val();
    

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DataLeft',
        'txtSearch': txtSearch,
        'select_product': $("#select_product").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_docLeft' id='id_docLeft" + key + "' value='" + value.ID + "'  style='width:50%;'>";
            var btn_preview = '<a href="javascript:void(0)"  onclick="preview(\'' + value.fileName + '\');"><img src="img/pdf.png" style="width:35px;"></a>';

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              "<td style='width:15%; text-align: center;'><center>" + chkDoc + "</center></td>" +
              "<td style='width:10%; text-align: center;'>" + (key + 1) + "</td>" +
              "<td style='width:10%; text-align: center;'>" + value.DocName + "</td>" +
              "<td style='width:10%; text-align: center;'>" + btn_preview + "</td>" +
              "<td style='width:5%;  text-align: center;'>" + value.DocNumber + "</td>" +
              "<td style='width:5%;  text-align: center;'>" + value.version + "</td>" +
              "<td style='width:5%;  text-align: center;'>" + value.UploadDate + "</td>" +

              "</tr>";
          });
        }
        // $tree = show_DataLeft($rows);
        
        $('#Data_TableLeft tbody').html(StrTR);

      }
    });

  }
  function preview(fileName) {
    var url="process/file/"+fileName;
    window.open(url);
  }

  function show_DataRight() {
    var  txtSearch2 = $('#txtSearch2').val();
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DataRight',
        'txtSearch2': txtSearch2,
        'select_Product': $("#select_Product").val(),
        'id_docLeft': $('input[name=id_docLeft]:checked').val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {

           
            
            // var chkDoc = "<input class='form-control chk_docLeft' type='radio'  name='id_docLeft' id='id_docLeft" + key + "' value='" + value.ID + "'  style='width: 50%;'>";
  
            var select_DocDetail = "<select style='width: 100%' class='form-control select2 select_DocDetaill' id='select_DocDetail_"+key+"' onchange ='show_bt_save("+key+");'></select>";
            var select_Product = "<select style='width: 100%' class='form-control select2 select_Productt' id='select_Product_"+key+"' onchange ='show_bt_save("+key+");'></select>";
            var select_Doc = "<select style='width: 100%' class='form-control select2 select_Docc' id='select_Doc_"+key+"' onchange ='show_bt_save("+key+");'></select>";
           
            var bt_MFGDate = " <input type='text' autocomplete='off' ' class='form-control  datepicker-here bt_MFGDatee' onclick ='show_modal1("+key+");' id='bt_MFGDate_"+key+"' value='<?php echo date('d/m/Y'); ?>' data-language='en' data-date-format='dd-mm-yyyy' placeholder='วันที่' readonly>";
            var bt_ExpireDate = "<input type='text' autocomplete='off' class='form-control  datepicker-here bt_ExpireDatee' onclick ='show_modal1("+key+");' id='bt_ExpireDate_"+key+"' value='<?php echo date('d/m/Y'); ?>' data-language='en' data-date-format='dd-mm-yyyy' placeholder='วันที่' readonly>";
            var bt_UploadDate = "<input type='text' autocomplete='off' class='form-control   bt_UploadDatee' id='bt_UploadDate_"+key+"'  readonly>";

            var bt_savedoc = "<button type='submit' class='btn btn-success btn_savedocc' id='btn_savedoc_"+key+"' onclick='Save_FileDoc("+key+","+value.ID+");'>บันทึก</button>";
            var bt_deletedoc = "<button type='submit' class='btn btn-danger btn_deletedocc' id='btn_deletedoc_"+key+"' onclick='chk_del("+key+","+value.ID+");'>ลบ</button>";

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              
              
              "<td style='width:10%;' >" + value.fileName + "</td>" +
              "<td style='width:5%;' >" + select_DocDetail + "</td>" +
              "<td style='width:5%;' >" + select_Product + "</td>" +
              "<td style='width:5%;' >" + select_Doc + "</td>" +
              "<td style='width:5%;' >" + bt_ExpireDate +"</td>" +
              "<td style='width:5%;' >" + bt_ExpireDate + "</td>" +
              "<td style='width:2%;' ><center>"+bt_savedoc + bt_deletedoc +"</center></td>" +

              "</tr>";
            
              selection_DocDetail(key,value.DocumentID);
              selection_Product(key,value.DocumentID);
              selection_Doc(key,value.DocumentID);
          });
          
        }
        
        $('#Data_TableRight tbody').html(StrTR);
      
        $(".select2").select2();
        $('.btn_savedocc').hide();
        $('.btn_deletedocc').hide();
       
      }
    });
  }


  function show_modal1(key) {
    $("#Modaldetail_Doc").modal('show');
    
      show_DataRight();
  }
 
  
  function show_bt_save(key) {
    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();

    if(select_DocDetail == 0 || select_Product == 0 || select_Doc == 0){
                $('#btn_deletedoc_'+key).show();
                $('#btn_savedoc_'+key).hide();
            }else{
              $('#btn_savedoc_'+key).show();
              $('#btn_deletedoc_'+key).hide();
      }

      if(select_DocDetail == 2 && select_Product == 0 && select_Doc != 0){
               $('#btn_savedoc_'+key).show();
              $('#btn_deletedoc_'+key).hide();
            }
    // alert(select_Doc);
    // if(select_Product == 0){
    //             $('#btn_deletedoc_'+key).show();
    //             $('#btn_savedoc_'+key).hide();
    //         }else{
    //           $('#btn_savedoc_'+key).show();
    //           $('#btn_deletedoc_'+key).hide();
    //   }

    //  if(select_DocDetail == 0){
    //             $('#btn_deletedoc_'+key).show();
    //             $('#btn_savedoc_'+key).hide();
    //         }else{
    //           $('#btn_savedoc_'+key).show();
    //           $('#btn_deletedoc_'+key).hide();
    //   }
      

      if(select_DocDetail != 2){
        $('#select_Product_'+key).attr('disabled',false);
          
      }else{
        $('#select_Product_'+key).attr('disabled',true);
      }      

  }

  

  function Save_FileDoc(key,ID) {

    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();

    var select_product = $("#select_product").val();

        $.ajax({
          url: "process/upload_doc.php",
          type: 'POST',
          data: {
            'FUNC_NAME': 'Save_FileDoc',
            'select_DocDetail':select_DocDetail,
            'select_Product':select_Product,
            'select_Doc':select_Doc,
            'select_product': select_product,
            'ID': ID
          },
          success: function(result) {

            showDialogSuccess(result);
            $('#btn_savedoc_'+key).hide();
            // show_DataLeft();
            show_DataRight();

          }
        });

  }

  function show_bt_delete(key) {
    $('#bt_deletedoc'+key).show();
  }

  function chk_del(key,ID){
    

      $.confirm({
          title: 'แจ้งเตือน!',
          content: 'ยืนยันการลบข้อมูล ใช่ หรือ ไม่?',
          type: 'orange',
          autoClose: 'cancel|8000',
          buttons: {
            cancel:  {text: 'ยกเลิก'},
            confirm: {
              btnClass: 'btn-primary',
              text: 'ตกลง',
              action: function() {
                Delete_FileDoc(key,ID);
              }
            }
          }
        });
      
  }

  function Delete_FileDoc(key,ID) {
    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();

    var select_product = $("#select_product").val();

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'Delete_FileDoc',
        'select_DocDetail':select_DocDetail,
        'select_Product':select_Product,
        'select_Doc':select_Doc,
        'select_product': select_product,
        'ID': ID
      },
      success: function(result) {

        // showDialogSuccess(result);
        $('#bt_deletedoc'+key).hide();
        // show_DataLeft();
        show_DataRight();

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