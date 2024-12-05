<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
foreach ($_GET as $key => $enc)
{
    $id=$_GET['$key']=base64_decode(urldecode($enc));
}
$track_no=rand(111111,999999);
$status=0;

if (isset($_POST['submit']))
{   
    if(isset($id))
    {
        $uqry="UPDATE courier SET sender_name='$_POST[sender_name]',sender_address='$_POST[sender_address]',sender_contact='$_POST[sender_contact]',receiver_name='$_POST[receiver_name]',receiver_address='$_POST[receiver_address]',receiver_contact='$_POST[receiver_contact]',from_branch=$_POST[from_branch],to_branch=$_POST[to_branch],courier_type=$_POST[courier_type],weight='$_POST[weight]',height='$_POST[height]',width='$_POST[width]',length='$_POST[length]',price='$_POST[price]' WHERE courier_id=$id";
        if($rqry=mysqli_query($conn,$uqry))
        {
            echo "<script>alert('Courier edit successfully.!');</script>";
            echo "<script>window.location='listofcourier.php';</script>";
        }
        else
        {
            echo "<script>alert('Please try again..!');</script>";
        }
    }
    else
    {        
        $qry=$conn->query("INSERT INTO courier(sender_name,sender_address,sender_contact,receiver_name,receiver_address,receiver_contact,from_branch,to_branch,courier_type,weight,height,length,width,price,track_no,status) VALUES ('$_POST[sender_name]','$_POST[sender_address]','$_POST[sender_contact]','$_POST[receiver_name]','$_POST[receiver_address]','$_POST[receiver_contact]',$_POST[from_branch],$_POST[to_branch],$_POST[courier_type],'$_POST[weight]','$_POST[height]','$_POST[length]','$_POST[width]','$_POST[price]',$track_no,$status)");

        $binsert=$conn->query("INSERT INTO bill (sender_name,origin,courier_price,destination) VALUES('$_POST[sender_name]',$_POST[from_branch],'$_POST[price]',$_POST[to_branch])");
        if(!$binsert)
        {
            echo "<script>alert('Please try again..!');</script>";
        }

        if($qry)
        {
            echo "<script>alert('Courier add successfully.!');</script>";
            echo "<script>window.location='bill.php?no=$track_no';</script>";  
        }
        else
        {
            echo "<script>alert('Please try again..!');</script>";
        }
    }
}
if (isset($id)) 
{
    $sqry=$conn->query("SELECT * FROM courier WHERE courier_id=$id");
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
    <title>Add New Courier | Flybox Courier</title>
</head>

<body">
    <?php
        include "navbarforall.php";
    ?>

    <section id="addbranch">
    <form method="post" name="frmnewcourier" onSubmit="return validateform()">
        <div class="container">
            <div class="title">
                <h2>Courier</h2>
            </div>
            <div id="addcourier" class="add-box container p-5">
                <div class="row d-flex">
                    <div class="col">
                        <div class="title">
                            <h2>Sender Information</h2>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Name</label>
                            <input type="text" name="sender_name" class="form-control" id="Name" value="<?php echo $row['sender_name']; ?>"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Address</label>
                            <input type="text" name="sender_address" class="form-control" id="Address" value="<?php echo $row['sender_address']; ?>"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Contact</label>
                            <input type="text" name="sender_contact" class="form-control" id="Contact" value="<?php echo $row['sender_contact']; ?>"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title">
                            <h2>Receiver Information</h2>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Name</label>
                            <input type="text" name="receiver_name" class="form-control" id="Name" value="<?php echo $row['receiver_name']; ?>"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Address</label>
                            <input type="text" name="receiver_address" class="form-control" id="Address" value="<?php echo $row['receiver_address']; ?>"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Contact</label>
                            <input type="text" name="receiver_contact" class="form-control" id="Contact" value="<?php echo $row['receiver_contact']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-sm-6 form-group ">
                        <label for="" class="control-label">Branch Processed</label>
                        <select name="from_branch" id="" class="form-control input-sm select2">
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
                    <div class="col-sm-6 form-group ">
                        <label for="" class="control-label">Pickup Branch</label>
                        <select name="to_branch" id="" class="form-control input-sm select2">
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
                </div>
                <div class="row d-flex">
                    <div class="container ">
                        <div class="title">
                            <h2>Courier Information</h2>
                        </div>
                        <div class="row d-flex">
                            <div class="col-sm-2 form-group ">
                                <label for="" class="control-label">Type</label>
                                <select name="courier_type" id="" class="form-control input-sm">
                                    <option value="1">Parcel</option>
                                    <option value="2">Document</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Weight</label>
                                    <input type="text" name="weight" class="form-control" id="Weight" value="<?php echo $row['weight']; ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Height</label>
                                    <input type="text" name="height" class="form-control" id="Height" value="<?php echo $row['height']; ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Length</label>
                                    <input type="text" name="length" class="form-control" id="Length" value="<?php echo $row['length']; ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Width</label>
                                    <input type="text" name="width" class="form-control" id="Width" value="<?php echo $row['width']; ?>"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="Price" value="<?php echo $row['price']; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button mt-md-4 " align=center>
                    <button type="submit" name="submit" class="btn-submit">Submit</button>
                    <button type="reset" class="btn-cancel">Cancel</button>
                </div>
            </div>
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
        if(document.frmnewcourier.sender_name.value == "")
        {
            alert("Sender name should not be empty..!");
            document.frmnewcourier.sender_name.focus();
            return false;
        }
        else if(!document.frmnewcourier.sender_name.value.match(alphaspaceExp))
        {
            alert("Sender name should be character..!");
            document.frmnewcourier.sender_name.focus();
            return false;
        }
        else if(document.frmnewcourier.sender_address.value == "")
        {
            alert("Sender address should not be empty.!");
            document.frmnewcourier.sender_address.focus();
            return false;
        }
        else if(document.frmnewcourier.sender_contact.value == "")
        {
            alert("Sender contact should not be empty.!");
            document.frmnewcourier.sender_contact.focus();
            return false;
        }
        else if(!document.frmnewcourier.sender_contact.value.match(numericExpression))
        {
            alert("Sender contact in numeric.!");
            document.frmnewcourier.sender_contact.focus();
            return false;
        }
        else if(document.frmnewcourier.receiver_name.value == "")
        {
            alert("Sender name should not be empty..!");
            document.frmnewcourier.receiver_name.focus();
            return false;
        }
        else if(!document.frmnewcourier.receiver_name.value.match(alphaspaceExp))
        {
            alert("Receiver name should be character..!");
            document.frmnewcourier.receiver_name.focus();
            return false;
        }
        else if(document.frmnewcourier.receiver_address.value == "")
        {
            alert("Sender address should not be empty.!");
            document.frmnewcourier.receiver_address.focus();
            return false;
        }
        else if(document.frmnewcourier.receiver_contact.value == "")
        {
            alert("Sender contact should not be empty.!");
            document.frmnewcourier.receiver_contact.focus();
            return false;
        }
        else if(!document.frmnewcourier.receiver_contact.value.match(numericExpression))
        {
            alert("Sender contact in numeric.!");
            document.frmnewcourier.receiver_contact.focus();
            return false;
        }
        else if(document.frmnewcourier.from_branch.value == "Please select branch")
        {
            alert("Please select branch..!");
            document.frmnewcourier.from_branch.focus();
            return false;
        }
        else if(document.frmnewcourier.to_branch.value == "Please select branch")
        {
            alert("Please select branch..!");
            document.frmnewcourier.to_branch.focus();
            return false;
        }
        else if(document.frmnewcourier.weight.value == "")
        {
            alert("Please select branch..!");
            document.frmnewcourier.weight.focus();
            return false;
        }else if(document.frmnewcourier.height.value == "")
        {
            alert("Please select branch..!");
            document.frmnewcourier.height.focus();
            return false;
        }
        else if(document.frmnewcourier.length.value == "")
        {
            alert("Please select branch..!");
            document.frmnewcourier.length.focus();
            return false;
        }
        else if(document.frmnewcourier.width.value == "")
        {
            alert("Please select branch..!");
            document.frmnewcourier.width.focus();
            return false;
        }
       
    }
</script>