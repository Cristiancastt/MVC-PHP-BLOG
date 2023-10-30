<?php

//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\controllers\iniciarSesionController.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config\dao\UserDAO.php');
require_once('../../controllers/iniciarSesionController.php');
require_once('../../config/dao/UserDAO.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../res./images/logo2.png" type="image/x-icon">

</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-semibold mb-6">Iniciar Sesión</h2>
    <form method="POST" action="../../controllers\iniciarSesionController.php">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Correo Electrónico</label>
            <input autocomplete="off" type="email" id="email" name="email" class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:outline-none" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Contraseña</label>
            <input type="password" id="password" name="password" class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:outline-none" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg px-4 py-2 hover:bg-indigo-700 focus:ring focus:ring-indigo-200 focus:outline-none">Iniciar Sesión</button>
        </div>
    </form>
    <?php if (isset($error_message)) { ?>
        <p class="text-red-500"><?php echo $error_message; ?></p>
    <?php } ?>
    </div>
</body>
</html>
