<?php

// upload library 
require "/home/cabox/workspace/vendor/autoload.php";
include "/home/cabox/workspace/vendor/verot/class.upload.php/src/class.upload.php";

// database
include "../model/db_init.php";

$handle = new upload($_FILES['image']);
$fileInfo = pathinfo($_FILES['image']['name']);


// clicked save button
if (isset($_POST['submit'])) {

    if ($handle->uploaded) {
      // get uniqid for upload image
        $imageName = uniqid();

        //  name the file with uniqu ID and file extension
        $handle->file_new_name_body = $imageName;

        $handle->image_resize = true;
        $handle->image_x = 100;
        $handle->image_ratio_y = true;
      // directory to put the image
        $handle->process('/home/cabox/workspace/Source/_asset');

        if ($handle->processed) {
            // success process
          
            
            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = 3; 
            $price = $_POST['price'];
            $image = $imageName . '.' . $fileInfo['extension'];
            $categoryId = 1; //for testing
            $userId = 10;  // for testing
          
           
        $query = "INSERT INTO book (title, description, type, cost, image, category_id, user_id) VALUES (
        '" . $title . "','" . $description . "','" . $type . "','" . $price . "','" . $image . "','" . $categoryId . "','" . $userId . "')";
          
          //  insert data into database
         $result =  mysqli_query($database,$query);
          
          if(!$result){
            echo "somethig is wrong with query. request query : ". $query;
             }
            
          
            $handle->clean();

//             redirect to home page
           header("Location: ../view/home.php");
           die();
          
          
        } else {
            echo 'error : ' . $handle->error;
        }
    } else {
        echo 'something went wrong';
    }
}

// close that connection
mysqli_close($database);
?>
