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
    <script src="./assets/js/jquery.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>   
    <link rel="stylesheet" href="./assets/css/mycss.css">    
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <title>Forget Password | Flybox Courier</title>
</head>

<body>

    <form method="post" name="frmfpassword" onsubmit="return validateform()">
    <section id="signin" class="d-flex align-content-center mt-md-5 mt-3">
        
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <h2>Flybox Courier</h2>
                    <h3>we beliver, we deliver</h3>
                </div>
                <form action="" method="post" class="py-5 px-4">
                    <h3 class="fw-bold mb-4 mt-5">Forget Password</h3>

                    <div class="form mb-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email address">
                    </div>

                    <input type="submit" name="submit" class="btn-submit w-100 my-4" value="Continue">

                </form>
            </div>
        </div>
    </section>
</form>

<?php

        if(isset($_POST['submit']))
        {
            $email =$_POST["email"];
            $_SESSION['email']=$_POST["email"];
            $query = "SELECT * from customer where email='$email'";
            $check_mail = mysqli_query($conn,$query);
            if (mysqli_num_rows($check_mail) > 0)
            {
                echo "<script>window.location='newpassword.php';</script>";
            }
            else
            {
                echo "<script>alert('Email not exist..!');</script>";
            }
        }
    
?>
<script type="application/javascript">

    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
    var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

    function validateform()
    {
       if(document.frmfpassword.email.value == "")
        {
            alert("Email address should not be empty.!");
            document.frmfpassword.email.focus();
            return false;
        }
    }
</script>

