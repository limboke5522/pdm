<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Demo - Dashboard | Poseintelligence</title>
<!-- Font Awesome Icons -->

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">

<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">


<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

<!-- DataTables -->
<link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="assets/dist/css/step.css">
<link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="assets/plugins/jquery-confirm-v3.3.4/css/jquery-confirm.css">
<link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="assets/datepicker/dist/css/datepicker.min.css">
<link rel="stylesheet" href="assets/plugins/chart.js/Chart.min.css">
<link rel="stylesheet" href="assets/dist/css/swap.css">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<style>
    .bg_tableAll{
        background-color: darkgray !important ;
    }
    /* @font-face {
        font-family: myFirstFont;
        src: url(../assets/font/Kanit-Black.ttf);
    } */

    .blue {
        color: blue;
    }

    .datepicker {
        z-index: 9999 !important
    }

    button {
        font-family: 'Kanit', sans-serif;
    }

    body {
        font-family: 'Kanit', sans-serif;
    }

    .col-center {
        vertical-align: middle !important;
    }

    .actionBtn {
        cursor: pointer;
    }

    .image-size {
        width: 25% !important;
    }

    tr.group,
    tr.group:hover {
        background-color: #ddd !important;
    }

    .divider {
        margin-top: 10px;
        margin-bottom: 10px;
        border-top: 2px solid #bbb;
    }

    .jconfirm-buttons button {
        text-transform: lowercase !important;
    }

    /* .btn{
        border-radius: 25px !important;
    }
    
    .btn-primary{
        background-color: #00a9f2 !important;
        border-color: #00a9f2 !important;
    }
    .btn-danger{
        background-color: #fa7e7e !important;
        border-color: #fa7e7e !important;
    } */

    button {
        border-style: none;
        background: none;
    }

    .icon-menu-save {
        background-color: green;
        width: 40px;
        height: 40px;
        border-radius: 25px;
    }


    .icon-menu-save i {
        font-size: 25px;
        color: white;
        margin-top: 6px;
        margin-left: 2px;
    }

    .icon-menu-resume {
        background-color: orange;
        width: 40px;
        height: 40px;
        border-radius: 25px;
    }


    .icon-menu-resume i {
        font-size: 25px;
        color: white;
        margin-top: 6px;
        margin-left: 2px;
    }

    .icon-menu-delete {
        background-color: red;
        width: 40px;
        height: 40px;
        border-radius: 25px;
    }


    .icon-menu-delete i {
        font-size: 25px;
        color: white;
        margin-top: 6px;
        margin-left: 2px;
    }

    .icon-menu-create {
        background-color: blue;
        width: 40px;
        height: 40px;
        border-radius: 25px;
    }


    .icon-menu-create i {
        font-size: 25px;
        color: white;
        margin-top: 6px;
        margin-left: 2px;
    }
    .content-header{
        padding:3px .5rem !important;
    }
    .form-group{
        margin-bottom:0.3rem !important;
    }

    .fas {
        
        font-size:1.5rem;
    }
    .bom{
		position: relative;
		
		
	}
	.bellClapper{
		animation: shake 5s infinite;
	}
	.number{
		position:relative ;
        top: -183px;
        right: -194px;
        font-size:1rem;
		background-color: #FFFFFF;
		color: #000000;
		border-radius: 360px;
		padding:0.0rem 0.5rem 0.0rem 0.5rem;
		animation: shake 5s infinite;

	}

    .number2{
		position:relative ;
        top: -175px;
        right: -230px;
        font-size:2rem;
		/* background-color: #FFFFFF; */
		color: #000000;
		border-radius: 23px;
		padding:0.3rem 0.7rem 0.3rem 0.7rem;
		/* animation: shake 5s infinite; */

	}

    .fasbell{
		position:relative ;
        top: -169px;
        right: -220px;
        font-size:2rem;
		/* background-color: #ff0000; */
		color: #000000;
		border-radius: 23px;
		padding:0.3rem 0.7rem 0.3rem 0.7rem;
		/* animation: shake 5s infinite; */

	}

    .number_2{
		position:relative ;
        top: -186px;
        right: -193px;
        font-size:1rem;
		background-color: #ff0000;
		color: #000000;
		border-radius: 360px;
		padding:0.0rem 0.5rem 0.0rem 0.5rem;
		animation: shake 5s infinite;

	}

    .number2_2{
		position:relative ;
        top: -175px;
        right: -230px;
        font-size:2rem;
		/* background-color: #ff0000; */
		color: #000000;
		border-radius: 23px;
		padding:0.3rem 0.7rem 0.3rem 0.7rem;
		/* animation: shake 5s infinite; */

	}

    .fasbell_2{
		position:relative ;
        top: -171px;
        right: -219px;
        font-size:2rem;
		/* background-color: #ff0000; */
		color: #000000;
		border-radius: 23px;
		padding:0.3rem 0.7rem 0.3rem 0.7rem;
		/* animation: shake 5s infinite; */

	}

    .img_ref{
		position:relative ;

	}
    .bellClapper:hover{
        
        animation: shake 5s infinite;
        
    }
            @keyframes shake {
                    0%,
                    25%,
                    83%,
                    100% {
                        transform: rotatez(0deg);
                    }
                    32.5%,
                    62.5% {
                        transform: rotatez(-5deg);
                    }
                    47.5%,
                    75.5% {
                        transform: rotatez(5deg);
                    }
            }

            input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
                color: #fff;
                position: relative;
                }

                input[type="date"]::-webkit-datetime-edit-year-field{
                position: absolute !important;
                border-left:1px solid #8c8c8c;
                padding: 1px;
                color:#000;
                left: 60px;
                }

                input[type="date"]::-webkit-datetime-edit-month-field{
                position: absolute !important;
                border-left:1px solid #8c8c8c;
                padding: 1px;
                color:#000;
                left: 26px;
                }


                input[type="date"]::-webkit-datetime-edit-day-field{
                position: absolute !important;
                color:#000;
                padding: 1px;
                left: 3px;
                
                }
    
</style>