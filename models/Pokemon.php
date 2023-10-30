<?php
class Pokemon {
    private $id;
    private $nombre;
    private $descripcion;
    private $avatar;
    private $attackpower;
    private $lifelevel;

    public function __construct() {

    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getAttackPower() {
        return $this->attackpower;
    }

    public function getLifeLevel() {
        return $this->lifelevel;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function setAttackPower($attackpower) {
        $this->attackpower = $attackpower;
    }

    public function setLifeLevel($lifelevel) {
        $this->lifelevel = $lifelevel;
    }
}


?>