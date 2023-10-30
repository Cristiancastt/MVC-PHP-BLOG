<?php
// loginController.php

//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config/dao/UserDAO.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/User.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\utils/Session.php');

require_once(__DIR__ . '/../config/dao/UserDAO.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../utils/Session.php');

$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   inciarSesion();
}

function inciarSesion(){
    $email = $_POST["email"];
    $password = $_POST["password"];	
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);
    $dao = new UserDAO();
    if ($dao->check($user)) {
        
        Session::startSessionIfNotStarted();
        Session::setSession($user->getName());
        Session::setUsername($user->getEmail());
        header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/index.php');

    }else{
        $error_message = "Las credenciales no son correctas.";
        header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/public/login.php');
    }
}

?>