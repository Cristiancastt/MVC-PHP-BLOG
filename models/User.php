<?php
class User
{
    private $userid;
    private $email;
    private $password;
    private $name;

    public function __construct() {

    }

    public function getUserid()
    {
        return $this->userid;
    }

    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
        // Getter para obtener el valor del atributo "name"
    public function getName() {
        return $this->name;
    }

    // Setter para establecer el valor del atributo "name"
    public function setName($name) {
        $this->name = $name;
    }
}
?>