// condition obj 
// set default value
conditionObj = {
  language :languageId,
  type : typeId,
  sortBy : sortBy
}


// add conditions in theobject
function addConditonAndRefresh(condition , value){
  
  // category required query
  categoryRequiredQuery = "/Source/view/category.php?category_id=" + categoryId + "&category_title=" + categoryTitle
  
  if(condition == "language"){
    // if there is a language filer
    conditionObj.language = value;
  }
  
   if(condition == "type"){
    // if there is a type filer
    conditionObj.type = value;
  }
  
   if(condition == "sortBy"){
    // if there is a sortby sort
    conditionObj.sortBy = value;
  }
  
  // condition query start with empty
  conditionQuery = "";
  
  if(conditionObj.language !== ""){
    // if not empty add string query
     conditionQuery += `&language_id=${conditionObj.language}`
  }
  if(conditionObj.type !== ""){
    // if not empty add string query
     conditionQuery += `&type_id=${conditionObj.type}`
  }
  if(conditionObj.sortBy !== ""){
    // if not empty add string query
     conditionQuery += `&sortBy=${conditionObj.sortBy}`
  }

  
  // fresh page with string queries
  window.location.replace(window.location.origin + categoryRequiredQuery + conditionQuery);
}

function resetConditioin(){
  conditionObj.language = "";
  conditionObj.type = "";
  conditionObj.sortBy = "";
  
  addConditonAndRefresh()
}


