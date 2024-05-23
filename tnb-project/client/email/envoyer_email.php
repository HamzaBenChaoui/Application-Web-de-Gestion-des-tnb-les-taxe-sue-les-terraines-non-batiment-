<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Start a session
session_start();
// Include PHPMailer autoload file
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $destinataire = $_POST['destinataire'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    // Instantiate PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 0;                     // Enable verbose debug output
        $mail->isSMTP();                          // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                   // Enable SMTP authentication
        $mail->Username = 'oyuncoyt@gmail.com';   // SMTP username
        $mail->Password = 'dyanckhmkduuezga';    // SMTP password
        $mail->SMTPSecure = 'tls';                // Enable TLS encryption, ssl also accepted
        $mail->Port = 587;                        // TCP port to connect to

        // Recipients
        $mail->setFrom('oyuncoyt@gmail.com', 'oyuncoyt'); // Set from address and name
        $mail->addAddress('hamzabenchaoui2004@gmail.com'); // Add a recipient (replace with your desired email)

        // Content
        $mail->isHTML(true);                      // Set email format to HTML
        $mail->Subject = $sujet;
        $mail->Body = $message;

        // Send email
        $mail->send();
        $_SESSION['success_message'] = "Votre email a été envoyé avec succès!";
        header("Location: index.html");
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Échec de l'envoi de l'email. Erreur: {$mail->ErrorInfo}";
        header("Location: votre_page_d_erreur.php");
    }
}
?>
