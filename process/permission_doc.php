<?php
session_start();
require '../connect/connect.php';

showData_Doc($conn);

// if (!empty($_POST['FUNC_NAME'])) {
//   if ($_POST['FUNC_NAME'] == 'showData_exp') {
//     showData_exp($conn);
//   } else   if ($_POST['FUNC_NAME'] == 'showData_exp2') {
//     showData_exp2($conn);
//   }

  
// }

function showData_Doc($conn)
{
  $Search_txt = $_POST["txtSearch"];

  $Sql_product = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName

                  FROM documentlist 

                  WHERE documentlist.DocName LIKE '%$Search_txt%'
                  ORDER BY documentlist.ID ASC
          ";

  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}




