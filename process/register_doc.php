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
  } else if ($_POST['FUNC_NAME'] == 'Get_customers') {
    Get_customers($conn);
  }
  
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

  
  $txt_date_doc = explode("-", $txt_date_doc);
  $txt_date_doc = $txt_date_doc[2].'-'.$txt_date_doc[1].'-'.$txt_date_doc[0];

  $txt_expira_date = explode("-", $txt_expira_date);
  $txt_expira_date = $txt_expira_date[2].'-'.$txt_expira_date[1].'-'.$txt_expira_date[0];

  $ID_txt     = $_POST['ID_txt'];

  
 
    $query = "UPDATE documentlist 
                SET DocNumber = '$txt_DocNo',
                    DocName = '$txt_Doc_name',
                    DocType = '$StatusRadio',
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


  $Sql = "SELECT
              documentlist.ID,
              documentlist.DocNumber,
              documentlist.DocName,
              documentlist.DocType,
              documentlist.Description,
              documentlist.SignificantFigure,
              DATE_FORMAT(documentlist.RegistrationDate ,'%d-%m-%Y') AS RegistrationDate,
              DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
              documentlist.ModifyDate
            FROM
            documentlist
            WHERE (documentlist.DocName LIKE '%$Search_txt%' OR documentlist.DocNumber LIKE '%$Search_txt%'	)
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


  $Sql = "SELECT
              documentlist.ID,
              documentlist.DocNumber,
              documentlist.DocName,
              documentlist.DocType,
              documentlist.Description,
              documentlist.SignificantFigure,
              DATE_FORMAT(documentlist.RegistrationDate ,'%d-%m-%Y') AS RegistrationDate,
              DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
              documentlist.ModifyDate
          FROM
          documentlist
            WHERE documentlist.ID = '$ID'
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
