<?php 
include "headerPart.php";
$item_id=$_GET['id'];
$itemData=mysqli_query($conn,"SELECT `items`.`item_id`, `item_sub_cat`,`item_name`, `item_desc`, `item_img`, `date_added` FROM `items` WHERE `item_id`=$item_id");
$itemData=mysqli_fetch_assoc($itemData);
if(!isset($_POST['save']))
{
   $_POST['cat']=$itemData['item_sub_cat'];
   $_POST['name']=$itemData['item_name'] ;
   $_POST['desc']=$itemData['item_desc'];
  
}
 $itemImage=$itemData['item_img'];
?>
<div class="row" style="padding: 10px;">
   <div class="col-sm-12">
      <div class="panel panel-default">
         <div class="page-header text-center" style="font-size: 25px; font-weight: bolder;" >Add New Item</div>
         <div class="panel-body">
           <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="" method="post" enctype="multipart/form-data">
                  <label>Select Category</label>
                  <select name="cat" class="form-control" >
                
                     <?php
                     $catName="";
                     $subCat=mysqli_query($conn,"SELECT `sub_cat`.`sub_id`, `sub_cat`.`sub_name`,`category`.`cat_name`,`category`.`cat_id` FROM `sub_cat` 
                                                 INNER JOIN `category` ON `category`.`cat_id`=`sub_cat`.`cat_id` ORDER BY `sub_id`");
                     while($row=mysqli_fetch_assoc($subCat))
                     {
                        if($catName != $row['cat_name'])
                        {
                         echo "  <optgroup label='$row[cat_name]'></optgroup>";
                         $catName=$row['cat_name'];   
                        }
                        if($_POST['cat']==$row['sub_id'])
                        {
                           echo "<option value='$row[sub_id]' selected=''>$row[sub_name]</option>";   
                        }
                        else
                        {
                          echo "<option value='$row[sub_id]' >$row[sub_name]</option>";      
                        }
                      
                     }
                     ?> 
                  
                  </select> 
                  <label style="margin-top:25px;">Enter Item Name </label>
                  <input type="text" name="name" value="<?php echo $_POST['name'] ?>" class="form-control" />
                  <label style="margin-top:25px;">Enter Price </label>
                  <input type="number" name="price" value="" class="form-control" />
                  <label style="margin-top:25px;">Enter Description</label>
                  <textarea name="desc"  class="form-control"><?php echo $_POST['desc'] ?></textarea>
                  <label style="margin-top:25px;">Select Item Image</label>
                  <input type="file" name="itemImage" class="form-control" />
                  <img src="<?php echo $itemImage ?>" class="thumbnail" style="width: 300px; height: 250px;" />
                 <center> <input type="submit" value="Save" name="save" class="btn btn-primary" style="margin-top:25px;" /></center>
                 <?php
                 if(isset($_POST['save']))
                 {
                    if(!empty($_POST['cat']))
                    {
                          if(!empty($_POST['name']))
                          {
                             if(!empty($_POST['desc']))
                             {  
                             if(!empty($_POST['price']))
                                    {                          
                               
                                $catid=$_POST['cat'];
                                $name=mysqli_real_escape_string($conn,$_POST['name']);
                                $desc=mysqli_real_escape_string($conn,$_POST['desc']);
                                $price=mysqli_real_escape_string($conn,$_POST['price']);
                                $date=date("Y/m/d");
                                if(mysqli_query($conn,"UPDATE `items` SET `item_sub_cat`='$catid', `item_name`='$name', `item_desc`='$desc', `price` = '$price'  WHERE `item_id`=$item_id"))
                                {
                                    if(!empty($_FILES['itemImage']['tmp_name']))
                                    {
                                        $imgeData=$_FILES['itemImage']['tmp_name'];
                                        move_uploaded_file($imgeData,$itemImage);
                                    }
                                    echo "<div class='alert alert-success'>
                                    <strong>Success!</strong>  Item Updated successfully .
                                    </div>";
                                } 
                                }
                                else
                                {
                                   echo "<div class='alert alert-success'>
                                                <strong>Success!</strong> Please Enter Price.
                                            </div>"; 
                                }                              
                             }
                             else
                             {
                              echo "<div class='alert alert-success'>
                                                <strong>Success!</strong> Please Enter Description.
                                            </div>";   
                             }
                          }
                          else
                          {
                            echo "<div class='alert alert-success'>
                                                <strong>Success!</strong> Please Enter item name.
                                            </div>"; 
                          }
                    }
                    else
                    {
                        echo "<div class='alert alert-success'>
                                                <strong>Success!</strong> Please Select category.
                                            </div>"; 
                    }
                 }
                 ?>
                </form>
            
            </div>
           </div>
         </div>
       </div>
   </div>
</div>