$(document).ready(function() {
  
    $("#logout").click(function() {
      // show logout modal
       jQuery.noConflict(); 
    $("#logoutModal").modal("show");
    })
  
  
  // when logout is clikced
  $("#logoutBtn").click(function() {
    
    jQuery.noConflict(); 
    $("#logoutModal").modal("show");

    $.get('../controller/nav_controller.php', {
        log: "logout"
      })
      .done((data) => {
        // hide dialog
         $("#logoutModal").modal("hide");
      
       // set 0 to cart number
      $(".itemCount").text(0)
      
        // toggle logout and longin
        $("#login").css("display", "inline");
        $("#registerNav").css("display", "inline");
        $("#logout").hide();

      })

  })
  
})