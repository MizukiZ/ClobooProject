<?php
// include the database object
include '../model/db_init.php';

// get string query
$id = $_GET['book_id'];

// find one book data by id
$bookQuery = " 
SELECT book.id,book.title, book.description, book.author, book.language_id, book.publish_date, book.type_id, type.type_title, book.cost, book.image, book.sold_amount, book.stock, category.category_title, book.category_id, book.user_id, book.discount_id FROM book 
INNER join category on book.category_id = category.id 
INNER join type on book.type_id = type.id
WHERE book.id=" . "'" . $id . "'";
  
$bookRecods = mysqli_query($database, $bookQuery);

// close that connection
mysqli_close($database);
?>