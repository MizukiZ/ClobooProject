<?php

function conbineQuery($language_id = '', $type_id = '', $sortBy = ''){
  // default the filter query is empty
  $conditionQuery = '';
  

      if($language_id != ''){
        // if language filter is required
        $conditionQuery .= " AND language_id=". "'" . $language_id . "'";
      }
    
    if($type_id != ''){
        // if type filter is required
        $conditionQuery .= " AND type_id=". "'" . $type_id . "'";
      }

  
  if($sortBy !=''){
    // if sort conditon is not required
    $conditionQuery .= ' ORDER BY ' . $sortBy . ' DESC';
  }
  
   return $conditionQuery;
}


// include the database object
include '../model/db_init.php';

$id = $_GET['category_id'];
$category_title = $_GET['category_title'];

if(isset($_GET['sortBy']) || isset($_GET['language_id']) || isset($_GET['type_id'])){
  
  // if any condition query is required
  $conbinedQuery = conbineQuery(array_key_exists('language_id', $_GET) ? $_GET['language_id'] : '',
                                array_key_exists('type_id', $_GET) ? $_GET['type_id'] : '',
                                array_key_exists('sortBy', $_GET) ? $_GET['sortBy'] : '');
  
   // find one book data by id
$categoryBooksQuery = "SELECT * FROM `book` WHERE category_id=". "'" . $id . "'". $conbinedQuery;
$categoryBookRecods = mysqli_query($database, $categoryBooksQuery);
  
}else{
  // sort by is not required
  
  // find one book data by id
$categoryBooksQuery = "SELECT * FROM `book` WHERE category_id=". "'" . $id . "'";
  
$categoryBookRecods = mysqli_query($database, $categoryBooksQuery);
}



// close that connection
mysqli_close($database);
?>