<?php
if(!isset($_SESSION)){ 
session_start(); 
} 


// discount price function
function discountPrice($originalPrice, $discountId){
  $discountArray = array(5,10,15,20,25,30,35,40,45,50);
  
  if($discountId == null){
    return $originalPrice;  
}else{
    $dicountAmount = $originalPrice * $discountArray[$discountId - 1] / 100;
   $finalPrice = $originalPrice - $dicountAmount;
  
  return round($finalPrice,2);
  }
 
};

// include the database object
include '../model/db_init.php';

// get category data
$categoryQuery = "SELECT * FROM category";
$categoryRecods = mysqli_query($database, $categoryQuery);

// get langate data
$languageQuery = "SELECT * FROM language";
$languageRecods = mysqli_query($database, $languageQuery);

// get book type data
$typeQuery = "SELECT * FROM type";
$typeRecods = mysqli_query($database, $typeQuery);

if(isset($_GET['log'])){
  if($_GET['log'] == "logout"){
  // when user click logout button 
  session_destroy();
  }else{
    // login
  }
 
}

// close that connection
mysqli_close($database);
?>