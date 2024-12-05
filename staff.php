<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();

    if(isset($_POST['submit']))
    {
        if(isset($_GET['editid']))
        {
            $query="UPDATE staff SET firstname='$_POST[firstname]',lastname='$_POST[lastname]',branch_id=$_POST[branch],contact='$_POST[contact]',email='$_POST[email]',password='$_POST[password]' WHERE staff_id=$_GET[editid]";
            if($run=mysqli_query($conn,$query))
            {
                echo "<script>alert('Staff edit successfully.!');</script>";
                echo "<script>window.location='listofstaff.php';</script>";
            }
            else
            {
                echo "<script>alert('Please try again..!');</script>";   
            }
        }
        else
        {
            $sql = $conn->query("SELECT * FROM staff WHERE email='$_POST[email]'");
            if (!$sql->num_rows > 0) 
            {
                $iqry=$conn->query("INSERT INTO staff(firstname,lastname,branch_id,contact,email,password)values('$_POST[firstname]','$_POST[lastname]',$_POST[branch],'$_POST[contact]','$_POST[email]','$_POST[password]')");
                if($iqry)
                {
                    echo "<script>alert('Staff add successfully.!');</script>";
                    echo "<script>window.location='listofstaff.php';</script>";
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
if (isset($_GET['editid'])) 
{
    $sqry=$conn->query("SELECT * FROM staff WHERE staff_id=$_GET[editid]");
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
    <title>Add New Staff | Flybox Courier</title>
</head>

<body>
<?php
    include "navbarforall.php";
?>
   
    <section id="addbranch">
    <form method="post" name="frmnewstaff" onSubmit="return validateform()">
        <div class="container">
            <div class="title">
                <h2>Staff</h2>
            </div>
            <div class="add-box container p-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $row['firstname']; ?>"/>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $row['lastname']; ?>"/>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group ">
                        <label for="" class="control-label">Branch</label>
                        <select name="branch" id="" class="form-control input-sm select2">
                            <option>Please select branch</option>
                             <?php 
                                $branch= $conn->query("SELECT *,concat(street,', ',city) as address FROM branch");
                                while($rows = $branch->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $rows['branch_id'];?>"><?php echo $rows['address'];?></option>
                        <?php } ?>
                          
                        </select>
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
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email']; ?>"/>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['password']; ?>"/>

                        </div>
                    </div>

                </div>

                <div class="button mt-md-4 " align=center>
                    <button type="submit" name="submit" class="btn-submit">Submit</button>
                    <button type="cancel" class="btn-cancel">Cancel</button>
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
        if(document.frmnewstaff.firstname.value == "")
        {
            alert("First name should not be empty.!");
            document.frmnewstaff.firstname.focus();
            return false;
        }
        else if(!document.frmnewstaff.firstname.value.match(alphaExp))
        {
            alert("Name should be Character.!");
            document.frmnewstaff.firstname.focus();
            return false;
        }
        else if(document.frmnewstaff.lastname.value == "")
        {
            alert("Last name should not be empty.!");
            document.frmnewstaff.lastname.focus();
            return false;
        }
        else if(!document.frmnewstaff.lastname.value.match(alphaExp))
        {
            alert("Name should be Character.!");
            document.frmnewstaff.lastname.focus();
            return false;
        }
        else if(document.frmnewstaff.branch.value == "Please select branch")
        {
            alert("Please select branch..!");
            document.frmnewstaff.branch.focus();
            return false;
        }
        else if(document.frmnewstaff.contact.value == "")
        {
            alert("Contact should not be empty.!");
            document.frmnewstaff.contact.focus();
            return false;
        }
        else if(!document.frmnewstaff.contact.value.match(numericExpression))
        {
            alert("Contact should not be empty.!");
            document.frmnewstaff.contact.focus();
            return false;
        }
        else if(document.frmnewstaff.email.value == "")
        {
            alert("Email address should not be empty.!");
            document.frmnewstaff.email.focus();
            return false;
        }
        else if(!document.frmnewstaff.email.value.match(emailExp))
        {
            alert("Email address invalid.!");
            document.frmnewstaff.email.focus();
            return false;
        }
        else if(document.frmnewstaff.password.value == "")
        {
            alert("Password should not be empty.!");
            document.frmnewstaff.password.focus();
            return false;
        }
        else if(document.frmnewstaff.password.value.length < 8)
        {
            alert("Password length should be more than 8 characters...");
            document.frmnewstaff.password.focus();
            return false;
        }
    }
</script>