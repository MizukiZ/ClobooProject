<?php 
if(!isset($_SESSION)){ 
session_start(); 
} 

include '../controller/category_controller.php';

$typeArray = array("Electronic","Physical","Second hand");
$categoryBooksArray = array();
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
      
      <!--   criteria chips -->
  <div id="chipsRow" class="row" style="margin:20px; font-size:22px;">
  
  </div>
      
      
      <div class="col-md-2 products-left" style="z-index:3;">
        
        <Input id="titleSearch" type="text" class="form-control" 
               placeholder="search by title"
               value=<?php echo array_key_exists('searchWord', $_SESSION) ? $_SESSION['searchWord'] : null?>> </Input>
        
        <div class="logo-nav-right animated wow zoomIn" data-wow-delay=".5s" style="z-index:4">
          <nav class="navbar navbar-default">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter<b class="caret"></b></a>
                  
                  <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <!-- dynamic generate -->
                          
                    <li class="dropdown-header" style="font-size:18px;">Language</li>
                     <li role="separator" class="divider"></li>
                    
                          <?php while ($languageRecord = mysqli_fetch_array($languageRecods)): ?>
                    
                         <?php 
                      // set chosen language
                         if(array_key_exists('language_id', $_GET)){
                           if($_GET['language_id'] == $languageRecord["id"]){
                             $chosenLanguage = $languageRecord["language_title"] ;
                           }
                          }
                         ?>
                    
                          <li onclick="addConditonAndRefresh('language' , '<?php echo $languageRecord["id"]?>');">
                            <a>
                              <?php echo $languageRecord["language_title"] ?>
                            </a>
                          </li>
                          <?php endwhile?>
                      
                 
                          <!-- dynamic generate -->
                    <li class="dropdown-header" style="font-size:18px;">Book type</li>
                     <li role="separator" class="divider"></li>
                    
                          <?php while ($typeRecord = mysqli_fetch_array($typeRecods)): ?>
                    
                       <?php 
                      // set chosen language
                         if(array_key_exists('type_id', $_GET)){
                           if($_GET['type_id'] == $typeRecord["id"]){
                             $chosenType = $typeRecord["type_title"] ;
                           }
                          }
                         ?>
                    
                          <li onclick="addConditonAndRefresh('type' , '<?php echo $typeRecord["id"]?>');">
                            <a >
                              <?php echo $typeRecord["type_title"] ?>
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
          <div class="products-right-grids">
            
            <div class="row" style="padding:15px;">
              
           <h2 style="display:inline;" class="col-xs-3">
            <?php echo $category_title?>
          </h2>
              
       <!-- sort by dropdown menu -->
        <div class="col-xs-2 btn-group col-xs-offset-4">
          <button type="button" class="btn btn-default">Sort by</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li onclick="addConditonAndRefresh('sortBy' , 'sold_amount');">
              <a>Popularity</a>
            </li>
            <li onclick="addConditonAndRefresh('sortBy' , 'publish_date');">
              <a>Publish date</a>
            </li>
             <li onclick="addConditonAndRefresh('sortBy' , 'cost');">
               <a>Price</a>
            </li>
          </ul>
        </div>
              
               <div class="col-xs-2">
                 <button class="btn btn-danger" onclick="resetConditioin()">Reset Conditons</button>
              </div>
              
            </div>
          </div>
        </div>
        <div class="new-collections-grid1-image">
          
          <div class="new-collections-grids" id="categoryBody">
            
            <!-- Dynamic generate -->
            <?php   
             $index = 1;
             while ($categoryBooks = mysqli_fetch_array($categoryBookRecods)):?>
            
            <?php 
            // create an array on the fly to pass to js file
            $book = array();
            
            $book["id"] = $categoryBooks['id'];
            $book["title"] = $categoryBooks['title'];
            $book["image"] = $categoryBooks['image'];
            $book["type_id"] = $categoryBooks['type_id'];
            $book["discount_id"] = $categoryBooks['discount_id'];
            $book["cost"] = $categoryBooks['cost'];
            
            array_push($categoryBooksArray,$book)
            ?>
             <!-- add row opening tab -->
             <?php  if($index == 1 || $index%4==0) echo "<div class='row'>";?>
             <div class="col-md-4 new-collections-grid">
              <div class="new-collections-grid1 animated wow slideInRight" data-wow-delay=".5s">
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
                <div class="occasion-cart new-collections-grid1-left">
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
                  <a  id="addCart" style="cursor:pointer" class="item_add" onClick="addCart(<?php echo
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
  
<script type="text/javascript">
    // pass stirng queries
    let categoryId="<?php echo $_GET['category_id'];?>";
    let categoryTitle="<?php echo $_GET['category_title'];?>"
    let languageId="<?php echo array_key_exists('language_id', $_GET) ? $_GET['language_id'] : '' ;?>"
    let typeId="<?php echo array_key_exists('type_id', $_GET) ? $_GET['type_id'] : '' ;?>"
    let sortBy="<?php echo array_key_exists('sortBy', $_GET) ? $_GET['sortBy'] : '' ; ?>"
    let searchWord="<?php echo array_key_exists('searchWord', $_SESSION) ? $_SESSION['searchWord'] : null?>"
    let chosenLanguage = "<?php echo array_key_exists('language_id', $_GET) ? $chosenLanguage : "";?>"
    let chosenType = "<?php echo array_key_exists('type_id', $_GET) ? $chosenType : "";?>"

   
    // pass books array to js file as categoryArray
    let categoryArray = <?php print_r(json_encode($categoryBooksArray));?>;
  </script>

 <script> <?php include '../controller/cart_controller.js'; ?></script>
 <script> <?php include '../controller/category_controller.js'; ?></script>

  
 <?php include'../_include/common_foot.php' ?>
  
</body>

</html>