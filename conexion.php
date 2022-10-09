<?php



class Conectar
{
    public function conexion()
    {
      

        $host = "localhost:8889";
        $user = "root";
        $password = "root";
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
