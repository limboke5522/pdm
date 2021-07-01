<?php
session_start();
require '../connect/connect.php';




if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'showData_Doc') {
    showData_Doc($conn);
  } else   if ($_POST['FUNC_NAME'] == 'showData_User') {
    showData_User($conn);
  } else   if ($_POST['FUNC_NAME'] == 'saveData') {
    saveData($conn);
  }else if ($_POST['FUNC_NAME'] == 'selection_DocDetail') {
    selection_DocDetail($conn);
  }else   if ($_POST['FUNC_NAME'] == 'selection_Doc') {
    selection_Doc($conn);
  }

  
}

function selection_DocDetail($conn){
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

function selection_Doc($conn)
{
  $Sql = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName
          FROM
            documentlist
          WHERE documentlist.IsCancel = 0
            ORDER BY  documentlist.DocNumber ASC
       ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function showData_User($conn)
{
  // $Search_txt = $_POST["txtSearch"];

  $Sql_product = "SELECT
                    usertype.ID,
                    usertype.UserType

                  FROM usertype 
                  ORDER BY usertype.ID ASC
          ";

  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function showData_Doc($conn)
{
  $Search_txt = $_POST["txtSearch"];
  $ID = $_POST["ID"];

  $select_doctype = $_POST["select_doctype"];
  $select_dochead = $_POST["select_dochead"];
  

  if($select_doctype == 0 ){
    $ANDdoc_type = "";
  }else{
    $ANDdoc_type = "AND (productdoc.DocTypeID = '$select_doctype') ";
  }

  if($select_dochead == 0 ){
    $ANDdoc_head = "";
  }else{
    $ANDdoc_head = "AND (documentlist.DocumentID = '$select_dochead') ";
  }

  $Sql_product2 = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName,
                    documentlist.DocType,
                    documentlist.DocType_Detail,
                    documentlist.Description,
                    documentlist.SignificantFigure,
                    DATE_FORMAT(documentlist.RegistrationDate ,'%d-%m-%Y') AS RegistrationDate,
                    DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
                    documentlist.ModifyDate,

                    doctype_detail.ID AS docdetail_id,
                    doctype_detail.TypeDetail_Name,
                    doctype_detail.IsCancel AS detail_IsCancel
                  FROM
                  documentlist
                  INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID
                  WHERE (documentlist.DocName LIKE '%$Search_txt%' OR documentlist.DocNumber LIKE '%$Search_txt%'	)
                  $ANDdoc_type
                  $ANDdoc_head  

                  AND documentlist.IsCancel = 0
                  ORDER BY  documentlist.DocName ASC ";


  $meQuery2 = mysqli_query($conn, $Sql_product2);
  while ($row = mysqli_fetch_assoc($meQuery2)) {
        $return['documentlist'][] = $row;
  }

      $Sql_usertype = "SELECT
      userdoc.ID,
      userdoc.UserTypeID,
      userdoc.DocumentID

    FROM userdoc 

    WHERE userdoc.UserTypeID = '$ID'
    ";

    $meQuery3 = mysqli_query($conn, $Sql_usertype);
    while ($row = mysqli_fetch_assoc($meQuery3)) {
    $return['userdoc'][] = $row;
    }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function saveData($conn)
{
  $id_user = $_POST["id_user"];
  $ID_Doc = $_POST["ID_Doc"];

  $Sql_del ="DELETE FROM userdoc WHERE UserTypeID =   $id_user ";
  mysqli_query($conn, $Sql_del);
  
  foreach ($ID_Doc as $key => $value) {
    
        $Sql_save =" INSERT INTO userdoc (UserTypeID,DocumentID) VALUES ($id_user,$value)";
        mysqli_query($conn, $Sql_save);
      
    

  }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}


