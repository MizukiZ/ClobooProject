<!DOCTYPE html>
<html lang="en">
<head>
  <title>CloBoo - Register</title>
   <?php include '../_include/common_head.php';?>
  <script><?php include '../controller/register_controller.js'?></script>
 
  <body>
 <?php include'../_include/common_nav.php' ?>
    
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
      <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
          <li><a href="../view/home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
          <li class="active">Register Page</li>
        </ol>
      </div>
    </div>
    <!-- //breadcrumbs -->
    
    <!-- register -->
    <div class="register">
      <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
        <p class="est animated wow zoomIn" data-wow-delay=".5s">Please enter a correct information for become our member and get discount now!</p>
        <div class="login-form-grids">

          <div id="message" class="alert alert-danger text-center" style="display:none;"></div>
          
<!--           <div id="spinIcon" style="display:none;" class="text-center">
          <i class="fa fa-spinner fa-spin"  style="font-size:24px;"></i>  
          </div> -->
          
         <h5 class="animated wow slideInUp" data-wow-delay=".5s">Profile information</h5>
         <form id="registerForm" class="animated wow slideInUp" data-wow-delay=".5s">
            <div class="animated wow slideInUp" data-wow-delay=".5s">
               <input type="text" placeholder="Username" required=" " name="userName" id="userName"><br>
               <input type="email" placeholder="Email Address" required=" " name="email" id="email">
               <input type="password" placeholder="Password" required=" " name="password" id="password">
               <input type="password" placeholder="Password Confirmation" required=" " name="rPassword" id="rPassword">

<!--                <div class="register-check-box">
                 <div class="check">
                   <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                 </div>
               </div> -->
              
            </div>
            <input type="submit" value="Sign Up" name="submit">
          </form>
        </div>
      </div>
    </div>
          <script> <?php include '../controller/cart_controller.js'; ?></script>
    <!-- //register -->
     <?php include'../_include/common_foot.php' ?>
  </body>
</html>