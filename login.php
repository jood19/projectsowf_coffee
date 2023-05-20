<?php
include 'connect.php';
if (isset($_POST['register_btn'])) {
    if(!empty($_POST['register_fname']) && !empty($_POST['register_lname']) && !empty($_POST['register_email']) && !empty($_POST['register_password']))
            {
                $fname = $_POST['register_fname'];
                $lname = $_POST['register_lname'];
                $email = $_POST['register_email'];
                $password = $_POST['register_password'];

                // Insert data into the users table
                $sql = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

                if (mysqli_query($conn,$sql) === TRUE) {
                    echo "<label style='text-align:center; color:green; font-size:25px;'>New record created successfully</label>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<label style='text-align:center; color:red; font-size:25px;'>Please enter all data</label>";
            }

}
if(isset($_POST['login_btn']))
         {
            if(!empty($_POST['login_email']))
            {
                 if(!empty($_POST['login_password']))
                 {
                    $login_email=$_POST['login_email'];
                    $login_password=$_POST['login_password'];
                    $userData=mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='".$login_email."'  and `password`= '".$login_password."'");
                    $userData=mysqli_fetch_assoc($userData);
                    if(!empty($userData))
                    {
                        
                            $_SESSION['email']=$userData['email'];
                            $_SESSION['id']=$userData['id'];
                                 header("Location:index.php");
                       
                     }
                    else
                    {
                        echo "<label style='text-align:center; color:red; font-size:25px;'>This user not exist</label>";
                    }
                 }
                 else
                 {
                    echo "<label style='text-align:center; color:red; font-size:25px;'>Please Enter password</label>";
                 }
            }
            else
            {
                echo "<label style='text-align:center; color:red; font-size:25px;'>Please enter value in email box</label> ";
            }
        }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>STARBUCKS - Coffee Shop</title>
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
        </nav>
    </div>
    <!-- Navbar End -->
    <section>
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button' onclick='login()' class='toggle-btn'>Log In</button>
                <button type='button' onclick='signup()' class='toggle-btn'>Signup</button>
            </div>
            <form id='login' action="" method="post" class='input-group-login'>
                <input type='text' name="login_email" class='input-field' placeholder='Email ' required>
                <input type='password' name="login_password" class='input-field' placeholder='Enter Password' required>

                
                <button type='submit' name="login_btn" class='submit-btn'>Log in</button>
            </form>
            <form id='signup' class='input-group-signup' method="post" action="">
                <input type='text' name="register_fname" class='input-field' placeholder='First Name' required>
                <input type='text' name="register_lname" class='input-field' placeholder='Last Name ' required>
                <input type='email' name="register_email" class='input-field' placeholder='Email ' required>
                <input type='password' name="register_password" class='input-field' placeholder='Enter Password' required>
                <button type='submit' name="register_btn" class='submit-btn'>Sign up</button>
            </form>
        </div>
    
    </div>
    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('signup');
        var z = document.getElementById('btn');
        function signup() {
            x.style.left = '-400px';
            y.style.left = '50px';
            z.style.left = '110px';
        }
        function login() {
            x.style.left = '50px';
            y.style.left = '450px';
            z.style.left = '0px';
        }
    </script>
    <script>
        var modal = document.getElementById('login-form');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    </section>
</body>

</html>