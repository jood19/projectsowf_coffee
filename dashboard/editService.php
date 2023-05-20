<?php 
include "headerPart.php";
$service_id=$_GET['service_id'];
$serviceData=mysqli_query($conn,"SELECT  `service_name` FROM `service` WHERE `service_id`=$service_id");
$serviceData=mysqli_fetch_assoc($serviceData);
if(!isset($_POST['save']))
{
   $_POST['service_name']= $serviceData['service_name'];   
}
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
                    <img src="getMajorServiceImg.php?img_id=<?php echo $service_id ?>" width="100%" height="200" /><br /><br />
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
                        if(empty($img))
                        {
                          mysqli_query($conn,"UPDATE `service` SET `service_name` ='$serviceName'   WHERE `service_id`=$service_id ");
                             
                        }
                        else
                        {
                           mysqli_query($conn,"UPDATE  `service` SET `service_name` ='$serviceName' , `img` ='$img'   WHERE `service_id`=$service_id  ");
                            
                        }
                        
                        header("Location:service.php");
                        
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