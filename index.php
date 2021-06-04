<?php
session_start();
date_default_timezone_set("Asia/Bangkok");

if (!isset($_SESSION['userData'])) {
    header("location:login.php");
    exit(0);
}
$userName = $_SESSION['userData']['real_name'];
$permissionID = $_SESSION['userData']['permissionID'];
$page = isset($_GET['page']) ? $_GET['page'] : 'upload_doc';

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
                case "notification_doc":
                    _groupMenu = "notification";
                    break
            }

            $(`#li_${_groupMenu}`).addClass("menu-open");
            $(`.ul_${_groupMenu}`).css("display", "block");
            $(`#a_${_groupMenu}`).addClass("active");
            $("#" + page).addClass("active");


        });
    </script>

    <?php include_once('script-function/' . $page . '.php'); ?>
</body>

</html>