<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();

    if(isset($_POST[submit]))
    {
        $sql = "UPDATE customer SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',email='$_POST[email]',password='$_POST[password]' WHERE customer_id='$_SESSION[customer_id]'";
        $qsql= mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) == 1)
        {
            echo "<script>window.location='cdashboard.php';</script>";
        }
        else
        {
            echo "<script>alert('Something went wrong..!')</script>";
        }

        if ($result->num_rows > 0)
        {
            
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
        }
    }
    $sql = "SELECT * FROM customer WHERE customer_id='$_SESSION[customer_id]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
    <title>Manage Account | Flybox Courier</title>
</head>

<body>
<?php
    include "navbarforall.php";
?>

    <section id="addbranch">
    <form method="post" action="">
        <div class="container">
            <div class="title">
                <h2>Manage Account</h2>
            </div>
            <div class="add-box container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">First Name</label>
                            <input type="text" value="<?php echo $row['firstname'];?>" name="firstname" class="form-control" id="firstname" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" value="<?php echo $row['lastname'];?>" class="form-control" id="lastname" />

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="<?php echo $row['email'];?>" class="form-control" id="email" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4 ">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control" id="password" />
                            <label class="form-label b-lable">Leave this blank if you don’t want to change the
                                password.</label>
                        </div>
                    </div>
                </div>
                <div class="button mt-md-4 " align=center>
                    <button type="submit" name="submit" class="btn-submit">Submit</button>
                    <button type="reset" class="btn-cancel">Cancel</button>
                </div>
            </div>
    </form>
    </section>
<?php
    include "footers.php";
?>