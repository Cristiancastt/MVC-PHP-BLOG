<?php

//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/App.php');
//require_once('../models/App.php');
//include('../models/App.php');
require_once(__DIR__ . '/../models/app.php');


$app = new App();
$pokemones = $app->lista(); // Llama a la función lista

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    verLista();
}

function verLista() {
    if (empty($pokemones)) {
        return "La tabla de Pokémon está vacía.";
    } else {
        return $pokemones;
    }
    
}

?>