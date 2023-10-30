<?php

//dirname(__FILE__) Es el directorio del archivo actual
//require_once('C:\xampp\htdocs\dashboard\Entregas\Entrega Role Playing Game MVC\config\ConexionDB.php');
//require("../ConexionDB.php");
require_once(__DIR__.'/../ConexionDB.php');



class UserDAO {

    //Se define una constante con el nombre de la tabla
    const USER_TABLE = 'users';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = ConexionDB::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . UserDAO::USER_TABLE;
        $result = mysqli_query($this->conn, $query);
        $users= array();
        while ($userBD = mysqli_fetch_array($result)) {

            $user = new User();
            $user->setUserid($userBD["id"]);
            $user->setEmail($userBD["email"]);
            $user->setPassword($userBD["password"]);
            $user->setName($userBD["name"]);
            
            array_push($users, $user);
        }
        return $users;
    }

    public function insert($user) {
        $query = "INSERT INTO " . UserDAO::USER_TABLE .
                " (email, password, name) VALUES(?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $email = $user->getEmail();
        $password = $user->getPassword();
        $name = $user->getName();
        
        // Cambiar 'sss' por 'sss' si no lo has hecho todavía
        mysqli_stmt_bind_param($stmt, 'sss', $email, $password, $name);	
        return $stmt->execute();
    }
    
    

     public function check($user) {
        $query = "SELECT email, password FROM " . UserDAO::USER_TABLE . " WHERE email=? AND password=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $auxEmail = $user->getEmail();
        $auxPass =  $user->getPassword();
                 
        mysqli_stmt_bind_param($stmt, 'ss', $auxEmail, $auxPass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); 
        $rows = mysqli_stmt_num_rows($stmt);
        if($rows>0)         
            return true;
        else
            return false;
    }
    
    public function selectById($id) {
        $query = "SELECT email, password FROM " . UserDAO::USER_TABLE . " WHERE idUser=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $email, $password, $name);

        $user = new User();
        while (mysqli_stmt_fetch($stmt)) {
            $user->setUserid($id);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setName($name);
       }
        return $user;
    }
        
}

?>
