<?php
include 'connect.php';

 if(isset($_SESSION['email'])) {

$category = @$_GET['category_id'];
if (!$category) {
	echo 'no exists';
	die();
} else {
    $category_info = mysqli_query($conn,"SELECT * FROM `category` where `cat_id` = '".$category."'  LIMIT 1"); 
        $cat_info = mysqli_fetch_array($category_info);

	 $items = mysqli_query($conn,"SELECT * FROM `items` where `item_sub_cat` = '".$category."' ORDER BY `item_id` DESC"); 

     if (isset($_POST['comment'])) {
        if (!empty($_POST['comment_text'])) {
            // code...
        
        
         $item_id = $_POST['item_id'];
         $comment_text = $_POST['comment_text'];

         $sql = "INSERT INTO comments (product_id, comment) VALUES ('$item_id', '$comment_text')";

                if (mysqli_query($conn,$sql) === TRUE) {
                    echo "comment added";
                }
                    }
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STARBUCKS - Coffee Shop </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="Menu.css">
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
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link active">Category</a>
                    <div class="nav-item dropdown">

                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <a href="login.php" class="nav-item nav-link">Login</a>
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


    <!--  menu section starts -->
    <section class="menu" id="menu">
        <h1 class="heading"><?php echo $cat_info['cat_name'] ?></h1>
        <div class="box-container">
        	<?php
				while($row=mysqli_fetch_array($items))
                {
        	?>
            <div class="box">
                <img src="<?php echo 'dashboard/'.$row['item_img'] ?>" alt="">
                <h3><?php echo $row['item_name'] ?> <h4>((<?php echo $row['item_desc'] ?>)) </h4>
                </h3>
                <div class="price">$<?php echo $row['price']; ?></div>

                <form action="" method="post">
                    <textarea name="comment_text"></textarea>
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                    <input type="submit" name="comment" value="comment">
                </form>
                <a href="payment.php?item_id=<?php echo $row['item_id']; ?>" class="btn">order now</a>
                
                <?php
            $comments=mysqli_query($conn,"SELECT * FROM `comments` JOIN `items`
ON comments.product_id = items.item_id WHERE comments.product_id='".$row['item_id']."'"); 
            while($comm=mysqli_fetch_array($comments))
            {
                ?>
                  <div class="col-sm-4 text-left " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                   
                      <label> comment:  <?php  echo $comm['comment'] ?></label><br />
                    </div>
                    
                   </div>
                    </div>
                     
                  </div>
                
                <?php
            }
            ?>

            </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!--  menu section ends -->

    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">INFORMATION</h4>
                <ul class="menu_bottom">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About </a></li>
                    <li><a href="service.html">Service</a></li>
                    <li><a href="menu.html">Category</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Menu</h4>
                <p>Choose the menu you like</p>
                <div class="w-100">
                    <div class="input-group">
                        <u2 class="menu_bottom">
                            <li><a href="Hot.html">Hot Drinks</a></li>
                            <li><a href="cold.html">Cold Drinks </a></li>
                            <li><a href="Dessert.html">Dessert</a></li>
                        </u2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer End -->

    <!-- custom js file link  -->
    <script>
        let navbar = document.querySelectorAll('.navbar');

        document.querySelectorAll('#menu-btn').onclick = () => {
            navbar.classList.toggle('active');
            searchForm.classList.remove('active');
            cartItem.classList.remove('active');
        }

        let searchForm = document.querySelectorAll('.search-form');

        document.querySelectorAll('#search-btn').onclick = () => {
            searchForm.classList.toggle('active');
            navbar.classList.remove('active');
            cartItem.classList.remove('active');
        }

        let cartItem = document.querySelectorAll('.cart-items-container');

        document.querySelectorAll('#cart-btn').onclick = () => {
            cartItem.classList.toggle('active');
            navbar.classList.remove('active');
            searchForm.classList.remove('active');
        }

        window.onscroll = () => {
            // // navbar.classList.remove('active');
            // searchForm.classList.remove('active');
            // cartItem.classList.remove('active');
        }
    </script>
    <script src='plugin.js'></script>

</body>

</html>
<?php
}
} else {
    header('Location: login.php');
}
?>