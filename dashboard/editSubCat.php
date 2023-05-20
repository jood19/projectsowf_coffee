<?php 
include "headerPart.php";
$subData=mysqli_query($conn,"SELECT  `sub_name`, `img` FROM `sub_cat` WHERE `sub_id`=$_GET[sub_id]");
$subData=mysqli_fetch_assoc($subData);
if(!isset($_POST['save']))
{
   $_POST['sub_name']=$subData['sub_name']; 
   $img=$subData['img'];
}
?>
<div class="row">
   <div class="col-sm-12">
      <div class="panel  panel-default">
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
                   <img src="<?php echo $img ?>" width="100%" height="200" /><br /><br />
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
                    mysqli_query($conn,"UPDATE  `sub_cat` SET  `sub_name`= '$subName' WHERE `sub_id`=$_GET[sub_id] ");
                    if(!empty($_FILES['img']['tmp_name']))
                    {
                        $path="subImg/$_GET[sub_id].jpg";
                        move_uploaded_file($_FILES['img']['tmp_name'],$path);
                        
                    }
                     header("Location:sub_cat.php?id=$_GET[id]");
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