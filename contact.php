<?php
@include 'manage.php';
 session_start();
 if(isset($_POST['submit'])){
	
   $email=$_POST['email'];
   $message=$_POST['message'];
  
   
   $sql="INSERT INTO contact(email,message) VALUES ('$email','$message')";
   if(mysqli_query($conn, $sql)){
     echo " <script> alert('Your comments have been added successfully')</script>";
	 
   }else
   {
	   echo "error" .mysqli_error($conn);
   }
  
  mysqli_close($conn);
 } 

 if (!isset($_SESSION['UserId'])) {

?>
<!Doctype html>
 <html>
  <head>
    <title>Contact Us</title>
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
        <a class="nav-link" href="index.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link  active" id="active" href="contact.html">Contact Us</a>
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
  <!-- Contact -->
  <div class="container mt-5 p-5">
   <div class="container text-center">
    <h3><span>Contact</span> Us</h3>
   </div>

    <div class="contact-form-wrapper d-flex justify-content-center">

     <form action="" class="contact-form" method="post" data-aos="fade-down">
        <p class="description">Feel free to contact us if you need any assistance, any help or another question.
        </p>
        <div>
         <input type="email" name="email" class="form-control rounded border-white mb-3 form-input" placeholder="Email" required>
        </div>
        <div>
         <textarea  class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" name="message" placeholder="Message" required></textarea>
        </div>
        <div class="submit-button-wrapper">
         <input type="submit" name="submit" value="Send">
        </div>
       </form>
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
	 header("Location:contact1.php");
     exit();
}
?>