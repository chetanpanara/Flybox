<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();

if (isset($_GET['deleteid'])) 
{
    $dqry=$conn->query("DELETE FROM courier WHERE courier_id=$_GET[deleteid]");
    if(mysqli_affected_rows($conn)==1)
    {
        echo "<script>alert('Courier delete successfully');</script>";
    }     
}
if(isset($_POST['addnew']))
{
    echo "<script>window.location='courier.php';</script>";         
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
    <script src="assets/js/main.js"></script>
    <script src="./assets/js/jquery.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>   
    <link rel="stylesheet" href="./assets/css/mycss.css">    
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">

    <!-- =========== DATATABLE =========== -->

    <script src="./assets/datatable/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/datatable/datatable.css">
    <script src="./assets/datatable/dataTables.min.js"></script>
    <title>List of Courier | Flybox Courier</title>

</head>

<body>
<?php
    include "navbarforall.php";
?>

    <form method="post" name="frmnewbranch" onSubmit="return validateform()">
    <section id="list">
        <div class="container">
            <div class="title">
                <h2>List Of Courier</h2>
            </div>
            <div class="add-box container p-5">
                <button type="submit" name="addnew" class="btn-addnew mb-4">+Add New</button>
                <div class="table-responsive">
                    <table class="table table-bordered mt-5 mb-3 mr-0" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Courier id</th>
                                <th scope="col">Sender Name</th>
                                <th scope="col">Reciever Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $query="SELECT * from courier";
                                $result=mysqli_query($conn,$query);
                                $rows=mysqli_num_rows($result);
                                while ($res=mysqli_fetch_assoc($result)) 
                                { 
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $res['courier_id']; ?></td>
                                <td><?php echo $res['sender_name']; ?></td>
                                <td><?php echo $res['receiver_name']; ?></td>
                                <td>
                                <?php 
                                    switch ($res['status']) {
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
									echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";
                                    break;
                                    
                                    }
                                ?>
                            </td>
                            <?php
                                $enc=$res['courier_id'];
                                $link="courier.php?editid=".urlencode(base64_encode($enc));
                            ?>
                                <td>
                                    <div class="button">
                                        <button type="submit" class="btn-view mr-1 p-1"><a href="viewcourier.php?editid=<?php echo $res['track_no']?>"><img src="./assets/img/view.svg" alt=""></a></button>
                                        <button type="submit" class="btn-edit mr-1 p-1"><a href="<?php echo $link;?>"><img src="./assets/img/edit.svg"></a></button>
                                        <button type="submit" class="btn-delete p-1"><a href="listofcourier.php?deleteid=<?php echo $res['courier_id']; ?>"><img src="./assets/img/delete.svg"></a></button>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
    </section>
    </form>
    <?php
        include "footers.php";
    ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

