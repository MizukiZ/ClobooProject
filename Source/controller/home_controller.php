<?php
// include the database object
include '../model/db_init.php';

// get most recent 6 books
$newBookQuery = "SELECT * FROM book ORDER BY publish_date DESC LIMIT 6";
$newBookRecods = mysqli_query($database, $newBookQuery);

// get most sold 6 books
$popularBookQuery = "SELECT * FROM book ORDER BY sold_amount DESC LIMIT 6";
$popularBookRecods = mysqli_query($database, $popularBookQuery);

// get now hot book (admin user choose manually)
$hotBookQuery = "SELECT * FROM book WHERE id= '22' LIMIT 1";
$hotBookRecods = mysqli_query($database, $hotBookQuery);

// close that connection
mysqli_close($database);
?>