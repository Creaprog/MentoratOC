<?php
function send_mail($informations)
{
    $mail = "greg.moty@free.fr";
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }

    $message_txt = $informations;


    $boundary = "-----=" . md5(rand());


    $sujet = "Vous avez reçu un message sur votre formulaire de contact";


    $header = "From: \"MyCityOnline\"<greg.moty@free.fr>" . $passage_ligne;
    $header .= "Reply-to: \"MyCityOnline\" <greg.moty@free.fr>" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;


    $message = $passage_ligne . "--" . $boundary . $passage_ligne;

    $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;

    $message .= $passage_ligne . "--" . $boundary . $passage_ligne;


    mail($mail, $sujet, $message, $header);


}