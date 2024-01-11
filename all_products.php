<!DOCTYPE html>

<html lang="en">
<?php 
include("functions/functions.php");
session_start();
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
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php"style="color:rgb(0, 0, 0);;font-weight:bolder;">All products</a></li>
            <li><a href="my_account.php">My account</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <div id="form">
            <form method="grt" action="results.php"enctype="multipart/form-data">
            <input type="text"name="user_query" placeholder="Search product...">
            <button ><input type="submit"name="search"value="search"></button>         </form>
        </div>
        </div>



        <div class="content_wrapper">
            
            <div id="sidebar">
                <div id="slidebar_title">
                    Categories
                </div>
                     
        <ul id="cats" >
       
        <?php getCats(); ?>
       
       
        </ul>
            </div>
            <div id="content_area">
                
                </div>

                <div class="product_box">


                   

                </div>
                
            </div>
            <h1 align="center">All products here</h1>

        </div>

        
      
        
        <?php include ('footer.php'); ?>


        
