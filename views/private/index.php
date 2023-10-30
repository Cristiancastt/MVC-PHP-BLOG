<?php
require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\utils\Session.php');
Session::startSessionIfNotStarted();
Session::redirectToLoginIfNotLoggedIn();
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Inicio</title>
  <link rel="icon" href="../res./images/logo2.png" type="image/x-icon">
</head>
<body>


<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="index.php" class="flex items-center">
      <img src="../res./images/logo2.png" class="h-8 mr-3" alt="Flowbite Logo">
  </a>
  <div class="flex md:order-2">
      <a href="logout.php" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cerrar Sesion</a>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="index.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Lista Pokemon</a>
      </li>
      <li>
        <a href="crear.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Crear Pokemon</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<div class="py-16 my-8">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold">Bienvenido a la base Pokemon</h1>
        <p class="text-xl mt-4">Donde puedes encontrar información interesante sobre ellos.</p>
        <?php
      if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        echo '<p class="text-lg mt-4">¡Bienvenido, ' . $user['username'] . '!</p>';
      }
    ?>
      </div>


</div>


<div class="flex items-center justify-center p-16">
  <div id="tarjetas" class="grid grid-cols-1 md:grid-cols-3 gap-4">
  <?php
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\controllers/listaController.php');
//require("../../controllers/listaController.php");
require_once('../../controllers/listaController.php');
foreach ($pokemones as $pokemon) {
  $id = $pokemon['id'];
  $nombre = $pokemon['nombre'];
  $descripcion = $pokemon['descripcion'];
  $imagen = $pokemon['avatar'];

  echo '<div class="bg-white rounded-lg shadow-lg p-4 border">';
  echo '  <img src="' . $imagen . '" alt="Imagen ' . $id . '" class="w-full h-40 object-cover rounded-md mb-4">';
  echo '  <h2 class="text-xl font-semibold">' . $nombre . '</h2>';
  echo '  <p class="text-gray-600 h-32 overflow-hidden">' . $descripcion . '</p>';
  echo '  <div class="mt-4">';
  echo '      <a href="descripcion.php?id=' . $id . '" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">Más Info</a>';
  echo '      <a href="editar.php?id=' . $id . '" class="bg-yellow-500 text-white px-4 py-2 rounded-md mr-2">Modificar</a>';
  echo '      <a href="../../controllers/eliminarController.php?id=' . $id . '" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</a>';
  echo '  </div>';
  echo '</div>';
}

?>
  </div>
</div>





</body>
</html>