<?php

//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config\ConexionDB.php');
require_once(__DIR__ .'/../config/ConexionDB.php');

class App{
    private $conn = null;

    public function __construct() {
        $this->conn = ConexionDB::getInstance()->get_connection();
    }

    public function lista(){
        $sql = "SELECT * FROM pokemon";
        $result = mysqli_query($this->conn, $sql);
        $pokemones = array(); // Aquí almacenaremos los datos de los Pokémon
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $pokemones[] = $row; // Almacena cada fila como un elemento del array
            }
        }
        return $pokemones;
    }

    public function pokemonById($id){
        $sql = "SELECT * FROM pokemon WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
    
        if ($result) {
            $pokemon = $result->fetch_assoc(); 
            return $pokemon;
        }
    
        return null; 
    }

    public function editarPokemon($id, $nombre, $descripcion, $avatar, $attackpower, $lifelevel) {
        $id = mysqli_real_escape_string($this->conn, $id);
        $nombre = mysqli_real_escape_string($this->conn, $nombre);
        $descripcion = mysqli_real_escape_string($this->conn, $descripcion);
        $avatar = mysqli_real_escape_string($this->conn, $avatar);
        $attackpower = mysqli_real_escape_string($this->conn, $attackpower);
        $lifelevel = mysqli_real_escape_string($this->conn, $lifelevel);
    
        $sql = "UPDATE pokemon SET nombre = '$nombre', descripcion = '$descripcion', avatar = '$avatar', attackpower = $attackpower, lifelevel = $lifelevel WHERE id = $id";
    
        if (mysqli_query($this->conn, $sql)) {
            return true; // La actualización fue exitosa
        } else {
            return false; // Hubo un error en la actualización
        }
    }


    public function obtenerIdPorNombre($nombre){
        $nombre = mysqli_real_escape_string($this->conn, $nombre);
        $sql = "SELECT id FROM pokemon WHERE nombre = '$nombre'";
        $result = mysqli_query($this->conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['id'];
        }
    
        return null; // Devolver null si no se encontró el nombre
    }
    


    





}
    