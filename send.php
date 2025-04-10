<?php
require 'vendor/autoload.php';
require 'vendor/vlucas/phpdotenv/src/Dotenv.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charge les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Vérifie si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (!$email) {
        die("Adresse email invalide.");
    }

    $mail = new PHPMailer(true);
    try {
        // Config SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.sendinblue.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataires
        $mail->setFrom($_ENV['MAIL'], 'Formulaire Contact');
        $mail->addAddress($_ENV['MAIL'], 'Toi');

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body = "<p><strong>Nom:</strong> $name</p>
                   <p><strong>Email:</strong> $email</p>
                   <p><strong>Message:</strong><br>$message</p>";

        $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur : {$mail->ErrorInfo}";
    }
} else {
    echo "Formulaire non soumis.";
}
