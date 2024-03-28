<?php
    if(!isset($_SESSION['username'])){
        header("location:Login.php");
    }

require_once('config.php');
$count=0;
$datalist2 = $database->getReference('ArogyaSair/tblAdmin')->getSnapshot()->getValue();
foreach($datalist2 as $data)
{
    $count=$count+1;
}
?>
<html>

<head>
    <title>Arogya Sair Admin</title>
    <link rel="icon" type="image/png" sizes="16x16" href="Images/ArogyaSairRound.png" />
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <link href="dist/css/style.min.css" rel="stylesheet" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/jquery-minicolors/jquery.minicolors.css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/libs/quill/dist/quill.snow.css" />
    <link rel="stylesheet" type="text/css" href="CardView.css" />

    <link href="dist/css/style.min.css" rel="stylesheet" />
    
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header mt-3" data-logobg="skin5">
                    <?php
                        if($_SESSION["username"]=="dev@admin"){
                            ?>
                            <a class="navbar-brand" id="a" href="dashboard.php">
                                <b class="logo-icon">
                                    <img src="Images/ArogyaSairRound.png" alt="homepage" class="light-logo mb-1 round" width="20" />
                                </b>
                                <span class="logo-text">
                                    <img src="Images/ArogyaSairName.png" id="imgRound" width="160px" alt="homepage" class="light-logo"   />
                                </span>
                            </a>
                            <?php
                        }else{
                            ?>
                                <a class="navbar-brand" id="a" href="DoctorAppointment.php">
                                    <b class="logo-icon">
                                        <img src="Images/ArogyaSairRound.png" alt="homepage" class="light-logo mb-1 round" width="20" />
                                    </b>
                                    <span class="logo-text">
                                        <img src="Images/ArogyaSairName.png" id="imgRound" width="160px" alt="homepage" class="light-logo"   />
                                    </span>
                                </a>
                            <?php
                        }
                    ?>
                    
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="Images/ArogyaSairRound.png" alt="user" class="rounded-circle mt-3"
                                    width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-account me-1 ms-1"></i>Welcome, <?=$_SESSION['name']?> </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off me-1 ms-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="ps-4 p-10">
                                    <a href="MyProfile.php"
                                        class="btn btn-sm btn-success btn-rounded text-white">View Profile</a>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <?php
                            if($_SESSION['username']=="dev@admin"){
                                ?>
                                <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-account me-1 ms-1"></i><span
                                    class="hide-menu">Admin
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <?php
                                    if($count < 1){
                                        ?>
                                <li class="sidebar-item">
                                    <a href="addAdmin.php" class="sidebar-link">
                                        <i class="mdi mdi-account-plus"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                <li class="sidebar-item">
                                    <a href="adminView.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span
                                            class="hide-menu"> View </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-stethoscope"></i><span
                                    class="hide-menu">Doctor</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="doctorAdd.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="doctorView.php" class="sidebar-link">
                                        <i class="mdi mdi-eye"></i>
                                        <span class="hide-menu"> View </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-hospital-building"></i><span
                                    class="hide-menu">Hospital</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="hospitalAdd.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="hospitalView.php" class="sidebar-link"><i class="mdi mdi-eye"></i><span
                                            class="hide-menu"> View </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="me-2 mdi mdi-google-maps"></i><span
                                    class="hide-menu">State</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="StateAddView.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="me-2 mdi mdi-city"></i><span
                                    class="hide-menu">City</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="CityAddView.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="me-2 mdi mdi-medical-bag"></i><span
                                    class="hide-menu">Surgery</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="SurgeryAddView.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="me-2 mdi mdi-pharmacy"></i><span
                                    class="hide-menu">Services</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="ServicesAddView.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="me-2 mdi mdi-pharmacy"></i><span
                                    class="hide-menu">Disease</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="DiseaseAddView.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="me-2 mdi mdi-pharmacy"></i><span
                                    class="hide-menu">Specilization</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="SpecilizationAddView.php" class="sidebar-link">
                                        <i class="mdi mdi-hospital"></i>
                                        <span class="hide-menu"> Add </span>
                                    </a>
                                </li>
                            </ul>
                        </li>  
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="mdi mdi-stethoscope"></i><span
                                    class="hide-menu">All Bookings</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="BookingView.php" class="sidebar-link">
                                        <i class="mdi mdi-eye"></i>
                                        <span class="hide-menu"> View </span>
                                    </a>
                                </li>
                            </ul>
                        </li>                     
                        <!-- <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="helpDesk.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Help Desk</span></a>
                            </li>
                        </li> -->
                                <?php
                            }else{
                                ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="DoctorAppointment.php"
                                aria-expanded="false"><i class="me-2 mdi mdi-medical-bag"></i><span
                                    class="hide-menu">Appointments</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="DoctorSurgery.php"
                                aria-expanded="false"><i class="me-2 mdi mdi-medical-bag"></i><span
                                    class="hide-menu">Surgeries</span></a>
                        </li>
                                <?php
                            }
                        ?>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">