<?php
include 'connect.php';
 if(isset($_SESSION['email'])) {
$item = @$_GET['item_id'];
if (!$item) {
    echo 'no exists';
    die();
} else {
     $item = mysqli_query($conn,"SELECT * FROM `items` where `item_id` = '".$item."'"); 
     $itemData=mysqli_fetch_assoc($item);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STARBUCKS-payment</title>
    <link rel="stylesheet" href="payment.css">
</head>

<body>
    <div class="mainscreen">
        <div class="card">
            <div class="leftside">
                <img src="https://7cubeshospitality.com/wp-content/uploads/2021/02/hotcofee.jpg" class="product"
                    alt="caffee" />
            </div>
            <div class="rightside">
                <?php 
                     if(isset($_POST['save'])) {
                        if(!empty($_POST['quantity']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']))
                        {
                            $item_id = $itemData['item_id'];
                            $name= $_POST['name'];
                            $quantity=$_POST['quantity'];
                            $email=$_POST['email'];
                            $address=$_POST['address'];
                            $city=$_POST['city'];
                            $state=$_POST['state'];
                            $zip=$_POST['zip'];

                            if(mysqli_query($conn,"INSERT INTO `orders`(`item_id`, `quantity`, `name`, `address`, `city`, `zip`, `state`, `email`) VALUES ('$item_id','$quantity','$name','$address','$city','$zip','$state','$email')"))
                            {
                                echo "<br /><div class='alert alert-danger' style='font-size: 30px; background-color:green; color:#fff;'><strong>Success !</strong> Orders added Succesfully</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger' style='font-size: 30px; background-color:red; color:#fff;'><strong>Error !</strong> Please fill all data</div>";
                        }                   
                     }
                ?>
                <form method="post" action="">
                    <h2>Item Information</h2>
                    <p><?php echo $itemData['item_name'] ?></p>
                    <p class="price" id="price">Price: <?php echo $itemData['price']; ?>$</p>
                    <p>quantity </p>
                    <input type="text" class="inputbox quantity" id="quantity" name="quantity" value="1" required />
                    <input type="hidden" class="inputbox price_price" id="price_price" name="price_price" value="<?php echo $itemData['price']; ?>" required />

                    <h1>CheckOut</h1>
                    <h2>Payment Information</h2>
                    <p>Full Name </p>
                    <input type="text" class="inputbox" name="name" required />
                    <p>Email </p>
                    <input type="email" class="inputbox" value="<?php echo $_SESSION['email']; ?>" name="email" id="email" required />
                    <p>Address </p>
                    <input type="text" class="inputbox" name="address" required />
                    <p>City </p>
                    <input type="text" class="inputbox" name="city" required />
                    <div class="expcvv">

                        <p class="expcvv_text">State </p>
                        <input type="text" class="inputbox" name="state" required />

                        <p class="expcvv_text2">Zip</p>
                        <input type="text" class="inputbox" name="zip" required />

                    </div>
                    <button type="submit" name="save" class="button">Checkout</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function formSubmit() {
            alert("Your Order has been Submitted, Successfully!");
        }
    </script>
    <script>
  // Get references to the input elements
  const price_price = document.getElementById('price_price');
  const quantityIn = document.getElementById('quantity');
  const priceTotal = document.getElementById('price');

  price_price.addEventListener('keyup', updateTotal);
  quantity.addEventListener('keyup', updateTotal);

  function updateTotal() {
    // Get the values of the price and quantity inputs
    const price = parseFloat(price_price.value);
    const quantity = parseFloat(quantityIn.value);

    // Calculate the total and set it as the value of the total input
    const total = price * quantity;
    priceTotal.innerHTML = total.toFixed(2)+ "$";
  }

</script>
</body>

</html>
<?php
}
} else  {
    header('Location: login.php');
}
    
    ?>