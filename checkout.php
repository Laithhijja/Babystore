<?php
@include 'manage.php';
session_start();
$UserId=$_SESSION['UserId'];
if(isset($_POST['order_btn'])){
   $UserId=$_SESSION['UserId'];
   $country = $_POST['country'];
   $payment_method = $_POST['payment_method'];
   $city = $_POST['city'];
   $phone = $_POST['phone'];
   
   

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE UserId='$UserId'");
   $total_price=0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price =$product_item['price'] * $product_item['quantity'];
         $total_price += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(`UserId`, `country`, `payment_method`, `city`, `total_price`, `total_product`, `phone`) VALUES ('$UserId','$country','$payment_method','$city','$total_price','$total_product ','$phone')" )or die('query failed');
   echo "<script> alert('operation accomplished successfully');"."</script>";
   $delete_sql="DELETE FROM `cart` WHERE UserId='$UserId'";
   $result=mysqli_query($conn,$delete_sql);
  }

?>
<!Doctype html>
<html>
<head>
    <title>CheckOut</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
  </head>
<body>
<!-- checkout -->
<div class="container justify-content-center">

<section class="checkout-form" data-aos="fade-down">

   <h1 class="heading" style="color:white;text-transform:none; background-color:#82E0AA; padding:16px; border-radius:5px;width:80%;margin-left:100px;">Checkout</h1>
   
   <form action="" method="post">
   <div class="display-order">
      <?php
	     $UserId=$_SESSION['UserId'];
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE UserId='$UserId'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span style="margin-left:-5px;"><?= $fetch_cart['name']; ?></span>
	  <br>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total" style="text-align:center;"> grand total : <i class="fa fa-ils" aria-hidden="true"></i> <?= $grand_total; ?></span>
   </div>

   <div class="flex">
          <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Palestine" name="country" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Ramallah" name="city" required>
         </div>
		 <div class="inputBox">
            <span>payment method</span>
               <input type="text" value="cash in delivery" placeholder="" name="payment_method">
            </select>
         </div>
         <div class="inputBox">
            <span>your phone</span>
            <input type="phone" placeholder="enter your phone" name="phone" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>
</section>
  <div class="container-fluid">
    <a href="index1.php" style="text-decoration:none; font-size:20px; color:black;width:20px; text-align:center; margin-left:152px;">continue the shop -></a>
  </div>
</div>

<!-- footer -->
    <footer class="text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center text-black p-3">
      Created By <span>Laith Batta</span> © 2023</div> 
    </div>
   </footer>
</body>
<!-- script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>