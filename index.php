<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>STARBUCKS - Coffee Shop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <!--<link href="img/favicon.ico" rel="icon">-->

    <!-- Google Font -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">-->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="about.css">
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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link">Category</a>
                    <div class="nav-item dropdown">

                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <?php
                        if(!isset($_SESSION['email'])) {
                    ?>
                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="topnav">
                <div class="search-container">
                    <form action="search.php" method="get">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/casual1.png" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">We Have Been Serving</h2>
                        <h1 class="display-1 text-white m-0">COFFEE</h1>
                        <h2 class="text-white m-0">* SINCE 2023 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/905439.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">We Have Been Serving</h2>
                        <h1 class="display-1 text-white m-0">COFFEE</h1>
                        <h2 class="text-white m-0">* SINCE 2023 *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 2023</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">Two college friends, Ali and Ahmed, who shared a passion for great coffee and
                        creating a warm, welcoming community space.
                        After years of dreaming and planning, they finally opened their first shop in Gaza.
                    </h5>
                    <p>At Brewtiful, the focus was on quality, both in terms of the coffee and the customer experience.
                        but Brewtiful wasn't just about the coffee. They wanted to create a space where people could
                        gather,
                        relax, and connect.They also bringing people together around shared interests.
                    </p>
                    <a href="" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>Our vision is to bring people together over great coffee and to be
                        the best café, where people can come to relax,
                        enjoy great coffee and food,
                        and feel at home. </p>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Highest quality coffee</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Outstanding service</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Provide a quiet place</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>friendly staff</h5>
                    <a href="" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a>
                </div>
            </div>
            <div class="container-fluid pt-5">
                <div class="container">
                    <div class="section-title">
                        <h2 class="display-4">Café photos</h2>
                    </div>
                </div>
            </div>
            
            <div class="pictures">
                <div class="col-lg-4 py-0 py-lg-5">
                  <div class="piacture1">
                <img src="img/place2.jpeg" alt="">
                   </div>
              </div>
              <div class="col-lg-4 py-0 py-lg-5">
                <div class="piacture1">
              <img src="img/place3.jpeg" alt="">
                 </div>
             </div>
        
            </div>

            <div class="pictures">
                <div class="col-lg-4 py-0 py-lg-5">
                  <div class="piacture1">
                <img src="img/place4.jpg"  alt="">
                   </div>
              </div>
              <div class="col-lg-4 py-0 py-lg-5">
                <div class="piacture1">
              <img src="img/place5.jpeg"alt="">
                 </div>
             </div>
        
            </div>

        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">Fresh & Organic Beans</h1>
            </div>
            <section id="section2">
                <div class="container">
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
        </div>
    </div>
    <!-- Service End -->
    <!-- Category Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
                <h1 class="display-4">Category</h1>
            </div>

            <section id="section2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="maintext text-center">


                            </div>
                        </div>
                    </div>
                    <div class="row shapes">
                <?php
                    $allCat=mysqli_query($conn,"SELECT `cat_id`, `cat_name`, `img` FROM `category` ORDER BY `cat_id` DESC"); 
                while($row=mysqli_fetch_array($allCat))
                {
                ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 minHeightProp">
                            
                            <img class="imgbackk" src="dashboard/getMajorCatImg.php?img_id=<?php echo $row['cat_id'] ?>" alt="">
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                
                                <h3  class="txt"> <a  class="atxt" href="category.php?category_id=<?php echo $row['cat_id'] ?>"><?php  echo $row['cat_name'] ?></a></h3>
                                                              
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
        </div>
    </div>
    <!-- Category End -->



    < <!-- Footer Start -->
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.html">About </a></li>
                        <li><a href="service.php">Service</a></li>
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
                                <?php
                    $allCat=mysqli_query($conn,"SELECT `cat_id`, `cat_name`, `img` FROM `category` ORDER BY `cat_id` DESC"); 
                while($row=mysqli_fetch_array($allCat))
                {
                ?>
                                <li><a href="category.php?category_id=<?php echo $row['cat_id'] ?>"><?php  echo $row['cat_name'] ?></a></li>
                            </u2>

                            <?php
}
                            ?>
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