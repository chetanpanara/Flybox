<?php
   
include 'dbconnection.php';
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
    
    if ($result->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['customer_id'] = $row['customer_id'];
        header("Location: cdashboard.php");
           
    }else{
        echo "<script>alert('Email or Password wrong.!');</script>";
    }
}
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
    <title>Sign In | Flybox Courier</title>
</head>

<body>
    <section id="signin" class="d-flex align-content-center mt-5">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <h2>Flybox Courier</h2>
                    <h3>we beliver, we deliver</h3>
                </div>
                <form name="frmusersign" action="" method="post" class="py-5 px-4">
                    <h3 class="fw-bold mb-4">Sign In to Flybox Courier</h3>

                    <div class="form mb-3">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email address">
                    </div>
                    <div class="form">
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                    </div>
                    <h4 class="fpass mt-2 text-end">
                        <a href="forgetpassword.php" class="text-decoration-none">Forget Password?</a>
                    </h4>
                    <button type="submit" name="submit" class="btn-submit w-100 my-4">Sign In</button>
                    <h4 class="text-center">New to Flybox?
                        <a href="userregister.php" class="text-decoration-none "> Sign Up Now</a>
                    </h4>
                </form>
            </div>
        </div>
    </section>
<?php
        include "footers.php";
?>
<!--  <div id="preloader"></div> -->

 <!--Main JS File -->
    <script src="assets/js/main.js"></script>