<?php 
include "headerPart.php";
$catName=getCatName($_GET['id']);
?>
<div class="row">
   <div class="col-sm-12">
      <div class="panel  panel-default">
          <div class="panel-heading text-center" style="font-size: 20px; font-weight: bolder;">Add New sub Category to ( <font color='blue'><?php echo $catName ?></font> ) </div>
           <div class="row">
           <div class="col-sm-4"></div>
           <div class="col-sm-4">
           <br />
              <div class="panel panel-default">
              <div class="panel-body">
                   <form action="" method="post" enctype="multipart/form-data"> 
                   <br />
                   <input type="text" name="sub_name" value="<?php if(isset($_POST['sub_name'])){echo $_POST['sub_name'];} ?>" class="form-control" placeholder="Enter Sub Name" />
                   <br />
                   <input type="file" name="img"  class="form-control" /><br />
                   <center>
                   <input type="submit" name="save" value="Save" class="btn btn-primary" />
                   </center>
                   </form>
              <?php
              if(isset($_POST['save']))
              {
                if(isset($_POST['sub_name']))
                {
                    $subName=$_POST['sub_name'];
                    $img="";
                    if(!empty($_FILES['img']['tmp_name']))
                    {
                        $nextId=mysqli_query($conn,"show table status from $db like 'sub_cat'");
                        $nextId=mysqli_fetch_assoc($nextId);
                        $nextId=$nextId['Auto_increment'];
                        $img="subImg/$nextId.jpg";
                    }
                    mysqli_query($conn,"INSERT INTO `sub_cat`(`cat_id`, `sub_name`, `img`) VALUES ('$_GET[id]','$subName','$img')");
                    if(!empty($img))
                    {
                        move_uploaded_file($_FILES['img']['tmp_name'],$img);
                        
                    }
                     echo "<div class='alert alert-success'>
                                    <strong>Success!</strong> New Sub Category Added successfully .
                                </div>";
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