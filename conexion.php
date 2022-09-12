<?php



class Conectar
{
    public function conexion()
    {
      

        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "psc";  

        $con = mysqli_connect($host, $user, $password, $db);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
 
        return $con;
    }
}

$conectando = new Conectar;


?>
