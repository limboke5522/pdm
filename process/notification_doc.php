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
  
  $txt_Sdate_doc = $_POST["txt_Sdate_doc"];
  $txt_Edate_doc = $_POST["txt_Edate_doc"];
  // $select_product = $_POST["select_product"];
  $txt_Sdate_doc = explode("-", $txt_Sdate_doc);
  $txt_Sdate_doc = $txt_Sdate_doc[2] .'-'. $txt_Sdate_doc[1] .'-'. $txt_Sdate_doc[0];

  $txt_Edate_doc = explode("-", $txt_Edate_doc);
  $txt_Edate_doc = $txt_Edate_doc[2] .'-'. $txt_Edate_doc[1] .'-'. $txt_Edate_doc[0];

  $Sql_product = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName,
                    DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
                    DATEDIFF(documentlist.ValidDate,DATE(NOW())) AS diffday,
                     docrevision.version
                  FROM documentlist INNER JOIN docrevision ON documentlist.ID = docrevision.ID
                  WHERE
                    DATEDIFF(documentlist.ValidDate,DATE(NOW())) > 15
                  AND documentlist.ValidDate BETWEEN '$txt_Sdate_doc' AND '$txt_Edate_doc'
                  AND documentlist.DocName LIKE '%$Search_txt%'
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
  $Search_txt = $_POST["txtSearch"];

  $Sql_product = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName,
                    DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
                    DATEDIFF(DATE(documentlist.ValidDate,DATE(NOW())) AS diffdayexp,

                    docrevision.version
                  FROM
                    documentlist
                    INNER JOIN docrevision ON documentlist.ID = docrevision.ID
                  WHERE
                  DATEDIFF(DATE(NOW()),documentlist.ValidDate) < 0



                  GROUP BY documentlist.DocName AND docrevision.version
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



