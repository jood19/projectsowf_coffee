<?php 
include "headerPart.php";
?>
<div class="row" style="padding: 10px;">
   <div class="col-sm-12">
      <div class="panel panel-default">
         <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;" >Items</div>
         <div class="panel-body">
         <div class="row">
            <div class="col-sm-2">
               <a href="newItem.php" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> &nbsp; New Item</a>
            </div>
         </div>
         <br />
            
           <div class="row" style="margin-top: 20px;">
           <?php
           $cond=" WHERE 1=1 ";
           
           if(isset($_GET['delete']))
           {
              $item_id=$_GET['delete'];
              mysqli_query($conn,"DELETE FROM `items` WHERE `item_id`=$item_id");
           }
           $items=mysqli_query($conn,"SELECT `items`.`item_id`, `item_sub_cat`,`cat_name`, `item_name`, `item_desc`, `item_img`, `date_added` FROM `items` LEFT JOIN `category`
ON items.item_sub_cat = category.cat_id; ");
           while($row=mysqli_fetch_assoc($items))
           { 
            $item_id=$row['item_id'];
            $src=$row['item_img'];
            $itemName=$row['item_name'];
            $subCat=$row['cat_name'];
           
           ?>
           <div class="col-sm-4 text-center " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                     <img src="<?php echo $src ?>" class="img-rounded" width="100%" height="120" /><br /><br />
                      <label> <?php  echo $itemName ?></label><br />
                       <label> <?php  echo $subCat ?></label><br />
                    </div>
                     <div class="col-sm-5" style="padding: 0px; margin: 0px;">
                      <a href="more_info.php?id=<?php echo $item_id ?>" class="btn btn-default" style="display: block; width: 100%;">More Info</a> &nbsp;
                      <a href="editItem.php?id=<?php echo $item_id ?>" class="btn btn-default" style="display: block; width: 100%;">Edit</a> &nbsp;
                      <a href="?delete=<?php echo $item_id ?>" class="btn btn-default" style="display: block; width: 100%;">Delete</a> &nbsp;
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