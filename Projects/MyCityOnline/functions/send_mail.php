<?php
require_once 'config/config.php';
require 'vendor/autoload.php';
function send_mail($from = NULL, $name, $text, $sujet_prefix)
{
    $transport = Swift_SmtpTransport::newInstance(SMTP_ADDRESS, SMTP_PORT)
        ->setUsername(SMTP_USER)
        ->setPassword(SMTP_PASSWORD);
    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance($name . $sujet_prefix)
        ->setFrom(array(is_null($from) ? 'mycityonline@gregoire-moty.fr' : $from => $name))
        ->setTo(array(SWIFT_MESSAGE_TO => SWIFT_MESSAGE_TO_NAME))
        ->setBody($text, 'text/html');

    $result = $mailer->send($message);
}