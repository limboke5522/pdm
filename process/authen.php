<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
    if ($_POST['FUNC_NAME'] == 'login') {
        login($conn);
    } else if ($_POST['FUNC_NAME'] == 'logout') {
        logout($conn);
    } else if ($_POST['FUNC_NAME'] == 'checkpermission') {
        checkpermission($conn);
    }
}

function checkpermission($conn)
{
    $UserTypeID = $_POST['UserTypeID'];

    $Sql = "SELECT
                usermenu.ID,
                usermenu.UserTypeID,
                usermenu.notification_doc,
                usermenu.upload_doc,
                usermenu.send_doc,
                usermenu.history_doc,
                usermenu.manage_customers,
                usermenu.contact_customers,
                usermenu.manage_item,
                usermenu.register_doc,
                usermenu.purpose,
                usermenu.doctype_detail,
                usermenu.email_sender,
                usermenu.permission_doc 
            FROM
                usermenu
            WHERE usermenu.UserTypeID = '$UserTypeID' ";


        $meQuery = mysqli_query($conn, $Sql);
        while ($row = mysqli_fetch_assoc($meQuery)) {
        $return[] = $row;
        }


        echo json_encode($return);
        mysqli_close($conn);
        die;

}

function login($conn)
{
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $password = $_POST['password'];

        $query = "SELECT
                        `user`.ID,
                        `user`.Username,
                        `user`.`User`,
                        `user`.UserTypeID 
                    FROM
                        `user` 
                    WHERE
                        `user` .Username = '$username' 
                        AND `user` .`Password` = '$password' ";
        
        $meQuery = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($meQuery)) {
            $userID = $row['ID'];
            $Username = $row['Username'];
            $permissionID = $row['UserTypeID'];
            $firstName = $row['User'];
            $return = "success";
        }

        if (!empty($ID) || $ID == "") {
            $_SESSION["userData"]['userID'] = $userID;
            $_SESSION["userData"]['Username'] = $Username;
            $_SESSION["userData"]['UserTypeID'] = $permissionID;
            $_SESSION["userData"]['real_name'] = $firstName;
        } else {
            $return = "falied";
        }
    } else {
        $return = "falied";
    }
    unset($conn);
    echo $return;
    die;
}

function logout($conn)
{
    unset($_SESSION['userData']);
}
