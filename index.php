
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
    <link rel="stylesheet" href="css/mycss.css">    
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <title>Flybox Courier</title>
</head>

<body >
    <div id="preloader"></div>
    <?php
        include "navbarhome.php";
    ?>

    <div class="container">
        <!-- =========== HERO SECTION =========== -->

        <section id="hero" class="d-flex align-items-center mt-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <h1>A trusted provider of<br><strong> courier services.</strong></h1><br>
                        <h2>We deliver your products safely to your home in a reasonable time.</h2>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img " data-aos="zoom-in" data-aos-delay="200">
                        <img src="./assets/img/HomeIllustration.svg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- =========== END HERO SECTION =========== -->


        <!-- =========== TRACKING SECTION =========== -->
        <section id="track-box" class="d-flex align-items-center mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-1 hero-img " data-aos="zoom-in" data-aos-delay="200">
                        <img src="./assets//img/trackillustrait.svg" class="img-fluid" alt="">

                        <h3>
                            TRACK YOUR ORDER
                        </h3>
                        <h4>
                            Just enter your tracking number and it’s done.
                        </h4>

                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="t-box">
                            <div class="container">
                            <form action="" method="post">
                                <h3>Track your courier here...</h3>
                                <div class="row">
                                    <div class="col-md-12 mb-2 mt-2">
                                        <input type="text" name="track" placeholder="Enter Your Tracking Number" class="form-control" id="document" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="btn-track" class="btn-submit w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            if(isset($_POST['btn-track']))
            {
                echo "<script>window.location='trackparcel.php?track=$_POST[track]';</script>";
            }
        ?>

        <!-- =========== SERVICES =========== -->
        <section id="services" class="services mt-5">
            <div class="container" data-aos="fade-up">

                <div class="title">
                    <h2 class="mb-1">Services</h2>
                    <h3>Check our Services</h3>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><img src="./assets//img/services/Tracking Logo.svg" alt=""></div>
                            <h4>Tracking</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><img src="./assets//img/services/Home delivery.svg" alt=""></div>
                            <h4>Home Delivery</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><img src="./assets//img/services/Support Logo.svg" alt=""></div>
                            <h4>24x7 Support</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><img src="./assets//img/services/Fast Service logo.svg" alt=""></div>
                            <h4>Fast Service</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><img src="./assets//img/services/safe logo.svg" alt=""></div>
                            <h4>Safe Delivery</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><img src="./assets//img/services/Online Payment Logo.svg" alt=""></div>
                            <h4>Online Payment</h4>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- =========== ABOUT US SECTION =========== -->

        <section id="about">
            <div class="container">
                <div class="title">
                    <h2 class="mb-1">ABOUT US</h2>
                    <h3>Our vision and mission</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            Flybox Courier Service. has come out as top Courier Services in the country within a very short spanby keeping pace with modern times and using high technology and providing prompt, punctual, quick and reliable service.
                        </p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6 order-lg-1  hero-img" data-aos="fade-left" data-aos-delay="100">
                        <img src="./assets//img/building (2).jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
                        <h2 class="about-titel">Established in 2021</h2>
                        <p>
                            Flybox Courier Services. with it’s round the clock services has emerged as super and well known Courier Services in the country.
                        </p>
                        <p>
                            The overall credit for such a super success goes to our younger and energetic Chairman Mr.Jignesh Parmar and Managing Director Mr. Jayesh Bhalala and Other Directors for their unity and more than 28 years of experience in courier business. We aspire to
                            comes more and more centers in a very near future with your warmth & continued cooperation at times.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========== CONTACT SECTION =========== -->
        <section id="contact">
            <div class="container">
                <div class="title">
                    <h2 class="mb-1">CONTACT US</h2>
                    <h3 class="md-mt-5">Connect with us</h3>
                </div>
                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118573.45803524675!2d72.08486470160913!3d21.763978341151127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f5081abb84e2f%3A0xf676d64c6e13716c!2sBhavnagar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1639637563762!5m2!1sen!2sin"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="mt-md-5 align-items-center">
                    <div class="row">
                        <div class="col-lg-4   align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box ">
                                <div class="icon"><img src="./assets/img/callus.svg" alt=""></i>
                                </div>
                                <h4>Call Us</h4>
                                <p>
                                    Sales & Seller Support:<br> +91- 9266623006
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4   align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon">
                                    <a href="mailto:parmarjigs428@gmail.com"><img src="./assets//img/email.svg" alt=""></i>
                                    </a>
                                </div>
                                <h4>E-Mail</h4>
                                <p>
                                    Email Support:<br> support@flyboxcourier.com
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4  align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon">
                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118573.45803524675!2d72.08486470160913!3d21.763978341151127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f5081abb84e2f%3A0xf676d64c6e13716c!2sBhavnagar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1639637563762!5m2!1sen!2sin"><img src="./assets/img/visitus.svg" alt=""></i>
                                    </a>
                                </div>
                                <h4>Visit Us</h4>
                                <p>
                                    Bhavnagar 364001, <br> Gujarat India
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
        include "footer.php";
    ?>
    
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><img src="./assets//img/uparrow.svg" alt=""></a>

   

    <script src="assets/js/main.js"></script>

    
