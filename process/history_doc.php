<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'selection_Customer') {
    selection_Customer($conn);
  } else if($_POST['FUNC_NAME'] == 'show_data'){
    show_data($conn);
  }else if($_POST['FUNC_NAME'] == 'show_Docdetail'){
    show_Docdetail($conn);
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

function show_data($conn)
{
  $select_hospital = $_POST["select_hospital"];
  $txt_Sdate_doc = $_POST["txt_Sdate_doc"];
  $txt_Edate_doc = $_POST["txt_Edate_doc"];


  $txt_Sdate_doc = explode("-", $txt_Sdate_doc);
  $txt_Sdate_doc = $txt_Sdate_doc[2].'-'.$txt_Sdate_doc[1].'-'.$txt_Sdate_doc[0];

  $txt_Edate_doc = explode("-", $txt_Edate_doc);
  $txt_Edate_doc = $txt_Edate_doc[2].'-'.$txt_Edate_doc[1].'-'.$txt_Edate_doc[0];

    if($select_hospital == 0){
        $AND="";
    }else{
        $AND="AND send_doc.CustomerCode = '$select_hospital'"; 
    }

  $Sql = "SELECT
            send_doc.SendDocNo,
            send_doc.email,
            DATE( send_doc.DocDate ) AS DocDate,
            customer.CustomerName,
            cuscontact.ContactName,
            purpose.Purpose 
        FROM send_doc
        INNER JOIN cuscontact ON send_doc.Contact_ID = cuscontact.ID
        INNER JOIN customer ON send_doc.CustomerCode = customer.ID
        INNER JOIN purpose ON send_doc.`Subject` = purpose.ID 
        WHERE
        DATE( send_doc.DocDate ) BETWEEN '$txt_Sdate_doc' AND '$txt_Edate_doc' 
        $AND
        ORDER BY
        DATE( send_doc.DocDate ) DESC ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
      $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function show_Docdetail($conn)
{
  $SendDocNo = $_POST["SendDocNo"];
 

  $Sql = "SELECT
  send_doc_detail.SendDocNo,
            documentlist.DocName,
            product.ProductName,
            docrevision.fileName,
            docrevision.version,
            docrevision.DocumentID AS DocID,
            docrevision.productID AS ProducID,
            (SELECT docrevision.version FROM docrevision
                WHERE docrevision.DocumentID = DocID
                AND docrevision.productID = ProducID
                ORDER BY docrevision.version DESC LIMIT 1) AS newVersion
            FROM
            send_doc_detail
            INNER JOIN productdoc ON send_doc_detail.Product_DocID = productdoc.ID
            INNER JOIN documentlist ON productdoc.DocumentID = documentlist.ID
            INNER JOIN product ON send_doc_detail.ProductID = product.ID
            INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID 
            WHERE
            send_doc_detail.SendDocNo = '$SendDocNo' 
            ORDER BY
            product.ProductName ASC ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
      $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}







