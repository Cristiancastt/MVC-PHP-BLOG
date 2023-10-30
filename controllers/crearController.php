<?php
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config/dao/PokemonDAO.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\models/Pokemon.php');
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\utils/Session.php');
require_once(__DIR__ .'/../config/dao/PokemonDAO.php');
require_once(__DIR__ .'/../models/Pokemon.php');
require_once(__DIR__ .'/../utils/Session.php');
$error_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   crearPokemon();
}


function crearPokemon(){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $avatar = $_POST["avatar"];
    $attackpower = $_POST["attackpower"];
    $lifelevel = $_POST["lifelevel"];
    $pokemon = new Pokemon();
    $pokemon->setNombre($nombre);
    $pokemon->setDescripcion($descripcion);
    $pokemon->setAvatar($avatar);
    $pokemon->setLifeLevel($lifelevel);
    $pokemon->setAttackPower($attackpower);
    $DAO = new PokemonDAO();
    
    if($DAO->insert($pokemon)){
        header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/index.php');
    }else{
        header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/crear.php');
    }

}



?>