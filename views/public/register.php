<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../res./images/logo2.png" type="image/x-icon">

</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
<div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-semibold mb-6">Registro</h2>
    <form method="POST" action="../../controllers\registrarController.php">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nombre</label>
            <input type="text" id="name" name="name" class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:outline-none" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:outline-none" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Contraseña</label>
            <input type="password" id="password" name="password" class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:outline-none" required>
        </div>
        <div class="mb-4">
            <label for="password-confirm" class="block text-sm font-medium text-gray-600">Confirmar Contraseña</label>
            <input type="password" id="password-confirm" name="password-confirm" class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:outline-none" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg px-4 py-2 hover:bg-indigo-700 focus:ring focus:ring-indigo-200 focus:outline-none">Registrarse</button>
        </div>
    </form>
</div>
<script>
    // Función para comprobar si las contraseñas coinciden
    function checkPasswordMatch() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password-confirm").value;

        if (password !== confirmPassword) {
            alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
            return false; 

        }

        return true; 
    }
    
    document.querySelector("form").addEventListener("submit", function (e) {
        if (!checkPasswordMatch()) {
            e.preventDefault(); 
            password.value=""
            confirmPassword.value=""
        }
    });
</script>


</body>
</html>
