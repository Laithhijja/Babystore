<?php
  @include 'manage.php';

  if(isset($_POST['add'])){
	$UserId = $_SESSION['UserId'];

    if(!isset($UserId)){
        header('location:signin.php');
    }else{

	 $product_image=$_POST['product_image'];
	 $product_name=$_POST['product_name'];
	 $product_price=$_POST['product_price'];
	 $product_quantity=1;
	  
	 $sql="SELECT * FROM `cart` WHERE name='$product_name' AND UserId = '$UserId'";
	 $result=mysqli_query($conn,$sql);
	 if(mysqli_num_rows($result)>0){
		 echo "<script> alert('product already added to cart')"."</script>";	 
	 }else{
		$insert_query=mysqli_query($conn,"INSERT INTO `cart`(UserId,name,price,image,quantity) VALUES('$UserId','$product_name','$product_price',' $product_image','$product_quantity')"); 
	 }
    }
  }
?>

<!Doctype html>
 <html>
  <head>
    <title>Babystore</title>
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
   <div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-white p-md-3">
    <a class="navbar-brand" href="#"><span>BABY</span>store</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link"  href="index.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="offer.php">Sale</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="signin.php">Sign In</a>
      </li>
    </ul>
   </div>
   <a class="icon-link" href="cart.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#82E0AA" class="bi bi-bag" viewBox="0 0 16 16">
     <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
    </svg>
   </a>
  </nav>
 </div>
 
  <!-- our Product -->
  <div class="container mt-5 pt-5">
   <form action="" method="post">
     <div class="row d-flex justify-content-center">
	 <div class="col-lg-6 mt-5">
	  <img src="image/<?php echo $_GET['productimage']?>" alt="" width="380" style="margin-left:50px;">
	 </div>
	 <div class="col-lg-6 mt-5">
	  <h6><?php echo $_GET['producttitle']?></h6>
	  <h4 class="name"><?php echo $_GET['productname']?></h4>
	  <div class="star">
      <i class="fa-solid fa-star" style="color:orange;"></i>
      <i class="fa-solid fa-star" style="color:orange;"></i>
      <i class="fa-solid fa-star" style="color:orange;"></i>
      <i class="fa-solid fa-star" style="color:orange;"></i>
      <i class="fa-solid fa-star" style="color:orange;"></i>
      <i class="fa-solid fa-star" style="color:#ECF0F1;"></i>
	  <br>
	  <br>
	  <div class="price"><i class="fa fa-ils" aria-hidden="true"></i> <?php echo $_GET['productprice']?> </div>
	  <input type="hidden" name="product_image" value="<?php echo $_GET['productimage']?>">
	  <input type="hidden" name="product_name" value="<?php echo $_GET['producttitle']?>">
	  <input type="hidden" name="product_price" value="<?php echo $_GET['productprice']?>">
	  <br>
	  <input type="submit" class="btn" value="Add To Cart" name="add">
	 </div>
	</div>
   </form>
   
  </div>
   <!-- related products -->
  
  <div class="container mt-5 p-5">
    <h3 class="heading" style="text-align:left; text-transform:none;" >Related Product</h3>    
     <div class="row">
	
    <?php 
     @include 'manage.php';
	 
     $sql="SELECT  `title`, `Information`, `Price`,`image` FROM `product`  LIMIT 0,3 ";
  
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     if($num >0){
	  
      while($row = mysqli_fetch_array($result)){
       ?>
	   
		<div class="col-lg-3">
		<form action="product.php" method="get">
		 <div class="card" data-aos="fade-down-right">
          <img class="img-thumbnail pt-2" src="image/<?php echo $row['image']?>"
              width="auto" height="auto">
	      <div class="card-body text-center mx-auto">
           <h5 class="card-title"><?php echo $row['title']; ?></h5>
           <p class="card-text"><i class="fa fa-ils" aria-hidden="true"></i> <?php echo  $row['Price']; ?></p>
          </div>
		    
		  <input type="hidden" name="producttitle" value="<?php echo $row['title']; ?>">
		  <input type="hidden" name="productname" value="<?php echo $row['Information']; ?>">
		  <input type="hidden" name="productprice" value="<?php echo  $row['Price']; ?>">
		  <input type="hidden" name="productimage" value="<?php echo $row['image']?>">
		  
		  <input type="submit" name="submit" value="..." style="background-color:#fff; font-size:25px;">
         </div>
		</form>
		</div>
	   <?php 
	  }		 
     }
	 
    ?>

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
 
</html>