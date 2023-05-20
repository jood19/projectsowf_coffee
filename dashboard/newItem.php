<?php 
include "headerPart.php";
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
                     $subCat=mysqli_query($conn,"SELECT * FROM `category`");
                     while($row=mysqli_fetch_assoc($subCat))
                     {
                        
                        
                        echo "<option value='$row[cat_id]'>$row[cat_name]</option>";
                     }
                     ?> 
                  
                  </select> 
                  <label style="margin-top:25px;">Enter Item Name </label>
                  <input type="text" name="name" value="" class="form-control" />
                  <label style="margin-top:25px;">Enter Price </label>
                  <input type="number" name="price" value="" class="form-control" />
                  <label style="margin-top:25px;">Enter Description</label>
                  <textarea name="desc"  class="form-control"></textarea>
                  <label style="margin-top:25px;">Select Item Image</label>
                  <input type="file" name="itemImage" class="form-control" />
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
                                $img="";
                                if(!empty($_FILES['itemImage']['tmp_name']))
                                {
                                    if(!empty($_POST['price']))
                                    {
                                    $nextId=mysqli_query($conn,"SHOW table status FROM $db like 'items'");
                                    $nextId=mysqli_fetch_assoc($nextId);
                                    $nextId=$nextId['Auto_increment'];
                                    $imgeData=$_FILES['itemImage']['tmp_name'];
                                    $img="itemImg/$nextId.jpg";
                                    $catid=$_POST['cat'];
                                    $name=mysqli_real_escape_string($conn,$_POST['name']);
                                    $desc=mysqli_real_escape_string($conn,$_POST['desc']);
                                    $price=mysqli_real_escape_string($conn,$_POST['price']);
                                    $date=date("Y/m/d");
                                    if(mysqli_query($conn,"INSERT INTO `items`(`item_sub_cat`, `item_name`, `item_desc`, `item_img`, `price`, `date_added`) VALUES ($catid,'$name','$desc','$img', '$price','$date')"))
                                    {
                                        move_uploaded_file($imgeData,$img);
                                       echo "<div class='alert alert-success'>
                                                <strong>Success!</strong> New Item Added successfully .
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
                                                <strong>Success!</strong> Please Uploade item image.
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