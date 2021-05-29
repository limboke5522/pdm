<script>
  $(function() {
    $(".select2").select2();
    selection_Customer();
    selection_Purpose();
    selection_Product();
  })


  function selection_Customer() {
    $.ajax({
      url: "process/send_doc.php",
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
            Str += "<option value=" + value.ID + " >" + value.ProductName + "</option>";

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

          });
        }

      }
    });
  }




  // obj
  var objReal = new createObj_();

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

  function deleteProduct(index) {
    $("#trProduct_" + index).remove();
    objReal.productID.splice(index, 1);
    objReal.productName.splice(index, 1);

    
    $("#txt_product_center").val("");
    showData_product();
  }

  function checkProduct(id,name){
    $("#txt_product_center").val(name);
    var id_product =  $("#id_product"+id).val();

   $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'product_file',
        'id_product': id_product
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

  // onchange
  $("#select_hospital").change(function() {
    setTimeout(() => {
      selection_Contact();
      $("#txt_email").val("");
      $("#txt_phone").val("");
    }, 150);
  });


  $("#select_contact").change(function() {
    setTimeout(() => {
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
    }, 150);
  });
</script>