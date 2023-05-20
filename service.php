<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>STARBUCKS - Coffee Shop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="service.css">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">STARBUCKS</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link active">Service</a>
                    <a href="menu.php" class="nav-item nav-link">Category</a>
                    <div class="nav-item dropdown">

                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <a href="login.php" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Services</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Services</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <section id="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="maintext text-center">
                       
                        <h2>Welcome To STARBUCKS</h2>
                                             
                        </div>  
                </div>
            </div>
            <div class="row shapes">
                <?php
                $sql="SELECT *  FROM `service`";  
                $services=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($services))
                {
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 minHeightProp">
                            <img class="imgback" src="dashboard/getMajorServiceImg.php?img_id=<?php echo $row['service_id'] ?>" alt="">
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                
                                <h4  class="txt"><?php echo $row['service_name']; ?></h4>
                                                              
                                </div> 
                        </div> 
                    </div>
                </div>
                <?php
                }   
                ?>
            </div>
        </div>
    </section>
    <!-- Service End -->


        <!-- Footer Start -->
        <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
            <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street,Gaza</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+970591234567</p>
                    <p class="m-0"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                    <p>See more about us on social media</p>
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">INFORMATION</h4>
                    <ul class="menu_bottom">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About </a></li>
                        <li><a href="service.html">Service</a></li>
                        <li><a href="menu.php">Category</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Menu</h4>
                    <p>Choose the menu you like</p>
                    <div class="w-100">
                        <div class="input-group">
                            <u2 class="menu_bottom">
                                <li><a href="Hot.html">Hot Coffee</a></li>
                                <li><a href="cold.html">Cold Coffee </a></li>
                                <li><a href="Dessert.html">Dessert</a></li>
                            </u2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>