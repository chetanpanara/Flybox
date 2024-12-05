<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
if(isset($_POST['submit']))
{
    if(isset($_GET['editid']))
    {
        $uqry=$conn->query("UPDATE pricelist SET origin=$_POST[origin],destination=$_POST[destination],weight='$_POST[weight]',p_price=$_POST[pprice],d_price=$_POST[dprice] WHERE price_id=$_GET[editid]");
        if($uqry)
        {
            echo "<script>window.location='pricelist.php';</script>";
        }
        else
        {
            echo "<script>alert('Please try again..!');</script>";   
        }
    }
    else
    {
        $iqry=$conn->query("INSERT INTO pricelist (origin,destination,weight,d_price,p_price) VALUES($_POST[origin],$_POST[destination],'$_POST[weight]',$_POST[pprice],$_POST[dprice])");
        if($iqry)
        {
            echo "<script>alert('New price add successfully..!');</script>";
        }
        else
        {
            echo "<script>alert('Please try again..!');</script>";
        }
    }
}
if(isset($_GET['editid']))
{
    $qry = $conn->query("SELECT * FROM pricelist WHERE price_id=$_GET[editid]")->fetch_array();
    foreach($qry as $k => $v)
    {
        $$k=$v;
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
    <title>Add Price Of Courier | Flybox Courier</title>
</head>
<body style="background-color: #fce9c0;">
<?php
    include "navbarforall.php";
?>
    <section id="addbranch">
    <form method="post" name="frmaddprice" onSubmit="return validateform()">
        <div class="container">
            <div class="title">
                <h2>Price Of Courier</h2>
            </div>
            <div class="add-box container p-5">
                <div class="row">
                    <div class="col-sm-6 form-group ">
                        <label for="" class="control-label">Origin</label>
                        <select name="origin" id="" class="form-control input-sm select2">
                            <option>Please select origin</option>
                             <?php 
                                $branch= $conn->query("SELECT *,concat(street,' ,',city) as address FROM branch");
                                while($rows = $branch->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $rows['branch_id'];?>"><?php echo $rows['city'];?></option>
                        <?php } ?>
                          
                        </select>
                    </div>
                        <div class="col-sm-6 form-group ">
                        <label for="" class="control-label">Destination</label>
                        <select name="destination" id="" class="form-control input-sm select2">
                            <option>Please select destination</option>
                             <?php 
                                $branch= $conn->query("SELECT *,concat(street,' ,',city) as address FROM branch");
                                while($rows = $branch->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $rows['branch_id'];?>"><?php echo $rows['city'];?></option>
                        <?php } ?>
                          
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Weight</label>
                            <input type="text" name="weight" value="<?php echo $weight; ?>" class="form-control" id="Weight" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Parcel Price</label>
                            <input type="text" name="pprice" value="<?php echo $p_price; ?>" class="form-control" id="Parcel" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-outline mb-4">
                            <label class="form-label">Document Price</label>
                            <input type="text" name="dprice" value="<?php echo $d_price; ?>" class="form-control" id="document" />
                        </div>
                    </div>
                </div>
                <div class="button mt-md-4 " align=center>
                    <button type="submit" name="submit" class="btn-submit">Submit</button>
                    <button type="cancel" class="btn-cancel">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    </section>
    <?php
        include "footers.php";
    ?>
