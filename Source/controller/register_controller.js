$(document).ready(function() {
  // when submit is clikced
  $("#registerForm").submit(function(e) {
    
    $("#message").hide();
//     $("#spinIcon").show();
    
    jQuery.noConflict(); 
    
    // create the modal that user cannot delete by clikcing
$('#spinIcon').modal({
    backdrop: 'static',
    keyboard: false
}); 
    
    // post the form data
    $.post("../controller/register_controller.php", // where send the data to
        $("#registerForm").serialize() + '&submit=1' // get form data with name attributes and add submit key
      )
      .done(data => {
        // successful process

        if (data == "registered") {
          // successfully registered
          
          //  send welcom email to registerd user
          $.post("../_helper/WelcomeEmail.php",
                $("#registerForm").serialize() + '&send=1'
                )
          .done(()=>{
            // after send message do sth
          })
          
           $("#spinIcon").hide();
          // redirect to home
          window.location.replace("http://advancedweb-clobooait383893.codeanyapp.com/Source/view/home.php");
          return
        }
      
      $('#spinIcon').modal('hide'); 
      
       $("#message").show();
       $("#message").text(data)
//        $("#spinIcon").hide();
 
      })
      .fail(e => {
        // error process
        alert(e)
      })

    // prevent default loading
    return false;
  })

})