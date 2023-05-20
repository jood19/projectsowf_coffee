<?php 
include "headerPart.php";
?>
<div class="row" style="padding: 10px;">
   <div class="col-sm-12">
      <div class="panel panel-default">
         <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;" >Category</div>
         <div class="panel-body">
         <div class="row">
            <div class="col-sm-2">
               <a href="newCat.php" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> &nbsp; New Category</a>
            </div>
         </div>
         <br />
           <div class="row">
            <?php
            $allCat=mysqli_query($conn,"SELECT `cat_id`, `cat_name`, `img` FROM `category` ORDER BY `cat_id` DESC"); 
            while($row=mysqli_fetch_array($allCat))
            {
                ?>
                  <div class="col-sm-4 text-center " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                     <img src="getMajorCatImg.php?img_id=<?php echo $row['cat_id'] ?>" class="img-rounded" width="100%" height="120" /><br /><br />
                      <label> <?php  echo $row['cat_name'] ?></label><br />
                    </div>
                     <div class="col-sm-5" style="padding: 0px; margin: 0px;">
                      <a href="sub_cat.php?id=<?php  echo $row['cat_id'] ?>" class="btn btn-default" style="display: block; width: 100%;">Sub Category</a> &nbsp;
                      <a href="editCat.php?cat_id=<?php echo $row['cat_id'] ?>" class="btn btn-default" style="display: block; width: 100%;">Edit</a> &nbsp;
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