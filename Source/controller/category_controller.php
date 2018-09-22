<?php
if(!isset($_SESSION)){ 
session_start(); 
} 

if(!array_key_exists('language_id', $_GET) && !array_key_exists('type_id', $_GET) && !array_key_exists('sortBy', $_GET)){
  unset($_SESSION['searchWord']);
}

// include the database object
include '../model/db_init.php';

if(isset($_POST['reset'])){
  unset($_SESSION['searchWord']);
}

// when users use word search function
if(isset($_POST['value'])){
  
  $searchWord = $_POST['value'];
  $categoryArray = $_POST['categoryArray'];
 
  // set the id to session
  $_SESSION['searchWord'] = $searchWord;
  
  if($_POST['value'] != ""){
    // if search word is not empty
    
    // filter the books array by the search word
  $filteredArray = array_filter($categoryArray, function ($var) {
    global $searchWord;
    return (stripos($var['title'], $searchWord) !== false); 
  });
  // return the filtered array
  
  $filteredArray = array_values($filteredArray);
  
  print json_encode($filteredArray);

  exit;
  }else{
    
    // if empty just return original array
    print json_encode($categoryArray);
     exit;
  }
  
}

if(isset($_GET['category_id'])){
  $id = $_GET['category_id'];
}

if(isset($_GET['category_title'])){
 $category_title = $_GET['category_title'];
}

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



// close that connection
mysqli_close($database);
?>