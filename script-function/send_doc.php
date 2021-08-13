<script>
  $(function() {
    $("#txt_remark").hide();
    $("#txt_headdoc").hide();
    $("#memo_headdoc").hide();
    $("#memo").hide();
    $(".select2").select2();
    selection_Contact();
    selection_Customer();
    selection_Purpose();
    selection_Product();
    selection_DocDetail_L();

    setTimeout(() => {
      selection_Doclist();
    }, 300);
    chkremark();
    // CHECK_sendDoc();


  });



  var toolbarOptions = [
          ['bold', 'italic', 'underline'],
          // ['blockquote', 'code-block'],
          // [{ 'header': 1 }, { 'header': 2 }],
          // [{ 'list': 'ordered' }, { 'list': 'bullet' }],
          // [{ 'script': 'sub' }, { 'script': 'super' }],
          // [{ 'indent': '-1' }, { 'indent': '+1' }],
          // [{ 'direction': 'rtl' }],
          [{ 'size': ['small', false, 'large', 'huge'] }],
          // ['link', 'image', 'video', 'formula'],
          // [{ 'color': [] }, { 'background': [] }],
          // [{ 'font': [] }],
          [{ 'align': [] }]
        ];
        var options = {
          debug: 'info',
          modules: {
            toolbar: toolbarOptions
          },
          placeholder: 'Text About',
          readOnly: false,
          theme: 'snow'
        };
        var editor = new Quill('#editor', options);

        

  function chkremark() {
    if (document.getElementById("chk_remark").checked == true) {
      $("#txt_remark").show();
      $("#memo").show();
    } else {
      $("#txt_remark").hide();
      $('#txt_remark').val("");

      $("#memo").hide();
      // $('#memo').val("");
    }

    if (document.getElementById("chk_headdoc").checked == true) {
      $("#txt_headdoc").show();
      $("#memo_headdoc").show();
    } else {
      $("#txt_headdoc").hide();
      $('#txt_headdoc').val("");

      $("#memo_headdoc").hide();
      // $('#memo_headdoc').val("");
    }
  }

  function check_selection(numm) {
    var select_DocTypeID_L = $('#select_DocTypeID_L').val();
    var select_product = $('#select_product').val();
    var select_Doclist = $('#select_Doclist').val();
    if (document.getElementById("checkbox_all").checked == true) {
      var checkall = 1
    } else {
      var checkall = 0
    }
    if (numm == 1) {
      $('#select2-select_product-container').val(0);


      if (checkall == 0) {
        selection_Doclist();
      }
      selection_Product();
      objReal.productName = [];
      objReal.productID = [];
      objReal.productDocTypeID = [];
      if (select_DocTypeID_L != 2) {
        $("#table_product tbody").empty();
        $('#select_product').attr('disabled', false);

        selection_Product();
        showData_product();

        $("#table_product_list_document tbody").empty();

      } else {
        $('#select_product').attr('disabled', true);
        $('#select_Doclist').attr('disabled', false);
        $('#select2-select_product-container').text("ทุก Product");
        $('#select2-select_product-container').val(0);
        $("#table_product tbody").empty();

        if (checkall == 0) {
          selection_Doclist();
          checkProduct();
        } else {
          // selection_Doclist();
          checkProduct(9999);
        }



        // showProductCenter();
      }

      // showData_product();


    } else {
      if (numm == 2) {
        $('#select_Doclist').attr('disabled', false);
        showData_product();
        selection_Doclist();
      }
    }
  }


  // new =================
  function showProductCenter() {
    alert($("#select_DocTypeID_L").val());
  }
  // =====================
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
        Str += "<option value='@'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " +
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
        Str += "<option value='@'> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp --- เพิ่ม --- </option>";
        $("#select_contact").html(Str);

      }
    });
  }

  function selection_Product() {
    // var  select_DocTypeID =  $("#select_DocTypeID").val();

    var select_DocTypeID_L = $("#select_DocTypeID_L").val();
    var select_product = $("#select_product").val();
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Product',
        'select_product': $("#select_product").val(),
        'select_DocTypeID_L': $("#select_DocTypeID_L").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_product").empty();
        var Str = "";
        Str += "<option value=0 >กรุณาเลือก Product</option>";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " data-value2=" + value.DocType_Detail + ">" + value.ProductCode + " : " + value.ProductName + "</option>";

          });
        }
        $("#select_product").html(Str);

      }
    });
  }

  function selection_DocDetail_L() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_DocDetail_L',
        'select_DocTypeID_L': $("#select_DocTypeID_L").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_DocTypeID_L").empty();

        var Str2 = "";
        Str2 += "<option value=0 >ประเภทเอกสาร</option>";

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str2 += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";
          });
        }


        $("#select_DocTypeID_L").append(Str2);

      }
    });
  }

  function selection_Doclist() {

    if (document.getElementById("checkbox_all").checked == true) {
      var checkall = 1
    } else {
      var checkall = 0
    }

    var select_DocTypeID_L = $("#select_DocTypeID_L").val();
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Doclist',
        'select_DocTypeID_L': select_DocTypeID_L,
        'checkall': checkall
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_Doclist").empty();
        var Str2 = "";
        Str2 += "<option value=0 >หัวข้อเอกสาร</option>";

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            var number = "<p text-align: center;'>" + value.DocNumber + "</p>";

            if (value.DocNumber == null) {
              number = "<p text-align: center;'></p>";
            } else {
              number = "<p text-align: center;'>" + value.DocNumber + " : " + "</p>";
            }

            Str2 += "<option value=" + value.ID + " >" + value.DocName + "</option>";
          });
        }


        $("#select_Doclist").append(Str2);

      }
    });
  }

  function selection_DocDetail() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_DocDetail',
        'select_DocTypeID': $("#select_DocTypeID").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#select_DocTypeID").empty();

        var Str2 = "";
        Str2 += "<option value=0 >หัวข้อเอกสาร</option>";

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str2 += "<option value=" + value.ID + " >" + value.TypeDetail_Name + "</option>";
          });
        }


        $("#select_DocTypeID").append(Str2);

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
        var mail = "janekootest@gmail.com";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {

            $("#txt_email").val(value.email);
            $("#txt_phone").val(value.Tel);

            $('#txt_email_send').val(mail);
          });
        }
        $('#txt_email_send').show();
        $('#txt_email_send').text(mail);

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
    this.Doctype_Id = [];
    this.user_Doc_ID = [];
  }

  function createObj_() {
    this.productID = [];
    this.productName = [];
    this.productDocTypeID = [];
  }

  function createDetail_ID() {
    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'selection_Product',
        'select_DocTypeID_L': $("#select_DocTypeID_L").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {
            Str += "<option value=" + value.ID + " data-value2=" + value.DocType_Detail + ">" + value.ProductCode + " : " + value.ProductName + "</option>";

          });
        }
        $("#select_product").html(Str);

      }
    });
  }

  function showData_product() {
    var TableItemx = "";
    $.each(objReal.productName, function(index, productName) {
      var btn = '<button  onclick="deleteProduct(\'' + index + '\')"  class="btn"><i class="fas fa-trash-alt" style="color: orangered;"></i></button>';
      // var chkProduct = "<input class='form-control chk_product' type='radio'  name='id_docLeft' id='id_product" + index + "' data-value='" + productName + "' data-value2='" + objReal.productDocTypeID[index] + "' value='" + objReal.productID[index] + "'   onclick='checkProduct(\"" + index + "\",\"" + productName + "\",\"" + objReal.productDocTypeID[index] + "\")'>";
      var chkProduct = "<input class='form-control chk_product' type='radio'  name='id_docLeft' id='id_product" + index + "' data-value='" + productName + "' value='" + objReal.productID[index] + "'   onclick='checkProduct(\"" + index + "\",\"" + productName + "\")'>";

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
      var btn = '<button id="btn_" onclick="deleteDoc(\'' + index + '\',\'' + objReal_doc.rowDoc[index] + '\',\'' + objReal_doc.DocID[index] + '\')"  class="btn"><i class="fas fa-trash-alt" style="color: orangered;"></i></button>';
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

    // $("#btn_send_"+row).show();
    // $("#trDoc_" + index).remove();


    objReal.productID.splice(index, 1);
    objReal.productName.splice(index, 1);
    objReal.productDocTypeID.splice(index, 1);


    $("#txt_product_center").val("");

    // $("#select_DocTypeID_L").val(0);
    $("#list_document_").remove();
    $("#list_document_").empty();

    showData_product();
  }

  function deleteDoc(index, row, DocID) {
    $("#trDoc_" + index).remove();
    var chk_sender = $('#chk_sender').val();

    objReal_doc.DocID.splice(index, 1);
    objReal_doc.DocName.splice(index, 1);
    objReal_doc.versionDoc.splice(index, 1);
    objReal_doc.rowDoc.splice(index, 1);
    objReal_doc.product_Doc_ID.splice(index, 1);
    objReal_doc.Doctype_Id.splice(index, 1);
    showData_Doc();
    $("#btn_send_" + row).show();


    if (chk_sender == "") {

    } else {
      deleteDoc_rowDoc(DocID, chk_sender);
    }
  }

  function deleteDoc_rowDoc(DocID, chk_sender) {

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'deleteDoc_rowDoc',
        'DocID': DocID,
        'chk_sender': chk_sender
      },
      success: function(result) {
        showData_Doc();
      }
    });
  }

  function checkProduct(id, name, doctypeidLeft) {
    if (document.getElementById("checkbox_all").checked == true) {
      var checkall = 1
    } else {
      var checkall = 0
    }

    if (id != 9999) {
      if (checkall == 1) {
        $.ajax({
          url: "process/send_doc.php",
          type: 'POST',
          data: {
            'FUNC_NAME': 'check_show_all',
            'select_Doclist': $("#select_Doclist").val()
          },
          success: function(result) {
            var ObjData = JSON.parse(result);
            var StrTR = "";
            if (!$.isEmptyObject(ObjData)) {
              $.each(ObjData, function(key, value) {
                $("#select_DocTypeID_L").val(value.ID);
                $("#select2-select_DocTypeID_L-container").text(value.TypeDetail_Name);

                setTimeout(() => {
                  check_selection(1);
                }, 300);

              });
            }
          }
        });
      }
    }



    var id_product = $("#id_product" + id).val();
    var txt_product_center = $("#txt_product_center").val();

    var select_DocTypeID_L = $("#select_DocTypeID_L").val();
    var select_Doclist = $("#select_Doclist").val();

    if (id_product != undefined) {
      $("#select_DocTypeID_L_hide").val(id_product);
    } else {

      setTimeout(() => {
        id_product = $("#select_DocTypeID_L_hide").val();
      }, 300);
    }

    if (doctypeidLeft != undefined) {
      $("#select_DocTypeID_L").val(doctypeidLeft);
    } else {
      doctypeidLeft = $("#select_DocTypeID_L").val();
    }

    $("#txt_product_center").attr('disabled', false);


    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'product_file',
        'id_product': id_product,
        'txt_product_center': txt_product_center,
        'select_DocTypeID_L': doctypeidLeft,
        'select_Doclist': $("#select_Doclist").val()
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {

            // var text = 'ยังไม่ได้กำหนดสิทธิ';
            var btn_preview = '<a href="javascript:void(0)"  onclick="preview(\'' + value.fileName + '\');"><img src="img/pdf.png" style="width:35px;"></a>';

            if (value.DocumentID == value.sub) {
              var check = 0;
              $.each(objReal_doc.DocID, function(key, DocID) { //เช็ครายการซ้ำ
                if (DocID == value.ID) {
                  check = 1;
                }
              });

              if (check == 1) {
                var hide = 'hidden';
              }
              var bt = ' <button type="button" style="font-size: 10px;" ' + hide + '  class="btn btn-outline-primary" id="btn_send_' + key + '"  onclick="add_DocProduct(\'' + key + '\',\'' + value.ID + '\',\'' + value.DocName + '\',\'' + value.version + '\',\'' + id_product + '\',\'' + doctypeidLeft + '\')" >เลือก >> </button>';


            } else {
              var bt = ' <button type="button" style="font-size: 10px;" hidden class="btn btn-outline-primary" id="btn_send_' + key + '"  onclick="add_DocProduct(\'' + key + '\',\'' + value.ID + '\',\'' + value.DocName + '\',\'' + value.version + '\',\'' + id_product + '\',\'' + doctypeidLeft + '\')" >เลือก >> </button>';
            }
            if (value.permis != null) {
              var text = value.permis;
            } else {
              var text = '<p style="color: #FF0000">ยังไม่ได้กำหนดสิทธิ</p>';
            }

            StrTR += "<tr id='list_document_' style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
              "<td style='width:7%;text-align: center;'>" + (key + 1) + "</td>" +
              "<td style='width:25%;text-align: left;'>" + value.DocName + "</td>" +
              // "<td style='width:5%;text-align: center;'>" + value.version + "</td>" +
              "<td style='width:5%;text-align: center;'>" + text + "</td>" +
              "<td style='width:5%;text-align: center;'>" + btn_preview + "</td>" +
              "<td style='width:10%;text-align: center;'><center>" + bt + "</center></td>" +
              "</tr>";

          });
        }

        $('#table_product_list_document tbody').html(StrTR);


        setTimeout(() => {
          chk_btn(id_product, doctypeidLeft);
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
      if ($("#select_contact").val() == '@') {
        $("#Modaldetail_Doc").modal('show');
        $("#Modaldetail_Doc2").modal('hide');


        $("#select_contact").val(0);
      }

      showDetail_contact();
    }, 150);
  });

  $("#select_subject").change(function() {
    setTimeout(() => {
      if ($("#select_subject").val() == '@') {
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
      $.each(objReal.productID, function(key, productID) { //เช็ครายการซ้ำ
        var productID_index = objReal.productID[key];
        if (productID2 == productID_index) {
          chk_idProduct++;
        }
      });

      if (productID2 != 0) {
        if (chk_idProduct == 0) {

          // alert(productID2);
          objReal.productID.push(productID2);
          objReal.productName.push(productName);

          $.ajax({
            url: "process/send_doc.php",
            type: 'POST',
            data: {
              'FUNC_NAME': 'showDocTypeID',
              'productID2': productID2,
            },
            success: function(result) {
              var ObjData = JSON.parse(result);
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {
                  objReal.productDocTypeID.push(value.DocType_Detail);

                });
              }

            }
          });
        }
      } else {

      }

      setTimeout(() => {
        console.log(objReal.productID);
        console.log(objReal.productName);
        console.log(objReal.productDocTypeID);

        showData_product();
      }, 300);

      $("#table_product_list_document tbody").empty();
    }, 150);


  });

  function chk_btn(id_product, doctypeidLeft) {

    $.each(objReal_doc.rowDoc, function(key, rowDoc) { //เช็ครายการซ้ำ


      if (id_product == objReal_doc.product_Doc_ID[key] && doctypeidLeft == objReal_doc.Doctype_Id[key]) {

        $("#btn_send_" + rowDoc).hide();
      } else {

      }


    });
  }

  function add_DocProduct(key, ID, DocName, version, id_product, doctypeidLeft) {
    $("#btn_send_" + key).hide();

    objReal_doc.DocID.push(ID);
    objReal_doc.DocName.push(DocName);
    objReal_doc.versionDoc.push(version);
    objReal_doc.rowDoc.push(key);
    objReal_doc.product_Doc_ID.push(id_product);
    objReal_doc.Doctype_Id.push(doctypeidLeft);


    showData_Doc();
    console.log(objReal_doc);

  }


  $("#btn_save_send").click(function() {
    var chk_sender = $('#chk_sender').val();

    // alert(chk_sender);
    $.confirm({
      title: 'แจ้งเตือน!',
      content: 'ยืนยันการส่งข้อมูล ใช่ หรือ ไม่?',
      type: 'orange',
      autoClose: 'cancel|8000',
      buttons: {
        cancel: {
          text: 'ยกเลิก'
        },
        confirm: {
          btnClass: 'btn-primary',
          text: 'ตกลง',
          action: function(result) {
            if (chk_sender == "") {
              save_sendDoc();
            } else {
              edit_sendDoc();
            }

            // $("#Modaldetail_Preview").modal('show');
            // show_Preview();
            // showFooter();



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
    var txt_headdoc = $('#txt_headdoc').val();
    var productID = objReal_doc.product_Doc_ID;
    var DoctypeId = objReal_doc.Doctype_Id;
    var DocID = objReal_doc.DocID;
    var table_product_docment = $('#table_product_docment tbody').val();

    var txtPopup_purpose_name = $('#txtPopup_purpose_name').val();
    // var box22 = $('#box22').val();

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

    if (DocID == "") {
      text = "กรุณาเลือก Product";
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
        'txt_headdoc': txt_headdoc,
        'productID': productID,
        'DoctypeId': DoctypeId,
        'DocID': DocID,
        'txtPopup_purpose_name': txtPopup_purpose_name
      },
      success: function(result) {

        $("#Modaldetail_Preview").modal('show');
        $('#chk_sender').val(result);

       
        show_Preview();
        showFooter();

       
       

        $("#btnSaveDoc_Preview").click(function() {
          
          $.confirm({
            title: 'แจ้งเตือน!',
            content: 'ยืนยันการส่งข้อมูล ใช่ หรือ ไม่?',
            type: 'orange',
            autoClose: 'cancel|8000',
            buttons: {
              cancel: {
                text: 'ยกเลิก'
              },
              confirm: {
                btnClass: 'btn-primary',
                text: 'ตกลง',
                action: function() {
                  saveData_Preview();
                  $("#Modaldetail_Preview").modal('hide');
                  send_mail(result, email,txtPopup_purpose_name);
                  if (Copy_doc != "") {
                    send_mail_copy(result, Copy_doc,txtPopup_purpose_name);
                  }

                }
              }
            }
          });

        });




      }
    });
  }

  function edit_sendDoc() {

    var chk_sender = $('#chk_sender').val();
    var select_hospital = $('#select_hospital').val();
    var select_subject = $('#select_subject').val();
    var select_contact = $('#select_contact').val();
    var email = $('#txt_email').val();
    var Copy_doc = $('#Copy_doc').val();
    var txt_remark = $('#txt_remark').val();
    var txt_headdoc = $('#txt_headdoc').val();
    var productID = objReal_doc.product_Doc_ID;
    var DoctypeId = objReal_doc.Doctype_Id;
    var DocID = objReal_doc.DocID;
    var table_product_docment = $('#table_product_docment tbody').val();

    var txtPopup_purpose_name = $('#txtPopup_purpose_name').val();
    var box22 = $('#box22').val();



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

    if (DocID == "") {
      text = "กรุณาเลือก Product";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'edit_sendDoc',
        'select_hospital': select_hospital,
        'select_subject': select_subject,
        'select_contact': select_contact,
        'email': email,
        'Copy_doc': Copy_doc,
        'txt_remark': txt_remark,
        'txt_headdoc': txt_headdoc,
        'productID': productID,
        'DoctypeId': DoctypeId,
        'DocID': DocID,
        'box22': box22,
        'txtPopup_purpose_name': txtPopup_purpose_name,
        'chk_sender': chk_sender
      },
      success: function(result) {

        $("#Modaldetail_Preview").modal('show');
        show_Preview();
        showFooter();



        // $("#btnSaveDoc_Preview").click(function() {

        //   $.confirm({
        //     title: 'แจ้งเตือน!',
        //     content: 'ยืนยันการส่งข้อมูล ใช่ หรือ ไม่?',
        //     type: 'orange',
        //     autoClose: 'cancel|8000',
        //     buttons: {
        //       cancel: {
        //         text: 'ยกเลิก'
        //       },
        //       confirm: {
        //         btnClass: 'btn-primary',
        //         text: 'ตกลง',
        //         action: function() {
        //           saveData_Preview();
        //           $("#Modaldetail_Preview").modal('hide');
        //           send_mail(result, email, box22, txtPopup_purpose_name);
        //           if (Copy_doc != "") {
        //             send_mail_copy(result, Copy_doc, box22, txtPopup_purpose_name);
        //           }

        //         }
        //       }
        //     }
        //   });
        // });




      }
    });
  }


  function send_mail(sendDocNo, email) {
    // alert(sendDocNo+"|"+email);
    var boxArea = editor.root.innerHTML;
    var purpose_name = $('#txtPopup_purpose_name').val();
    // alert(boxArea);
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
        'sendDocNo': sendDocNo,
        'boxArea': boxArea,
        'purpose_name': purpose_name
      },
      success: function(result) {
        swal.close();
        

        $('#select_DocTypeID_L').val(0);
        $('#select_product').val(0);
        $('#select_hospital').val(0);
        $('#select_subject').val(0);
        $('#select_contact').val(0);

        $('#select2-select_hospital-container').text("กรุณาเลือก โรงพยาบาล");
        $('#select2-select_subject-container').text("กรุณาเลือก เรื่อง");
        $('#select2-select_contact-container').text("กรุณาเลือก ผู้ติดต่อ");
        $('#select2-select_DocTypeID_L-container').text("กรุณาเลือก ประเภทเอกสาร");
        $('#select2-select_product-container').text("กรุณาเลือก Product");

        $('#txt_email_send').val("");
        $('#email').val("");
        $('#txt_remark').val("");
        $('#txt_headdoc').val("");

        $("#txt_email").val("");
        $("#txt_phone").val("");
        $("#txt_product_center").val("");
        $('#Copy_doc').val("");
        $('#chk_sender').val("");

        $("#table_product tbody").empty();
        $("#table_product_list_document tbody").empty();
        $("#table_product_docment tbody").empty();
        objReal_doc.DocID = [];
        objReal_doc.DocName = [];
        objReal_doc.versionDoc = [];
        objReal_doc.rowDoc = [];
        objReal_doc.product_Doc_ID = [];
        objReal_doc.Doctype_Id = [];

        objReal.DocType_DetailID = [];
        objReal.productID = [];
        objReal.productName = [];

        console.log(objReal_doc);

       


        showDialogSuccess(result);
        setTimeout(() => {
          location.reload();
        }, 1000);
      }
    });
  }

  function send_mail_copy(sendDocNo, Copy_doc) {
    // alert(sendDocNo+"|"+email);

    var boxArea = editor.root.innerHTML;
    $.ajax({
      url: "process/send_mail_copy.php",
      type: 'POST',
      data: {
        'email': Copy_doc,
        'sendDocNo': sendDocNo,
        'boxArea': boxArea
      },
      success: function(result) {

      }
    });
  }


  function preview(fileName) {
    // alert(fileName);
    var url = "process/file/" + fileName;
    window.open(url);
  }

  function saveData() {


    var select_hospital = $('#select_hospital').val();

    var txt_contact_name = $('#txt_contact_name').val();
    var txt_deb_name = $('#txt_deb_name').val();
    var txt_email2 = $('#txt_email2').val();
    var txt_phonenumber = $('#txt_phonenumber').val();

    // var select_product = $('#select_product').val();



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

    if (table_product_docment == "") {
      text = "กรุณาเลือก Product";
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

        $("#Modaldetail_Doc").modal('hide');

      }
    });
  }

  function saveData2() {
    var txt_purpose_name = $('#txt_purpose_name').val();



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

        $("#Modaldetail_Doc2").modal('hide');
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
        close: {
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
        close: {
          text: 'ปิด',
        }
      }
    });
  }

  $("#btn_cancel").click(function() {

    $('#select_DocTypeID_L').val(0);
    $('#select_product').val(0);
    $('#select_hospital').val(0);
    $('#select_subject').val(0);
    $('#select_contact').val(0);

    $('#select2-select_hospital-container').text("กรุณาเลือก โรงพยาบาล");
    $('#select2-select_subject-container').text("กรุณาเลือก เรื่อง");
    $('#select2-select_contact-container').text("กรุณาเลือก ผู้ติดต่อ");
    $('#select2-select_DocTypeID_L-container').text("กรุณาเลือก Product");
    $('#select2-select_product-container').text("กรุณาเลือก Product");

    $('#txt_email_send').val("");
    $('#email').val("");
    $('#txt_remark').val("");
    $('#txt_headdoc').val("");
    $("#txt_email").val("");
    $("#txt_phone").val("");
    $("#txt_product_center").val("");
    $('#Copy_doc').val("");
    $("#table_product tbody").empty();
    $("#table_product_list_document tbody").empty();
    $("#table_product_docment tbody").empty();
    objReal_doc.DocID = [];
    objReal_doc.DocName = [];
    objReal_doc.versionDoc = [];
    objReal_doc.rowDoc = [];
    objReal_doc.product_Doc_ID = [];
    objReal_doc.Doctype_Id = [];

    objReal.DocType_DetailID = [];
    objReal.productID = [];
    objReal.productName = [];

    console.log(objReal_doc);
  });


  // show
  function show_Preview() {
    var chk_sender = $('#chk_sender').val();

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_Preview',
        'chk_sender': chk_sender
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
        $("#p_file_img").empty();

        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {


            $('#chk_sender').val(value.SendDocNo);

            $('#POSEINT').text("janekootest@gmail.com");
            $('#date_upload').text(value.DocDate);
            $('#send_name').text(value.email);

            $('#txtPopup_purpose_name').val(value.Purpose);

            show_DetailPreview(chk_sender);
           
            
            var showfile = "<div class='col-2'>" +
              "<div class='form-group'>" +
              "<a href='javascript:void(0)' onclick='preview(\"" + value.fileName + "\");'>" +
              "<img src='img/pdf.png' style='margin-left: 10px; width:75px;'>" +
              "</a>" +
              "<p style='text-align: center;'>" + value.fileNameee + "</p>" +
              "</div></div> ";
            $("#p_file_img").append(showfile);

          });
        }


      }
    });

  }


  function show_DetailPreview(chk_sender) {

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_DetailPreview',
        'chk_sender': chk_sender
      },

      success: function(result) {
        var ObjData = JSON.parse(result);
        if (!$.isEmptyObject(ObjData)) {

          var html_product="";
      

          $.each(ObjData.Product, function(key1, value1) {
            if(value1.Memo_Headdoc==""){
                var Headdoc = "";
            }else{
                var Headdoc = "<h2>"+value1.Memo_Headdoc+"</h2><br>";
            }

           var html = Headdoc +"<h2>รายการสินค้า</h2>" ;

            if(value1.ProductName==null){
              value1.ProductName="ไม่มี Product";
            }
            html_product += "<br><h3>&nbsp&nbsp"+value1.ProductName+"</h3>"
            $.each(ObjData.Doc_list[value1.ID], function(key2, value2) { 
              html_product += "<p>&nbsp&nbsp&nbsp&nbsp"+(key2+1)+". "+value2.DocName+"</p>"
            });

           var html_memoo = "<br><h3>"+value1.Memo+"</h3>";

           var htmlSum = html+html_product+html_memoo

            $('#editor .ql-editor').html(htmlSum);
          });
        }
      }
    });
  }

  function showFooter() {
    var footer_title = $('#footer_title').val();
    var f_l_name = $('#f_l_name').val();
    var Tel = $('#Tel').val();

    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'showFooter',
        'footer_title': footer_title,
        'f_l_name': f_l_name,
        'Tel': Tel

      },

      success: function(result) {
        var ObjData = JSON.parse(result);
        var StrTR = "";
        if (!$.isEmptyObject(ObjData)) {
          $.each(ObjData, function(key, value) {

            // alert(footer_title);

            $('#footer_title').text(value.footer_title);
            $('#f_l_name').text(value.fname + " " + value.lname);
            $('#Tel').text(value.telephone_organization);

          });
        }
      }
    });
  }


  function saveData_Preview() {
    var email = $('#txt_email').val();
    var Copy_doc = $('#Copy_doc').val();

    var memo_headdoc = $("#memo_headdoc").val();
    var memo = $("#memo").val();


    $.ajax({
      url: "process/send_doc.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'saveData_Preview',
        'email': email,
        'Copy_doc': Copy_doc,
        'memo_headdoc': memo_headdoc,
        'memo': memo
      },
      success: function(result) {


        $("#Modaldetail_Preview").modal('hide');

      }
    });
  }
</script>