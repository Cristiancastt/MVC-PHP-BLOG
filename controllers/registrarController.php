<?php
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config/dao/UserDAO.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/User.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\utils/Session.php');

require_once(__DIR__ . '/../config/dao/UserDAO.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../utils/Session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    registrarUsuario();
}

function registrarUsuario() {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $user = new User();
    $user->setEmail($email);
    $user->setName($name); 
    $user->setPassword($password);

    $dao = new UserDAO();

    // Verifica si el correo electrónico ya está registrado
    if ($dao->check($user)) {
        $error_message = "Este correo electrónico ya está registrado. Por favor, elija otro.";
        header('Location: ../views/public/login.php');
        exit;
    }

    // Si el correo no está registrado, procede a registrar al usuario
    if ($dao->insert($user)) {
        header('Location: ../views/public/login.php');
    } else {
        $error_message = "Hubo un error al registrar el usuario. Inténtelo de nuevo.";
        header('Location: ../views/public/register.php');
    }
}
?>
