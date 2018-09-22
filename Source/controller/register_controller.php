<?php
if(!isset($_SESSION)){ 
session_start(); 
} 

// include the database object
include '../model/db_init.php';
include_once '../_helper/console_log.php';

if(isset($_POST['submit'])){
  // when submit button is clicked
 
// set valiable from register form
$name = $_POST["userName"];
$email = $_POST["email"];

// hashing the password
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$rPassword = $_POST["rPassword"];
  
  if($_POST["password"] != $rPassword){
  // password confirmation failed
      echo "Could not confirm password";
     exit();
  }else{
    // password confirmation succeeded
    
// set query the level is always 2 (normal user)
$query = "INSERT INTO user (user_name, email, password,level) VALUES ('" . $name . "','" . $email . "','" . $password . "', 2)";

$result = mysqli_query($database, $query);

    if (!$result) {
        // error handling
      
      if($database->errno == 1062){
        // duplication error (email is unique)
        echo 
          "The Email address is already taken. Please use other one";
       
      } else{
        echo "Sorry something went wrong";
      }
      
       exit();
    } else {
     
      // set login user info
      $_SESSION['current_user'] = array("name" => $name, "email" => $email);
      echo "registered";
      exit();
    }
    
  }

}
mysqli_close($database);

?>