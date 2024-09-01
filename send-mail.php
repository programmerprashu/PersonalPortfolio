<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Form se data le
//     $name = htmlspecialchars($_POST['name']);
//     $email = htmlspecialchars($_POST['em']);
//     $message = htmlspecialchars($_POST['message']);

//     // Aapka email jahan message aana hai
//     $to = "yadavjiprashantyadavji@gmail.com";
//     $subject = "New Message from $name";
    
//     // Email ka body
//     $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    
//     // Headers set kare
//     $headers = "From: $email";
    
//     // Email send karne ke liye mail() function use kare
//     if (mail($to, $subject, $body, $headers)) {
//         echo "Message sent successfully!";
//     } else {
//         echo "Message sending failed.";
//     }
// }


?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['em']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'prashantyadav5584@gmail.com'; // Gmail address
        $mail->Password = 'emailPassword'; // Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('prashantyadav5584@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from ' . $name;
        $mail->Body = nl2br("Name: $name\nEmail: $email\n\nMessage:\n$message");

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

