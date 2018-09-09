<?php 
if(!isset($_SESSION)){ 
session_start(); 
} 

require_once('/home/cabox/workspace/vendor/autoload.php');

// stripe method

// Secret Key
$secret_key = 'sk_test_COabrp6J6GigpDhmKfGPdXQa';
\Stripe\Stripe::setApiKey($secret_key);
 
//  check if token and email is set
if (isset($_POST['stripeToken']) && isset($_POST['stripeEmail'])) {
 
 $token = $_POST['stripeToken'];
 $email = $_POST['stripeEmail'];
 $stripeAmount = $_POST['stripeAmount'];
  
// chekcout process
try {
$charge = \Stripe\Charge::create(array(
'source' => $token,
'amount' => $stripeAmount,
'currency' => 'aud',
));
} catch (\Stripe\Error\Card $e) {
// error handling
die('Error');
}
  
  // empty cart array
$_SESSION["booksArray"] = array();
  
$chargeID = $charge->id;
  
// set the id to session
  $_SESSION['charge_id'] = $chargeID;
exit;
}


if(!isset($_SESSION)){ 
session_start(); 
} 

// type array
$typeArray = array("Electronic","Physical","Second hand");
$total = 0;

// when user click cart logo save previous page url to go back
if(isset($_POST['url'])){
  unset($_SESSION['prevUrl']); 
  // set current url
  $_SESSION["prevUrl"] = $_POST['url']; 
 
  echo $_SESSION["prevUrl"];
}

if(isset($_POST['del'])){
  // when delete button is clicked 
  
  // filter the corresponding book from session array 
  $_SESSION['booksArray'] = array_filter($_SESSION['booksArray'], function($book){
    return $book['id'] != $_POST['del'];
});
  
  // return all array vlues(otherwise not array type)
  $_SESSION['booksArray'] = array_values($_SESSION['booksArray']);
  
  
  print json_encode($_SESSION['booksArray']);
}

// caluculate total price
if(isset($_SESSION['booksArray'])){
  
foreach($_SESSION['booksArray'] as $book){
 $total += $book["cost"];
}
  
}

