<?php 
include "headerPart.php";
$orders = mysqli_query($conn, "SELECT * FROM orders");
$ordersC = mysqli_num_rows( $orders );

$items = mysqli_query($conn, "SELECT * FROM items");
$itemsC = mysqli_num_rows( $items );

$category = mysqli_query($conn, "SELECT * FROM category");
$categoryC = mysqli_num_rows( $category );

$service = mysqli_query($conn, "SELECT * FROM service");
$serviceC = mysqli_num_rows( $service );
?>
   <div class="row">
       <div class="col-sm-12" style="border-bottom: solid; border-width: 1px;" >
           <h3>Welcome </h3>
        </div>
   </div>
   <div class="row" style="margin-top: 20px;">
      <div class="col-sm-3">
           <div class="panel panel-default">           
              <div class="panel-body">
                <div class="row" style="margin: 0px; padding: 0px;">
                   <div class="col-sm-6"  style="margin: 0px; padding: 0px;">
                     <label> Category</label>
                   </div>
                   <div class="col-sm-6 text-right"  style="margin: 0px; padding: 0px;">
                        <label><span class="label label-primary">New</span></label>
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 text-center">
                      <label style="font-size: 20px;"> <?php echo $categoryC; ?></label>
                   </div>
                </div>
              </div>
           </div>
      </div>
      <div class="col-sm-3">
           <div class="panel panel-default">           
              <div class="panel-body">
                <div class="row" style="margin: 0px; padding: 0px;">
                   <div class="col-sm-6"  style="margin: 0px; padding: 0px;">
                     <label> items</label>
                   </div>
                   <div class="col-sm-6 text-right"  style="margin: 0px; padding: 0px;">
                        <label><span class="label label-primary">Mounth</span></label>
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 text-center">
                      <label style="font-size: 20px;"> <?php echo $itemsC; ?></label>
                   </div>
                </div>
              </div>
           </div>
      </div>
      <div class="col-sm-3">
           <div class="panel panel-default">           
              <div class="panel-body">
                <div class="row" style="margin: 0px; padding: 0px;">
                   <div class="col-sm-6"  style="margin: 0px; padding: 0px;">
                     <label> Order</label>
                   </div>
                   <div class="col-sm-6 text-right"  style="margin: 0px; padding: 0px;">
                        <label><span class="label label-primary">Daly</span></label>
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 text-center">
                      <label style="font-size: 20px;"> <?php echo $ordersC; ?></label>
                   </div>
                </div>
              </div>
           </div>
      </div>
       <div class="col-sm-3">
           <div class="panel panel-default">           
              <div class="panel-body">
                <div class="row" style="margin: 0px; padding: 0px;">
                   <div class="col-sm-6"  style="margin: 0px; padding: 0px;">
                     <label> Service</label>
                   </div>
                   <div class="col-sm-6 text-right"  style="margin: 0px; padding: 0px;">
                        <label><span class="label label-primary">All</span></label>
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 text-center">
                      <label style="font-size: 20px;"> <?php echo $serviceC; ?></label>
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