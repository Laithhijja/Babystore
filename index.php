<?php
@include 'manage.php';
session_start();
 if(isset($GET_['submit'])){
	 
	 $image = $_GET['productimage'];
	 $name = $_GET['productname'];
	 $price = $_GET['productprice'];
	 $title=$_GET['producttitle'];
	
 }
 
  if (!isset($_SESSION['UserId'])) {
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
        <a class="nav-link active" id="active" href="#">Product</a>
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
 

  <!-- cover -->
  <div class="container mt-5 pt-5"  data-aos="zoom-in">
   <img src="image\baby.jfif" alt="cover" width="100%" height="600">
  </div>
  <!-- Product -->
  
  <div class="container pt-5">
    <h3 class="heading" >shop the<span> Products</span></h3>      
    <div class="row">
	
    <?php 
   
     $sql="SELECT  `title`, `Information`, `Price`,`image` FROM `product` WHERE Discount=0 ORDER BY ProductId ASC";
  
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

<?php
 
}else{
	 header("Location:index1.php");
     exit();
}
?>