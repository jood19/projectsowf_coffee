<?php
session_start();
if(isset($_SESSION['id']))
{
    if(!$_SESSION['type']==0)
    {
         echo "<br /><br /><br /><center><h1>This Page Only For Adminstrator</h1></center>";die;
    }
}
else
{
    header("Location:login.php");
}
include "conn.php";
$userData=mysqli_query($conn,"SELECT `user_id`, `user_name`, `user_pass`, `type` FROM `t_user` WHERE `user_id`=$_GET[id]");
$userData=mysqli_fetch_assoc($userData);
if(!isset($_POST['save']))
{
    $_POST['id']=$userData['user_id'];
    $_POST['name']=$userData['user_name'];
    $_POST['pass']=$userData['user_pass'];
}

?>
<div style="position: absolute; left: 450px; width: 400px; top: 150px; border: solid; padding: 20px;">
<center>
<form action="" method="post" enctype="multipart/form-data">
 <table>
 <tr>
 <td></td>
    <td  style="text-align: center;">
       <img src="getImg.php?id=<?php echo $_GET['id'] ?>" width="100" height="100" />
    
    </td>    
 </tr>
 <tr>
    <td>Select Image</td>
    <td><input type="file" name="img" value="" /></td>
 </tr>
   <tr>
      <td>User Id</td>
      <td><input type="text" name="id" value="<?php if(isset($_POST['id'])){echo $_POST['id'];} ?>" readonly="" style="background-color: silver;" /></td>
   </tr>
   <tr>
    <td>User Name </td>
    <td><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" /></td>
   </tr>
   <tr>
    <td>Password</td>
    <td><input  type="password" name="pass" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];} ?>"/></td>
   </tr>
   <tr>
     <td colspan="2" style="text-align: center;"><input type="submit" name="save" value="Save" /></td>
   </tr>
 </table>

</form>
<?php 
if(isset($_POST['save']))
{
    if(!empty($_POST['name']))
    {
        if(!empty($_POST['pass']))
        {
            $name=$_POST['name'];
            $pass=$_POST['pass'];
            if(!empty($_FILES['img']['tmp_name']))
            {
               $img=addslashes(file_get_contents($_FILES['img']['tmp_name']));   
            }
            else
            {
               $img=""; 
            }
            mysqli_query($conn,"UPDATE `t_user` SET `user_name`='$name',`user_pass`='$pass', `img`='$img' WHERE `user_id`=$_GET[id]");
            echo "<br />User Data Updated";
        }
        else
        {
            echo "<br />Please Enter Password";
        }
    }
    else
    {
        echo "<br />Please Enter Name";
    }
}
?>
</center>
</div>








