<script>
  $(function() {
    $(".select2").select2();
    selection_Customer();
    selection_Purpose();
    selection_Product();

    checkProduct(id,name);
    
  })


  function selection_Customer() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Customer',
        'select_hospital': $("#select_hospital").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก โรงพยาบาล</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.CustomerCode + " : " + value.CustomerName + "</option>";

          });
        }
        $("#select_hospital").html(Str);

      }
    });
  }

  function selection_Purpose() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Purpose'
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก เรื่อง</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.Purpose + "</option>";

          });
          
        }
        Str += "<option value='@'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp "+ 
                " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp --- เพิ่ม --- </option>";
        $("#select_subject").html(Str);

      }
    });
  }

  function selection_Contact() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Contact',
        'select_hospital': $("#select_hospital").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก ผู้ติดต่อ</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " >" + value.ContactName + "</option>";

          });
          
        }
        Str += "<option value='@'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp "+ 
                " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp --- เพิ่ม --- </option>";
        $("#select_contact").html(Str);

      }
    });
  }

  function selection_Product() {
    
    $.ajax({
      url: "process/send_doc.php",
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
            // Str += "<option value=" + value.ID + " >" + value.ProductCode + " : " + value.ProductName + "</option>";
            Str += "<option value=" + value.ID + " >"  + value.ProductName + "</option>";
          });
        }
        $("#select_product").html(Str);

      }
    });
  }




  // showcontact
  function showDetail_contact() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showDetail_contact',
        'select_contact': $("#select_contact").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {

            $("#txt_email").val(value.email);
            $("#txt_phone").val(value.Tel);
            $('#txt_email_send').val("janekootest@gmail.com");
          });
        }

      }
    });
  }




  // obj
  var objReal = new createObj_();
  var objReal_doc = new createObjDoc_();

  function createObjDoc_() {
    this.DocID = [];
    this.DocName = [];
    this.versionDoc = [];
    this.rowDoc = [];
    this.product_Doc_ID = [];
    this.user_Doc_ID = [];
  }

  function createObj_() {
    this.productID = [];
    this.productName = [];
  }

  function showData_product() {
    var TableItemx = "";
    $.each(objReal.productName, function(index, productName) {
      var btn = '<button  onclick="deleteProduct(\'' + index + '\')"  class="btn"><i class="fas fa-trash-alt" style="color: orangered;"></i></button>';
      var chkProduct = "<input class='form-control chk_product' type='radio'  name='id_docLeft' id='id_product" + index + "' data-value='" + productName + "' value='" + objReal.productID[index] + "'  onclick='checkProduct(\"" + index + "\",\"" + productName + "\")'>";
      TableItemx += "<tr id='trProduct_" + index + "'>" +
        "<td style='text-align: center;width: 7%;'>" + chkProduct + "</td>" +
        "<td style='text-align: center;width: 10%;'>" + (index + 1) + "</td>" +
        "<td style='text-align: left;width: 50%;'>" + productName + "</td>" +
        "<td style='text-align: center;width: 10%;'>" + btn + "</td>" +
        "</tr>";
    });
    $('#table_product tbody').html(TableItemx);
  }


  function showData_Doc() {
    var TableDoc = "";
    $.each(objReal_doc.DocName, function(index, DocName) {
      var btn = '<button  onclick="deleteDoc(\'' + index + '\',\'' + objReal_doc.rowDoc[index] + '\')"  class="btn"><i class="fas fa-trash-alt" style="color: orangered;"></i></button>';
      TableDoc += "<tr id='trDoc_" + index + "'>" +
        "<td style='text-align: center;width: 10%;'>" + (index + 1) + "</td>" +
        "<td style='text-align: left;width: 50%;'>" + DocName + "</td>" +
        "<td style='text-align: center;width: 15%;'>" + objReal_doc.versionDoc[index] + "</td>" +
        "<td style='text-align: center;width: 10%;'>" + btn + "</td>" +
        "</tr>";
    });
    $('#table_product_docment tbody').html(TableDoc);
  }

  function deleteProduct(index) {
    $("#trProduct_" + index).remove();
    objReal.productID.splice(index, 1);
    objReal.productName.splice(index, 1);

    
    $("#txt_product_center").val("");
    showData_product();
  }

  function deleteDoc(index,row) {
    $("#trDoc_" + index).remove();

    objReal_doc.DocID.splice(index, 1);
    objReal_doc.DocName.splice(index, 1);
    objReal_doc.versionDoc.splice(index, 1);
    objReal_doc.rowDoc.splice(index, 1);
    objReal_doc.product_Doc_ID.splice(index, 1);
    showData_Doc();
    $("#btn_send_"+row).show();
  }

  function checkProduct(id,name){
    // $("#txt_product_center").val(name);

    var id_product =  $("#id_product"+id).val();
    var txt_product_center = $("#txt_product_center").val();

    $("#txt_product_center").attr('disabled', false);
   $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'product_file',
        'id_product': id_product,
        'txt_product_center': txt_product_center
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            var btn_preview = '<a href="javascript:void(0)"  onclick="preview(\'' + value.fileName + '\');"><img src="img/pdf.png" style="width:35px;"></a>';
       
            if (value.DocumentID == value.sub) {
              var bt = ' <button type="button" style="font-size: 10px;" hidden class="btn btn-outline-primary" id="btn_send_'+key+'"  onclick="add_DocProduct(\'' + key + '\',\'' + value.ID + '\',\'' + value.DocName + '\',\'' + value.version + '\',\'' + id_product + '\')" >เลือก >> </button>';

            }else{
              var bt = ' <button type="button" style="font-size: 10px;"  class="btn btn-outline-primary" id="btn_send_'+key+'"  onclick="add_DocProduct(\'' + key + '\',\'' + value.ID + '\',\'' + value.DocName + '\',\'' + value.version + '\',\'' + id_product + '\')" >เลือก >> </button>';
            }
           StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:7%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:25%;text-align: left;'>" + value.DocName + "</td>" +
                    "<td style='width:5%;text-align: center;'>" + value.version + "</td>" +
                    "<td style='width:5%;text-align: center;'>"+btn_preview+"</td>" +
                    "<td style='width:10%;text-align: center;'><center>"+bt+"</center></td>" +
                    "</tr>";

          });
        }
        $('#table_product_list_document tbody').html(StrTR);


        setTimeout(() => {
          chk_btn(id_product);
        }, 100);
      }
    });
  
   
  }

  // onchange
  $("#select_hospital").change(function() {
    setTimeout(() => {
      selection_Contact();
      $("#txt_email").val("");
      $('#txt_email_send').val("");
      $("#txt_phone").val("");
    }, 150);
  });


  $("#select_contact").change(function() {
    setTimeout(() => {
      if($("#select_contact").val() == '@'){
        $("#Modaldetail_Doc").modal('show');
        $("#Modaldetail_Doc2").modal('hide');

        $("#select_contact").val(0);
      }
      
      showDetail_contact();
    }, 150);
  });

  $("#select_subject").change(function() {
    setTimeout(() => {
      if($("#select_subject").val() == '@'){
        $("#Modaldetail_Doc").modal('hide');
        $("#Modaldetail_Doc2").modal('show');

        $("#select_subject").val(0);
      }
      
      showDetail_contact();
    }, 150);
  });

  $("#select_product").change(function() {
    setTimeout(() => {
      var productID2 = $(this).val();
      var productName = $("#select2-select_product-container").text();

      var chk_idProduct = 0;
      $.each(objReal.productID, function(key, productID) {//เช็ครายการซ้ำ
        var productID_index = objReal.productID[key];
        if(productID2 == productID_index){
          chk_idProduct++;
        }
      });
    
      if(productID2!=0){
        if(chk_idProduct == 0){
          objReal.productID.push(productID2);
          objReal.productName.push(productName);
        }else{

        }
      }else{
        
      }
  
      showData_product();
      $("#table_product_list_document tbody").empty();
    }, 150);

   
  });

  function chk_btn(id_product) {
    $.each(objReal_doc.rowDoc, function(key, rowDoc) {//เช็ครายการซ้ำ
       

        if(id_product == objReal_doc.product_Doc_ID[key]){
          $("#btn_send_"+rowDoc).hide();
          
        }else{

        }       
      });
  }

  function add_DocProduct(key,ID,DocName,version,id_product) {
    $("#btn_send_"+key).hide();

    objReal_doc.DocID.push(ID);
    objReal_doc.DocName.push(DocName);
    objReal_doc.versionDoc.push(version);
    objReal_doc.rowDoc.push(key);
    objReal_doc.product_Doc_ID.push(id_product);
    
    showData_Doc();
    console.log(objReal_doc);

  }


  $("#btn_save_send").click(function() {

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
            save_sendDoc();
          }
        }
      }
    });
});


function save_sendDoc() {
    var select_hospital = $('#select_hospital').val();
    var select_subject = $('#select_subject').val();
    var select_contact = $('#select_contact').val();
    var email = $('#txt_email').val();
    var Copy_doc = $('#Copy_doc').val();
    var txt_remark = $('#txt_remark').val();
    var productID = objReal_doc.product_Doc_ID;
    var DocID = objReal_doc.DocID;

    var text = "";
     if (select_hospital == "0") {
        text = "กรุณาเลือกโรงพยาบาล";
        showDialogFailed(text);
        return;
      }

      if (select_subject == "0") {
        text = "กรุณาเลือกเรื่องติดต่อ";
        showDialogFailed(text);
        return;
      }

      if (select_contact == "0") {
        text = "กรุณาเลือกผู้ติดต่อ";
        showDialogFailed(text);
        return;
      }

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'save_sendDoc',
        'select_hospital': select_hospital,
        'select_subject': select_subject,
        'select_contact': select_contact,
        'email': email,
        'Copy_doc': Copy_doc,
        'txt_remark': txt_remark,
        'productID':productID,
        'DocID':DocID
      },
      success: function(result) {
          send_mail(result,email); 
          if(Copy_doc != ""){
            send_mail_copy(result,Copy_doc); 
          }
      }
    });
  }


  function send_mail(sendDocNo,email) {
// alert(sendDocNo+"|"+email);
    swal({
            title: 'กรุณารอสักครู่',
            text: 'ระบบกำลังประมวลผล',
            allowOutsideClick: false
        })
        swal.showLoading();

    $.ajax({
      url: "process/send_mail.php",
      type: 'POST',
      data: {
        'email': email,
        'sendDocNo': sendDocNo
      },
      success: function(result) {
        swal.close();
        showDialogSuccess(result);

         $('#select_product').val(0);
         $('#select_hospital').val(0);
         $('#select_subject').val(0);
         $('#select_contact').val(0);

         $('#select2-select_hospital-container').text("กรุณาเลือก โรงพยาบาล");
         $('#select2-select_subject-container').text("กรุณาเลือก เรื่อง");
         $('#select2-select_contact-container').text("กรุณาเลือก ผู้ติดต่อ");
         $('#select2-select_product-container').text("กรุณาเลือก Product");
         
         $('#txt_email_send').val("");
         $('#email').val("");
         $('#txt_remark').val("");
         $("#txt_email").val("");
         $("#txt_phone").val("");
         $("#txt_product_center").val("");
         $('#Copy_doc').val("");
         $("#table_product tbody").empty();
         $("#table_product_list_document tbody").empty();
         $("#table_product_docment tbody").empty();
          objReal_doc.DocID = [];
          objReal_doc.DocName= [];
          objReal_doc.versionDoc= [];
          objReal_doc.rowDoc= [];
          objReal_doc.product_Doc_ID= [];

          objReal.productID = [];
          objReal.productName = [];

          console.log(objReal_doc);
      }
    });
  }
  
  function send_mail_copy(sendDocNo,Copy_doc) {
// alert(sendDocNo+"|"+email);


    $.ajax({
      url: "process/send_mail_copy.php",
      type: 'POST',
      data: {
        'email': Copy_doc,
        'sendDocNo': sendDocNo
      },
      success: function(result) {
      
      }
    });
  }


  function preview(fileName) {
    var url="process/file/"+fileName;
    window.open(url);
  }

  function saveData() {
    var select_hospital = $('#select_hospital').val();

      var txt_contact_name= $('#txt_contact_name').val();
      var txt_deb_name= $('#txt_deb_name').val();
      var txt_email2= $('#txt_email2').val();
      var txt_phonenumber= $('#txt_phonenumber').val();
      
 
      var text = "";

      if (txt_contact_name == "") {
        text = "กรุณากรอกข้อมูลผู้ติดต่อ";
        showDialogFailed(text);
        return;
      }

      if (txt_deb_name == "") {
        text = "กรุณากรอกข้อมูลแผนก";
        showDialogFailed(text);
        return;
      }

      if (txt_email2 == "") {
        text = "กรุณากรอก E-Mail";
        showDialogFailed(text);
        return;
      }

      if (txt_phonenumber == "") {
        text = "กรุณากรอกข้อมูลเบอร์โทร";
        showDialogFailed(text);
        return;
      }

      $.ajax({
        url: "process/send_doc.php",
        type: 'POST',
        data: {
          'FUNC_NAME': 'saveData',
          'select_hospital': select_hospital,
          'txt_contact_name': txt_contact_name,
          'txt_deb_name': txt_deb_name,
          'txt_email2': txt_email2,
          'txt_phonenumber': txt_phonenumber,
        },
        success: function(result) {
          // if(result=="0"){
          //   showDialogFailed("รหัสลูกค้าซ้ำ ไม่สามารถเพิ่มข้อมูลได้ !!!");
          // }else{
            showDialogSuccess(result);
          // }
          
          selection_Contact();
          // $('#select_hospital').val(0);
          $('#txt_contact_name').val("");
          $('#txt_deb_name').val("");
          $('#txt_email').val("");
          $('#txt_phonenumber').val("");
        
    
        }
      });
  }

  function saveData2() {
    var txt_purpose_name= $('#txt_purpose_name').val();
    


    var text = "";

    if (txt_purpose_name == "") {
      text = "กรุณากรอกชื่อวัตถุประสงค์";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'saveData2',
        'txt_purpose_name': txt_purpose_name
      },
      success: function(result) {
        // if(result=="0"){
        //   showDialogFailed("วัตถุประสงค์ซ้ำ กรุณากรอกวัตถุประสงค์ใหม่อีกครั้ง");
        // }else{
          showDialogSuccess(result);
        // }
        
        selection_Purpose();
        $('#txt_purpose_name').val("");
        $('#ID_txt').val("");
      
   
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

  $("#btn_cancel").click(function() {

      $('#select_product').val(0);
      $('#select_hospital').val(0);
      $('#select_subject').val(0);
      $('#select_contact').val(0);

      $('#select2-select_hospital-container').text("กรุณาเลือก โรงพยาบาล");
      $('#select2-select_subject-container').text("กรุณาเลือก เรื่อง");
      $('#select2-select_contact-container').text("กรุณาเลือก ผู้ติดต่อ");
      $('#select2-select_product-container').text("กรุณาเลือก Product");

      $('#txt_email_send').val("");
      $('#email').val("");
      $('#txt_remark').val("");
      $("#txt_email").val("");
      $("#txt_phone").val("");
      $("#txt_product_center").val("");
      $('#Copy_doc').val("");
      $("#table_product tbody").empty();
      $("#table_product_list_document tbody").empty();
      $("#table_product_docment tbody").empty();
      objReal_doc.DocID = [];
      objReal_doc.DocName= [];
      objReal_doc.versionDoc= [];
      objReal_doc.rowDoc= [];
      objReal_doc.product_Doc_ID= [];

      objReal.productID = [];
      objReal.productName = [];

      console.log(objReal_doc);
  });




</script>