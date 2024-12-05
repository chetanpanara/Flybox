<?php
    include "dbconnection.php";
    error_reporting(0);
    session_start();
if (isset($_GET['deleteid'])) 
{
    $dqry=$conn->query("DELETE FROM staff WHERE staff_id=$_GET[deleteid]");
    if(mysqli_affected_rows($conn)==1)
    {
        echo "<script>alert('Staff delete successfully');</script>";
    }     
}
if(isset($_POST['addnew']))
{
    echo "<script>window.location='staff.php';</script>";         
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
    <link rel="stylesheet" href="./assets\fonts\fontawesome\fontawesome.css>
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
                <h2>List Of Staff</h2>
            </div>
            <div class="add-box container p-5">
                <button type="submit" name="addnew" class="btn-addnew mb-4">+Add New</button>
                <div class="table-responsive">
                    <table class="table table-bordered mt-5 mb-3 mr-0" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Staff id</th>
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                $query="SELECT * from staff";
                                $result=mysqli_query($conn,$query);
                                $rows=mysqli_num_rows($result);
                                while ($res=mysqli_fetch_assoc($result)) 
                                { 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $res['staff_id']; ?></td>
                                <td><?php echo $res['firstname']; ?></td>
                                <td><?php echo $res['lastname']; ?></td>
<?php
    $qry = $conn->query("SELECT * FROM staff where staff_id='$res[staff_id]'")->fetch_array();
    foreach($qry as $k => $v)
    {
        $$k=$v;
    }
    if($branch_id > 0)
    {
        $branch_id= $branch_id  > 0 ? $branch_id  : '-1';

        $branch = array();

        $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state) as address FROM branch where branch_id in ($branch_id)");
        while($row = $branches->fetch_assoc()):
            $branch[$row['branch_id']] = $row['address'];
        endwhile;
    }
?>
                                <td><?php echo $branch[$branch_id]; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td>
                                    <div class="button">
                                        <button type="submit" class="btn-edit mr-1 p-1"><a href="staff.php?editid=<?php echo $res['staff_id'] ?>"><img src="./assets/img/edit.svg" alt=""></a></button>
                                        <button type="submit" class="btn-delete p-1"><a href="listofstaff.php?deleteid=<?php echo $res['staff_id']; ?>"><img src="./assets/img/delete.svg" alt=""></a></button>
                                    </div>
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

