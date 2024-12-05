<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
    $id=$_GET['editid'];
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
    <title>Update Status | Flybox Courier</title>
</head>
<body>
    <?php 
        include "navbarforall.php";
    ?>
    <section id="updatestatus">
    <form method="post" action="">
        <div class="container">
            <div class="title">
                <h2>Update Status</h2>
            </div>
            <div class="add-box container p-5">
                <div>
                    <div class="mb-4">
                        <h4><b>Update Status of :</b><?php echo $id;?></h4>
                    </div>
                    <div class="mb-5">
                        <label for="">Update Status</label>
                        <select name="status" id="" class="custom-select custom-select-sm">
                            <option value="1">Collected</option>
                            <option value="2">Shipped</option>
                            <option value="3">In-Transit</option>
                            <option value="4">Arrived At Destination</option>
                            <option value="5">Out for Delivery</option>
                            <option value="6">Ready to Pickup</option>
                            <option value="7">Delivered</option>
                            <option value="8">Picked-up</option>
                            <option value="9">Delivery Failed</option>
                        </select>
                    </div>
                    <div>
                        <div class="button mt-md-4 " align=center>
                            <button type="submit" name="submit" class="btn-submit">Submit</button>
                            <button type="reset" class="btn-cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    </section>

    <?php
        include "footers.php";
    ?>



<?php

    if(isset($_POST['submit']))
    {
        $status=$_POST['status'];
        $select=$conn->query("SELECT * FROM courier WHERE track_no=$id")->fetch_assoc();
        $uqry=$conn->query("UPDATE courier SET status='$_POST[status]' WHERE track_no=$id");
        $insert=$conn->query("INSERT INTO courier_track(courier_id,status)values($select[courier_id],$status)");
        if($uqry)
        {    
            echo "<script>window.location='viewcourier.php?editid=$id';</script>";
        }
        else
        {
            echo "<script>alert('Status not update.');</script>";
        }
    }
?>