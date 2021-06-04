<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'showData_exp') {
    showData_exp($conn);
  } else   if ($_POST['FUNC_NAME'] == 'showData_exp2') {
    showData_exp2($conn);
  }

  
}







function showData_exp($conn)
{
  $Search_txt = $_POST["txtSearch"];
  
  // $select_product = $_POST["select_product"];

  $Sql_product = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName,
                    DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
                    DATEDIFF(documentlist.ValidDate,DATE(NOW())) AS diffday,

                    docrevision.version
                  FROM
                    documentlist
                    INNER JOIN docrevision ON documentlist.ID = docrevision.ID
                  WHERE
                    DATEDIFF(documentlist.ValidDate,DATE(NOW())) >15
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

function showData_exp2($conn)
{
  $Search_txt = $_POST["txtSearch"];
  
  // $select_product = $_POST["select_product"];

  $Sql_product = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName,
                    DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
                    DATEDIFF(documentlist.ValidDate,DATE(NOW())) AS diffday,

                    docrevision.version
                  FROM
                    documentlist
                    INNER JOIN docrevision ON documentlist.ID = docrevision.ID
                  WHERE
                    DATEDIFF(documentlist.ValidDate,DATE(NOW())) >15
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



