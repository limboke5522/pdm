<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'showData_exp') {
    showData_exp($conn);
  } else   if ($_POST['FUNC_NAME'] == 'showData_exp2') {
    showData_exp2($conn);
  } else   if ($_POST['FUNC_NAME'] == 'showData_exp3') {
    showData_exp3($conn);
  }

  
}







function showData_exp($conn)
{
  $Search_txt = $_POST["txtSearch"];
  
  $txt_Sdate_doc = $_POST["txt_Sdate_doc"];
  $txt_Edate_doc = $_POST["txt_Edate_doc"];
  // $select_product = $_POST["select_product"];
  $txt_Sdate_doc = explode("-", $txt_Sdate_doc);
  $txt_Sdate_doc = $txt_Sdate_doc[2] .'-'. $txt_Sdate_doc[1] .'-'. $txt_Sdate_doc[0];

  $txt_Edate_doc = explode("-", $txt_Edate_doc);
  $txt_Edate_doc = $txt_Edate_doc[2] .'-'. $txt_Edate_doc[1] .'-'. $txt_Edate_doc[0];

  $Sql_product = " SELECT
                  documentlist.ID,
                  documentlist.DocNumber,
                  documentlist.DocName,
                  DATE_FORMAT(documentlist.ValidDate,'%d-%m-%Y') AS ValidDate,DATEDIFF(documentlist.ValidDate,
                    DATE(NOW())) AS diffday,
                  docrevision.DocumentID AS DocID,
                  docrevision.productID AS ProducID,
                  ( SELECT docrevision.version
                    FROM docrevision
                    WHERE docrevision.DocumentID = DocID
                    AND docrevision.productID = ProducID
                    ORDER BY docrevision.version DESC
                    LIMIT 1 ) AS LastVersion
                  FROM documentlist
                  INNER JOIN docrevision ON documentlist.ID = docrevision.DocumentID
                  WHERE DATEDIFF(documentlist.ValidDate,DATE(NOW()) ) < 120
                  AND DATEDIFF(documentlist.ValidDate,DATE(NOW())) > 0 
                  -- AND documentlist.ValidDate BETWEEN '18-02-2021' AND '18-06-2021'
                  AND documentlist.DocName LIKE '%$Search_txt%'
                  GROUP BY docrevision.DocumentID
                  ORDER BY DATEDIFF(documentlist.ValidDate,DATE(NOW())) ASC
          ";

  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }
 


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function showData_exp2($conn)
{
  $Search_txt2 = $_POST["txtSearch2"];

  $Sql_product = "SELECT
      documentlist.DocName,
      documentlist.ValidDate,
      docrevision.version,
      DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
      DATEDIFF(documentlist.ValidDate, DATE(NOW())) AS diffdayexp
      FROM
      documentlist
      INNER JOIN docrevision ON documentlist.ID = docrevision.DocumentID
      WHERE DATEDIFF(documentlist.ValidDate, DATE(NOW())) < 0
      AND documentlist.DocName LIKE '%$Search_txt2%'
      GROUP BY documentlist.DocName,docrevision.version
      ORDER BY diffdayexp ASC
          ";

  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }
 


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function showData_exp3($conn)
{
  $Search_txt3 = $_POST["txtSearch3"];

  $Sql_product = "SELECT 
        customer.CustomerName,
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
        LEFT JOIN send_doc ON send_doc_detail.SendDocNo = send_doc.SendDocNo
        LEFT JOIN customer ON send_doc.CustomerCode = customer.ID
        INNER JOIN productdoc ON send_doc_detail.Product_DocID = productdoc.ID
        INNER JOIN documentlist ON productdoc.DocumentID = documentlist.ID
        INNER JOIN product ON send_doc_detail.ProductID = product.ID
        INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID 
        WHERE
        customer.CustomerName LIKE '%$Search_txt3%' 
          OR documentlist.DocName LIKE '%$Search_txt3%'
        HAVING newVersion > version 
        ORDER BY
        product.ProductName ASC";

  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }
 


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

