<?php

include 'includes/db.php';


//$conn=mysqli_connect('localhost:3306','root','180238','online_examination_system');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/style.css" />
  <title>Online Examination System</title>
  <style type="text/css">
  	form {
  		border: 3px solid #f1f1f1; 
  		width: 700px; 
  		margin-left: 300px;
  		margin-top: 50px;
  	}

input[type=text],input[type=number], input[type=password] {
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


 

<form action="verify.php" method="post">

  <div class="container">

    <label for="otp"><b>Enter your OTP which have been sent to your Email</b></label> <br>
    <input type="number" placeholder="Enter 6 Digit OTP" name="otp" required><br>


    <button type="submit" name="submit">Verify</button>
  </div>
    
  </div>
</form>
<?php 

//error_reporting(0);


if(isset($_POST['submit']))
{
	$otp=$_POST['otp'];

	//$password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql2="SELECT code from otp_code";
	$query2=mysqli_query($con,$sql2);
    while($row=mysqli_fetch_array($query2))
    {
        if($row['code']==$otp)
        {
            //echo "Ok";
            header("Location: cart.php");
            
        }
        else{
            echo "Wrong";
        }
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

?>
</body>

</html>