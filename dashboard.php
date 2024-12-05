<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
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
    <title>Dashboard | Flybox Courier</title>
</head>
<body>
        <!-- <div id="preloader"></div> -->

<?php
    include "navbarforall.php";
?>
    <section id="dashboard">
        <div class="container">
            <div class="title">
                <h2>Dashboard</h2>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=0")->num_rows; ?></h3>
                            <p>Item Accepted</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/itemaccepted.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box ">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=1")->num_rows; ?>
                            </h3>
                            <p>Collected</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/collected.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=2")->num_rows; ?>
                            </h3>
                            <p>Shipped</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/shiped.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=3")->num_rows; ?></h3>
                            <p>In-Transit</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/in-transit.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box ">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=4")->num_rows; ?>
                            </h3>
                            <p>Arrieved at Destination</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/arrived.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=5")->num_rows; ?>
                            </h3>

                            <p>Out of Delivery</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/outofdelivery.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=8")->num_rows; ?></h3>
                            <p>Picked-up</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/pickedup.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box ">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=7")->num_rows; ?>
                            </h3>
                            <p>Delivered</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/delivered.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier WHERE status=9")->num_rows; ?>
                            </h3>
                            <p>Delivery Failed</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/faileddelivery.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <?php if(isset($_SESSION['admin_id'])) { ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM branch")->num_rows; ?></h3>
                            <p>Total Branches</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/totalbranch.svg" alt="">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box ">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM courier")->num_rows; ?>
                            </h3>
                            <p>Total Courier</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/totalparcel.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $conn->query("SELECT * FROM staff")->num_rows; ?>
                            </h3>
                            <p>Total Staff</p>
                        </div>
                        <div class="icon">
                            <img src="./assets/img/dashboard/totalstaff.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
        include "footers.php";
?>