const tableHeader = "<tr><th>No</td><th>Title</th><th>Type</th><th>Cost</th><th></th></tr>"
const tableTotal = "<tr><td style='font-weight: bold'>Total</td><td></td><td></td><td id='total' style='font-weight: bold'></td><td><button class ='btn btn-info' id='customButton'>Purchase</button></td></tr>"

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
      $(".itemCount").text(data.length)
      // update the table with new data
    
    $("#containMessage").text(data.length <= 1 ? "product" : "products")
   
      updateTable(data)
    })
}

// dynamically generate cart table
function updateTable(data = []) {
  // init inject html and tbody element
  let injectHtml = ``;
  let total;
  
  $("tbody").empty()
 
 if(data.length > 0){
    total = data.reduce((a, b) => {
      // sum up the cost
      return ({
        cost: parseFloat(a.cost) + parseFloat(b.cost)
      })
    })
    }
  
  let roundResult = Math.round(total.cost * 100) / 100
 

  // generate html
  data.forEach((book,index) => {
    injectHtml += `<tr><td>${index + 1}</td><td><a href="../view/book_detail.php?book_id=${book.id}">${book.title}</a></td><td>${typeArray[book.type -1]}</td><td>${book.cost}</td><td><button class="btn btn-danger" onclick="deleteItem(${book.id})">Delete</button></td></tr>`
  })

  // insert
  $("tbody").append(injectHtml)
  $("tbody").append(tableTotal)

  // set total cost 
  $("#total").text(total ? roundResult : 0)
}

// payment methods (stripe)
$(document).ready(function() {

let handler = StripeCheckout.configure({
  key: 'pk_test_0iLQxnoMSnz8brNv1VplvgY1',
  image: '../_asset/logo_round.png',
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