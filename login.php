<!DOCTYPE html>

<html lang="en">
<?php 
session_start();
include("functions/functions.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style6.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css   "/>
     <title>index</title>
</head>
<body>

<div class="main_wrapper">
    
        <div class="header_wrapper">

            <img id="logo"src="images/logo.jpg" >
          

        </div>

        <div class="menubar">
            
        <ul id="menu" >
        <li><a href="index.php"style="color:black;font-weight:bolder;" >Home</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="my_account.php">My account</a></li>         
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        
        
 
        </div>

             

<form action="login.php" method="post">

  <div class="container">
    <label for="email"><b>Email</b></label> <br>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required><br>
        
    <button type="submit" name="login">Login</button>
  </div>
  <!--a style="margin-left: 300px" href="#">Forget Password?</a><br><br-->
  <hr style="width:270px; margin-left: 220px;"> <br>
  <label style="margin-left: 230px;">Don't have account? </label><a href="registration.php">Sign Up</a><br><br>

  
   
    
  </div>
</form>
<?php 

include 'includes/db.php';

if(isset($_POST['login']))
{

	$email=$_POST['email'];
	$password=$_POST['password'];



	$sql1 = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$query1=mysqli_query($con,$sql1);

    if ($query1->num_rows > 0) {
		$row = mysqli_fetch_assoc($query1);
		header("Location: cart.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}	
}

?>







<?php include ('footer.php'); ?>


  <style type="text/css">
  	form {
  		border: 3px solid #f1f1f1; 
  		width: 700px; 
  		margin-left: 300px;
  		margin-top: 50px;
  	}

input[type=text], input[type=password] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 60%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  margin-left: 200px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
  </style>
</head>


 


