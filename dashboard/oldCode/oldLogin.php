<?php
session_start();
include "conn.php";
?>
<html>
    <head>
       <title>Login page</title>
       <meta charset="utf-8" />
       <link rel="stylesheet" type="text/css" href="myStyle.css" />
    </head> 
    <body  >
      <div  class="myDiv">
      
        <center>
        <img src="img/login.png" width="100" height="100" id="loginLogo" />
        <form  action="" method="post" >  
        <img src="img/user.png" width="20" height="20" id="smaillimg" />      
        <input class="mystyle" type="text" name="id" value="" placeholder="USER ID" />   <br />  
         <img src="img/password.png" width="20" height="20" id="smaillimg" />       
        <input type="password" name="pass" value=""  placeholder="PASSWROD" />  <br />    
        <input type="submit" name="login" value="Login" />

        </form>
        <?php
         if(isset($_POST['login']))
         {
            if(!empty($_POST['id']))
            {
               if(is_numeric($_POST['id']))
               {
                 if(!empty($_POST['pass']))
                 {
                    $id=$_POST['id'];
                    $pass=$_POST['pass'];
                    $userData=mysqli_query($conn,"SELECT `user_id`, `user_name`, `user_pass`, `type` FROM `t_user` WHERE `user_id`=$id  and `user_pass`= '$pass'");
                    $userData=mysqli_fetch_assoc($userData);
                    if(!empty($userData))
                    {
                        $_SESSION['type']=$userData['type'];
                        $_SESSION['id']=$id;
                        $_SESSION['name']=$userData['user_name'];
                        if($_SESSION['type']=='0')
                        {
                             header("Location:admin.php");
                        }
                        
                       
                    }
                    else
                    {
                        echo "<label>This user not exist</label>";
                    }
                 }
                 else
                 {
                    echo "<label>Please Enter password</label>";
                 }
               }
               else
               {
                 echo "<label>Please enter numaric value in user id box</label>";
               } 
            }
            else
            {
                echo "<label>Please enter value in user id box</label> ";
            }
         } 
        ?>
        </center>
      </div>
    </body>
</html>