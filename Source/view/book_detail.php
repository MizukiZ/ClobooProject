<?php 
include '../controller/book_detail_controller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php while ($foundBook = mysqli_fetch_array($bookRecods)): ?>
  <title>CloBoo - <?php echo $foundBook["category_title"]?></title>
  <?php include '../_include/common_head.php';?>
  
</head>

<body>
  <?php include'../_include/common_nav.php' ?>
  <!-- breadcrumb -->
  <div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="../view/home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li><a href="../view/category.php?category_id=<?php echo $foundBook["category_id"]?>&category_title=<?php echo $foundBook["category_title"]?>"><?php echo $foundBook["category_title"];?></a></li>
        <li class="active"><?php echo $foundBook["title"];?></li>
			</ol>
		</div>
	</div>
  <div class="clearfix"></div>
  <!-- //breadcrumb -->

  <div class="container">
    <!-- Source Code -->
    <div class="single">
		<div class="container">
			<div class="col-md-12 single-right">
				<div class="col-md-5 single-right-left animated wow slideInLeft" data-wow-delay=".5s">
					<img src="../_asset/<?php echo $foundBook["image"];?>" height=450 width=300 alt="...">
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h2 id="bookTitle">Name: <strong><?php echo $foundBook["title"];?></strong></h2>
          <p>Type: <?php echo $foundBook["type_title"];?></p>
          
					<h4><span class="item_price">$<?php echo discountPrice($foundBook['cost'],$foundBook['discount_id']);?></h4>
            
					<div class="description">
            <h3><i>Published Date</i></h3>
            <p id="bookDate"><?php echo $foundBook["publish_date"];?></p><br>
            <h3><i>Author</i></h3>
            <p id="bookAut"><?php echo $foundBook["author"];?></p><br>
					</div>
            
					<div class="occasion-cart">
            <a  id="addCart" style="cursor:pointer" class="item_add" onClick="addCart(<?php echo
  $foundBook['id'] . ",'" // book id
  . str_replace("'","\'",$foundBook['title']) . "',"  // book title. *Escaping single quote
  . discountPrice($foundBook['cost'],$foundBook['discount_id']) . "," . // book cost
  $foundBook['type_id'] ; // book type id ?>);">add to cart</a>
					</div>
				</div>
          
				<div class="clearfix"> </div>
          
				<div class="bootstrap-tab animated wow slideInLeft" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p><?php echo $foundBook["description"]?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
      
  <?php endwhile?>
    </div>
    <script> <?php include '../controller/cart_controller.js'; ?></script>
  <?php include'../_include/common_foot.php' ?>
      
</body>
</html>