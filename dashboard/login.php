<?php
session_start();
include "conn.php";
?>
<html>
    <head>
       <title>Login page</title>
      <?php
      include "head.php";
      include"navBar.php";  
      ?>

    <body  >
    <div class="container">
      <div class="row">
         
        <div class="col-xs-8 col-sm-4 col-md-4  col-lg-4"></div>
        <div class="col-xs-8 col-sm-4 col-md-4  col-lg-4" style="margin-top: 100px;">
         <div class="panel panel-info">
            <div class="panel-heading">Login</div>
              <div class="panel-body">
         <center>
        <form  action="" method="post" >  
          <label>USER ID</label>  
          <input  type="text" name="id" value="" class="form-control" />   <br />  
          <label>PASSWROD</label>
          <input type="password" name="pass" value="" class="form-control"  />  <br />    
          <input type="submit" name="login" value="Login" class="btn btn-primary" />
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
                    $userData=mysqli_query($conn,"SELECT `user_id`, `user_name`, `user_pass`, `type`,`block` FROM `t_user` WHERE `user_id`=$id  and `user_pass`= '$pass'");
                    $userData=mysqli_fetch_assoc($userData);
                    if(!empty($userData))
                    {
                        if($userData['block']==0)
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
                           echo "<label>This user is Blocked</label>"; 
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
         </div>
        </div>  
        <div class="col-xs-8 col-sm-4 col-md-4  col-lg-4"></div> 
      </div>
      </div>
    </body>
</html>