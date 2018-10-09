$(document).ready(function() {
    
  updateChips();
  
  if(searchWord !== ""){
    // if search word is not empty, update the UI by the word
    
    $.ajax({
      url: '../controller/category_controller.php',
      type: 'POST',
      data: {
        value : searchWord,
        categoryArray
      },
      dataType: "json"
    })
      .done((data) => {
        updateUI(data)
      })
    
  }
  

  $("#titleSearch").on('input', () => {
    const value = $("#titleSearch").val()
    
    $.ajax({
      url: '../controller/category_controller.php',
      type: 'POST',
      data: {
        value,
        categoryArray
      },
      dataType: "json"
    })
      .done((data) => {
         searchWord = value
        updateUI(data)
        updateChips()
      }).fail((e)=>{
      console.log(e)
       searchWord = value
      updateChips()
    })
  })
})

const typeArray = ["Electronic", "Physical", "Second hand"]
const sortArray = {"sold_amount":"Popularity", "publish_date":"Publish date", "cost":"Price"}

// condition obj 
// set default value
let conditionObj = {
  language: languageId,
  type: typeId,
  sortBy: sortBy
}


// add conditions in theobject
function addConditonAndRefresh(condition, value) {

  // category required query
 let categoryRequiredQuery = "/Source/view/category.php?category_id=" + categoryId + "&category_title=" + categoryTitle

  if (condition == "language") {
    // if there is a language filer
    conditionObj.language = value;
  }

  if (condition == "type") {
    // if there is a type filer
    conditionObj.type = value;
  }

  if (condition == "sortBy") {
    // if there is a sortby sort
    conditionObj.sortBy = value;
  }

  // condition query start with empty
  let conditionQuery = "";

  if (conditionObj.language !== "") {
    // if not empty add string query
    conditionQuery += `&language_id=${conditionObj.language}`
  }
  if (conditionObj.type !== "") {
    // if not empty add string query
    conditionQuery += `&type_id=${conditionObj.type}`
  }
  if (conditionObj.sortBy !== "") {
    // if not empty add string query
    conditionQuery += `&sortBy=${conditionObj.sortBy}`
  }


  // fresh page with string queries
  window.location.replace(window.location.origin + categoryRequiredQuery + conditionQuery);
}

function resetConditioin() {
  conditionObj.language = "";
  conditionObj.type = "";
  conditionObj.sortBy = "";
  
  $.post('../controller/category_controller.php',{reset:1})
  .done(()=>{
    
    addConditonAndRefresh()
   })
}

function updateUI(data = []) {
  let injectHtml = ``

  $("#categoryBody").empty()

  // generate html
  data.forEach((book, index) => {
    
    if(index === 0) 
    {
      injectHtml += `<div class='row'>`
    }
    if(index%3 === 0){
    injectHtml += `</div><div class='row'>`
    }
   
   let  priceSection = ``
    
    if(book.discount_id != "null"){
       priceSection += `<i>$${book.cost}</i><span class="item_price">$ ${discountPrice(book.cost,book.discount_id)}</span>`
    }else{
     priceSection += `<span class="item_price">$${book.cost}</span>`
         }
    
    injectHtml += `<div class="col-md-4 new-collections-grid">
<div class="new-collections-grid1">
<div class="new-collections-grid1-image">
<a href="../view/book_detail.php?book_id=${book.id}" class="product-image"><img src="../_asset/${book.image}" alt=" " class="img-responsive" style="width:150px; height:220px"/></a>
<div class="new-collections-grid1-image-pos"><a href="../view/book_detail.php?book_id=${book.id}">Quick View</a></div>
</div>
<h4><a href="../view/book_detail.php?book_id=${book.id}">${book.title}</a></h4>
<h5>${typeArray[book.type_id - 1]}</h5>
<div class="occasion-cart new-collections-grid1-left"><p>` + priceSection + `</p>
<a id="addCart" style="cursor:pointer" class="item_add" onClick="addCart(${book.id},${book.type_id},${discountPrice(book.cost,book.discount_id)},${book.type_id});">add to cart</a>
</div></div></div>`
    
  })
  
  // insert
  $("#categoryBody").append(injectHtml)

}

// discount price function
function discountPrice(originalPrice, discountId){
 const discountArray = [5,10,15,20,25,30,35,40,45,50]
  
  if(discountId == null){
    return originalPrice
}else{
   let dicountAmount = originalPrice * discountArray[discountId - 1] / 100
  const finalPrice = originalPrice - dicountAmount

  return Math.round(finalPrice * 100) / 100
  }
 
}

function updateChips(){
  
  $("#chipsRow").empty()
  
 let htmlBody = ``
  
  if(sortBy !== ""){
    htmlBody += `<span style="margin:10px; padding:10px" class="label label-primary">Sort by: ${sortArray[sortBy]}</span>`
  }
  if(languageId !== ""){
    htmlBody += `<span style="margin:10px; padding:10px" class="label label-primary">Language: ${chosenLanguage}</span>`
   }
  if(typeId !== ""){
    htmlBody += `<span style="margin:10px; padding:10px" class="label label-primary">Type: ${chosenType}</span>`
   }
  if(searchWord !== ""){
    htmlBody += `<span style="margin:10px; padding:10px" class="label label-primary">Title: ${searchWord}</span>`
   }
  
  
  // insert
  $("#chipsRow").append(htmlBody)
}