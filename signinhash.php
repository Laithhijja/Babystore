<?php
 session_start();
 @include 'manage.php';
 if(isset($_POST['email']) && isset($_POST['email'])){
	 
 
  function validation($data){
	 $data=trim($data); 
	 $data=stripslashes($data); 
	 $data=htmlspecialchars($data); 
	 return $data;
	  
  }
  
   $email=validation($_POST['email']);
   $password=validation($_POST['password']);
   if(empty($email)){
	    header("location:index.php?error=Email is Required");
	    exit();
	   
   }else if(empty($password)){
	    header("location:index.php?error=Password is Required");
	    exit();
   }else{
	   
	    $sql="SELECT * FROM user WHERE email='$email' AND password='$password'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)){
			$row = mysqli_fetch_assoc($result);
			if($row['email']===$email && $row['password']===$password && $row['user_type']==="user" ){
			  $_SESSION['email']=$row['email'];
			  $_SESSION['password']=$row['password'];
			  $_SESSION['UserId']=$row['UserId'];
			  header("location:index1.php");
			  exit();
			  
			  
			}else if($row['email']===$email && $row['password']===$password && $row['user_type']==="admin" ){
			  $_SESSION['email']=$row['email'];
			  $_SESSION['password']=$row['password'];
			  $_SESSION['UserId']=$row['UserId'];
			  header("location:admin.php");
			  exit();
			}else{
			   header("location:signin.php?error=Incorrect email or password");
			   exit();
		}
		}else{
			
			 header("location:signin.php?error=Incorrect email or password");
			 
			 exit();
		}
		
   }
	   
 }else{
	 
	header("location:signin.php");
	 exit();
 }

?>