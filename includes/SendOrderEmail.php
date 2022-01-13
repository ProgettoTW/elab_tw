<?php


function orderSent($toEmail, $order, $name)
{
    $subjectHeader = "Il tuo ordine è in consegna! Ordine n. ";
    $messageHeader = "Messaggio che non so che cosa debba contenere, boh ci mettiamo magari un riepilogo dell'ordine, non so";
    // Iposto i messaggi definitivi
    $subject = $name . $subjectHeader . $order;
    $message = $messageHeader . "Altro";
    if (mail($toEmail, $subject, $message, "From: mail@pastecceroo.com")) {
        return true;
    }
    return false;
}

//TODO Questa roba va nella pagina venditore per mandare la mail
//$email = isset($_POST['emailInput']) ? $_POST['emailInput'] : false;
//
//if($email != false)
//{
//    $success = orderSent($email, $order, $customer);
//}

?>