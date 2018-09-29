<?php
if(!isset($_SESSION)){ 
session_start(); 
} 

if(isset($_POST['book_id']) && isset($_POST['quantity'])){
  // when user changes the quantity of item update card data array
  $id = $_POST['book_id'];
  $quantity = $_POST['quantity'];

  foreach($_SESSION["booksArray"] as &$book){
   if($id == $book['id']){
     // update quantity
     $book['quantity'] = $quantity;
   }
   
  }
  
  echo json_encode($_SESSION["booksArray"]);
  exit();
}

if(isset($_POST['empty'])){
  // empty cart array
  $_SESSION["booksArray"] = array();
  exit();
}

if(!isset($_SESSION["booksArray"])){
  // if books array is not there, create new one
$_SESSION["booksArray"] = array();
  
}
$isFirstAdd = true;

foreach($_SESSION["booksArray"] as $book){
  if($book["id"] == $_POST['id']){
    // already exits in the cart data so set false
    $isFirstAdd = false;
  }
}

if($isFirstAdd){
  $bookDetail = array();

$bookDetail["id"] = $_POST['id'];
$bookDetail["title"] = $_POST['title'];
$bookDetail["cost"] = $_POST['cost'];
$bookDetail["type"] = $_POST['type'];
  // default stock is 1
$bookDetail["quantity"] = 1;
  // push book detail to session array 
array_push($_SESSION["booksArray"], $bookDetail);
}

$returnInfo["count"] = count($_SESSION["booksArray"]);
$returnInfo["firstAdd"] = $isFirstAdd;


echo json_encode($returnInfo);