<!Doctype html>
 <html>
  <head>
    <title>Sign In</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo&family=Montserrat&family=Poppins:wght@300&family=Roboto&display=swap');

   *{
	 box-sizing:border-box;
	 font-family: 'Poppins', sans-serif;
	 font-weight:400px;
	 text-decoration:none;
	 outline:none; border:none;
	 list-style-type:none;
	 transition:all 0.1s ease;
	 
	 
     }
   body{
   	 margin:0;
   	 padding:0;
   	 height:100vh;
   	 overflow:hidden;
   	 
   }
   .container{
   	position: absolute;
   	top:50%;
   	left:50%;
   	transform:translate(-50%, -50%);
   	width:400px;
   	background-color:#fff;
   	border-radius:10px;
	border-top:3px solid #82E0AA;
   	box-shadow:0 .5rem 1.5rem rgba(0,0,0,.1);
   }
   
   .container h1{
   	font-size:24px;
   	text-align:center;
   	padding:2px 0 20px 0;
   	border-bottom:1px solid #ECF0F1;
   	
   }
   .container form{
   	 padding:0 40px;
   	 box-sizing:border-box;
   }
   form .text_field{
   	position:relative;
   	border-bottom:2px solid #adadad;
   	margin:30px 0;
   	
   }
   .text_field input{
   	
   	width:100%;
   	padding:0 5px;
   	height:40px;
   	font-size:16px;
   	border:none;
   	outline:none;
   	background:none;
   }
   
   .text_field label{
   	position: absolute;
   	top:50%;
   	left:1%;
   	color:#adadad;
   	transform:tarnslateY(-50%);
   	pointer-events:none;
   	
   }
   .text_field span::before{
   	content: '';
   	position: absolute;
   	top:100%;
   	left:0;
   	width:0%;
   	height:2px;
   	background:#82E0AA;
   	transition:.5s;
   }
   
   .text_field input:focus ~ label,
   .text_field input:valid ~ label{
   	top:-5px;
   	color:#82E0AA;
   }
   .text_field input:focus ~ span::before,
   .text_field input:valid ~ span::before{
   	width:100%;
   }	
   .pass{
   	   margin:-5px 0 20px 2px;
   	   color:#adadad;
   	   cursor:pointer;
   	   
   }
   .pass:hover{
   	   	color:#82E0AA;
   }
   
   input[type="submit"]{
   	width:100%;
   	height:50px;
   	border:1px solid;
   	border-radius:25px;
   	background:#82E0AA;
   	color:white;
   	font-size:18px;
   	font-weight:700px;
   	cursor:pointer;
   	outline:none;
   	margin-bottom:20px;
   	
   }
   input[type="submit"]:hover{
   	border-color:#adadad;
   	transition:.5s;
   }
   
   .reg{
   
   	color:#3c3c3c;
   	font-size:18px;
   	font-weight:700px;
   	cursor:pointer;
   	outline:none;
   	margin-bottom:20px;
       text-align:center;
   	
   }
   .reg a{
   
   	color:#82E0AA;
   	cursor:pointer;
   	text-decoration:none;
   	margin-left:2px;
   }
   
   .reg a:hover{
   color:#adadad;	
   }
   .error{
     margin:10px 0;
	 display:block;
	 color:#adadad;
	
   }
   
	</style>
  </head>
  <body>
   <div class="container">
    <h1>Login</h1>
    <form action="signinhash.php" method="post">
      
      <div class="text_field">
       <input type="email"  name="email" required>
	   <span></span>
       <label >Username</label>
      </div>
    <div class="text_field">
     <input type="password" name="password" required>
	 	<span></span>
     <label>Password</label>
    </div>
    <div class="pass">Forgot Password?</div>
	<?php if (isset($_GET['error'])) { ?>
     		<strong class="error"><?php echo $_GET['error']; ?></strong>
    <?php } ?>
    <input type="submit" name="submit" value="Login">
     <div class="reg">
      Not a member?<a href="register.php">Register</a>
     </div>
		   
    </form>
   </div>
  </body>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
 </html>