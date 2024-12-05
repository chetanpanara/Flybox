<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
$id=$_GET['editid'];
$qry = $conn->query("SELECT * FROM courier WHERE track_no=$id")->fetch_array();
foreach($qry as $k => $v)
{
    $$k=$v;
}
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
if(isset($_POST['close']))
{
    echo "<script>window.location='listofcourier.php';</script>";
}
?>

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
    <title>View Courier | Flybox Courier</title>
</head>
<body>
    <?php 
        include "navbarforall.php";
    ?>
    <section id="parceldetail">
    <form action="" method="post">
        <div class="container">
            <div class="title">
                <h2>Courier Details</h2>
            </div>
            <div class="add-box container p-5">
                <h2 class="mt-2">Courier Detail</h2>
                <h3 class="mt-4">
                    <strong>Tracking Number: </strong><?php echo $track_no; ?>
                </h3>
            <div class="row mt-4">
                 <div class="col-md-6">

                     <b>Sender Information</b>
                    <dl>
                        <dt>Name:</dt>
                    <dd>
                        <?php echo $sender_name; ?>
                    </dd>
            <dt>Address:</dt>
            <dd>
                <?php echo $sender_address; ?>
            </dd>
            <dt>Contact:</dt>
            <dd>
                <?php echo $sender_contact; ?>
            </dd>
        </dl>
        <b>Recipient Information</b>
        <dl>
            <dt>Name:</dt>
            <dd>
                <?php echo $receiver_name; ?>
            </dd>
            <dt>Address:</dt>
            <dd>
                <?php echo $receiver_address; ?>
            </dd>
            <dt>Contact:</dt>
            <dd>
                <?php echo $receiver_contact; ?>
            </dd>
        </dl>
    </div>
    <div class="col-md-6">
        <b>Courier Details</b>
        <div class="row">
            <div class="col-sm-6">
                <dl>
                    <dt>Weight:</dt>
                    <dd>
                        <?php echo $weight; ?>
                    </dd>
                    <dt>Height:</dt>
                    <dd>
                        <?php echo $height; ?>
                    </dd>
                    <dt>Price:</dt>
                    <dd>
                        <?php echo $price; ?>
                    </dd>
                </dl>
            </div>
            <div class="col-sm-6">
                <dl>
                    <dt>Width:</dt>
                    <dd>
                        <?php echo $width; ?>
                    </dd>
                    <dt>length:</dt>
                    <dd>
                        <?php echo $length; ?>
                    </dd>
                    <dt>Type:</dt>
                    <dd>
                        <?php echo $courier_type; ?>
                    </dd>
                </dl>
            </div>
        </div>
        <dl>
            <dt>Branch Accepted the Parcel:</dt>
            <dd>
                <?php echo $branch[$from_branch]; ?>
            </dd>
            <dd>

            </dd>
            <dt>Nearest Branch to Recipient for Pickup:</dt>
            <dd>
               <?php echo $branch[$to_branch]; ?>
            </dd>
            <dt>Status:
            <dd>
                <?php 
                    switch ($status) {
                    case '1':
                        echo "<span class='badge badge-pill badge-info'> Collected</span>";
                        break;
                    case '2':
                        echo "<span class='badge badge-pill badge-info'> Shipped</span>";
                        break;
                    case '3':
                        echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
                        break;
                    case '4':
                        echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
                        break;
                    case '5':
                        echo "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
                        break;
                    case '6':
                        echo "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
                        break;
                    case '7':
                        echo "<span class='badge badge-pill badge-success'>Delivered</span>";
                        break;
                    case '8':
                        echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
                        break;
                    case '9':
                        echo "<span class='badge badge-pill badge-danger'>Delivery Failed</span>";
                        break;        
                    default:
                        echo "Item Accepted";              
                        break;
                } ?>

<!--- Change here ----->

                <a href="managestatus.php?editid=<?php echo $track_no; ?>"><img src="./assets/img/edit.svg" height="15px">Update Status</a>

            </dd>
            </dt>
        </dl>
    </div>
                </div>
                <div class="button mt-md-4 " align=center>
                    <button type="cancel" name="close" class="btn-cancel">Back</button>     
                </div>
            </div>
            
        </div>
    </form>
    </section>
<?php
    include "footers.php";
?>
<!-- <div id="preloader"></div> -->

 <!--Main JS File -->
    <script src="assets/js/main.js"></script>

