<?php 
if(!isset($_SESSION)){ 
session_start(); 
} 


include '../controller/shopping_controller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>CloBoo - Checkout</title>
  <?php include '../_include/common_head.php' ?>
</head>

<body>
  <?php include'../_include/common_nav.php' ?>
  
  <!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li><a href="../view/home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li class="active">Thank you Page</li>
      </ol>
    </div>
  </div>
  <!-- //breadcrumbs -->
  
 
<div class="jumbotron text-center" style="margin:15px;"> 
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Your transaction ID is</strong> <i id="charge_id"><?php echo $_SESSION['charge_id']; ?></i></p>
  <hr>
  <p>
    Having trouble? <a href="contact_us.php">Contact us</a>
  </p>
  
</div>
  
  <?php include'../_include/common_foot.php' ?>
</body>

</html>

