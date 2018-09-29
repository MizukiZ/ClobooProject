
//click event for cart logo click 
$("#goCart").click(()=>{
  // get url 
  fullUrl = window.location.href
  
  if(isUserLoggedIn === "false"){
     
    // if user is not registered
    // show modal
    jQuery.noConflict(); 
   $('#pleaseRegiseterModal').modal('show');   
    return
  }else{
    // if user is registered
    // pass the url to shopping controller to store it to session
   $.post('../controller/shopping_controller.php', {
      url: fullUrl
    })
    .done((data) => {
     // redirect to shopping page
    window.location.replace("http://advancedweb-clobooait383893.codeanyapp.com/Source/view/shopping.php");
    })
  }
 
})

// clikc event for add cart button
function addCart(id,title,cost,type) {
  
    if(isUserLoggedIn === "false"){
     
    // if user is not registered
    // show modal
    jQuery.noConflict(); 
   $('#pleaseRegiseterModal').modal('show');   
    return
  }else{
    // if user is registered
  
  // get rid of some plugin or dupricate jquery include
 jQuery.noConflict(); 
 
    $.ajax({
      url: '../controller/cart_controller.php',
      type: 'POST',
      data: {id,title, cost,type},
      dataType: "json"
    })
   .done((data) =>{
     $(".itemCount").text(data.count)
     
      if(!data.firstAdd){
        // if not first add
        $('#pleaseGoToCartModal').modal('show'); 
      }else{
        // if not first add
        $('#addCartModal').modal('show'); 
      }
})
  }
 }

// clikc event for empty cart button
function emptyCart(){
 $.post('../controller/cart_controller.php', {empty :1})
   .done((data) =>{
   // set 0 to the cart item count
     $(".itemCount").text(0)
})
}