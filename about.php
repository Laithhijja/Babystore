<?php
@include 'manage.php';
session_start();
 if (!isset($_SESSION['UserId'])) {
?>
<!Doctype html>
 <html>
  <head>
    <title>About us</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
        <a class="nav-link " href="index.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" id="active" href="C:\wamp64\www\Project\about.html">About Us</a>
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
  <!-- about -->
  <div class="container mt-5 p-5">
   <div class="container text-center">
    <h3><span>About</span> Us</h3>
   </div>
   <div class="row" data-aos="fade-right">
    <div class="col-md-6 image1 pt-5">
	 <span>
      <img src="image\about.jpg" alt="about">
	 </span>
    </div>
    <div class="col-md-6  pt-5">
      <p>
	   It is an online store in the field of selling children's clothing and accessories and provides easy and distinctive buying and selling services.
	  </p>
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
<?php
 
}else{
	 header("Location:about1.php");
     exit();
}
?>
