<?php 
include '../controller/category_controller.php';

$typeArray = array("Electronic","Physical","Second hand");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>CloBoo - Category</title>
  <?php include '../_include/common_head.php' ?>
</head>

<body>
  <?php include'../_include/common_nav.php' ?>

  <!-- breadcrumb -->
  <div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="../view/home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li>Books</li>
				<li class="active"><?php echo $category_title?></li>
			</ol>
		</div>
	</div>
  <!-- //breadcrumb -->
  
  <div class="products" style="padding:3em 0 0 0;">
		<div class="container">
      <div class="col-md-2 products-left" style="z-index:3;">
        <div class="logo-nav-right animated wow zoomIn" data-wow-delay=".5s" style="z-index:4">
          <nav class="navbar navbar-default">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
                  
                  <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <!-- dynamic generate -->
                          
                    <li class="dropdown-header" style="font-size:18px;">Language</li>
                     <li role="separator" class="divider"></li>
                    
                          <?php while ($categoryBooks = mysqli_fetch_array($languageRecods)): ?>
                          <li>
                            <a href="">
                              <?php echo $categoryBooks["language_title"] ?>
                            </a>
                          </li>
                          <?php endwhile?>
                      
                 
                          <!-- dynamic generate -->
                    <li class="dropdown-header" style="font-size:18px;">Book type</li>
                     <li role="separator" class="divider"></li>
                    
                          <?php while ($categoryBooks = mysqli_fetch_array($typeRecods)): ?>
                          <li>
                            <a href="">
                              <?php echo $categoryBooks["type_title"] ?>
                            </a>
                          </li>
                          <?php endwhile?>
                       
                 </ul>
                  
               </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-md-10 products-right">
        <div class="products-right-grid" style="position:relative;z-index:10;">
          <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
            
            <div class="row" style="padding:15px;">
              
           <h2 style="display:inline;" class="col-xs-3">
            <?php echo $category_title?>
          </h2>
              
       <!-- sort by dropdown menu -->
        <div class="col-xs-3 btn-group col-xs-offset-6">
          <button type="button" class="btn btn-default">Sort by</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="category.php?category_id=<?php echo $_GET['category_id']?>&category_title=<?php echo $_GET['category_title']?>&sortBy=sold_amount">Popularity</a></li>
            <li><a href="category.php?category_id=<?php echo $_GET['category_id']?>&category_title=<?php echo $_GET['category_title']?>&sortBy=publish_date">Publish date</a></li>
             <li><a href="category.php?category_id=<?php echo $_GET['category_id']?>&category_title=<?php echo $_GET['category_title']?>&sortBy=cost">Price</a></li>
          </ul>
        </div>
            </div>
          </div>
        </div>
        <div class="new-collections-grid1-image">
          
          <div class="new-collections-grids">
            <!-- Dynamic generate -->
            <?php   
             $index = 1;
             while ($categoryBooks = mysqli_fetch_array($categoryBookRecods)):?>
             <!-- add row opening tab -->
             <?php  if($index == 1 || $index%4==0) echo "<div class='row'>";?>
             <div class="col-md-4 new-collections-grid">
              <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                <div class="new-collections-grid1-image">
                  <a href="../view/book_detail.php?book_id=<?php echo $categoryBooks["id"]?>" class="product-image">
                  <img src="../_asset/<?php echo $categoryBooks['image']?>" alt=" " class="img-responsive" style="width:150px; height:220px"/></a>
                    <div class="new-collections-grid1-image-pos">
                      <a href="../view/book_detail.php?book_id=<?php echo $categoryBooks["id"]?>">Quick View</a>
                    </div>
                </div>
                <h4>
                  <a href="../view/book_detail.php?book_id=<?php echo $categoryBooks["id"]?>">
                  <?php echo $categoryBooks['title']?>
                  </a>
                </h4>
                <h5>
                  <?php echo $typeArray[$categoryBooks['type_id']-1]?>
                </h5>
                <div class="new-collections-grid1-left simpleCart_shelfItem occasion-cart">
                                <p>
<!--                 if discount is applyed -->
                <?php if($categoryBooks["discount_id"] != null):?>
                
                 <i>$<?php echo $categoryBooks['cost']?></i>
                
                <span class="item_price">
                $<?php echo discountPrice($categoryBooks['cost'], $categoryBooks["discount_id"]);?>
                </span>
                
                <?php else:?>
<!--                 if no discount is applyed -->
                <span class="item_price">
                $<?php echo $categoryBooks['cost'];?>
                </span>
                
                <?php endif ?>
              </p>
                  <a  id="addCart" class="item_add" onClick="addCart(<?php echo
                $categoryBooks['id'] . ",'" // book id
                . str_replace("'","\'",$categoryBooks['title']) . "',"  // book title. *Escaping single quote
                . discountPrice($categoryBooks['cost'],$categoryBooks['discount_id']) . "," . // book cost
                $categoryBooks['type_id'] ; // book type id ?>);">add to cart</a>
                </div>
             </div>
            </div>
            <!-- add row closing tab -->
            <?php if($index%3==0 || $index%6==0) echo "</div>";     
                   // increment index
                   $index += 1; 
                   endwhile ?>
          </div>
        </div>
      </div>
    </div>
  </div>

 <script> <?php include '../controller/cart_controller.js'; ?></script>
  
 <?php include'../_include/common_foot.php' ?>
  
</body>

</html>