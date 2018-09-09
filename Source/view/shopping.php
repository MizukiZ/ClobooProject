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
        <li class="active">Checkout Page</li>
      </ol>
    </div>
  </div>
  <!-- //breadcrumbs -->
  
  <!-- checkout -->
  <div class="checkout">
    <div class="container">
      <!-- display total of amounts -->
      <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains: <span class = "itemCount"><?php echo isset($_SESSION['booksArray']) ? count($_SESSION['booksArray']) : 0 ?></span>
        
       <p id="containMessage" style="display:inline">
            <?php 
  // detect product or products based on contained prodct
  if(isset($_SESSION['booksArray'])){
    $message = count($_SESSION['booksArray']) <= 1 ? "product" : "products";
                     echo $message;
  }else{
    echo "product";
  }     
        ?>
        </p>
      </h3>
      <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
        <!-- Mizuki's Codes -->
        <table class="table table-striped">
          <thead>
            <!-- html is generated form js code -->
          </thead>
          <tbody>
            <!-- html is generated form js code -->
          </tbody>
        </table>
        <!-- //Mizuki's Codes -->
      </div>
      <div class="checkout-left">	
   
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="<?php echo  $_SESSION["prevUrl"]; ?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
    </div>
  </div>


  <script type="text/javascript">
    // pass books array to js file as cartData
    let cartData = <?php print_r(json_encode($_SESSION['booksArray']));?>;
  </script>
  
    
   <script type="text/javascript">
    <?php include '../controller/shopping_controller.js'; ?>
  </script>
  
  <?php include'../_include/common_foot.php' ?>
</body>

</html>