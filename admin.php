<?php
  @include 'manage.php';
  session_start();
  
 
   if(isset($_SESSION['user_type'])== "user"){
	     header('location:signinadmin.php'); 
   }else{
	    
   }
 

  if (isset($_SESSION['UserId']) && isset($_SESSION['email'])) {

?>
<!Doctype html>
 <html>
  <head>
    <title>Dashboard</title>
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
    <a class="navbar-brand" id="admin" href="#" style="text-transform:none;">admin</a>
    <div class="collapse navbar-collapse pt-1" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link"  href="#">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#order">Order</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="#msg">Messages</a>
      </li>
    </ul>
   </div>
   <a class="icon-link" href="signout.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#82E0AA" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
    </svg>
   </a>
  </nav>
 </div>
 <!-- dashboard -->
 <div class="container p-3" style="margin-top:18%;">
  <div class="row">
   <div class="col-xl-3 col-md-6">
	<div class="card bg-info text-white mb-4 "style="height:150px;">
	 <div class="card-body">Total Product<br>
	 <span style="color:;">10</span>
	 </div>
	</div>
   </div>
   <div class="col-xl-3 col-md-6">
	<div class="card bg-danger text-white mb-4 " style="height:150px;">
	 <div class="card-body">Total User<br>
	 <span style="color:;">2</span>
	 </div>
	</div>
   </div>
   <div class="col-xl-3 col-md-6">
	<div class="card bg-warning text-white mb-4 "style="height:150px;">
	 <div class="card-body">Total Order<br>
	 <span style="color:;">1</span>
	 </div>
	</div>
   </div>
   <div class="col-xl-3 col-md-6">
	<div class="card bg-success text-white mb-4 "style="height:150px;">
	 <div class="card-body">Total Message<br>
	 <span style="color:;">3</span>
	 </div>
	</div>
   </div>

  </div>
 </div>
 <!-- order -->
 <div class="container" id="order" style="margin-top:250px;">
  <table class="table">
   
   <thead>
  
    <tr style="background-color:#82E0AA;">
	 <th>order number</th>
	 <th>user number</th>
	 <th>country</th>
	 <th>city</th>
	 <th>payment method</th>
	 <th>total price</th>
	 <th>total product</th>
	 <th>phone</th>
    </tr>
  </thead>
  <tbody>
  
     <?php 
	 @include 'manage.php';
     $sql = "SELECT `order_number`, `UserId`, `country`, `payment_method`, `city`, `total_price`, `total_product`, `phone` FROM `order`";
	 $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     if($num >0){
	  
      while($row = mysqli_fetch_array($result)){
	 ?>
	 <tr>
      <td><?php echo $row['order_number'];?></td>
	  <td><?php echo $row['UserId'];?></td>
	  <td><?php echo $row['country'];?></td>
	  <td><?php echo $row['city'];?></td>
	  <td><?php echo $row['payment_method'];?></td>
	  <td><?php echo $row['total_price'];?></td>
	  <td><?php echo $row['total_product'];?></td>
	  <td><?php echo $row['phone'];?></td>
     </tr>
	 <?php
	  }
	 }
	
	 ?>
   
  </tbody>
 </table>
 </div>
 
 <!--message -->
 <div class="container" id="msg" style="margin-top:200px;">
  <table class="table">
   <thead>
    
    <tr style="background-color:#82E0AA;">
	 <th>contact number</th>
	 <th>email</th>
	 <th>message</th>
    </tr>
  </thead>
  <tbody>
   <?php 
	 @include 'manage.php';
     $sql = "SELECT `Id`, `email`, `message` FROM `contact`";
	 $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     if($num >0){
	  
      while($row = mysqli_fetch_array($result)){
	 ?>
	 <tr>
      <td><?php echo $row['Id'];?></td>
	  <td><?php echo $row['email'];?></td>
	  <td><?php echo $row['message'];?></td>
     </tr>
	 <?php
	  }
	 }
	
	 ?>
  </tbody>
 </table>
 </div>
</body>
</html>
<?php 
}else{
     header("Location:signin.php");
     exit();
}
 ?>