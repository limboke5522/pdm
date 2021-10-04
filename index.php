<?php
session_start();
date_default_timezone_set("Asia/Bangkok");

if (!isset($_SESSION['userData'])) {
    header("location:login.php");
    exit(0);
}
$userName = $_SESSION['userData']['real_name'];
$UserTypeID = $_SESSION['userData']['UserTypeID'];
$page = isset($_GET['page']) ? $_GET['page'] : 'notification_doc';

?>
<!DOCTYPE html>
<html lang="en">
<title>PDM</title>

<head>
    <?php include_once('assets/import/css.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- topmenu -->
        <?php require("layout/header.php"); ?>

        <!-- topmenu -->
        <?php require("layout/menu.php"); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: white;">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php include('pages/' . $page . '.php'); ?>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <!-- <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer> -->
    </div>
    <!-- ./wrapper -->

    <?php include_once('assets/import/js.php'); ?>
    <!-- ======================== Add Script function ======================== -->
    <script>
        $(function() {

            checkpermission();
            var page = '<?php echo $page; ?>';
            var _groupMenu = "general";
            switch (page) {
                case "send_doc":
                    _groupMenu = "send";
                    break
                case "history_doc":
                    _groupMenu = "send";
                    break
                case "manage_customers":
                    _groupMenu = "system";
                    break
                case "contact_customers":
                    _groupMenu = "system";
                    break
                case "manage_item":
                    _groupMenu = "system";
                    break
                case "register_doc":
                    _groupMenu = "system";
                    break
                case "purpose":
                    _groupMenu = "system";
                    break
                case "doctype_detail":
                    _groupMenu = "system";
                    break
                case "email_sender":
                    _groupMenu = "system";
                    break
                case "notification_doc":
                    _groupMenu = "notification";
                    break
                case "permission_doc":
                    _groupMenu = "permission";
                    break
                case "setting_user":
                    _groupMenu = "permission";
                    break
            }

            $(`#li_${_groupMenu}`).addClass("menu-open");
            $(`.ul_${_groupMenu}`).css("display", "block");
            $(`#a_${_groupMenu}`).addClass("active");
            $("#" + page).addClass("active");


        });



        function checkpermission() {

            var UserTypeID = '<?php echo $UserTypeID; ?>';

            $.ajax({
                url: "process/authen.php",
                type: 'POST',
                data: {
                    'FUNC_NAME': 'checkpermission',
                    'UserTypeID': UserTypeID
                },
                success: function(result) {
                    var ObjData = JSON.parse(result);
                    if (!$.isEmptyObject(ObjData)) {
                        $.each(ObjData, function(key, value) {
                            if(value.notification_doc ==0){
                                $(`#check_notification_doc`).attr('hidden',true);
                                $(`#li_notification`).attr('hidden',true);
                            }
                            if(value.upload_doc ==0){
                                $(`#check_upload_doc`).attr('hidden',true);
                                $(`#li_upload`).attr('hidden',true);
                            }
                            if(value.send_doc ==0){
                                $(`#check_send_doc`).attr('hidden',true);
                            }
                            if(value.history_doc ==0){
                                $(`#check_history_doc`).attr('hidden',true);
                            }
                            if(value.send_doc ==0 && value.history_doc ==0){
                                $(`#li_send`).attr('hidden',true);
                            }

                            if(value.manage_customers ==0){
                                $(`#check_manage_customers`).attr('hidden',true);
                            }
                            if(value.contact_customers ==0){
                                $(`#check_contact_customers`).attr('hidden',true);
                            }
                            if(value.manage_item ==0){
                                $(`#check_manage_item`).attr('hidden',true);
                            }
                            if(value.register_doc ==0){
                                $(`#check_register_doc`).attr('hidden',true);
                            }
                            if(value.purpose ==0){
                                $(`#check_purpose`).attr('hidden',true);
                            }
                            if(value.doctype_detail ==0){
                                $(`#check_doctype_detail`).attr('hidden',true);
                            }
                            if(value.email_sender ==0){
                                $(`#check_email_sender`).attr('hidden',true);
                            }
                            if(value.manage_customers ==0 && value.contact_customers ==0&& value.manage_item ==0&& value.register_doc ==0&& value.purpose ==0&& value.doctype_detail ==0&& value.email_sender ==0){
                                $(`#li_system`).attr('hidden',true);
                            }
                            if(value.permission_doc ==0){
                                $(`#check_permission_doc`).attr('hidden',true);
                                $(`#li_permission`).attr('hidden',true);
                            }
                        });
                    }
                }
            });
        }
    </script>

    <?php include_once('script-function/' . $page . '.php'); ?>
</body>

</html>