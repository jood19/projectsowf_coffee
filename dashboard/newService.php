<?php 
include "headerPart.php";
?>
<div class="row">
 <div class="col-sm-12">
    <div class="panel panel-default">
       <div class="panel-heading text-center" style="font-size: 20px; font-weight: bolder;">Add New Service</div>
        
          <div class="row">
             <div class="col-sm-3"></div>
             <div class="col-sm-6 text-center">
              <br /><br />
             <div class="panel  panel-default">
            
                <div class="panel-body" style="border-radius: 0px;">
             
                 <form  action="" method="post" enctype="multipart/form-data">
                    <input  type="text" name="service_name" value="<?php if(isset($_POST['service_name'])){echo $_POST['service_name'];} ?>" class="form-control" placeholder="Enter Service Name"/><br />
                    <input type="file" name="img" class="form-control" /><br />
                    <input type="submit" name="save" value="Save" class="btn btn-primary" />
                 </form>
                  <?php
                  if(isset($_POST['save']))
                  {
                     if(!empty($_POST['service_name']))
                     {
                        $img="";
                        $serviceName=$_POST['service_name'];
                        $serviceName=mysqli_real_escape_string($conn,$serviceName);
                        if(!empty($_FILES['img']['tmp_name']))
                        {
                           $img=addslashes(file_get_contents($_FILES['img']['tmp_name'])); 
                        }
                        if(mysqli_query($conn,"INSERT INTO `service`(`service_name`, `img`) VALUES ('$serviceName','$img')"))
                        {
                            echo "<div class='alert alert-success'>
                                    <strong>Success!</strong> New Service Added successfully .
                                </div>";
                        }
                     }
                  } 
                  ?>
                 </div>
             
             </div>
          </div>
        
        </div>
    </div>
 </div>
</div>


<?php 
include "footerPart.php";
?>