<?php

function orderSent($toEmail, $order, $name)
{
    $subjectHeader = " Il tuo ordine è in consegna! Ordine n. ";
    $messageHeader = "Messaggio che non so che cosa debba contenere, boh ci mettiamo magari un riepilogo dell'ordine, non so";
    // Iposto i messaggi definitivi
    $subject = $name . $subjectHeader . $order;
    $message = $messageHeader . "Altro";
    if (mail($toEmail, $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}

function orderReceived($order)
{
    $subjectHeader = " L'ordine è stato segnalato come ricevuto! Ordine n. ";
    $messageHeader = "Messaggio che non so che cosa debba contenere, boh ci mettiamo magari un riepilogo dell'ordine, non so";
    // Iposto i messaggi definitivi
    $subject = $subjectHeader . $order;
    $message = $messageHeader . "Altro";
    //TODO Qui ci va la mail dell'admin
    if (mail("luca.vombato@gmail.com", $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}

function orderCreated($toEmail, $order, $name)
{
    $subjectHeader = " Il tuo ordine è stato confermato! Ordine n. ";
    $messageHeader = "Messaggio che non so che cosa debba contenere, boh ci mettiamo magari un riepilogo dell'ordine, non so";
    // Iposto i messaggi definitivi
    $subject = $name . $subjectHeader . $order;
    $message = $messageHeader . "Altro";
    //DEBUG
    mail("luca.vombato@gmail.com", "ORDINE RICEVUTO", "Ricevuto ordine numero".$order, "From: mail@pastecceroo.com");
    if (mail($toEmail, $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}


function prodottoTerminato($toEmail, $prodotto)
{
    $subjectHeader = " Prodotto terminato n. ";
    $messageHeader = "Messaggio che non so che cosa debba contenere, boh ci mettiamo magari un riepilogo dell'ordine, non so";
    // Iposto i messaggi definitivi
    $subject = $subjectHeader . $prodotto;
    $message = $messageHeader . "Altro";
    //TODO Qui ci va la mail dell'admin
    if (mail("luca.vombato@gmail.com", $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}
