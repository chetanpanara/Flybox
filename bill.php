<?php
   include "dbconnection.php";
   session_start();
   error_reporting(0); 
   $no=$_GET['no'];

$qry = $conn->query("SELECT * FROM courier WHERE track_no=$no")->fetch_array();
foreach($qry as $k => $v)
{
    $$k=$v;
}
$sqry=$conn->query("SELECT * FROM bill where origin in($from_branch)")->fetch_array();
if($to_branch > 0 || $from_branch > 0)
{
    $to_branch = $to_branch  > 0 ? $to_branch  : '-1';
    $from_branch = $from_branch  > 0 ? $from_branch  : '-1';
    $branch = array();

    $branches = $conn->query("SELECT * FROM branch where branch_id in ($to_branch,$from_branch)");
    while($row = $branches->fetch_assoc()):
        $branch[$row['branch_id']] = $row['city'];
    endwhile;
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
    <title>Cash Invoice | Flybox Courier</title>
</head>
<body>
    <section id="bill">
        <form method="post" action="">
        <div class="container">
            <div class="title">
                <h2>Bill Receipt</h2>
            </div>
            <div class="add-box container p-5">

                <div class="table-responsive ">
                    <table class="table table-bordered ">
                        <tbody>
                            <tr class="t1">
                                <td colspan="4">
                                    <img src="./assets/img/logo.svg" height="80px" width="80px" alt="">
                                    <b>Flybox Courier</b>
                                    <h4 class="float-right">CASH RECEIPT <br><b>BILL NO :<?php echo "  ".$sqry['bill_no'];?></b> </h4><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold" colspan="4">BRANCH:<?php echo "  ".$branch[$from_branch]; ?> </td>
                            </tr>
                            <tr class="text-center t2 bold">
                                <td>DATE</td>
                                <td>ORIGIN</td>
                                <td>DESTINATION</td>
                                <td>TRACKING NUMBER</td>
                            </tr>
                            <tr class="text-center">
                                <td><?php echo $created_date;?></td>
                                <td><?php echo $branch[$from_branch]; ?></td>
                                <td><?php echo $branch[$to_branch]; ?></td>
                                <td><?php echo $track_no;?></td>
                            </tr>
                            <tr class="text-center t2 bold">
                                <td colspan="2">
                                    SENDER
                                </td>
                                <td colspan="2">
                                    RECEIVER
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2"><?php echo $sender_name;?></td>
                                <td colspan="2"><?php echo $receiver_name;?></td>
                            </tr>
                            <tr class="text-center t2 bold">
                                <td>NOTE</td>
                                <td>COURIER TYPE</td>
                                <td>WEIGHT</td>
                                <td>TOTAL AMOUNT</td>
                            </tr>
                            <tr class="text-center">
                                <td></td>
                                <td>Parcel</td>
                                <td><?php echo $weight." Kg";?></td>
                                <td><?php echo $price." &#x20B9";?></td>
                            </tr>
                            <tr class="bold">
                                <td colspan="2"><i>Customer’s Sign</i></td>
                                <td colspan="2">RECIEVED BY :<?php echo "  ".$branch[$to_branch]; ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"><i>I have read all terms & conditions to all of them.</i></td>
                            </tr>
                            <tr class="text-center t1 t-footer">
                                <td colspan="4">www.flyboxcourier.com</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="button mt-md-5 " align=center>
                        <button onclick="window.print();return false;" type="submit" class="btn-cancel"><img class="mr-1" src="./assets/img/print.svg" alt="">
                            Print</button>
                        <button type="submit" name="save" class="btn-submit">Save</button>
                    </div>
        </form>
    </section>
<?php 
    include "footers.php";
?>
<?php 
    if(isset($_POST['save']))
    {
            if(isset($_SESSION[admin_id]))
            {
                echo "<script>window.location='listofcourier.php';</script>"; 
            }elseif (isset($_SESSION[branch_id])) {
                echo "<script>window.location='listofcourier.php';</script>";    
            }elseif (isset($_SESSION[staff_id])) {
                echo "<script>window.location='listofcourier.php';</script>";     
            }else{
                echo "<script>alert('Courier add successfully.');</script>";
                echo "<script>window.location='cdashboard.php';</script>"; 
            }
    }

?>