<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CloBoo - Login</title>

  <!-- include commom header such as boot strap -->
  <?php include "../_include/common_head.php" ?>

  <script>
    <?php include "../controller/login_controller.js"?>
  </script>

</head>

<body>
  <?php include "../_include/common_nav.php" ?>

  <!-- breabcrumb -->
  <div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li class="active">Login Page</li>
      </ol>
    </div>
  </div>
  <!-- //breabcrumb -->

  <!-- login -->
  <div class="login">
    <div class="container">
      <h3 class="animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Login Form</h3>
      <p class="est animated wow zoomIn animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Please enter your E-mail address and password, if you don't have account please register now.</p>



      <div class="login-form-grids animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
        
           <div id="message" class="alert alert-danger text-center" style="display:none;"></div>
          
          <div id="spinIcon" style="display:none;" class="text-center">
          <i class="fa fa-spinner fa-spin"  style="font-size:24px;"></i>  
          </div>
        
        <form class="form-signin" id="loginForm">
          <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
          <div class="forgot">
            <a href="#">Forgot Password?</a>
          </div>
          <input type="submit" value="Login">
        </form>
      </div>
      <h4 class="animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">For New People</h4>
      <p class="animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;"><a href="../view/register.php">Register Here</a>(Or) go back to<a href="../view/home.php">Home</a></p>
    </div>
  </div>
  <!-- //login -->
  <?php include "../_include/common_foot.php" ?>
</body>

</html>