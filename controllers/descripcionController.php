<?php
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/App.php');
require_once(__DIR__ .'/../models/App.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $pokemonId = $_GET['id'];
        obtenerPokemon($pokemonId);
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
