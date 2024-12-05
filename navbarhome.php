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

    <title>Navabar</title>
</head>

<body>

    <section class="header">
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand " href="#">
                <img src="./assets/img/logo.svg" width="40px" alt=""> Flybox Courier
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span>
                    <img height="20px" width="20px" src="./assets/img/bars.svg" alt="">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown drop dropleft ">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sign In
                        </a>
                        <ul>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="adminsignin.php">Admin</a></li>
                                <li><a class="dropdown-item" href="branchsignin.php">Branch</a></li>
                                <li><a class="dropdown-item" href="staffsignin.php">Staff</a></li>
                                <li><a class="dropdown-item" href="customersignin.php">Customer</a></li>
                            </div>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </section>

</body>

</html>