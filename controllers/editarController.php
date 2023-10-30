<?php
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/App.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/Pokemon.php');

require_once(__DIR__ .'/../models/Pokemon.php');
require_once(__DIR__ .'/../models/App.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $pokemonId = $_GET['id'];
        $pokemon = obtenerPokemon($pokemonId);
        if ($pokemon == null) {
            return null;
        }else{
            $avatar = $pokemon['avatar'];
            $nombre = $pokemon['nombre'];
            $descripcion = $pokemon['descripcion'];
            $ataque = $pokemon['attackpower'];
            $vida = $pokemon['lifelevel'];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $app = new App();
    if (isset($_POST['id'])) {
        $pokemonId = $_POST['id'];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $avatar = $_POST["avatar"];
        $attackpower = $_POST["attackpower"];
        $lifelevel = $_POST["lifelevel"];
        
        $app->editarPokemon($pokemonId, $nombre, $descripcion, $avatar, $attackpower, $lifelevel);
        header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/index.php');
    }else{
        header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/index.php');
        return null;
    }
}

function obtenerPokemon($pokemonId) {
    $app = new App();
    $pokemon=$app->pokemonById($pokemonId);
    if ($pokemon===null) {
        return null;
    }else{
        $_SESSION['pokemon'] = $pokemon;
        return $pokemon;
    }
}



?>
