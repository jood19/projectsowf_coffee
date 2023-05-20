<?php 
include "headerPart.php";
?>
<div class="row" style="padding: 10px;">
   <div class="col-sm-12">
      <div class="panel panel-default">
         <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;" >Service</div>
         <div class="panel-body">
         <div class="row">
            <div class="col-sm-2">
               <a href="newService.php" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> &nbsp; New Service</a>
            </div>
         </div>
         <br />
           <div class="row">
            <?php
            $allCat=mysqli_query($conn,"SELECT `service_id`, `service_name`, `img` FROM `service` ORDER BY `service_id` DESC"); 
            while($row=mysqli_fetch_array($allCat))
            {
                ?>
                  <div class="col-sm-4 text-center " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                     <img src="getMajorServiceImg.php?img_id=<?php echo $row['service_id'] ?>" class="img-rounded" width="100%" height="120" /><br /><br />
                      <label> <?php  echo $row['service_name'] ?></label><br />
                    </div>
                     <div class="col-sm-5" style="padding: 0px; margin: 0px;">
                      <a href="editService.php?service_id=<?php echo $row['service_id'] ?>" class="btn btn-default" style="display: block; width: 100%;">Edit</a> &nbsp;
                      <a href="#" class="btn btn-default" style="display: block; width: 100%;">Delete</a> &nbsp;
                     </div>
                   </div>
                    </div>
                     
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