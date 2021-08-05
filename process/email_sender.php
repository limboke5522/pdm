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
  $txt_email_sender_name    = $_POST['txt_email_sender_name'];
  $txt_email_sender_password    = $_POST['txt_email_sender_password'];
  $txt_email_sender    = $_POST['txt_email_sender'];
  $ID_txt     = $_POST['ID_txt'];

  
    $query = "UPDATE email_sender SET email_sender.Username = '$txt_email_sender_name' ,  email_sender.Password = '$txt_email_sender_password' ,  email_sender.Sender = '$txt_email_sender' 
    WHERE ID = '$ID_txt'";

    $return = "แก้ไขข้อมูล สำเร็จ";
  

  mysqli_query($conn, $query);
  echo $return;
  unset($conn);
  die;
}

function saveData($conn)
{

  $txt_email_sender_name    = $_POST['txt_email_sender_name'];
  $txt_email_sender_password    = $_POST['txt_email_sender_password'];
  $txt_email_sender    = $_POST['txt_email_sender'];
  
  $Sql2 = "SELECT
            email_sender.Username
          FROM
          email_sender
            WHERE  email_sender.Username = '$txt_email_sender_name'
          ";
  $result = mysqli_query($conn, $Sql2);
  $num_rows = mysqli_num_rows($result);
   if($num_rows>0){
        $return = "0";
   }else{
        

    $query = "INSERT INTO email_sender SET  email_sender.Username = '$txt_email_sender_name' ,  email_sender.Password = '$txt_email_sender_password' ,email_sender.Sender = '$txt_email_sender'
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
            email_sender.ID, 
            email_sender.Username,
            email_sender.Password,
            email_sender.Sender
          FROM
            email_sender
            WHERE (email_sender.Username LIKE '%$Search_txt%')
           
            ORDER BY  email_sender.ID DESC
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
             email_sender.ID, 
             email_sender.Username,
             email_sender.Password,
             email_sender.Sender
          FROM
          email_sender
            WHERE email_sender.ID = '$ID'
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

  // $query = "UPDATE email_sender 
  //               SET email_sender.IsCancel = 1
  //             WHERE email_sender.ID = '$ID_txt'";

  $query = "DELETE FROM email_sender WHERE ID = $ID_txt";

  mysqli_query($conn, $query);
  echo "ลบ ข้อมูลสำเร็จ";
  unset($conn);
  die;
}
