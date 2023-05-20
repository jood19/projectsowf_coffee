<?php 
include "headerPart.php";
$catName=getCatName($_GET['id']);
?>
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-default">
          <div class="panel-heading text-center" style="font-size: 20px; font-weight: bolder;">sub category ( <font color='blue'><?php echo $catName ?></font> )</div>
          <div class="panel-body">
              <div class="row">
              <div class="col-sm-12">
                   <a href="newSubCat.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> &nbsp; New sub Category</a><br /><br />
              </div>
              <br /><br />
                <?php 
                if(isset($_GET['del']))
                {
                    ?>
                    
                    <div class="alert alert-danger text-center">
                     <form  action="" method="post">
                         <p style="font-size: 16px; font-weight: bold; text-align: center;"> Are you sure you like to delete this sub category ? </p>
                         <br />
                          <input type="submit" name="y" value="Yes" class="btn  btn-warning" /> &nbsp;
                          <input type="submit" name="n" value="No" class="btn  btn-warning" /><br />
                     </form>
                    
                     </div>
                   <?php 
                   if(isset($_POST['n']))
                   {
                      echo " <meta http-equiv='refresh' content='0;url=sub_cat.php?id=$_GET[id]' />" ;
                   }
                   if(isset($_POST['y']))
                   {
                     mysqli_query($conn,"DELETE FROM `sub_cat` WHERE `sub_id`=$_GET[del]");
                     unlink("subImg/$_GET[del].jpg");
                     echo " <meta http-equiv='refresh' content='0;url=sub_cat.php?id=$_GET[id]' />" ;
                     
                   }
                }
                $subCat=mysqli_query($conn,"SELECT `sub_id`, `cat_id`, `sub_name`, `img` FROM `sub_cat` WHERE `cat_id`= $_GET[id]  ORDER BY `sub_id` DESC");
                while($row=mysqli_fetch_array($subCat))
                {
                
                ?>
                <div class="col-sm-4 text-center " >
                  <div class="panel panel-default">
                   <div class="panel-body">
                   <div class="col-sm-7">
                   <?php
                      if(file_exists($row['img']))
                      {
                        $src=$row['img'];
                      }
                      else
                      {
                        $src="subImg/default.png";
                      }
                   ?>
                     <img src="<?php echo $src ?>" class="img-rounded" width="100%" height="120" /><br /><br />
                      <label> <?php  echo $row['sub_name'] ?></label><br />
                    </div>
                     <div class="col-sm-5" style="padding: 0px; margin: 0px;">
                      <a href="#" class="btn btn-default" style="display: block; width: 100%;">items</a> &nbsp;
                      <a href="editSubCat.php?id=<?php echo $_GET['id'] ?>&sub_id=<?php echo $row['sub_id']; ?>" class="btn btn-default" style="display: block; width: 100%;">Edit</a> &nbsp;
                      <a href="sub_cat.php?id=<?php echo $_GET['id'] ?>&del=<?php echo $row['sub_id'] ?>" class="btn btn-default" style="display: block; width: 100%;">Delete</a> &nbsp;
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