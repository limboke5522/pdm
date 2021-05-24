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

function show_DataLeft($conn)
{
  $select_product = $_POST["select_product"];


  $Sql = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName,
            documentlist.ModifyDate,
            documentlist.IsCancel 
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

function upload_Doc($conn)
{
  $return =  [];
  $select_product = $_POST["select_product"];
  $id_docLeft = $_POST["id_docLeft"];
  $filename = $_FILES['upload_fileRight']['name'];

  
  copy($_FILES['upload_fileRight']['tmp_name'], 'file/' . $_FILES['upload_fileRight']['name']);

  $Sql = "INSERT INTO docrevision SET docrevision.DocumentID = '$id_docLeft' , 
                                      docrevision.fileName = '$filename' , 
                                      docrevision.version = 1, 
                                      docrevision.productID = '$select_product', 
                                      docrevision.UploadDate = NOW()  ;";
  mysqli_query($conn, $Sql);




  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function show_DataRight($conn)
{
  $select_product = $_POST["select_product"];
  $id_docLeft = $_POST["id_docLeft"];


  $Sql = "SELECT
            docrevision.fileName 
          FROM
            docrevision 
          WHERE
            docrevision.DocumentID = '$id_docLeft' 
            AND docrevision.productID = '$select_product' ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}
