<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();

foreach ($_GET as $key => $enc)
{
    $id=$_GET['$key']=base64_decode(urldecode($enc));
}

if(isset($_POST['submit']))
{
    if(isset($id))
    {
        $query="UPDATE branch SET street='$_POST[street]',city='$_POST[city]',state='$_POST[state]',pincode=$_POST[pincode],email='$_POST[email]',contact='$_POST[contact]',password='$_POST[password]' WHERE branch_id=$id";
        if($run=mysqli_query($conn,$query))
        {
            echo "<script>alert('Branch edit successfully.!');</script>";
            echo "<script>window.location='listofbranch.php';</script>";
        }
        else
        {
            echo "<script>alert('Please try again..!');</script>";   
        }
    }
    else
    {
        $sql =$conn->query("SELECT * FROM branch WHERE email='$_POST[email]'");
        if (!$sql->num_rows > 0) 
        {
            $iqry=$conn->query("INSERT INTO branch (street,city,state,pincode,email,contact,password) VALUES ('$_POST[street]','$_POST[city]','$_POST[state]',$_POST[pincode],'$_POST[email]','$_POST[contact]','$_POST[password]')");
            if($iqry)
            {
               echo "<script>alert('New branch add successfully');</script>";
                if (isset($_SESSION['admin_id']))
                {
                    echo "<script>window.location='listofbranch.php';</script>";
                }
            }
            else
            {
                echo "<script>alert('Please try again..!');</script>";
            }
        }
        else
        {
            echo "<script>alert('Email Already Exists..!')</script>";
        }
    }  
}
if (isset($id)) 
{
    $sqry=$conn->query("SELECT * FROM branch WHERE branch_id=$id");
    $row=mysqli_fetch_assoc($sqry);   
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
    <title>Add New Branch | Flybox Courier</title>
</head>
<body>
    <?php 
        include "navbarforall.php";
    ?>
    <section id="addbranch">
    <form method="post" name="frmnewbranch" onSubmit="return validateform()">
        <div class="container">
            <div class="title">
                <h2>Branch</h2>
            </div>
            <div class="add-box container p-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Street/Building</label>
                            <input type="text" name="street" class="form-control" id="street" value="<?php echo $row['street']; ?>" />

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="<?php echo $row['city']; ?>"/>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control" id="state" value="<?php echo $row['state']; ?>"/>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo $row['pincode']; ?>"/>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email']; ?>"/>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" id="contac" value="<?php echo $row['contact']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['password']; ?>"/>
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
<script type="application/javascript">

    var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
    var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
    var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
    var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

    function validateform()
    {
        if(document.frmnewbranch.street.value == "")
        {
            alert("Street should not be empty..!");
            document.frmnewbranch.street.focus();
            return false;
        }
        else if(document.frmnewbranch.city.value == "")
        {
            alert("City should not be empty.!");
            document.frmnewbranch.city.focus();
            return false;
        }
        else if(document.frmnewbranch.state.value == "")
        {
            alert("State should not be empty.!");
            document.frmnewbranch.state.focus();
            return false;
        }
        else if(document.frmnewbranch.pincode.value == "")
        {
            alert("Pincode should not be empty.!");
            document.frmnewbranch.pincode.focus();
            return false;
        }
        else if(!document.frmnewbranch.pincode.value.match(numericExpression))
        {
            alert("Enter correct pincode.!");
            document.frmnewbranch.pincode.focus();
            return false;
        }
        else if(document.frmnewbranch.email.value == "")
        {
            alert("Email should not be empty.!");
            document.frmnewbranch.email.focus();
            return false;
        }
        else if(!document.frmnewbranch.email.value.match(emailExp))
        {
            alert("Email invalid.!");
            document.frmnewbranch.email.focus();
            return false;
        }
        else if(document.frmnewbranch.password.value == "")
        {
            alert("Password should not be empty.!");
            document.frmnewbranch.password.focus();
            return false;
        }
        else if(document.frmnewbranch.contact.value == "")
        {
            alert("contact should not be empty.!");
            document.frmnewbranch.contact.focus();
            return false;
        }
        else if(!document.frmnewbranch.contact.value.match(numericExpression))
        {
            alert("Enter correct contact.!");
            document.frmnewbranch.contact.focus();
            return false;
        }
        else if(document.frmnewbranch.password.value.length < 8)
        {
            alert("Password length should be more than 8 characters...");
            document.frmnewbranch.password.focus();
            return false;
        }
        else{
            return true;
        }
    }
</script>