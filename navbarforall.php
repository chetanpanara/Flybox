<?php
    include "dbconnection.php";
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/fonts/Lufga/Lufga-Regular.otf">
    <link rel="stylesheet" href="./assets/fonts/Oxanium/Oxanium-Regular.ttf">    
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/js/main.js"></script>
    <script src="./assets/js/jquery.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>   
    <link rel="stylesheet" href="./assets/css/mycss.css">    
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <title>Navabar</title>
</head>
<body>

<!------------- Customer navbar -------------------->
    <?php
        if(isset($_SESSION[customer_id]))
        {
    ?>

    <section class="header">
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand " href="#">
                <img src="./assets/img/logo.svg" width="40px" alt=""> Flybox Courier
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span><img src="./assets/img/bars.svg"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cdashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courier
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="courier.php">Add Courier</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trackparcel.php">Track Courier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricelist.php">Pricelist</a>
                    </li>
                    <li class="nav-item dropdown drop dropleft">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="./assets/img/Admin Logo.svg" height="25px" alt="">
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="Admin-name">Customer</li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="manageaccountcustomer.php">Manage Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <?php } ?>

<!------------------ Branch navbar ----------------->
<?php
        if(isset($_SESSION[branch_id]))
        {
?>

    <section class="header">
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand " href="#">
                <img src="./assets/img/logo.svg" width="40px" alt=""> Flybox Courier
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span><img src="./assets/img/bars.svg"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Staff
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="staff.php">Add Staff</a></li>
                                <li><a class="dropdown-item" href="listofstaff.php">List Of Staff</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courier
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="courier.php">Add Courier</a></li>
                                <li><a class="dropdown-item" href="listofcourier.php">List Of Courier</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trackparcel.php">Track Courier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricelist.php">Pricelist</a>
                    </li>
                    <li class="nav-item dropdown drop dropleft">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="./assets/img/Admin Logo.svg" height="25px" alt="">
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="Admin-name">Branch</li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="manageaccbranch.php">Manage Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
<?php } ?>

<!------------- Staff navbar ---------------->
<?php
        if(isset($_SESSION[staff_id]))
        {
?>

<section class="header">
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand " href="#">
                <img src="./assets/img/logo.svg" width="40px" alt=""> Flybox Courier
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span><img src="./assets/img/bars.svg"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cdashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courier
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="courier.php">Add Courier</a></li>
                                <li><a class="dropdown-item" href="listofcourier.php">List Of Courier</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trackparcel.php">Track Courier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricelist.php">Pricelist</a>
                    </li>
                    <li class="nav-item dropdown drop dropleft">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="./assets/img/Admin Logo.svg" height="25px" alt="">
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="Admin-name">Staff</li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="manageaccstaff.php">Manage Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
<?php } ?>
<!------------- Admin navbar ---------------->
<?php
        if(isset($_SESSION[admin_id]))
        {
?>

<section class="header">
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand " href="#">
                <img src="./assets/img/logo.svg" width="40px" alt=""> Flybox Courier
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span><img src="./assets/img/bars.svg"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Branch
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="branch.php">Add Branch</a></li>
                                <li><a class="dropdown-item" href="listofbranch.php">List Of Branch</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Staff
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="staff.php">Add Staff</a></li>
                                <li><a class="dropdown-item" href="listofstaff.php">List Of Staff</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Courier
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="courier.php">Add Courier</a></li>
                                <li><a class="dropdown-item" href="listofcourier.php">List Of Courier</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trackparcel.php">Track Courier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php">Payment</a>
                    </li>
                    <li class="nav-item dropdown drop dropleft">
                        <a class="nav-link " href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pricelist
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="courierprice.php">Add Courierprice</a></li>
                                <li><a class="dropdown-item" href="pricelist.php">List Of Courierprice</a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown drop dropleft">
                        <a class="nav-link " href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="./assets/img/Admin Logo.svg" height="25px" alt="">
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="Admin-name">Admin</li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="manageaccadmin.php">Manage Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
<?php } ?>

