<?php
    include('C:\xampp\htdocs\flybox\Flybox\dbconnection.php');
    error_reporting(0);
    $get=$_GET['track'];

    $track_no=$_POST['track'];
    if(isset($_POST['save']))
    {
        $courier = $conn->query("SELECT * FROM courier WHERE track_no = $track_no");
        if($courier->num_rows<=0)
        {
            echo "<script>alert('Track number Invalid..! ');</script>";   
        }else{
            $courier=$courier->fetch_assoc();
            $data[] = array('status'=>'Item accepted by Courier','created_date'=>date("M d, Y h:i A",strtotime($courier['created_date'])));
            $history = $conn->query("SELECT * FROM courier_track WHERE courier_id = {$courier['courier_id']}");
            $status_arr = array("Item Accepted by Courier","Collected","Shipped","In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull Delivery Attempt");
           while($row = $history->fetch_assoc()){
            $row['created_date'] = date("M d, Y h:i A",strtotime($row['created_date']));
            $row['status'] = $status_arr[$row['status']];
            $data[]=$row;
            }
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
    <title>Track Courier | Flybox Courier</title>
</head>
<body>

<?php
    include'navbarforall.php';
?>

<section id="track">
<form method="post" action="">
<div class="container">
    <div class="title">
        <h2>Track Courier</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="t-box">
                <div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
                    <label for="">Enter Tracking Number</label>
                    <div class="input-group col-sm-5">
                        <input type="search" id="ref_no" name="track" class="form-control form-control-sm" placeholder="Type the tracking number here">
                            <button type="submit" name="save" class="btn btn-sm"><img src="./assets/img/search.svg" height="18px" width="20px"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <div class="timeline  mb-5" id="parcel_history">
                <?php
                    foreach ($data as $val) {
                          foreach ($val as $value) {
                              ?>
                             <div class="t-status d-inline" height="50px">
                                    <?php echo $value;?>
                             </div>
                <?php
                          }
                          echo "<br>";
                      }  
                 ?>     
            </div>
        </div>                      
    </div>
</div>
</form>
</section>

<?php
        include "footers.php";
?>

