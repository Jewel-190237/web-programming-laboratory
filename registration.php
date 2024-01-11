<!DOCTYPE html>

<html lang="en">
<?php 
//session_start();
//include("functions/functions.php");
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

<?php
include('smtp/PHPMailerAutoload.php');
//include 'includes/db.php';
$con=mysqli_connect("localhost:3306","root","azhar73397","e_bazar");

//$conn=mysqli_connect('localhost:3306','root','','online_examination_system');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/style1.css" />
  
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


.container {
  padding: 16px;
  margin-left: 200px;
}

  </style>
</head>

<body>
  
 

<form action="registration.php" method="post">

  <div class="container">
  	 <label for="uname"><b>Enter Username</b></label> <br>
  	  <input type="text" placeholder="Enter Username" name="username" required><br>

    <label for="email"><b>Email</b></label> <br>
    <input type="text" placeholder="Enter Email" name="email" required><br>
  
    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required><br>

    <input type="number" name="number" required value='<?php echo rand(10,1000000) ?>' hidden> <br>
    <button type="submit" name="submit">Sign Up</button>
  </div>
  <label style="margin-left: 230px;">Already have account? </label><a href="login.php">Log In</a><br><br>

  
   
    
  </div>
</form>
<?php 

//error_reporting(0);


if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
  $number=$_POST['number'];

	//$password_hashed = password_hash($password, PASSWORD_DEFAULT);

  

	$sql="INSERT into users(username,email,password) values('$username','$email','$password')";
	$query=mysqli_query($con, $sql);

  if($query)
  {
    $sql2="INSERT into otp_code(code,email) values('$number','$email')";
    $query2=mysqli_query($con,$sql2);
  
    echo smtp_mailer($email,'Email Verification','Your verification code is:'.$number);
    header("Location: verify.php");
  }

	//header("Location:home.php");

	/*$sql1="SELECT email from users";
	$query1=mysqli_query($conn,$sql1);
    while (($row=mysqli_fetch_array($query1))) {
    	if($row['email']!='$email'){
    		$sql="INSERT into users(username,email,password) values('$username','$email','$password')";
	        $query=mysqli_query($conn, $sql);
    	}
    	if($row['email'] =='$email'){
    		echo "Already registered";
    	}

    }*/

	
}
function smtp_mailer($to,$subject, $msg){
  $mail = new PHPMailer(); 
  $mail->IsSMTP(); 
  $mail->SMTPAuth = true; 
  $mail->SMTPSecure = 'tls'; 
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587; 
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';
  //$mail->SMTPDebug = 2; 
  $mail->Username = "azhar73397@gmail.com";
  $mail->Password = "fhtgdewqzweznpya";
  $mail->SetFrom("azhar73397@gmail.com");
  $mail->Subject = $subject;
  $mail->Body =$msg;
  $mail->AddAddress($to);
  $mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
  ));
  if(!$mail->Send()){
    echo $mail->ErrorInfo;
  }else{
    return 'Sent';
  }
}
?>
<?php include ('footer.php'); ?>


</body>

</html>

