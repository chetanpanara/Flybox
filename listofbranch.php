<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
if (isset($_GET['deleteid'])) 
{
    $dqry=$conn->query("DELETE FROM branch WHERE branch_id=$_GET[deleteid]");
    if(mysqli_affected_rows($conn)==1)
    {
        echo "<script>alert('Branch delete successfully');</script>";
    }     
}
if(isset($_POST['addnew']))
{
    echo "<script>window.location='branch.php';</script>";         
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
    <title>List of Branch | Flybox Courier</title>
</head>

<body>
<?php
    include "navbarforall.php";
?>

    <form method="post" name="frmnewbranch" onSubmit="return validateform()">
    <section id="list">
        <div class="container">
            <div class="title">
                <h2>List Of Branch</h2>
            </div>
            <div class="add-box container p-5">
                <button type="submit" name="addnew" class="btn-addnew mb-4">+Add New</button>
                <div class="table-responsive">
                    <table class="table table-bordered mt-5 mb-3 mr-0" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Branch Id</th>
                                <th scope="col">Street/Building</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Pincode</th>
                                
                                <th scope="col">Contact</th>
                                
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $query="SELECT * from branch";
                            $result=mysqli_query($conn,$query);
                            $rows=mysqli_num_rows($result);
                            while ($res=mysqli_fetch_assoc($result)) 
                            {      
                        ?>
                
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $res['branch_id'] ?></td>
                                <td><?php echo $res['street'] ?></td>
                                <td><?php echo $res['city'] ?></td>
                                <td><?php echo $res['state'] ?></td>
                                <td><?php echo $res['pincode'] ?></td>
                                <td><?php echo $res['contact'] ?></td>
                                <?php
                                    $enc=$res['branch_id'];
                                    $link="branch.php?editid=".urlencode(base64_encode($enc));
                                ?>
                                <td>
                                    <button type="submit" class="btn-edit mr-1 p-1"><a href="<?php echo $link; ?>"><img src="./assets/img/edit.svg" alt=""></a></button>
                                    <button type="submit" class="btn-delete p-1"><a href="listofbranch.php?deleteid=<?php echo $res['branch_id']; ?>"><img src="./assets/img/delete.svg" alt=""></a></button> 
                                </td>
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

