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
  $txt_Sdate_doc = $txt_Sdate_doc[2] . '-' . $txt_Sdate_doc[1] . '-' . $txt_Sdate_doc[0];

  $txt_Edate_doc = explode("-", $txt_Edate_doc);
  $txt_Edate_doc = $txt_Edate_doc[2] . '-' . $txt_Edate_doc[1] . '-' . $txt_Edate_doc[0];

  $Sql_product = " SELECT
	productdoc.DocumentID,
	documentlist.ID,
	documentlist.DocNumber,
	documentlist.DocName,
	DATE_FORMAT(
		productdoc.ExpireDate,
		'%d-%m-%Y'
	) AS ValidDate,
	DATEDIFF(
		productdoc.ExpireDate,
		DATE(NOW())
	) AS diffday,
	doctype_detail.TypeDetail_Name,
	productdoc.DocumentID AS DocID,
	productdoc.productID AS ProducID,
	product.ProductName,
	(
		SELECT
			DATEDIFF(
				productdoc.ExpireDate,
				DATE(NOW())
			)
		FROM
			docrevision
		INNER JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc
		WHERE
			docrevision.DocumentID = DocID
		AND docrevision.productID = ProducID
		ORDER BY
			docrevision.version DESC
		LIMIT 1
	) AS daynow,
	(
		SELECT
			docrevision.version
		FROM
			docrevision
		WHERE
			docrevision.DocumentID = DocID
		AND docrevision.productID = ProducID
		ORDER BY
			docrevision.version DESC
		LIMIT 1
	) AS LastVersion
FROM
	productdoc
INNER JOIN documentlist ON productdoc.DocumentID = documentlist.ID
INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID
INNER JOIN product ON productdoc.ProductID = product.ID
WHERE
	DATEDIFF(
		productdoc.ExpireDate,
		DATE(NOW())
	) < 120
AND DATEDIFF(
	productdoc.ExpireDate,
	DATE(NOW())
) >= 0 -- AND documentlist.ValidDate BETWEEN '18-02-2021' AND '18-06-2021'
AND documentlist.DocName LIKE '%$Search_txt%'
GROUP BY
	productdoc.DocumentID
HAVING
	daynow <= 120
AND daynow > 0
ORDER BY
	DATEDIFF(
		productdoc.ExpireDate,
		DATE(NOW())
	) ASC
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
  $txt_Sdate_doc_r = $_POST["txt_Sdate_doc_r"];
  $txt_Edate_doc_r = $_POST["txt_Edate_doc_r"];
  // $select_product = $_POST["select_product"];
  $txt_Sdate_doc_r = explode("-", $txt_Sdate_doc_r);
  $txt_Sdate_doc_r = $txt_Sdate_doc_r[2] . '-' . $txt_Sdate_doc_r[1] . '-' . $txt_Sdate_doc_r[0];

  $txt_Edate_doc_r = explode("-", $txt_Edate_doc_r);
  $txt_Edate_doc_r = $txt_Edate_doc_r[2] . '-' . $txt_Edate_doc_r[1] . '-' . $txt_Edate_doc_r[0];

  $Sql_product = "SELECT
  productdoc.DocumentID,
  documentlist.ID,
  documentlist.DocNumber,
  documentlist.DocName,
   DATE_FORMAT(
    productdoc.ExpireDate,
    '%d-%m-%Y'
   ) AS ValidDate,
   DATEDIFF(
    productdoc.ExpireDate,
    DATE(NOW())
   ) AS diffday,
  doctype_detail.TypeDetail_Name,
  productdoc.DocumentID AS DocID,
   productdoc.productID AS ProducID,
	product.ProductName,
  (
  SELECT
     DATEDIFF(
    productdoc.ExpireDate,
    DATE(NOW())
   )
    FROM
     docrevision
    INNER JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc
    WHERE
     docrevision.DocumentID = DocID
    AND docrevision.productID = ProducID
    ORDER BY
     docrevision.version DESC
    LIMIT 1
  )AS daynow,
  (
    SELECT
     docrevision.version
    FROM
     docrevision
    WHERE
     docrevision.DocumentID = DocID
    AND docrevision.productID = ProducID
    ORDER BY
     docrevision.version DESC
    LIMIT 1
   ) AS LastVersion
  FROM
  productdoc
  INNER JOIN documentlist ON productdoc.DocumentID = documentlist.ID
  INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID
  INNER JOIN product ON productdoc.ProductID = product.ID
  WHERE
  DATE(productdoc.ExpireDate) < DATE(NOW())
  AND documentlist.DocName LIKE '%$Search_txt2%'
  
  GROUP BY
   productdoc.DocumentID
  HAVING  daynow <=0
  ORDER BY
  DATE(productdoc.ExpireDate) < DATE(NOW()) ASC
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
