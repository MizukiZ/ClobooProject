
//click event for cart logo click 
$("#goCart").click(()=>{
  // get url 
  fullUrl = window.location.href
  
  // pass the url to shopping controller to store it to session
   $.post('../controller/shopping_controller.php', {
      url: fullUrl
    })
    .done((data) => {
     // redirect to shopping page
    window.location.replace("http://advancedweb-clobooait383893.codeanyapp.com/Source/view/shopping.php");
    })
})

// clikc event for add cart button
function addCart(id,title,cost,type) {
  
  // get rid of some plugin or dupricate jquery include
 jQuery.noConflict(); 
  // show modal
$('#addCartModal').modal('show'); 
  
   $.post('../controller/cart_controller.php', {id,title, cost,type})
   .done((data) =>{
     $(".itemCount").text(data)
})
 }

// clikc event for empty cart button
function emptyCart(){
 $.post('../controller/cart_controller.php', {empty :1})
   .done((data) =>{
   // set 0 to the cart item count
     $(".itemCount").text(0)
})
}