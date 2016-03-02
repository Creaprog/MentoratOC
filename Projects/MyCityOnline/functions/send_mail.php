<?php
function send_mail($informations)
{
    $to = 'destinataire@nomdedomaine';
    $subject = 'Vous avez reçu un message suite a votre formulaire de contact';
    $message = $informations;
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}