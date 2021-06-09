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
  }

  
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

  $Sql_product2 = "SELECT
                    documentlist.ID,
                    documentlist.DocNumber,
                    documentlist.DocName

                  FROM documentlist 

                  WHERE documentlist.DocName LIKE '%$Search_txt%'
                  ORDER BY documentlist.ID ASC
          ";

  $meQuery2 = mysqli_query($conn, $Sql_product2);
  while ($row = mysqli_fetch_assoc($meQuery2)) {
        $return[] = $row;
  }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function saveData($conn)
{
  $id_user = $_POST["id_user"];
  $ID_Doc = $_POST["ID_Doc"];

  

  foreach ($ID_Doc as $key => $value) {

    $Sql_save =" INSERT INTO userdoc (UserTypeID,DocumentID) VALUES ($id_user,$value)";
    mysqli_query($conn, $Sql_save);
  }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}


