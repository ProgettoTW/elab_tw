<?php
function sec_session_start()
{
    $session_name = 'sec_session_id';
    $secure = false; // no https
    $httponly = true; // no js
    ini_set('session.use_only_cookies', 1);
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    session_name($session_name);
    session_start();
    session_regenerate_id();
}

function login($email, $password, $mysqli)
{
    //TODO Finire qui perché ho riscritto il DB e porcapaletta mi sarà sicuramente saltato qualcosa
    if ($querytoexec = $mysqli->prepare("SELECT u.name, u.email, u.password, u.date, c.cartID, u.admin FROM users u, cart c WHERE u.email = ? AND u.email = c.email LIMIT 1")) {
        $querytoexec->bind_param('s', $email);
        $querytoexec->execute();
        $querytoexec->store_result();
        $querytoexec->bind_result($name, $username, $password_hashed, $date, $cartID, $admin);
        $querytoexec->fetch();
        if ($querytoexec->num_rows == 1) {
            if (password_verify($password, $password_hashed)) {
                //Replace all special characters and compose an user_id by concatenating the result with the user's name
                $user_id = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username) . "-NAME-" . $name;
                $_SESSION['user_id'] = $user_id;
                //$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); //XSS
                $_SESSION['email'] = $username;
                $_SESSION['login'] = true;
                $_SESSION['cart_id'] = $cartID;
                $_SESSION['name'] = $name;
                $_SESSION['admin'] = false;
                $_SESSION['bday'] = $date;
                if ($admin == 1) {
                    $_SESSION['admin'] = true;
                }
                return true;
            }
        }
    }
}

function login_check($mysqli): bool
{
    if (isset($_SESSION['user_id'], $_SESSION['email'], $_SESSION['login'])) {
        $user_id = $_SESSION['user_id'];
        $login = $_SESSION['login'];
        $username = $_SESSION['email'];
        if ($login) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function admin_check($mysqli): bool
{
    if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function seller_check($mysqli)
{
    if (isset($_SESSION['seller'])) {
        if ($_SESSION['seller']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function bday_check()
{
    if (isset($_SESSION['bday'])) {
        $today = new DateTime("now");
        $today = $today->format("d-m");
        $date = new DateTime($_SESSION['bday']);
        $date = $date->format("d-m");
        if ($date == $today) {
            return true;
        }
    }
    return false;

}

?>