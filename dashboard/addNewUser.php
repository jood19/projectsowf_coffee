<?php
session_start();
include "conn.php";
 include "head.php";
 include"navBar.php";  
?>
<br /><br />
<div class="container">
<div class="row" style="margin-top: 50px;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <div class="panel panel-info">
          <div class="panel-heading">Registration</div>
          <div class="panel-body">
          <form action="" method="post">
           <?php
           $userId=mysqli_query($conn,"show table status from `loginform` like 't_user'");
           $userId=mysqli_fetch_assoc($userId);
           $userId=$userId['Auto_increment']; 
           ?>
           <label>User ID </label><input  type="text" name="id" value="<?php echo $userId ?>" readonly="" class="form-control" />
           <label>User name </label><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>"  class="form-control" />  
           <label> Password</label>
           <input type="password" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>"   class="form-control"/>
           <label>Confirm</label>
           <input type="password" name="c_pass" value="<?php if(isset($_POST['c_pass'])){echo $_POST['c_pass'];} ?>"  class="form-control" />
           
           <br />
           <center>
           <input type="submit" name="save" value="Save" class="btn btn-primary" />
            
       </center>
     <?php 
     if(isset($_POST['save']))
     {
         if(!empty($_POST['name']))
         {
            if(!empty($_POST['pass']))
            {
                if($_POST['pass']==$_POST['c_pass'])
                {
                    $name=$_POST['name'];
                    $pass=$_POST['pass'];
                    if(mysqli_query($conn,"INSERT INTO `t_user`(`user_name`, `user_pass`, `type`) VALUES ('$name','$pass','1')"))
                    {
                        echo "<br /><div class='alert alert-danger'><strong>Error !</strong> User added to database</div>";
                    }

                }
                else
                {
                     echo "<br /><div class='alert alert-danger'><strong>Error !</strong> Password dos not match with confirm password</div>";
                   
                }
            }
            else
            {
                 echo "<br /><div class='alert alert-danger'><strong>Error !</strong> Please Enter Password</div>";
               
            }
         }
         else
         {
             echo "<br /><div class='alert alert-danger'><strong>Error !</strong> Please Enter user name</div>";
           
         }
     }
     ?>
     </form>
          
          </div>
       </div>
    </div>
    <div class="col-sm-3"></div>
</div>
     <center>
     

</div>
