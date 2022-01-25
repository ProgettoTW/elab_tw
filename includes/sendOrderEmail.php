<?php

function orderSent($toEmail, $order, $name): bool
{
    $subjectHeader = " Il tuo ordine è in consegna! Ordine n. ";
    $messageHeader = "Il tuo ordine è stato spedito, ricordati di confermare la ricezione appena lo ritiri!";
    // Iposto i messaggi definitivi
    $subject = $name . $subjectHeader . $order;
    $message = $messageHeader;
    if (mail($toEmail, $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}

function orderReceived($toEmail, $order): bool
{
    $subjectHeader = " L'ordine è stato segnalato come ricevuto! Ordine n. ";
    $messageHeader = "La transazione si è conclusa corretamente, il cliente ha ricevuto l'ordine";
    // Iposto i messaggi definitivi
    $subject = $subjectHeader . $order;
    $message = $messageHeader;

    if (mail($toEmail, $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}

function orderCreated($toEmail, $order, $name): bool
{
    $subjectHeader = " Il tuo ordine è stato Inviato! Ordine n. ";
    $messageHeader = "Il tuo ordine è stato inviato, ti notificheremo non appena andrà in consegna!";
    // Iposto i messaggi definitivi
    $subject = $name . $subjectHeader . $order;
    $message = $messageHeader;
    //DEBUG
    if (mail($toEmail, $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}

function orderCreatedToAdmin($toEmail, $order): bool
{
    if (mail($toEmail, "ORDINE RICEVUTO", "Ricevuto ordine numero" . $order, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}


function prodottoTerminato($toEmail, $prodotto): bool
{
    $subjectHeader = " Prodotto terminato: ";
    $messageHeader = "Riempi nuovamente il magazzino";
    // Iposto i messaggi definitivi
    $subject = $subjectHeader . $prodotto;
    $message = $messageHeader;
    if (mail("$toEmail", $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}
