<?php
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config/DAO/PokemonDAO.php');

require_once(__DIR__ . '/../config/dao/PokemonDAO.php');


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $pokemonId = $_GET['id'];
        $dao = new PokemonDao();
        
        if($dao->delete($pokemonId)){
            header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/index.php');
        }else{
            header('Location: /dashboard/Entregas/Entrega Role Playing Game MVC/views/private/index.php');
        }
    } else {
        echo "ID de Pokémon no válido.";
    }
}

?>
