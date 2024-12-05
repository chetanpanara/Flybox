<?php
   include 'dbconnection.php';
   error_reporting(0);
   session_start();

   if(isset($_POST['submit']))
   {
    if ($_POST['password'] == $_POST['cpassword'])
    {
        $sql = "SELECT * FROM customer WHERE email='$_POST[email]'";
        $result = mysqli_query($conn, $sql);

        if (!$result->num_rows > 0) 
        {
            $qry=$conn->query("INSERT INTO customer(firstname,lastname,email,password) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[password]')");

                if ($qry) 
                {
                    header('location:customersignin.php');
                } 
                else 
                {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
        }
        else
        {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } 
    else 
    {
        echo "<script>alert('Password Not Matched.')</script>";
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
    <script src="./assets/js/jquery.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>   
    <link rel="stylesheet" href="./assets/css/mycss.css">    
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <title>Register | Flybox Courier</title>
</head>

<body style="background-color: #fce9c0;">

    <?php
        include "homeheader.php";
    ?>

    <section id="signin" class="d-flex align-content-center mt-md-5 mt-3">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <h2>Flybox Courier</h2>
                    <h3>we beliver, we deliver</h3>
                </div>
                <form name="frmuserreg" action="" method="post" class="py-5 px-4" onSubmit="return validateform()">
                    <h3 class="fw-bold mb-4">Sign In to Flybox Courier</h3>
                    <div class="form mb-3">
                        <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $_POST['firstname']; ?>" placeholder="First Name">
                    </div>
                    <div class="form mb-3">
                        <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $_POST['lastname']; ?>" placeholder="last Name">
                    </div>
                    <div class="form mb-3">
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $_POST['email']; ?>" placeholder="Email address">
                    </div>
                    <div class="form mb-3">
                        <input type="password" name="password" class="form-control" id="Password" value="<?php echo $_POST['password']; ?>" placeholder="Password">
                    </div>
                    <div class="form">
                        <input type="password" name="cpassword" class="form-control" value="<?php echo $_POST['cpassword']; ?>" id="ConfirmPassword" placeholder="Confirm Password">
                    </div>

                    <button type="submit" name="submit" class="btn-submit w-100 my-4">Sign Up</button>
                    <h4 class="text-center mb-3">Already have an account?
                        <a href="customersignin.php" class="text-decoration-none "> Sign In Now</a>
                    </h4>

                </form>
            </div>
        </div>
    </section>
    
    <?php
        include "footers.php";
    ?>

<script type="application/javascript">

    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
    var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

    function validateform()
    {
        if(document.frmuserreg.firstname.value == "")
        {
            alert("First name should not be empty.!");
            document.frmuserreg.firstname.focus();
            return false;
        }
        else if(!document.frmuserreg.firstname.value.match(alphaExp))
        {
            alert("Name should be in character.!");
            document.frmuserreg.firstname.focus();
            return false;
        }
        else if(document.frmuserreg.lastname.value == "")
        {
            alert("Last name should not be empty.!");
            document.frmuserreg.lastname.focus();
            return false;
        }
        else if(!document.frmuserreg.lastname.value.match(alphaExp))
        {
           alert("Name should be in character.!");
            document.frmuserreg.lastname.focus();
            return false;
        }
        else if(document.frmuserreg.email.value == "")
        {
            alert("Email address should not be empty.!");
            document.frmuserreg.email.focus();
            return false;
        }
        else if(!document.frmuserreg.email.value.match(emailExp))
        {
            alert("Email invalid.!");
            document.frmuserreg.email.focus();
            return false;
        }
        else if(document.frmuserreg.password.value == "")
        {
            alert("Password should not be empty.!");
            document.frmuserreg.password.focus();
            return false;
        }
        else if(document.frmuserreg.cpassword.value == "")
        {
            alert("Confirm Password should not be empty.!");
            document.frmuserreg.cpassword.focus();
            return false;
        }
        else if(document.frmuserreg.password.value.length < 8)
        {
            alert("Password length should be more than 8 characters...");
            document.frmuserreg.password.focus();
            return false;
        }
    }
</script>
