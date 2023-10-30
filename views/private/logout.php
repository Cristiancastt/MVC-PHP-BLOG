<?php
// Gestión de sesión
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\utils/Session.php');
require_once('../../utils/Session.php');
Session::destroySession();
header('Location: ../public/index.php');
?>

