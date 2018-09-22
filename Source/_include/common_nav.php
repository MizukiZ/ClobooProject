<?php
if(!isset($_SESSION)){ 
session_start(); 
} 

include '../controller/nav_controller.php';
$index = 1;
?>

  <script>
    <?php include "../controller/nav_controller.js" ?>
  </script>

  <!-- header -->
  <div class="header">
    <div class="container">
      
       <!-- Modal for logout icon-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="logoutBtn">Logout</button>
      </div>
    </div>
  </div>
</div>
      
     <!-- Modal for First login-->
 <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Hello <?php echo $_SESSION['current_user']['name'] ?>, Welcome to Cloboo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Registration successfully completed. We send a message to your email address(<?php echo $_SESSION['current_user']['email'] ?>). Please check your account details.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
      
       <!-- Modal for loadin icon-->
  <div class="modal fade text-center" id="spinIcon" role="dialog">
  <i class="fa fa-spinner fa-spin"  style="font-size:88px; margin:20% 0 0 0;"></i>  
  </div>
      
  <!-- Modal for add cart-->
  <div class="modal fade" id="addCartModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Added to your shopping cart</h4>
        </div>
        <div class="modal-body">
          <p>
            <a href="http://advancedweb-clobooait383893.codeanyapp.com/Source/view/shopping.php">
               <i class="fa fa-cart-plus fa-2x"  style="color:orange;"></i>
              Go to shopping cart
            </a>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      
      <div class="header-grid">
        <div class="header-grid-left" style="width:100%">
          <ul style="width:100%">
            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:clobooait@gmail.com">clobooait@gmail.com</a></li>
            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+61 xxx xxx xxx</li>

            <!-- toggle login and  logout button by current user status -->
            <?php $user_loggedin = isset($_SESSION["current_user"]) ? true : false?>

            <li id="login" style="display:<?php echo $user_loggedin ? " none " : "inline " ?>"><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="../view/login.php">Login</a></li>

            <li id="logout" style="cursor: pointer; display:<?php echo $user_loggedin ? " inline " : "none " ?>"><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>Logout</li>

            <li id="registerNav" style="display:<?php echo $user_loggedin ? " none " : "inline " ?>"><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="../view/register.php">Register</a></li>
            
            <li id="username" style="float: right; display:<?php echo $user_loggedin ? " inline " : "none " ?>">
             Hello <?php echo $_SESSION['current_user']['name'] ?> </li>
            
          </ul>
          
        </div>
      </div>
      <div class="logo-nav">
        <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
          <a href="../view/home.php"><img src="../_asset/WebLogo.png" width="230px" height="90px"/></a>
        </div>
        <div class="logo-nav-left1">
          <nav class="navbar navbar-default">
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
              <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
              <ul class="nav navbar-nav">
                <li><a href="../view/home.php">Home</a></li>
                <!-- Mega Menu -->

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Books <b class="caret"></b></a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li class="dropdown-header" style="font-size:18px;">Category</li>
                     <li role="separator" class="divider"></li>
                          <!-- dynamic generate -->
                         
                          <?php while ($dataRow = mysqli_fetch_array($categoryRecods)): ?>
                          <li>
                            <a href="../view/category.php?category_id=<?php echo $dataRow["id"]?>&category_title=<?php echo $dataRow["category_title"]?>">
                              <?php echo $dataRow["category_title"] ?>
                            </a>
                          </li>
                          <?php endwhile?>
                  </ul>
                </li>

                <li><a href="../view/about.php">About Us</a></li>
                <li><a href="../view/contact_us.php">Contact Us</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>

      <div class="header-right">
        <div class="cart box_1">
          <h3>
            <span class="itemCount" style="color:orange;"><?php echo isset($_SESSION['booksArray']) ? count($_SESSION['booksArray']) : 0 ?></span>
            <!-- <img id="goCart" src="../_asset/cartLogo.png" width="32px" height="32px" alt="" /> -->
            <i id="goCart" class="fa fa-cart-plus fa-2x"  style="color:orange;"></i>
          </h3>
          <a class="text-muted" style="cursor:pointer; width:95px; height:22px;" onclick="emptyCart();">Empty cart</a>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <!-- //header -->