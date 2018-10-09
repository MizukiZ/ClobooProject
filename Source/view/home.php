<?php
include '../controller/home_controller.php';

$typeArray = array("Electronic","Physical","Second hand");

?>

<html>
<head>
  <title>CloBoo - Home</title>
  <?php include '../_include/common_head.php' ?>
</head>

<body>
  
 <?php include'../_include/common_nav.php' ?>
  
  <!-- banner -->
  <div class="banner" style="background:url('../_asset/cloboo_bg1.jpeg') repeat 0px 0px; width: 100%">
    <div class="container">
      <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
        <h3>CloBoo</h3>
        <h4>Up to <span>50% <i>Off/-</i></span></h4>
        <div class="wmuSlider example1">
          <div class="wmuSliderWrapper">
            <article style="position: absolute; width: 100%; opacity: 0;">
              <div class="banner-wrap">
                <div class="banner-info1">
                  <p>Find more books</p>
                </div>
              </div>
            </article>
            <article style="position: absolute; width: 100%; opacity: 0;">
              <div class="banner-wrap">
                <div class="banner-info1">
                  <p>Easy buy + More Books = best shop</p>
                </div>
              </div>
            </article>
            <article style="position: absolute; width: 100%; opacity: 0;">
              <div class="banner-wrap">
                <div class="banner-info1">
                  <p>Low price Events coming !!</p>
                </div>
              </div>
            </article>
          </div>
        </div>
        <script src="../_js/jquery.wmuSlider.js"></script>
        <script>
          $('.example1').wmuSlider();
        </script>
      </div>
    </div>
  </div>
  <!-- //banner -->
  
  <!-- new_collections -->
  <div class="new-collections">
    <div class="container">
      <h3 class="animated wow zoomIn" data-wow-delay=".5s">New Collections</h3>
      <div class="new-collections-grids">
         
        <!-- Dynamic generate -->
        <?php      
       $index = 1;
       while ($dataRow = mysqli_fetch_array($newBookRecods)):
        ?>
<!--            add row opening tab               -->
       <?php  if($index == 1 || $index % 4 == 0) echo "<div class='row'>";?>
        <div class="col-md-4 new-collections-grid">
          <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
            <div class="new-collections-grid1-image">
              <a href="../view/book_detail.php?book_id=<?php echo $dataRow["id"]?>" class="product-image">
                <img src="../_asset/<?php echo $dataRow['image']?>" alt=" " class="img-responsive" style="width:300px; height:450px" /></a>
              <div class="new-collections-grid1-image-pos">
                <a href="../view/book_detail.php?book_id=<?php echo $dataRow["id"]?>">Quick View</a>
              </div>
            </div>
            <h4><a href="../view/book_detail.php?book_id=<?php echo $dataRow["id"]?>">
              <?php echo $dataRow['title']?>
              </a></h4>
            <h5><?php echo $typeArray[$dataRow['type_id']-1]?></h5>
            <div class="new-collections-grid1-left simpleCart_shelfItem occasion-cart">
             
              <p>
                <!-- if discount is applyed -->
                <?php if($dataRow["discount_id"] != null):?>
                
                 <i>$<?php echo $dataRow['cost']?></i>
                
                <span class="item_price">
                $<?php echo discountPrice($dataRow['cost'], $dataRow["discount_id"]);?>
                </span>
                
                <?php else:?>
                <!-- if no discount is applyed -->
                <span class="item_price">
                $<?php echo $dataRow['cost'];?>
                </span>
                
                <?php endif ?>
              </p>
                <a  id="addCart" style="cursor:pointer" class="item_add" onClick="addCart(<?php echo
  $dataRow['id'] . ",'" // book id
  . str_replace("'","\'",$dataRow['title']) . "',"  // book title. *Escaping single quote
  . discountPrice($dataRow['cost'],$dataRow['discount_id']) . "," . // book cost
  $dataRow['type_id'] ; // book type id ?>);">add to cart</a>
            </div>
          </div>
         </div>
        <!-- add row closing tab -->
        <?php if($index % 3 == 0 || $index % 6 == 0) echo "</div>";     
              //increment index
              $index += 1; 
              endwhile ?> 
      </div>
    </div>
  </div>
  <!-- //new_collections -->
  
  <!-- hot_selling -->
  <div class="new-collections">
    <div class="container">
      <h3 class="animated wow zoomIn" data-wow-delay=".5s">Hot Selling</h3>
      <div class="new-collections-grids">
         
        <!-- Dynamic generate -->
        <?php 
                $index = 1;
                while ($dataRow = mysqli_fetch_array($popularBookRecods)):
        ?>
<!--            add row opening tab               -->
       <?php  if($index == 1 || $index % 4 == 0) echo "<div class='row'>";?>
        <div class="col-md-4 new-collections-grid">
          <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
            <div class="new-collections-grid1-image">
              <a href="../view/book_detail.php?book_id=<?php echo $dataRow["id"]?>" class="product-image">
                <img src="../_asset/<?php echo $dataRow['image']?>" alt=" " class="img-responsive" style="width:300px; height:450px" /></a>
              <div class="new-collections-grid1-image-pos">
                <a href="../view/book_detail.php?book_id=<?php echo $dataRow["id"]?>">Quick View</a>
              </div>
            </div>
            <h4><a href="../view/book_detail.php?book_id=<?php echo $dataRow["id"]?>">
              <?php echo $dataRow['title']?>
              </a></h4>
            <h5><?php echo $typeArray[$dataRow['type_id']-1]?></h5>
            <div class="new-collections-grid1-left simpleCart_shelfItem occasion-cart">
             
              <p>
                <!-- if discount is applyed -->
                <?php if($dataRow["discount_id"] != null):?>
                
                 <i>$<?php echo $dataRow['cost']?></i>
                
                <span class="item_price">
                $<?php echo discountPrice($dataRow['cost'], $dataRow["discount_id"]);?>
                </span>
                
                <?php else:?>
                <!-- if no discount is applyed -->
                <span class="item_price">
                $<?php echo $dataRow['cost'];?>
                </span>
                
                <?php endif ?>
              </p>
                <a  id="addCart" style="cursor:pointer" class="item_add" onClick="addCart(<?php echo
  $dataRow['id'] . ",'" // book id
  . str_replace("'","\'",$dataRow['title']) . "',"  // book title. *Escaping single quote
  . discountPrice($dataRow['cost'],$dataRow['discount_id']) . "," . // book cost
  $dataRow['type_id'] ; // book type id ?>);">add to cart</a>
            </div>
          </div>
         </div>
        <!-- add row closing tab -->
        <?php if($index % 3 == 0 || $index % 6 == 0) echo "</div>";     
              //increment index
              $index += 1; 
              endwhile ?> 
      </div>
    </div>
  </div>
  <!-- //hot_selling -->
  
  <!-- collections-bottom -->
  <div class="collections-bottom">
    <div class="container">
      <div class="newsletter animated wow slideInUp" data-wow-delay=".2s">
        <h3>Newsletter</h3>
        <p>Join us now to get all news and special offers.</p>
        <form>
          <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          <input type="email" value="Enter your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email address';}" required="">
          <input type="submit" value="Join Us">
        </form>
      </div>
    </div>
  </div>
  <!-- //collections-bottom -->
  
   <script> <?php include '../controller/cart_controller.js'; ?></script>
   <?php include'../_include/common_foot.php' ?>
</body>

</html>