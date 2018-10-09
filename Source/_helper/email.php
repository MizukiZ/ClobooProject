<?php
if(!isset($_SESSION)){ 
session_start(); 
} 

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require '/home/cabox/workspace/vendor/autoload.php';

// load .env file to get secret password
$dotenv = new Dotenv\Dotenv('/home/cabox/workspace/');
$dotenv->load();

if(isset($_POST['welcome'])){
// send welcome message process
  
$subject = 'Welcome to Cloboo!';

// set valiable from register form
$name = $_POST["userName"];
$email = $_POST["email"];
$password = $_POST["password"];
  
  

 sendWelcomeMail($name, $password);
}

if(isset($_POST['purchase'])){
// // send purchase message process
  
$subject = 'Thank you for the purchase!';

//  // set valiable
$email = $_POST["email"];
$cartData = $_POST["cartData"];

 sendThankMail($cartData);
}

function sendWelcomeMail($name,$password){
  
   // set the variable global
global $htmlContent;
$htmlContent = '
    <html>
    <head>
        <title>Welcome to Cloboo</title>
        <style>
            .email{
                background-image:url(letter2.png);
                background-size:100%;
                background-repeat: no-repeat;
                text-align: center;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h1>Thanks you for joining with us!</h1>
        <table class="email" cellspacing="0" style="border: 2px solid #f3f3f3; width: 300px; height: 200px;">
            <tr>
                <th>User name:</th><td>' . $name . '</td>
            </tr>
            <tr>
                <th>Password:</th><td>' . $password . '</td>
            </tr>
            <tr>
                <th>Website:</th>
                <td><a href="http://advancedweb-clobooait383893.codeanyapp.com/Source/view/home.php">Cloboo</a>
                </td>
            </tr>
        </table>
    </body>
    </html>';

}

function sendThankMail($cardData)
{
  // set the variable global
global $htmlContent;
    $htmlContent = '
    <html>
    <head>
        <title>Thank you for purchase</title>
    </head>
    <body>
        <h1>Thanks you for the purchase!</h1>
        
        <h3>Your purchase ID is </h3><i>' . $_SESSION['charge_id'] . '</i>
        
        <p>purchased item</p>
        <table cellspacing="0" style="border: 2px solid #f3f3f3; width: 300px; height: 200px;">
            <tr>
                <th>Book title</th>
                <th>Type</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>'
    . createCartDataTable($cardData) .
        '</table>
    </body>
    </html>';
}

function createCartDataTable($cardData)
{
    $cartDataTableHtml = '';
    $typeArray = array("Electronic", "Physical", "Second hand");

    foreach ($cardData as $data) {
        $cartDataTableHtml .= '<tr><td>' . $data['title'] . '</td><td>' . $typeArray[$data['type'] - 1] . '</td><td>' . $data['cost'] . '</td><td>' . $data['quantity'] . '</td></tr>';
    }

    return $cartDataTableHtml;
}

$mail = new PHPMailer(true); // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com"; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'clobooait@gmail.com'; // SMTP username
    $mail->Password = getenv('GMAIL_PASSWORD'); // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to

    //Recipients
    $mail->setFrom('clobooait@gmail.com', 'Cloboo');
    $mail->addAddress($email); // Add a recipient
    
    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $htmlContent;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>