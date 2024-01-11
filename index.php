

<?php include ('header.php'); ?>

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
        <?php cart(); ?>
        <div id="shopping_cart">


            <span style="float:right;font-size:20px;padding:5px;line-height:40px;">
            

            <b style="padding-right:15px;"> 
            <?php if(!isset($_SESSION['customer_email'])){
                echo "<a href='login.php'>Login Now</a>";
            }
                else {
                    echo "<a href='logout.php'>Logout</a>";}


?></b>



</span>

    </div>

    <div id="product_box">

       
        </div>


    </div>
    <h1 align="center"> Here all Products </h1>
</div>


<?php include ('footer.php'); ?>


