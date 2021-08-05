<script>
  userID = "";
  // var DefaultTable = {
  //   language: {
  //     emptyTable: "Data not found"
  //   },
  //   info: false,
  //   scrollX: false,
  //   scrollCollapse: true,
  //   visible: false,
  //   searching: false,
  //   lengthChange: false,
  //   "order": [
  //     [0, "desc"]
  //   ]
  // };

  $(function() {

    $('#btnEditDoc').hide();
    $('#btnDeleteDoc').hide();
    $('#btncleanDoc').hide();

    
    $('#ID_txt').val("");
    show_data();
  })




  $("#btnEditDoc").click(function() {

      $.confirm({
        title: 'แจ้งเตือน!',
        content: 'ต้องการจะแก้ไขข้อมูล ใช่ หรือ ไม่?',
        type: 'orange',
        autoClose: 'cancel|8000',
        buttons: {
          cancel:  {text: 'ยกเลิก'},
          confirm: {
            btnClass: 'btn-primary',
            text: 'ตกลง',
            action: function() {
              editData();
            }
          }
        }
      });
  });


  $("#btncleanDoc").click(function() {
        $('#btnSaveDoc').show();
        $('#btnEditDoc').hide();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();
        $('#txt_email_sender_name').val("");
        $('#txt_email_sender_password').val("");
        $('#txt_email_sender').val("");
        $('#ID_txt').val("");

        $(".chk_Cus").prop("checked", false);
    });


  

  
  function saveData() {
    var txt_email_sender_name= $('#txt_email_sender_name').val();
    var txt_email_sender_password= $('#txt_email_sender_password').val();
    var txt_email_sender= $('#txt_email_sender').val();
   

    var text = "";

    if (txt_email_sender_name == "") {
      text = "กรุณากรอกชื่อ E-Mail";
      showDialogFailed(text);
      return;
    }

    if (txt_email_sender_password == "") {
      text = "กรุณากรอก Password";
      showDialogFailed(text);
      return;
    }

    if (txt_email_sender == "") {
      text = "กรุณากรอกชื่อผู้ส่ง";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/email_sender.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'saveData',
        'txt_email_sender_name': txt_email_sender_name,
        'txt_email_sender_password': txt_email_sender_password,
        'txt_email_sender': txt_email_sender
      },
      success: function(result) {
        if(result=="0"){
          showDialogFailed("E-Mailซ้ำ กรุณากรอก E-Mail ใหม่อีกครั้ง");
        }else{
          showDialogSuccess(result);
        }
        
        show_data();
        $('#txt_email_sender_name').val("");
        $('#txt_email_sender_password').val("");
        $('#txt_email_sender').val("");
        $('#ID_txt').val("");
      
   
      }
    });
  }

  function editData() {
    var ID_txt = $('#ID_txt').val();
    var txt_email_sender_name= $('#txt_email_sender_name').val();
    var txt_email_sender_password= $('#txt_email_sender_password').val();
    var txt_email_sender= $('#txt_email_sender').val();


    if (txt_email_sender_name == "") {
      text = "กรุณากรอกชื่อ E-Mail";
      showDialogFailed(text);
      return;
    }

    if (txt_email_sender_password == "") {
      text = "กรุณากรอก Password";
      showDialogFailed(text);
      return;
    }
    if (txt_email_sender == "") {
      text = "กรุณากรอกชื่อผู้ส่ง";
      showDialogFailed(text);
      return;
    }

    $.ajax({
      url: "process/email_sender.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'editData',
        'txt_email_sender_name': txt_email_sender_name,
        'txt_email_sender_password': txt_email_sender_password,
        'txt_email_sender': txt_email_sender,
        'ID_txt':ID_txt
      },
      success: function(result) {
        showDialogSuccess(result);
        show_data();
        $('#txt_email_sender_name').val("");
        $('#txt_email_sender_password').val("");
        $('#txt_email_sender').val("");
        $('#ID_txt').val("");

        $('#btnEditDoc').hide();
        $('#btnSaveDoc').show();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();
        
      }
    });
  }


  function show_data(){
    var  txtSearch =  $("#txtSearch").val();

    $.ajax({
      url: "process/email_sender.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_data',
        'Search_txt': txtSearch
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              var StrTR = "" ;
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

                  // if(value.Status==1){
                  //   var Status_txt = "ลูกค้าใหม่";
                  // }else{
                  //   var Status_txt = "เปิดบิล";
                  // }
                  var chkDoc = "<input class='form-control chk_Cus' type='radio' value='1' name='id_Cus' id='id_Cus" + key + "' value='" + value.ID + "' onclick='show_Detail(\"" + value.ID + "\",\"" + key + "\")' style='width: 25%;height:20px;'>";
                  StrTR += "<tr style='border-radius: 15px 15px 15px 15px;margin-top: 6px;margin-bottom: 6px;'>" +
                    "<td style='width:10%;text-align: center;'><center>"+chkDoc+"</center></td>" +
                    "<td style='width:10%;text-align: center;'>" + (key + 1) + "</td>" +
                    "<td style='width:23%;text-align: center;'>" + value.Username + "</td>" +
                    "</tr>";
                });
              }
              $('#Data_Table tbody').html(StrTR);
        
      }
    });

  }

  function show_Detail(ID){
    
    $('#ID_txt').val(ID);

    $.ajax({
      url: "process/email_sender.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'show_Detail',
        'ID': ID
      },
      success: function(result) {
        var ObjData = JSON.parse(result);
              
              if (!$.isEmptyObject(ObjData)) {
                $.each(ObjData, function(key, value) {

                  $('#txt_email_sender_name').val(value.Username);
                  $('#txt_email_sender_password').val(value.Password);
                  $('#txt_email_sender').val(value.Sender);

                  $('#btnEditDoc').show();
                  $('#btnSaveDoc').hide();
                  $('#btnDeleteDoc').show();
                  $('#btncleanDoc').show();
                });
              }
      }
    });

  }


  function deleteData() {
    var  ID_txt = $('#ID_txt').val();
    $.ajax({
      url: "process/email_sender.php",
      type: 'POST',
      data: {
        'FUNC_NAME': 'deleteData',
        'ID_txt': ID_txt
      },
      success: function(result) {
        // feedData();

          $('#txt_email_sender_name').val("");
          $('#txt_email_sender_password').val("");
          $('#txt_email_sender').val("");
          $('#ID_txt').val("");
      
          $(".chk_Cus").prop("checked", false);

        $('#btnSaveDoc').show();
        $('#btnEditDoc').hide();
        $('#btnDeleteDoc').hide();
        $('#btncleanDoc').hide();

        show_data();

        showDialogSuccess(result);
      }
    });
  }

  $("#btnDeleteDoc").click(function() {

    $.confirm({
      title: 'แจ้งเตือน!',
      content: 'ต้องการจะลบข้อมูล ใช่ หรือ ไม่?',
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
            deleteData();
          }
        }
      }
    });
  });



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
      title: 'ผิดผลาด!',
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

  
  // $('#txtSearch').keydown(function(e) {
  //       if (e.keyCode == 13) {
  //         show_data();
  //       }
  //  })
 
</script>