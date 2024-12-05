<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
if (isset($_GET['deleteid'])) 
{
    $dqry=$conn->query("DELETE FROM pricelist WHERE price_id=$_GET[deleteid]");
    if(mysqli_affected_rows($conn)==1)
    {
        echo "<script>alert('Price delete successfully');</script>";
    }     
}
if(isset($_POST['addnew']))
{
    echo "<script>window.location='courierprice.php';</script>";         
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
    <title>List of Staff | Flybox Courier</title>
</head>

<body>
<?php
    include "navbarforall.php";
?>
   <form method="post" name="frmnewbranch" onSubmit="return validateform()">
    <section id="list">
        <div class="container">
            <div class="title">
                <h2>List Of Price</h2>
            </div>
            <div class="add-box container p-5">
            <?php if(isset($_SESSION[admin_id])){ ?>
                <button type="submit" name="addnew" class="btn-addnew mb-4">+Add New</button><?php }?>
                <div class="table-responsive">
                    <table class="table table-bordered mt-5 mb-3 mr-0" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Origin</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Parcel Price</th>
                                <th scope="col">Document Price</th>
                            <?php if(isset($_SESSION[admin_id])){ ?>
                                <th scope="col">Action</th><?php }?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $i=1;
                            $qry=$conn->query("SELECT * FROM pricelist");
                            while ($res=mysqli_fetch_assoc($qry)) {
                           
                        ?>
<?php
    $cqry = $conn->query("SELECT * FROM pricelist where origin='$res[origin]'")->fetch_array();
    foreach($cqry as $k => $v)
    {
        $$k=$v;
    }
    if($origin > 0 || $destination > 0)
    {
        $origin= $origin > 0 ? $origin  : '-1';
        $destination= $destination > 0 ? $destination : '-1';
        $branch = array();

        $branches = $conn->query("SELECT *,concat(street,', ',city) as address FROM branch where branch_id in ($origin,$destination)");
        while($row = $branches->fetch_assoc()):
            $branch[$row['branch_id']] = $row['city'];
        endwhile;
    }
?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $branch[$origin]; ?></td>
                                <td><?php echo $branch[$destination];?></td>
                                <td><?php echo $res['weight']; ?></td>
                                <td><?php echo $res['d_price']; ?></td>
                                <td><?php echo $res['p_price']; ?></td>
                            <?php if(isset($_SESSION[admin_id])){ ?>
                                <td>
                                    <div class="button">
                                        <button type="submit" class="btn-edit mr-1 p-1"><a href="courierprice.php?editid=<?php echo $res['price_id'] ?>"><img src="./assets/img/edit.svg" alt=""></a></button>
                                        <button type="submit" class="btn-delete p-1"><a href="pricelist.php?deleteid=<?php echo $res['price_id']; ?>"><img src="./assets/img/delete.svg" alt=""></a></button>
                                    </div>
                                </td><?php }?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

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