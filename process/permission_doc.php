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
  } else if ($_POST['FUNC_NAME'] == 'selection_DocDetail') {
    selection_DocDetail($conn);
  } else   if ($_POST['FUNC_NAME'] == 'selection_Product') {
    selection_Product($conn);
  } else   if ($_POST['FUNC_NAME'] == 'selection_Doc') {
    selection_Doc($conn);
  } else   if ($_POST['FUNC_NAME'] == 'showData_Head') {
    showData_Head($conn);
  }
}

function showData_Head($conn)
{
  $Sql = "SELECT
            usertype.UserType 
          FROM
            usertype ";
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_DocDetail($conn)
{
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

function selection_Product($conn)
{
  $select_doctype = $_POST["select_doctype"];
  $select_product = $_POST["select_product"];
  $select_dochead = $_POST["select_dochead"];

  $Sql = "SELECT
            product.ID, 
            product.ProductCode, 
            product.ProductName,
            documentlist.DocType_Detail,
            documentlist.productID
          FROM
            product
          INNER JOIN documentlist ON product.ID = documentlist.productID
            WHERE product.IsCancel = 0
            AND documentlist.DocType_Detail = '$select_doctype'
            GROUP BY product.ProductName
            ORDER BY  product.ProductName ASC
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
  $select_doctype = $_POST["select_doctype"];
  $select_product = $_POST["select_product"];
  $select_dochead = $_POST["select_dochead"];

  if ($select_doctype == 2) {
    $ANDdoc_pro = "AND documentlist.productID = 0 ";
  } else {
    $ANDdoc_pro = "AND documentlist.productID = '$select_product' ";
  }
  $Sql2 = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName,
            documentlist.DocType_Detail,
            documentlist.productID
          FROM
            documentlist
        
          WHERE documentlist.IsCancel = 0
          AND documentlist.DocType_Detail = '$select_doctype'
					$ANDdoc_pro
          GROUP BY documentlist.DocName
            ORDER BY  documentlist.DocNumber ASC
       ";
  // echo $Sql2;

  $meQuery1 = mysqli_query($conn, $Sql2);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
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
  // $ID = $_POST["ID"];

  $select_doctype = $_POST["select_doctype"];
  $select_product = $_POST["select_product"];
  $select_dochead = $_POST["select_dochead"];

  $UserTypeID = $_POST["UserTypeID"];
  $DocumentID = $_POST["DocumentID"];

  if ($select_doctype == 0) {
    $ANDdoc_type = "";
  } else {
    $ANDdoc_type = "AND (documentlist.DocType_Detail = '$select_doctype') ";
  }

  if ($select_product == 0) {
    $ANDdoc = "";
  } else {
    $ANDdoc = "AND (documentlist.ProductID = '$select_product') ";
  }

  if ($select_dochead == 0) {
    $ANDdoc_head = "";
  } else {
    $ANDdoc_head = "AND (documentlist.ID = '$select_dochead') ";
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
                  AND documentlist.IsCancel = 0
                  $ANDdoc
                  $ANDdoc_type
                  $ANDdoc_head 
                  GROUP BY documentlist.DocName
                  ORDER BY  documentlist.ID DESC ";

  // echo $Sql_product2;

  $meQuery2 = mysqli_query($conn, $Sql_product2);
  while ($row = mysqli_fetch_assoc($meQuery2)) {
    $return['documentlist'][] = $row;
    $ID = $row["ID"];


    $Sqlrowuser = "SELECT
              usertype.UserType,
              usertype.ID
            FROM
              usertype ";
    $meQueryuser = mysqli_query($conn, $Sqlrowuser);
    while ($rowuser = mysqli_fetch_assoc($meQueryuser)) {
      $return['usertype'][$ID][] = $rowuser;
      $ID_rowuser = $rowuser["ID"];
    }

    $return['userdoc'][$ID][] ="";
    $Sql_userdoc = "SELECT
                      userdoc.ID,
                      userdoc.UserTypeID,
                      userdoc.DocumentID

                    FROM userdoc 
                    WHERE userdoc.DocumentID = '$ID'";
    // echo $Sql_userdoc;
    $meQuery3 = mysqli_query($conn, $Sql_userdoc);
    while ($row3 = mysqli_fetch_assoc($meQuery3)) {
      $return['userdoc'][$ID][] = $row3;
    }
  }



  //   for($i = 406; $i<= 1000; $i++) {
  //     for($a = 1; $a<=3; $a++){
  //       $dbc = "INSERT INTO userdoc (UserTypeID,DocumentID) VALUES (".$a.",".$i.") " ;
  //     mysqli_query($conn, $dbc);
  //     }
  // }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function saveData($conn)
{
  $ID_Doc = $_POST["ID_Doc"];

  $id_AD = $_POST["id_AD"];
  $id_PHA = $_POST["id_PHA"];
  $id_DC = $_POST["id_DC"];

  $UserTypeID = $_POST["UserTypeID"];
  $DocumentID = $_POST["DocumentID"];


  $Sql_userdoc = "SELECT
                        userdoc.ID,
                        COUNT(userdoc.DocumentID) AS COUNTDocumentID,
                        COUNT(userdoc.UserTypeID) AS COUNTUserTypeID

                        FROM userdoc 
                        WHERE userdoc.DocumentID = $UserTypeID
	                      AND userdoc.UserTypeID = $DocumentID ";

  $meQuery2 = mysqli_query($conn, $Sql_userdoc);
  while ($row = mysqli_fetch_assoc($meQuery2)) {
    $COUNTDocumentID = $row["COUNTDocumentID"];
    $userdocID = $row["ID"];
  }
  // if($COUNTDocumentID == 1){
  //   $query_havedata = "UPDATE userdoc SET userdoc.UserTypeID = 0 WHERE userdoc.DocumentID = $UserTypeID AND userdoc.ID = $userdocID ";
  //   mysqli_query($conn, $query_havedata);
  // }else{
  //   $query = "UPDATE userdoc SET userdoc.UserTypeID = '$DocumentID' ,userdoc.DocumentID = '$UserTypeID' WHERE  userdoc.ID = $userdocID ";
  //   mysqli_query($conn, $query);
  // }



  if ($COUNTDocumentID == 1) {
    $Sql_del = "DELETE FROM userdoc WHERE DocumentID = $UserTypeID AND UserTypeID = $DocumentID   ";
    mysqli_query($conn, $Sql_del);
  } else {
    // echo  $Sql_del;
    $Sql_save = " INSERT INTO userdoc (UserTypeID,DocumentID) VALUES ($DocumentID,$UserTypeID) ";
    mysqli_query($conn, $Sql_save);
  }





  // $id_Product = array($id_AD,$id_PHA,$id_DC);
  // foreach ($id_Product as $key => $value) {

  //       $Sql_save =" INSERT INTO docproductlist (DocumentID,ProductID) VALUES ($id_user,$value)";
  //       mysqli_query($conn, $Sql_save);
  // }


  // echo $Sql_save;
  // echo json_encode($return);
  mysqli_close($conn);
  die;
}
