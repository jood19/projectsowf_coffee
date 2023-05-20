<?php 
include "headerPart.php";
$item_id=$_GET['id'];
$itemData=mysqli_query($conn,"SELECT `items`.`item_id`, `item_sub_cat`, `item_name`, `item_desc`, `item_img`, `date_added` FROM `items`");
$itemData=mysqli_fetch_assoc($itemData);
if(!empty($itemData))
{
    $itemName=$itemData['item_name'];

    $desc=$itemData['item_desc'];
    $image=$itemData['item_img'];
    $dateAdded=$itemData['date_added'];
}
?>
<div class="row">
    <div class="col-sm-12">
        <div  class="panel panel-default">
           <div class="panel-heading" style="text-align: center; font-size: 20px; color: blue;"><?php echo $itemName  ?></div>
           <div class="panel-body">
              <div class="row">
                  <div class="col-sm-6">
                      <img src="<?php echo $image ?>"  class="thumbnail" style="width: 250px; height: 250px;" />    
                  </div>
                  <div class="col-sm-6">
                     <p style="text-align: justify; font-size: 25px;"><?php echo $desc ?></p>
                     <label>Date Of Adding : <?php echo $dateAdded ?></label>
                  </div>
              </div>
           </div>
        </div>    
    </div>
</div>
              
                 