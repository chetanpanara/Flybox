<?php 

include('C:\xampp\htdocs\flybox\Flybox\dbconnection.php');
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
<?php 
        include "navbarforall.php";
    ?>
    <section id="addbranch">
        <div class="container">
            <div class="title">
                <h2>Home</h2>
            </div>
            <div class="add-box home mt-0 mb-0 d-flex">
                <h2>Welcome
                    <h3><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?>.!</h3>
                </h2>
            </div>
    </section>
<?php
        include "footers.php";
?>