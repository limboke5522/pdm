<script>

// <html>
// <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
// </html>

  // userID = "";
  $(function() {
    
    selection_DocDetail();
    selection_DocDetaill();

    selection_Product();
    // selection_PRODUCTT();

    selection_Doc();
    // selection_Docc();

    show_DataLeft();
    $(".select2").select2();

    $("#StatusRadio1").prop("checked", true);

    // $("#select_Product_").prop("disabled", true);
    // $("#select_Doc_").prop("disabled", true);
    // แสดงชื่อไฟล์
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  })

  function selection_DocDetaill(key,DocDetail_ID) {
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_DocDetaill'
        // 'select_Doc_': $("#select_Doc_").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_DocDetail_").empty();
        
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
        $("#select_doctype").empty();

        var Str2 = "";
              Str2 += "<option value=0 >ทั้งหมด</option>";

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str2 += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";
          });
        }

        
        $("#select_doctype").append(Str2);

      }
    });
  }

  

  function selection_PRODUCTT(key,Product_ID) {
    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_PRODUCTT',
        'select_DocDetail':select_DocDetail,
        'select_Product':select_Product,
        'select_Doc':select_Doc
        // 'select_Doc_': $("#select_Doc_").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_Product_").empty();
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก Product</option>";
        
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            Str += "<option value=" + value.ID  + " >" + value.ProductCode + " : " + value.ProductName + "</option>";
          });
        }
        
    
        Str += "<option value='@P'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp --- เพิ่ม --- </option>";

        // $("#select_Product_"+key).attr('disabled', true);
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

  function selection_Product() {

    var  select_doctype =  $("#select_doctype").val();
    var  select_product =  $("#select_product").val();
    var  select_dochead =  $("#select_dochead").val();


    $.ajax({
      url: "process/upload_doc.php",
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
        var Str2 = "";
        Str2 += "<option value=0 >กรุณาเลือก Product</option>";
        
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str2 += "<option value=" + value.ID  + " >" + value.ProductCode + " : " + value.ProductName + "</option>";
          });
        }

        
        $("#select_product").append(Str2);
      }
    });
  }

  
  function selection_Docc(key,Doc_ID) {
    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Docc',
        'select_DocDetail':select_DocDetail,
        'select_Product':select_Product,
        'select_Doc':select_Doc
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_Doc_").empty();
        var Str = "";
        // var txt_Refcode = "";
        Str += "<option value=0 >กรุณาเลือก หัวข้อเอกสาร</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.DocNumber + " : " + value.DocName + "</option>";

          });
        }

        Str += "<option value='@D'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp --- เพิ่ม --- </option>";

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
  
  function get_refNum(key) {
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();
    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'get_refNum',
        'select_Product':select_Product,
        'select_Doc':select_Doc
      },
     
      success: function(result) {
        var ObjData = JSON.parse(result);
       
        
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            $( "#txt_Refcode_"+key).val(value.refNumber);
          });
        }
        

        if(value.refNumber==null || value.refNumber==""){

            $("#txt_Refcode_"+key).empty();

              }else{
                $('#txt_Refcode_'+key).val(value.refNumber);
              }
      }
    });
  }


  function selection_Doc() {

    var  select_doctype =  $("#select_doctype").val();
    var  select_product =  $("#select_product").val();
    var  select_dochead =  $("#select_dochead").val();


    $.ajax({
      url: "process/upload_doc.php",
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
        var Str2 = "";
        Str2 += "<option value=0 >กรุณาเลือก หัวข้อเอกสาร</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str2 += "<option value=" + value.ID + " >" + value.DocNumber + " : " + value.DocName + "</option>";
          });
        }

        
        $("#select_dochead").html(Str2);


              
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
    $('.nav-tabs a:first').tab('show') 
    
    $('#tb_Data_RR').hide();
    $('#tb_Data_LL').show();


    var  select_doctype =  $("#select_doctype").val();
    var  select_product =  $("#select_product").val();
    var  select_dochead =  $("#select_dochead").val();

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DataLeft',
        'txtSearch': txtSearch,
        'select_doctype': select_doctype,
        'select_product': select_product,
        'select_dochead': select_dochead
        
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {

            var btn_preview = '<a href="javascript:void(0)"  onclick="preview(\'' + value.fileName + '\');"><img src="img/pdf.png" style="width:35px;"></a>';

            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              "<td style='width:10%;text-align: center;'>" + value.DocNumber + "</td>" +
              "<td style='width:15%;text-align: center;'>" + value.DocName + "</td>" +
              "<td style='width:15%;text-align: center;'>" + value.ProductName + "</td>" +
              "<td style='width:15%;text-align: center;'>" + value.TypeDetail_Name + "</td>" +
              "<td style='width:5%;text-align: center;'>" + value.newVersion + "</td>" +
              "<td style='width:15%;text-align: center;'>" + value.MFGDate + "</td>" +
              "<td style='width:15%;text-align: center;'>" + value.ExpireDatee + "</td>" +
              "<td style='width:15%;text-align: center;'>" + value.UploadDate + "</td>" +
              "<td style='width:5%;text-align:  center;'>" + btn_preview + "</td>" +
              "</tr>";
              
              // selection_Product();
              // selection_Doc();
          });
        }
        
        $('#tb_Data_LL').show();
        $('#Data_TableLeft tbody').html(StrTR);

        $('#tb_Data_RR').hide();
        // check_selection();
      }
    });

  }

  function check_selection(numm){
  var select_doctype= $('#select_doctype').val();
  var select_product= $('#select_product').val();
  var select_dochead= $('#select_dochead').val();


  if(numm==1){
     
      

    // selection_DocDetail();
          if(select_doctype != 2){
                      $('#select_product').attr('disabled',false);
                      // $('#select2-select_product-container').text("กรุณาเลือก Product");
                      // $('#select2-select_product-container').val(0);
                      selection_Product();
                      selection_Doc();
                      
                    }else{
                      selection_Doc();
                      $('#select_product').attr('disabled',true);
                      $('#select2-select_product-container').text("ทุก Product");
                      $('#select2-select_product-container').val(0);
                      show_DataLeft();
                    } 

  }else if(numm==2){
    selection_Doc();
    show_DataLeft();
  }else{
    show_DataLeft();
  }       
                                    
          
 }
  function preview(fileName) {
    var url="process/file/"+fileName;
    window.open(url);
  }

  function show_DataRight() {
    var  txtSearch2 = $('#txtSearch2').val();
    // $('#home-tab').selected();
    $('#tb_Data_RR').show();
    $('#tb_Data_LL').hide();

    // $("#little_exp").removeClass("bg-lightblue");
    // $("#little_exp").addClass("bg-light");

    // $("#little_exp2").removeClass("bg-light");
    // $("#little_exp2").addClass("bg-lightblue");
    
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
            

            var select_DocDetail = "<select style='width: 100%' class='form-control select2 select_DocDetaill' id='select_DocDetail_"+key+"'  onchange ='show_bt_save("+key+",1);'></select>";
            var select_Product = "<select style='width: 100%' class='form-control select2 select_Productt' id='select_Product_"+key+"' onchange ='show_bt_save("+key+",2);' disabled ></select>";
            var select_Doc = "<select style='width: 100%' class='form-control select2 select_Docc' id='select_Doc_"+key+"' onchange ='show_bt_save("+key+",3);' disabled ></select>";
            
            // if(txt_Refcode == undefined){
              var txt_Refcode = "<input type='text' style='width: 175px' class='form-control  '  id='txt_Refcode_"+key+"'  disabled >";
            // }else{
            // var txt_Refcode = "<input type='text' style='width: 175px' class='form-control  '  id='txt_Refcode_"+key+"' value="+value.refNumber+" disabled>";
            //   }

            var bt_MFGDate = " <input type='date' style='width: 175px'  class='form-control datepicker-here  bt_MFGDatee'  id='bt_MFGDate_"+key+"' onchange ='show_bt_save("+key+");' data-language='en' data-date-format='dd-mm-yyyy'  >";
            var bt_ExpireDate = "<input type='date' style='width: 175px' class='form-control datepicker-here  bt_ExpireDatee'  id='bt_ExpireDate_"+key+"' onchange ='show_bt_save("+key+");' data-language='en' data-date-format='dd-mm-yyyy'  >";

            var bt_savedoc = "<button type='submit' class='btn btn-success btn_savedocc' id='btn_savedoc_"+key+"' onclick='Save_FileDoc("+key+","+value.ID+");'>บันทึก</button>";
            var bt_deletedoc = "<button type='submit' class='btn btn-danger btn_deletedocc' id='btn_deletedoc_"+key+"' onclick='chk_del("+key+","+value.ID+");'>ลบ</button>";

            var btnSave_Doc = "<input type='text'  class='form-control  '  id='btnSave_Doc"+key+"' value="+value.DocDetail_ID+"  >";

         
            StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              
              
              "<td style='width:10%;' >" + value.fileName + "</td>" +
              "<td style='width:5%;' >" + select_DocDetail + "</td>" +
              "<td style='width:5%;' >" + select_Product + "</td>" +
              "<td style='width:5%;' >" + select_Doc + "</td>" +
              "<td style='width:5%;' >" + txt_Refcode + "</td>" +
              "<td style='width:5%;' >" + bt_MFGDate +"</td>" +
              "<td style='width:5%;' >" + bt_ExpireDate + "</td>" +
              "<td style='width:2%;' ><center>"+bt_savedoc + bt_deletedoc +"</center></td>" +

              "</tr>";
            
              selection_DocDetaill(key,value.DocDetail_ID);
              selection_PRODUCTT(key,value.Product_ID);
              selection_Docc(key,value.Doc_ID);
              get_refNum(key);
              // check_selection();
          });
          
        }
        
        $('#Data_TableRight tbody').html(StrTR);
      
        

        $(".select2").select2();
        $('.btn_savedocc').hide();
        $('.btn_deletedocc').hide();
       
      }
    });
  }
  
  


  function show_bt_save(key,num) {
    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();

    var txt_Refcode = $('#txt_Refcode'+key).val();
    
    
if(num == 1){


  if(select_DocDetail != 2){
        
        $('#select_Product_'+key).attr('disabled',false);
        // $('#select_Doc_'+key).attr('disabled',false);
        $('#txt_Refcode_'+key).attr('disabled',false);

        $("#select2-select_Product_"+key +"-container").text("กรุณาเลือก Product");
        $("#select_Product_"+key ).val(0);

        $("#select2-select_Doc_"+key +"-container").text("กรุณาเลือก หัวข้อเอกสาร");
        $("#select_Doc_"+key ).val(0);
        selection_PRODUCTT(key);
      }else{
        selection_Docc(key);
        $('#select_Product_'+key).attr('disabled',true);
        $('#select_Doc_'+key).attr('disabled',false);
        $('#txt_Refcode_'+key).attr('disabled',false);

        $("#select2-select_Product_"+key +"-container").text("ทุก Product");
        $("#select_Product_"+key ).val(0);

        $("#select2-select_Doc_"+key +"-container").text("กรุณาเลือก หัวข้อเอกสาร");
        $("#select_Doc_"+key ).val(0);
        
      }  

}else if(num == 2){
       $('#select_Doc_'+key).attr('disabled',false);
      selection_Docc(key); 
      get_refNum(key);
        setTimeout(() => {
            if($('#select_Product_'+key).val() == '@P'){
              $("#Modaldetail_Product").modal('show');
            }
          
        }, 150);
}else {
  if(num == 3){
    get_refNum(key);
  }
  
  setTimeout(() => {
      if($('#select_Doc_'+key).val() == '@D'){
        $("#Modaldetail_Doc").modal('show');
      }
    }, 150);
}

    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();
    var bt_MFGDate = $('#bt_MFGDate_'+key).val();
    var bt_ExpireDate = $('#bt_ExpireDate_'+key).val();
    var txt_Refcode = $('#txt_Refcode_'+key).val();

    if(select_DocDetail != 0 && select_Product != 0 && select_Doc != 0){
        if(bt_MFGDate != '' && bt_ExpireDate != ''){
            $('#btn_savedoc_'+key).show();
              $('#btn_deletedoc_'+key).hide();
                
            }else{
              $('#btn_deletedoc_'+key).show();
                $('#btn_savedoc_'+key).hide();

            }
    }    
     if(select_DocDetail == 2 && select_Product == 0 && select_Doc != 0){
          if(bt_MFGDate != '' && bt_ExpireDate != ''){
          $('#btn_savedoc_'+key).show();
          $('#btn_deletedoc_'+key).hide();
          }
    }      
  }

  function Save_product(ID) {

// var select_DocDetail = $('#select_DocDetail_'+key).val();
var txt_item_code = $('#txt_item_code').val();
var txt_item_name = $('#txt_item_name').val();

var text = "";

    if (txt_item_code == "") {
      text = "กรุณากรอกรหัสสินค้า";
      showDialogFailed(text);
      return;
    }
    if (txt_item_name == "") {
      text = "กรุณากรอกชื่อสินค้า";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'Save_product',
        'txt_item_code':txt_item_code,
        'txt_item_name':txt_item_name,
        'ID':ID
      },
      success: function(result) {

        showDialogSuccess(result);

        $('#txt_item_code').val("");
        $('#txt_item_name').val("");
        $("#Modaldetail_Product").modal('hide');
        show_DataRight();

      }
    });

}

$("#btnSave_Doc").click(function() {

        $.confirm({
          title: 'แจ้งเตือน!',
          content: 'ต้องการจะเพิ่มข้อมูล ใช่ หรือ ไม่?',
          type: 'orange',
          autoClose: 'cancel|8000',
          buttons: {
            cancel:  {
              text: 'ยกเลิก'
            },
            confirm: {
              btnClass: 'btn-primary',
              text: 'ตกลง',
              action: function() {
                // selection_DocDetaill(value.DocDeta/il_ID);
                Save_Doc();
              }
            }
          }
        });
});

function Save_Doc() {

  // selection_DocDetaill(value.DocDetail_ID);
    var select_DocDetail = selection_DocDetaill();
    

    var select_Product = $('#select_Product_').val();

      var txt_DocNo= $('#txt_DocNo').val();
      var txt_Doc_name= $('#txt_Doc_name').val();
      var txt_Doc_numbar= $('#txt_Doc_numbar').val();

      var txt_detail= $('#txt_detail').val();

      if(document.getElementById("StatusRadio1").checked == true && document.getElementById("StatusRadio2").checked == false ){
        var StatusRadio = 1
      }else{
        var StatusRadio = 2
      }

    var text = "";

    if (txt_DocNo == "") {
      text = "กรุณากรอกรหัสเอกสาร";
      showDialogFailed(text);
      return;
    }
    if (txt_Doc_name == "") {
      text = "กรุณากรอกชื่อเอกสาร";
      showDialogFailed(text);
      return;
    }
    if (txt_Doc_numbar == "") {
      text = "กรุณากรอกเลขที่สำคัญ";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/upload_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'Save_Doc',
          'txt_DocNo': txt_DocNo,
          'txt_Doc_name': txt_Doc_name,
          'txt_Doc_numbar': txt_Doc_numbar,
          'txt_detail': txt_detail,
          'StatusRadio': StatusRadio,
          'select_Product': select_Product,
          'StatusRadio': StatusRadio
            // 'ID':ID
      },
      success: function(result) {

        showDialogSuccess(result);

        $("#StatusRadio1").prop("checked", true);
          $('#txt_DocNo').val("");
          $('#txt_Doc_name').val("");
          $('#txt_Doc_numbar').val("");
          $('#txt_detail').val("");
        $("#Modaldetail_Doc").modal('hide');
        // show_DataRight();

      }
    });

}

  function Save_FileDoc(key,ID) {

    var select_DocDetail = $('#select_DocDetail_'+key).val();
    var select_Product = $('#select_Product_'+key).val();
    var select_Doc = $('#select_Doc_'+key).val();

    var bt_MFGDate = $('#bt_MFGDate_'+key).val();
    var bt_ExpireDate = $('#bt_ExpireDate_'+key).val();

    var txt_Refcode = $('#txt_Refcode_'+key).val();

    var select_product = $("#select_product").val();

        $.ajax({
          url: "process/upload_doc.php",
          type: 'POST',
          data: {
            'FUNC_NAME': 'Save_FileDoc',
            'select_DocDetail':select_DocDetail,
            'select_Product':select_Product,
            'select_Doc':select_Doc,
            'bt_MFGDate':bt_MFGDate,
            'bt_ExpireDate':bt_ExpireDate,
            'select_product': select_product,
            'txt_Refcode': txt_Refcode,
            'ID': ID
          },
          success: function(result) {

            showDialogSuccess(result);
            $('#btn_savedoc_'+key).hide();
            show_DataLeft();
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