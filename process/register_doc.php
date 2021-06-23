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
  } else if ($_POST['FUNC_NAME'] == 'Get_TypeDetail_Name') {
    Get_TypeDetail_Name($conn);
  }
  
}
function Get_TypeDetail_Name($conn){
  $Sql = "SELECT
            doctype_detail.ID,
            doctype_detail.TypeDetail_Name 
          FROM
            doctype_detail
            WHERE doctype_detail.IsCancel = 0
            ORDER BY  doctype_detail.TypeDetail_Name ASC
       ";

$meQuery = mysqli_query($conn, $Sql);
while ($row = mysqli_fetch_assoc($meQuery)) {
$return[] = $row;
}


echo json_encode($return);
mysqli_close($conn);
die;
}

function Get_customers($conn){
      $Sql = "SELECT
                customer.ID,
                customer.CustomerName 
              FROM
                customer
                WHERE customer.IsCancel = 0
                ORDER BY  customer.CustomerName ASC
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
  $txt_DocNo    = $_POST['txt_DocNo'];
  $txt_Doc_name    = $_POST['txt_Doc_name'];
  $txt_Doc_numbar     = $_POST['txt_Doc_numbar'];
  $txt_date_doc     = $_POST['txt_date_doc'];
  $txt_expira_date     = $_POST['txt_expira_date'];
  $txt_detail     = $_POST['txt_detail'];
  $StatusRadio     = $_POST['StatusRadio'];
  $select_doctype2    = $_POST['select_doctype2'];
  
  $txt_date_doc = explode("-", $txt_date_doc);
  $txt_date_doc = $txt_date_doc[2].'-'.$txt_date_doc[1].'-'.$txt_date_doc[0];

  $txt_expira_date = explode("-", $txt_expira_date);
  $txt_expira_date = $txt_expira_date[2].'-'.$txt_expira_date[1].'-'.$txt_expira_date[0];

  $ID_txt     = $_POST['ID_txt'];

  
 
    $query = "UPDATE documentlist 
                SET DocNumber = '$txt_DocNo',
                    DocName = '$txt_Doc_name',
                    DocType = '$StatusRadio',
                    DocType_detail = '$select_doctype2',
                    Description = '$txt_detail',
                    SignificantFigure = '$txt_Doc_numbar',
                    RegistrationDate = '$txt_date_doc',
                    ValidDate = '$txt_expira_date',
                    ModifyDate = NOW()
                WHERE ID = '$ID_txt'";

    $return = "แก้ไขข้อมูล สำเร็จ";
  

  mysqli_query($conn, $query);
  echo $return;
  unset($conn);
  die;
}

function saveData($conn)
{

  $txt_DocNo    = $_POST['txt_DocNo'];
  $txt_Doc_name    = $_POST['txt_Doc_name'];
  $txt_Doc_numbar     = $_POST['txt_Doc_numbar'];
  $txt_date_doc     = $_POST['txt_date_doc'];
  $txt_expira_date     = $_POST['txt_expira_date'];
  $txt_detail     = $_POST['txt_detail'];
  $StatusRadio     = $_POST['StatusRadio'];
  $select_doctype2     = $_POST['select_doctype2'];
  
  $txt_date_doc = explode("-", $txt_date_doc);
  $txt_date_doc = $txt_date_doc[2].'-'.$txt_date_doc[1].'-'.$txt_date_doc[0];

  $txt_expira_date = explode("-", $txt_expira_date);
  $txt_expira_date = $txt_expira_date[2].'-'.$txt_expira_date[1].'-'.$txt_expira_date[0];

            $Sql2 = " SELECT
                       documentlist.DocNumber
                      FROM
                      documentlist
                      WHERE  documentlist.DocNumber = '$txt_DocNo'
                    ";

          $result = mysqli_query($conn, $Sql2);
          $num_rows = mysqli_num_rows($result);
          if($num_rows>0){
          $return = "0";
          }else{


            $query = "INSERT INTO documentlist 
            SET DocNumber = '$txt_DocNo',
                DocName = '$txt_Doc_name',
                DocType = '$StatusRadio',
                DocType_detail = '$select_doctype2',
                Description = '$txt_detail',
                SignificantFigure = '$txt_Doc_numbar',
                RegistrationDate = '$txt_date_doc',
                ValidDate = '$txt_expira_date',
                ModifyDate = NOW()
            ";

            $return = "เพิ่มข้อมูล สำเร็จ";
            mysqli_query($conn, $query);
          }
            
    
 
  echo $return;
  unset($conn);
  die;
}

function show_data($conn)
{
  $Search_txt = $_POST["Search_txt"];
  $select_doc = $_POST["select_doc"];
  $select_doctype = $_POST["select_doctype"];

  if($select_doc == 0 ){
    $ANDdoc = "";
  }else{
    $ANDdoc = "AND documentlist.DocType = '$select_doc' ";
  }

  if($select_doctype == 0 ){
    $ANDdoc_type = "";
  }else{
    $ANDdoc_type = "AND documentlist.DocType_detail = '$select_doctype' ";
  }

  $Sql = "SELECT
              documentlist.ID,
              documentlist.DocNumber,
              documentlist.DocName,
              documentlist.DocType,
              documentlist.DocType_detail,
              documentlist.Description,
              documentlist.SignificantFigure,
              DATE_FORMAT(documentlist.RegistrationDate ,'%d-%m-%Y') AS RegistrationDate,
              DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
              documentlist.ModifyDate,

              doctype_detail.ID AS docdetail_id,
              doctype_detail.TypeDetail_Name
            FROM
            documentlist
            INNER JOIN doctype_detail ON documentlist.DocType_detail = doctype_detail.ID
            WHERE (documentlist.DocName LIKE '%$Search_txt%' OR documentlist.DocNumber LIKE '%$Search_txt%'	)
            $ANDdoc
            $ANDdoc_type
           
            AND documentlist.IsCancel = 0
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
  $docdetail_id = $_POST["docdetail_id"];

  $Sql = "SELECT
              documentlist.ID,
              documentlist.DocNumber,
              documentlist.DocName,
              documentlist.DocType,
              documentlist.DocType_detail,
              documentlist.Description,
              documentlist.SignificantFigure,
              DATE_FORMAT(documentlist.RegistrationDate ,'%d-%m-%Y') AS RegistrationDate,
              DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
              documentlist.ModifyDate,

              doctype_detail.ID AS docdetail_id,
              doctype_detail.TypeDetail_Name
          FROM
          documentlist
          INNER JOIN doctype_detail ON documentlist.DocType_detail = doctype_detail.ID
            WHERE documentlist.ID = '$ID'
            AND doctype_detail.ID = '$docdetail_id'
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
