<?php 
    error_reporting(0);
    session_start();
    include "dbconnection.php";
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
    <script src="./assets/js/jquery.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>   
    <link rel="stylesheet" href="./assets/css/mycss.css">    
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <title>Successful | Flybox Courier</title>
</head>

<body>
    <section id="signin" class="d-flex align-content-center mt-md-5 mt-3">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <h2>Flybox Courier</h2>
                    <h3>we beliver, we deliver</h3>
                </div> 
                <form class="py-5 px-4" method="post">
                    <h3 class="fw-bold mb-4">Successful</h3>

                    <div class="form mb-2">
                        <img src="./img/Successful Icon.svg" alt="">
                    </div>
                    <div class="form">
                        <p>Your password changed. Now you can login with your new password.</p>
                    </div>

                    <input type="submit" name="submit" class="btn-submit w-100 my-4" value="Login Now">

                </form>
            </div>
        </div>
    </section>
</body>


<?php

    if(isset($_POST['submit']))
    {
        echo "<script>window.location='customersignin.php';</script>";
    }
?>
