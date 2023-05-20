<?php 
include "headerPart.php";
?>
<div class="row" style="padding: 10px;">
   <div class="col-sm-12">
      <div class="panel panel-default">
         <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;" >Comments</div>
         <div class="panel-body">
         <br />
           <div class="row">
            <?php
            $comments=mysqli_query($conn,"SELECT * FROM `comments` JOIN `items`
ON comments.product_id = items.item_id;"); 
            while($row=mysqli_fetch_array($comments))
            {
                ?>
                  <div class="col-sm-4 text-left " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                   
                      <label> Comment ID :  <?php  echo $row['id'] ?></label><br />
                      <h4 style="color:blue;">Comment Inforamiton</h4>
                      <label> item: <?php  echo $row['item_name'] ?></label><br />
                      <label> comment:  <?php  echo $row['comment'] ?></label><br />
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