<?php 
include "headerPart.php";
?>
<div class="row" style="padding: 10px;">
   <div class="col-sm-12">
      <div class="panel panel-default">
         <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;" >Orders</div>
         <div class="panel-body">
         <br />
           <div class="row">
            <?php
            $orders=mysqli_query($conn,"SELECT * FROM `orders` JOIN `items`
ON orders.item_id = items.item_id;"); 
            while($row=mysqli_fetch_array($orders))
            {
                ?>
                  <div class="col-sm-4 text-left " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                   
                      <label> Order:  <?php  echo $row['order_id'] ?></label><br />
                      <h4 style="color:blue;">Item Inforamiton</h4>
                      <label> item: <?php  echo $row['item_name'] ?></label><br />
                      <label> quantity:  <?php  echo $row['quantity'] ?></label><br />
                      <h4 style="color:blue;">Perosnal Inforamiton</h4>
                      <label> name:  <?php  echo $row['name'] ?></label><br />
                      <label> address:  <?php  echo $row['address'] ?></label><br />
                      <label> city:  <?php  echo $row['city'] ?></label><br />
                      <label> zip:  <?php  echo $row['zip'] ?></label><br />
                      <label> state:  <?php  echo $row['state'] ?></label><br />
                      <label> email:  <?php  echo $row['email'] ?></label><br />
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