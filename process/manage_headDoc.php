<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'show_data') {
    show_data($conn);
  } else if ($_POST['FUNC_NAME'] == 'feedDepartmentSelection') {
    feedDepartmentSelection($conn);
  } else if ($_POST['FUNC_NAME'] == 'feedPermissionSelection') {
    feedPermissionSelection($conn);
  } else if ($_POST['FUNC_NAME'] == 'show_Detail') {
    show_Detail($conn);
  } else if ($_POST['FUNC_NAME'] == 'editData') {
    editData($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData') {
    saveData($conn);
  } else if ($_POST['FUNC_NAME'] == 'deleteData') {
    deleteData($conn);
  }else if ($_POST['FUNC_NAME'] == 'get_Doctype') {
    get_Doctype($conn);
  }

}

function get_Doctype($conn)
{
  $Sql = "SELECT
            doctype_detail.ID, 
            doctype_detail.TypeDetail_Name
          FROM
            doctype_detail
            WHERE doctype_detail.IsCancel=0
            ORDER BY doctype_detail.TypeDetail_Name ASC
       ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function editData($conn)
{
  $select_TypeDetail    = $_POST['select_TypeDetail'];
  $txt_DocNumber    = $_POST['txt_DocNumber'];
  $txt_SignificantFigure    = $_POST['txt_SignificantFigure'];
  $txt_DocName    = $_POST['txt_DocName'];
  $txt_Description    = $_POST['txt_Description'];
  $doctype    = $_POST['doctype'];
  $ID_txt     = $_POST['ID_txt'];

  
 
    $query = "UPDATE documentlist 
                SET DocNumber = '$txt_DocNumber',
                    DocName = '$txt_DocName',
                    DocType = '$doctype',
                    Description = '$txt_Description',
                    SignificantFigure = '$txt_SignificantFigure',
                    ModifyDate = NOW(),
                    DocType_Detail = '$select_TypeDetail'
              WHERE ID = '$ID_txt'";

    $return = "แก้ไขข้อมูล สำเร็จ";
  

  mysqli_query($conn, $query);
  echo $return;
  unset($conn);
  die;
}

function saveData($conn)
{

  $select_TypeDetail    = $_POST['select_TypeDetail'];
  $txt_DocNumber    = $_POST['txt_DocNumber'];
  $txt_SignificantFigure    = $_POST['txt_SignificantFigure'];
  $txt_DocName    = $_POST['txt_DocName'];
  $txt_Description    = $_POST['txt_Description'];
  $doctype    = $_POST['doctype'];

  // $Sql2 = "SELECT
  //           outsource.Outsource
  //         FROM
  //         outsource
  //           WHERE  outsource.Outsource = '$txt_item_name'
  //         ";
  // $result = mysqli_query($conn, $Sql2);
  // $num_rows = mysqli_num_rows($result);
  //  if($num_rows>0){
  //       $return = "0";
  //  }else{
        

          $query = "INSERT INTO documentlist 
          SET DocNumber = '$txt_DocNumber',
              DocName = '$txt_DocName',
              DocType = '$doctype',
              Description = '$txt_Description',
              SignificantFigure = '$txt_SignificantFigure',
              ModifyDate = NOW(),
              DocType_Detail = '$select_TypeDetail'
          ";

          $return = "เพิ่มข้อมูล สำเร็จ";
          mysqli_query($conn, $query);
  //  }
    
 
  echo $return;
  unset($conn);
  die;
}

function show_data($conn)
{
  $Search_txt = $_POST["Search_txt"];


  $Sql = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName,
            documentlist.DocType,
            documentlist.Description,
            documentlist.SignificantFigure,
            documentlist.ModifyDate,
            doctype_detail.TypeDetail_Name 
          FROM
            documentlist
            INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID
            WHERE (documentlist.DocNumber LIKE '%$Search_txt%' OR documentlist.DocName LIKE '%$Search_txt%')
            AND documentlist.IsCancel =0
            ORDER BY  documentlist.DocName ASC
          ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }

  
  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function show_Detail($conn)
{
  $ID = $_POST["ID"];


  $Sql = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName,
            documentlist.DocType,
            documentlist.Description,
            documentlist.SignificantFigure,
            documentlist.ModifyDate,
            documentlist.DocType_Detail 
          FROM
            documentlist
            WHERE documentlist.ID='$ID'
          ";
          
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }

  
  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function deleteData($conn)
{
  $ID_txt = $_POST['ID_txt'];

  $query = "UPDATE documentlist SET IsCancel = 1 WHERE ID = $ID_txt";
  mysqli_query($conn, $query);
  echo "ลบข้อมูลสำเร็จ";
  unset($conn);
  die;
}
