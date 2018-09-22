<?php
session_start();

// include the database object
include '../model/db_init.php';

if(isset($_POST['submit'])){
  // when submit button is clicked
  
$email = $_POST["email"];
$password = $_POST["password"];


// get user that has the input email address. (email address is unique value)
$query = "SELECT * FROM user WHERE email = '" . $email . "' LIMIT 1";
$result = mysqli_query($database, $query);

if($result){
 // query request success handling 
  
if (mysqli_num_rows($result) > 0) {
  // when there is a match user
    $userData = mysqli_fetch_array($result);

  // verify the input password
    if (password_verify($password, $userData["password"])) {
      // password is validated
      
       // set login user
       // set login user info
      $_SESSION['current_user'] = array("name" => $userData["user_name"], "email" => $userData["email"]);
      echo "validated";
      exit();
       
    } else {
    
       // set error message
        echo  "Invalid password";
      exit();
    }
}else{
  // no much user
  // set error message
         echo "No user found";
         exit();
}
}else{
   // error handling
         echo "Your query is worng. Test it on phpmyadmin. The request query was: " .$query;
         exit();
}
  
}

// close that connection
mysqli_close($database);
  
?>