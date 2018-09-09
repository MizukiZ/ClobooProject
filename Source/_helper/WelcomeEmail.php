<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '/home/cabox/workspace/vendor/autoload.php';

// load .env file to get secret password
$dotenv = new Dotenv\Dotenv('/home/cabox/workspace/');
$dotenv->load();

if(isset($_POST['send'])){
// send welcome message process
  
 // set valiable from register form
$name = $_POST["userName"];
$email = $_POST["email"];
$password = $_POST["password"];
  
 sendWelcomeMail($name, $email, $password);
}

function sendWelcomeMail($name, $email , $password){
  
$htmlContent = '
    <html>
    <head>
        <title>Welcome to Cloboo</title>
    </head>
    <body>
        <h1>Thanks you for joining with us!</h1>
        <table cellspacing="0" style="border: 2px solid #f3f3f3; width: 300px; height: 200px;">
            <tr>
                <th>User name:</th><td>'. $name .'</td>
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

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'clobooait@gmail.com';                 // SMTP username
    $mail->Password = getenv('GMAIL_PASSWORD');                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('clobooait@gmail.com', 'Cloboo');
    $mail->addAddress($email, 'New user');     // Add a recipient
//     $mail->addAddress('ellen@example.com');               // Name is optional
//     $mail->addReplyTo('info@example.com', 'Information');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');

    //Attachments
//     $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to Cloboo';
    $mail->Body    = $htmlContent;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
  
}

?>