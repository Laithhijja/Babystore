<?php
@include 'manage.php';
session_start();

if (isset($_SESSION['UserId']) && isset($_SESSION['email'])) {
	
?>
<!Doctype html>
 <html>
  <head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
 	
</head>
<body>
  <div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-white p-md-3">
    <a class="navbar-brand" href="#"><span>BABY</span>store</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index1.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about1.php">About Us</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="contact1.php">Contact Us</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="offer1.php">Sale</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="signout.php">Sign Out</a>
      </li>
    </ul>
   </div>
   <a class="icon-link" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#82E0AA" class="bi bi-bag" viewBox="0 0 16 16">
     <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
    </svg>
   </a>
  </nav>
 </div>
<!-- shopping cart -->
<div  class="container mt-5 p-5">
 <div class="shopping-cart">
   <?php
    
     $UserId = $_SESSION['UserId'];
     if(isset($_POST['update_update_btn'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET `quantity`='$update_value' WHERE `Id`=' $update_id'");
        if($update_quantity_query){
           header('location:cart1.php');
        };
     };
     
     if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE Id = '$remove_id'");
        header('location:cart1.php');
     };
     
     if(isset($_GET['delete_all'])){
        mysqli_query($conn, "DELETE FROM `cart` WHERE UserId = '$UserId'");
        header('location:cart1.php');
     }
    ?>
   <h1 class="heading" style="text-align:left;text-transform:none;">Shopping Cart</h1>
   <table>

      <thead>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
		 $UserId=$_SESSION['UserId'];
         $select_cart = mysqli_query($conn, "SELECT `Id`,`UserId`, `name`, `price`, `image`, `quantity` FROM `cart` WHERE UserId='$UserId'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><i class="fa fa-ils" aria-hidden="true"></i> <?php echo $fetch_cart['price']; ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['Id']; ?>" >
                  <input type="number" name="update_quantity" min="1" max="10"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit"  name="update_update_btn" value="edit">
				  
               </form>   
            </td>
            <td><i class="fa fa-ils" aria-hidden="true"></i> <?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; ?></td>
            <td><a href="cart1.php?remove=<?php echo $fetch_cart['Id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn" style="text-decoration:none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
             </svg></a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
		 
         ?>
         <tr class="table-bottom">
            <td colspan="3">grand total</td>
            <td><i class="fa fa-ils" aria-hidden="true"></i> <?php echo $grand_total; ?></td>
            <td><a href="cart1.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn" style="text-decoration:none;"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
             </svg></a></td>
         </tr>

      </tbody>

   </table>
   <div class="checkout-btn">
      <a href="checkout.php" class=" btn <?= ($grand_total > 1)?'':'disabled'; ?>">checkout</a>
   </div>
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
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
 </script>
 </body>
 </html>
 

<?php 
}else{
     header("Location:index.php");
     exit();
}
 ?>