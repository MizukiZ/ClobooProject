const tableHeader = "<tr><th>No</td><th>Title</th><th>Type</th><th>Cost</th><th>Quantity</th><th></th></tr>"
const tableTotal = "<tr><td style='font-weight: bold'>Total</td><td></td><td></td><td id='total' style='font-weight: bold'></td><td></td><td><button class ='btn btn-info' id='customButton'>Checkout</button></td></tr>"

const typeArray = ["Electronic", "Physical", "Second hand"]

$("thead").append(tableHeader)

updateTable(cartData)

// clikc event for empty cart button
function emptyCart() {
  $.post('../controller/cart_controller.php', {
      empty: 1
    })
    .done((data) => {
      // set 0 to the cart item count
      $(".itemCount").text(0)
      // update the table
      updateTable()
    })
}

// delete specific Item form the cart 
function deleteItem(id) {
  $.ajax({
      url: '../controller/shopping_controller.php',
      type: 'POST',
      data: {
        del: id
      },
      dataType: "json"
    })
    .done((data) => {
      // update the table with new data  
      updateTable(data)
    })
}

// update total cost and item amount
function updateTotals(data = []){

 let total  =  {};
  total.cost = 0;
  total.item = 0;

 
 if(data.length > 0){
     data.forEach((book)=>{
       total.cost += (parseFloat(book.cost) * book.quantity)
       total.item += parseInt(book.quantity)
     })
    }
  
  let roundResult = Math.round(total.cost * 100) / 100
  
   // set total cost and amount
  $("#total").text(total ? roundResult : 0)
  $(".itemCount").text(total.item)
  $("#containMessage").text(total.item <= 1 ? "product" : "products")
}

// dynamically generate cart table
function updateTable(data = []) {
  // init inject html and tbody element
  let injectHtml = ``;
  $("tbody").empty()
  
  // generate html
  data.forEach((book,index) => {
    injectHtml += `<tr><td>${index + 1}</td><td><a href="../view/book_detail.php?book_id=${book.id}">${book.title}</a></td><td>${typeArray[book.type -1]}</td><td>${book.cost}</td><td><input  style="width:25%" name=${book.id} class="quantity" type="number" min="1" value=${book.quantity}></td><td><button class="btn btn-danger" onclick="deleteItem(${book.id})">Delete</button></td></tr>`
  })

  // insert
  $("tbody").append(injectHtml)
  
  if(data.length > 0){
     $("tbody").append(tableTotal)
  }
 
   updateTotals(data)
  
    $(".quantity").on("keyup keydown change click",(e) => {
    id = e.target.name
    quantity = e.target.value
    
    console.log("herer")
     // change quaintity
    $.ajax({
      url: '../controller/cart_controller.php',
      type: 'POST',
      data: {book_id : id,quantity},
      dataType: "json"
    })
    .done((data)=>{
            // callback func
      updateTotals(data)
          })
});
}

// payment methods (stripe)
$(document).ready(function() {

let handler = StripeCheckout.configure({
  key: 'pk_test_0iLQxnoMSnz8brNv1VplvgY1',
  image: '../_asset/logo4.png',
  token: function(token) {
   
    // send user data to php to process
    $.post('../controller/shopping_controller.php', {
      stripeToken: token.id,
      stripeEmail: token.email,
      stripeAmount: $("#total").text() * 100
    })
    .done((data) => {
      // after payment success

      // go to thank you page
      window.location.replace("http://advancedweb-clobooait383893.codeanyapp.com/Source/view/thank.php");
      
      // send thank you message
       $.post("../_helper/email.php",
              {
              purchase: 1,
              cartData: cartData,
              email: token.email
              })
          .done((data)=>{
            // after send message do sth
//          console.log(data)
          })
    })
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  
  let amount = $("#total").text() * 100;
  // Open Checkout with further options:
  handler.open({
    name: 'Cloboo',
    description: 'Purchase',
    currency: 'aud',
    amount: amount
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
  
  
})