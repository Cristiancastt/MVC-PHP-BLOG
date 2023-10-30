<?php

//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config\ConexionDB.php');
//include("../ConexionDB.php");
//require("../ConexionDB.php");
require_once(__DIR__.'/../ConexionDB.php');


class PokemonDAO {
    const pokemonTable = 'pokemon';
    private $conn = null;

    public function __construct() {
        $this->conn = ConexionDB::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . PokemonDAO::pokemonTable;
        $result = mysqli_query($this->conn, $query);
        $pokemons = array();
        while ($pokemonDB = mysqli_fetch_array($result)) {
            $pokemon = new Pokemon();
            $pokemon->setId($pokemonDB["id"]);
            $pokemon->setNombre($pokemonDB["nombre"]);
            $pokemon->setDescripcion($pokemonDB["descripcion"]);
            $pokemon->setAvatar($pokemonDB["avatar"]);
            $pokemon->setAttackPower($pokemonDB["attackpower"]);
            $pokemon->setLifeLevel($pokemonDB["lifelevel"]);
            array_push($pokemons, $pokemon);
        }
        return $pokemons;
    }

    public function insert($pokemon) {
        $query = "INSERT INTO " . PokemonDAO::pokemonTable .
                 " (nombre, descripcion, avatar, attackpower, lifelevel) VALUES(?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $nombre = $pokemon->getNombre();
        $descripcion = $pokemon->getDescripcion();
        $avatar = $pokemon->getAvatar();
        $attackpower = $pokemon->getAttackPower();
        $lifelevel = $pokemon->getLifeLevel();

        mysqli_stmt_bind_param($stmt, 'sssss', $nombre, $descripcion, $avatar, $attackpower, $lifelevel);
        if ($stmt->execute()) {
            $pokemon->setId(mysqli_insert_id($this->conn));
            return true;
        } else {
            return false;
        }
    }

    public function selectById($id) {
        $query = "SELECT nombre, descripcion, avatar, attackpower, lifelevel FROM " . PokemonDAO::pokemonTable . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre, $descripcion, $avatar, $attackpower, $lifelevel);

        $pokemon = new Pokemon();
        while (mysqli_stmt_fetch($stmt)) {
            $pokemon->setId($id);
            $pokemon->setNombre($nombre);
            $pokemon->setDescripcion($descripcion);
            $pokemon->setAvatar($avatar);
            $pokemon->setAttackPower($attackpower);
            $pokemon->setLifeLevel($lifelevel);
        }

        return $pokemon;
    }

    public function update($pokemon) {
        $query = "UPDATE " . PokemonDAO::pokemonTable .
                 " SET nombre=?, descripcion=?, avatar=?, attackpower=?, lifelevel=?"
                 . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $nombre = $pokemon->getNombre();
        $descripcion = $pokemon->getDescripcion();
        $avatar = $pokemon->getAvatar();
        $attackpower = $pokemon->getAttackPower();
        $lifelevel = $pokemon->getLifeLevel();
        $id = $pokemon->getId();
        mysqli_stmt_bind_param($stmt, 'sssssi', $nombre, $descripcion, $avatar, $attackpower, $lifelevel, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . PokemonDAO::pokemonTable . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $success = $stmt->execute();
        
        // Devuelve verdadero si la eliminación fue exitosa, de lo contrario falso
        return $success;
    }
    
}

?>