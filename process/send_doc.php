<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'selection_Customer') {
    selection_Customer($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Purpose') {
    selection_Purpose($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Contact') {
    selection_Contact($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Product') {
    selection_Product($conn);
  } else if ($_POST['FUNC_NAME'] == 'showDetail_contact') {
    showDetail_contact($conn);
  } else if ($_POST['FUNC_NAME'] == 'product_file') {
    product_file($conn);
  }else if ($_POST['FUNC_NAME'] == 'save_sendDoc') {
    save_sendDoc($conn);
  }
}


function selection_Customer($conn)
{
  $Sql = "SELECT
            customer.ID,
            customer.CustomerName 
          FROM
            customer 
          WHERE
            customer.IsCancel = 0 
            
          AND ( customer.ID LIKE '%$select_hospital%'
           OR customer.CustomerName LIKE '%$select_hospital%' )
          ORDER BY
            customer.CustomerName ASC ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Purpose($conn)
{
  $Sql = "SELECT
            purpose.ID,
            purpose.Purpose 
          FROM
            purpose";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Contact($conn)
{
  $select_hospital = $_POST["select_hospital"];

  $Sql = "SELECT
            cuscontact.ID,
            cuscontact.ContactName 
          FROM
            cuscontact 
          WHERE
            cuscontact.CustomerID = '$select_hospital' 
          ORDER BY
            cuscontact.ContactName ASC";

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
  $Sql = "SELECT
            product.ID, 
            product.ProductCode, 
            product.ProductName
          FROM
            product
          WHERE product.IsCancel = 0
            ORDER BY  product.ProductName ASC ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}


// detailcontact

function showDetail_contact($conn)
{
  $select_contact = $_POST["select_contact"];

  $Sql = "SELECT
            cuscontact.email,
            cuscontact.Tel 
          FROM
            cuscontact 
          WHERE
            cuscontact.ID = '$select_contact'  ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function product_file($conn)
{
  $id_product = $_POST["id_product"];
  $UserTypeID = $_SESSION["userData"]["UserTypeID"];

  $Sql = "SELECT
            docrevision.DocumentID 
          FROM
            productdoc
            INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
            INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID 
          WHERE
            productdoc.ProductID = '$id_product' 
          GROUP BY
            docrevision.DocumentID 
          ORDER BY
            documentlist.DocName ASC,
            docrevision.version DESC ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $DocumentID = $row['DocumentID'];
    $UserID = $row['UserID'];
    $Sql_2 = "SELECT
              docrevision.fileName,
              docrevision.version,
              productdoc.ID,
              docrevision.DocumentID,
              documentlist.DocNumber,
              documentlist.DocName,
              (SELECT DocumentID FROM userdoc WHERE UserTypeID = '$UserTypeID' AND DocumentID = '$DocumentID') AS sub
            FROM
              productdoc
              INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
              INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID 
              
            WHERE
              productdoc.ProductID = '$id_product'
            AND productdoc.DocumentID='$DocumentID'
            -- AND userdoc.UserTypeID = '$UserTypeID'
            ORDER BY docrevision.version DESC
            LIMIT 1 ";

    $meQuery2 = mysqli_query($conn, $Sql_2);
    while ($row2 = mysqli_fetch_assoc($meQuery2)) {
      $return[] = $row2;
    }
    
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function save_sendDoc($conn)
{
  $select_hospital   = $_POST['select_hospital'];
  $select_subject    = $_POST['select_subject'];
  $select_contact    = $_POST['select_contact'];
  $email             = $_POST['email'];
  $txt_remark        = $_POST['txt_remark'];
  $productID         = $_POST['productID'];
  $DocID             = $_POST['DocID'];
  $Copy_doc             = $_POST['Copy_doc'];
  
  
  $Sql = "SELECT	LPAD( ( COALESCE ( MAX( CONVERT ( SUBSTRING( SendDocNo, 2, 6 ), UNSIGNED INTEGER )), 0 )+ 1 ), 7, 0 ) AS SendDocNo 
          FROM
            send_doc 
          ORDER BY
            SendDocNo DESC 
            LIMIT 1";
  $meQuery = mysqli_query($conn, $Sql);
  $row = mysqli_fetch_assoc($meQuery);
  $SendDocNo = $row['SendDocNo'];

  $query = "  INSERT INTO send_doc 
              SET CustomerCode = '$select_hospital',
                  SendDocNo = '$SendDocNo',
                  Contact_ID = '$select_contact',
                  Subject = '$select_subject',
                  Copy_doc = '$Copy_doc',
                  Memo = '$txt_remark',
                  DocDate = NOW(),
                  email = '$email'
          ";
 mysqli_query($conn, $query);

 foreach($DocID as $key => $value){
  $query1 = "  INSERT INTO send_doc_detail 
              SET SendDocNo = '$SendDocNo',
              ProductID = '$productID[$key]',
              Product_DocID = '$value'
          ";
          mysqli_query($conn, $query1);
 }


    $return = $SendDocNo;
  
    // $return = $DocID;
 
  echo ($return);
  unset($conn);
  die;
}



