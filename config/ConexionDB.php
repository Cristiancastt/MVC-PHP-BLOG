<?php
class ConexionDB
{
    // Instancia privada de conexión.
    public static $instance = null;
    // Conexión a BD
    public $connection = null; 
    // Parámetros de conexión a la BD.
    public $userBD = "";
    public $psswdBD = "";
    public $nameBD = "";
    public $hostBD = "";

    // Get de la conexión
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // Constructor de la clase privado: solo queremos construir una instancia
    // Se encarga de establecer una conexión con nuestra base de datos.
    public function __construct()
    {
        $this->establishCredentials();
        $this->connection = mysqli_connect($this->hostBD, $this->userBD, $this->psswdBD, $this->nameBD)
            or die("Could not connect to db: " . mysqli_error($this->connection)); // Agregado $this->connection
        mysqli_query($this->connection, "SET NAMES 'utf8'"); // Agregado $this->connection
    }

    public function establishCredentials()
    {
        $dir = __DIR__;
        // Lectura de parámetros de configuración desde un archivo externo
        if (file_exists($dir . '/credentials.json')) { // Usar barra diagonal para la ruta del archivo
            $credentialsJSON = file_get_contents($dir . '/credentials.json'); // Usar barra diagonal para la ruta del archivo
            $credentials = json_decode($credentialsJSON, true);

            $this->userBD = $credentials["user"];
            $this->psswdBD = $credentials["password"];
            $this->nameBD = $credentials["name"];
            $this->hostBD = $credentials["host"];
        }
    }

    // Cierra la conexión.
    public function close_connection()
    {
        mysqli_close($this->connection); // Agregado $this->connection
    }

    // Retorna la instancia de la conexión
    public function get_connection()
    { // Agregado "public" para que sea accesible desde fuera de la clase
        return $this->connection;
    }

    // Getters y Setters de los parámetros de configuración de BD.
    public function get_hostBD()
    { // Agregado "public" para que sea accesible desde fuera de la clase
        return $this->hostBD;
    }

    public function get_usuarioBD()
    { // Agregado "public" para que sea accesible desde fuera de la clase
        return $this->userBD;
    }

    public function get_psswdBD()
    { // Agregado "public" para que sea accesible desde fuera de la clase
        return $this->psswdBD;
    }

    public function get_nombreBD()
    { // Agregado "public" para que sea accesible desde fuera de la clase
        return $this->nameBD;
    }

    
}
?>