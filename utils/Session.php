<?php
class Session
{
    static function startSessionIfNotStarted()
    {
        session_name("cookiePokemon");
        if (session_status() == PHP_SESSION_NONE) {
            session_start([
                'cookie_lifetime' => 86400,
            ]);
        }
        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = array(
                "username" => "cris",
            );

        }
    }

    static function destroySession() {
        $_SESSION = array();
    
        // Obtiene todas las cookies del usuario
        $cookies = $_COOKIE;
    
        // Itera a través de todas las cookies y las elimina
        foreach($cookies as $cookieName => $cookieValue) {
            setcookie($cookieName, '', time() - 3600, '/');
        }
    
        session_destroy();
    }
    

    static function setSession($user)
    {
        $_SESSION['user'] = $user;
        if (!isset($_SESSION['CREATED'])) {
            $_SESSION['CREATED'] = time();
        } else if (time() - $_SESSION['CREATED'] > 1800) {
            session_regenerate_id(true);
            $_SESSION['CREATED'] = time();
        }
    }

    static function loggedIn()
    {
        session_start([
            'cookie_lifetime' => 86400,
        ]);
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            session_unset();
            session_destroy();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    static function redirectToLoginIfNotLoggedIn()
    {
        if (session_status() == PHP_SESSION_NONE) {
            header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/public/login.php');
            exit; 
        }
    }

    static function setUsername($username) {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION['user']['username'] = $username;
        }
    }

}
