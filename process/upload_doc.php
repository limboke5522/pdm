<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'selection_Product') {
    selection_Product($conn);
  } else   if ($_POST['FUNC_NAME'] == 'show_DataLeft') {
    show_DataLeft($conn);
  }else   if ($_POST['FUNC_NAME'] == 'upload_Doc') {
    upload_Doc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'show_DataRight') {
    show_DataRight($conn);
  }else   if ($_POST['FUNC_NAME'] == 'selection_Doc') {
    selection_Doc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'Save_FileDoc') {
    Save_FileDoc($conn);
  }

  
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



function show_DataLeft($conn)
{
  $Search_txt = $_POST["txtSearch"];
  
  $select_product = $_POST["select_product"];

  $Sql_product = "SELECT
                    productdoc.DocumentID,
                    productdoc.ID,
                    productdoc.ProductID,
                    docrevision.version,
                    docrevision.fileName,
                    DATE_FORMAT(docrevision.UploadDate ,'%d-%m-%Y') AS UploadDate,
                    documentlist.DocNumber,
                    documentlist.DocName 
                  FROM
                    productdoc
                    INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
                    INNER JOIN documentlist ON productdoc.DocumentID = documentlist.ID 
                  WHERE
                    productdoc.ProductID = '$select_product'
                  AND 
                  documentlist.DocName LIKE '%$Search_txt%'
          ";

  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }
 


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function upload_Doc($conn)
{
  $return =  [];
  $select_product = $_POST["select_product"];
  // $id_docLeft = $_POST["id_docLeft"];
  $filename = $_FILES['upload_fileRight']['name'];

  $filename_TH = iconv("UTF-8", "TIS-620", $filename);

  // copy($_FILES['upload_fileRight']['tmp_name'], 'file/' . $filename_TH); // อัพไฟล์ LOCAL *****
  copy($_FILES['upload_fileRight']['tmp_name'], 'file/' . $filename); // อัพไฟล์ SERVER *****

  $Sql = "INSERT INTO docrevision SET docrevision.fileName = '$filename' , 
                                      docrevision.version = 1, 
                                      docrevision.productID = '$select_product', 
                                      docrevision.UploadDate = NOW()  ;";
  mysqli_query($conn, $Sql);




  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function Save_FileDoc($conn)
{

  $select_Doc = $_POST["select_Doc"];
  $select_product = $_POST["select_product"];
  $ID = $_POST["ID"];

  $Sql_docrevision = "SELECT
                        docrevision.ID,
                        docrevision.version 
                      FROM
                        docrevision
                      WHERE docrevision.productID = '$select_product'  
                      AND docrevision.DocumentID = '$select_Doc'
                      ORDER BY docrevision.version DESC LIMIT 1";

  $meQuery_docrevision = mysqli_query($conn, $Sql_docrevision);
  $row_docrevision = mysqli_fetch_assoc($meQuery_docrevision);
  $ID_docrevision = $row_docrevision['ID'];
  $version = $row_docrevision['version'];
  
    if(empty($ID_docrevision)){
      $query = "UPDATE docrevision SET DocumentID = '$select_Doc' WHERE ID = '$ID' ";
      mysqli_query($conn, $query);
    }else{
      $version=($version+1);
     
      $query = "UPDATE docrevision SET DocumentID = '$select_Doc',version = '$version' WHERE ID = '$ID' ";
      mysqli_query($conn, $query);
    }
  


    $Sql = "INSERT INTO productdoc SET productdoc.ProductID = '$select_product' , 
            productdoc.DocumentID = '$select_Doc',productdoc.ID_FileDoc = '$ID' ";
            mysqli_query($conn, $Sql);




            // $return =$version;

  $return = "บันทึกข้อมูลสำเร็จ";
  echo $return;
  unset($conn);
  die;
}

function show_DataRight($conn)
{
  $select_product = $_POST["select_product"];
  // $id_docLeft = $_POST["id_docLeft"];


  $Sql = "SELECT
            docrevision.ID,
            docrevision.fileName, 
            docrevision.version, 
            docrevision.UploadDate, 
            docrevision.DocumentID
          FROM
            docrevision
          WHERE docrevision.productID = '$select_product'  
          AND docrevision.DocumentID = 0
            -- AND docrevision.productID = '$select_product' ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}
