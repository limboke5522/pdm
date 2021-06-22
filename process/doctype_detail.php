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
  $txt_doctype_detail_name    = $_POST['txt_doctype_detail_name'];
  $ID_txt     = $_POST['ID_txt'];

  
    $query = "UPDATE doctype_detail 
                SET TypeDetail_Name = '$txt_doctype_detail_name'
              WHERE ID = '$ID_txt'";

    $return = "แก้ไขข้อมูล สำเร็จ";
  

  mysqli_query($conn, $query);
  echo $return;
  unset($conn);
  die;
}

function saveData($conn)
{

  $txt_doctype_detail_name    = $_POST['txt_doctype_detail_name'];

  $Sql2 = "SELECT
            doctype_detail.TypeDetail_Name
          FROM
          doctype_detail
            WHERE  doctype_detail.TypeDetail_Name = '$txt_doctype_detail_name'
          ";
  $result = mysqli_query($conn, $Sql2);
  $num_rows = mysqli_num_rows($result);
   if($num_rows>0){
        $return = "0";
   }else{
        

          $query = "INSERT INTO doctype_detail 
          SET TypeDetail_Name = '$txt_doctype_detail_name'
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
            doctype_detail.ID, 
            doctype_detail.TypeDetail_Name
          FROM
          doctype_detail
            WHERE (doctype_detail.TypeDetail_Name LIKE '%$Search_txt%')
            ORDER BY  doctype_detail.TypeDetail_Name ASC
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
             doctype_detail.ID, 
            doctype_detail.TypeDetail_Name
          FROM
          doctype_detail
            WHERE doctype_detail.ID = '$ID'
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

  $query = "DELETE FROM doctype_detail WHERE ID = $ID_txt";
  mysqli_query($conn, $query);
  echo "ลบ ข้อมูลสำเร็จ";
  unset($conn);
  die;
}
