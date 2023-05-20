<?php 
include "headerPart.php";
?>
<div class="row">
  <div class="col-sm-12">
     <div class="panel panel-default">
        <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;">Users</div>
        <div class="panel-body">
         <div class="row">
           <div class="col-sm-2"></div>
           <div class="col-sm-8">
               <form action="" method="post">
                  <input type="text" name="key" value="<?php if(isset($_POST['key'])){echo $_POST['key'];} ?>" class="form-control" style="float: left; width: 80%; margin-right: 10px;" placeholder="Enter user name" />
                   <input type="submit" name="search" value="Serach" class="btn  btn-primary" />
               </form>
           </div>
         </div>
         <br />
         <hr />
         <div class="row">
          <?php 
            if(isset($_GET['id']))
            {
                mysqli_query($conn,"DELETE FROM `users` WHERE `user_id`=$_GET[id]");
            }
           
            $sql="";
            if(isset($_POST['search']))
            {
                if(!empty($_POST['key']))
                {
                    $key=$_POST['key'];
                    $key=mysqli_real_escape_string($conn,$key);
                    $sql="SELECT * FROM `users` WHERE `fname` like '%$key%'"; 
                }
                
            }
            else
            {
              $sql="SELECT *  FROM `users` ";  
            }
           $userData=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($userData))
            {
            ?>
            <div class="col-sm-3 text-center">
                <img src='getImg.php?id=<?php echo $row['user_id'] ?>' width='100%' class="img-rounded" height='150'/>
                 <a href="#"><label ><?php echo  $row['fname'].' '.$row['lname'] ?></label></a><br />
                 <a href="allUser.php?id=<?php echo $row['user_id'] ?>" class="btn btn-default">Delete</a> 
            </div> 
            <?php
            }
            ?>
         </div>
        </div>
     </div>
  </div>
</div>

   

<?php 
include "footerPart.php";
?>