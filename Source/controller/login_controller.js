$(document).ready(function() {
  // when submit is clikced
  $("#loginForm").submit(function(e) {
    
    jQuery.noConflict(); 
    
    // create the modal that user cannot delete by clikcing
$('#spinIcon').modal({
    backdrop: 'static',
    keyboard: false
}); 
    
   $("#message").hide();
  

    // post the form data
    $.post("../controller/login_controller.php", // where send the data to
        $("#loginForm").serialize() + '&submit=1' // get form data with name attributes and add submit key
      )
      .done(data => {
        // successful process

        if (data == "validated") {
          // successfully registered
           $("#spinIcon").hide();
          // redirect to home
          window.location.replace("http://advancedweb-clobooait383893.codeanyapp.com/Source/view/home.php");
          return
        }
      
       $("#spinIcon").modal("hide");
      
         $("#message").show();
       $("#message").text(data)
      
      })
      .fail(e => {
        // error process
        alert(e)
      })

    // prevent default loading
    return false;
  })

})