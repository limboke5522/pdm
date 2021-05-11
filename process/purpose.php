<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'show_data') {
    show_data($conn);
  } else if ($_POST['FUNC_NAME'] == 'show_Detail') {
    show_Detail($conn);
  } else if ($_POST['FUNC_NAME'] == 'editData') {
    editData($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData') {
    saveData($conn);
  } else if ($_POST['FUNC_NAME'] == 'deleteData') {
    deleteData($conn);
  }

}



function editData($conn)
{
  $txt_purpose_name    = $_POST['txt_purpose_name'];
  $ID_txt     = $_POST['ID_txt'];

  
 
    $query = "UPDATE purpose 
                SET Purpose = '$txt_purpose_name'
              WHERE ID = '$ID_txt'";

    $return = "แก้ไขข้อมูล สำเร็จ";
  

  mysqli_query($conn, $query);
  echo $return;
  unset($conn);
  die;
}

function saveData($conn)
{

  $txt_purpose_name    = $_POST['txt_purpose_name'];

  $Sql2 = "SELECT
            purpose.Purpose
          FROM
          purpose
            WHERE  purpose.Purpose = '$txt_purpose_name'
          ";
  $result = mysqli_query($conn, $Sql2);
  $num_rows = mysqli_num_rows($result);
   if($num_rows>0){
        $return = "0";
   }else{
        

          $query = "INSERT INTO purpose 
          SET Purpose = '$txt_purpose_name'
          ";

          $return = "เพิ่มข้อมูล สำเร็จ";
          mysqli_query($conn, $query);
   }
    
 
  echo $return;
  unset($conn);
  die;
}

function show_data($conn)
{
  $Search_txt = $_POST["Search_txt"];


  $Sql = "SELECT
            purpose.ID, 
            purpose.Purpose
          FROM
          purpose
            WHERE (purpose.Purpose LIKE '%$Search_txt%')
          ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }

  
  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function show_Detail($conn)
{
  $ID = $_POST["ID"];


  $Sql = "SELECT
            purpose.ID, 
            purpose.Purpose
          FROM
          purpose
            WHERE purpose.ID = '$ID'
          ";
          
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }

  
  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function deleteData($conn)
{
  $ID_txt = $_POST['ID_txt'];

  $query = "DELETE FROM purpose WHERE ID = $ID_txt";
  mysqli_query($conn, $query);
  echo "delete success";
  unset($conn);
  die;
}
