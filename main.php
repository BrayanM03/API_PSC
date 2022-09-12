<?php
include 'conexion.php';
$con = $conectando->conexion();

   session_start();

   if (!isset($_SESSION['id_usuario'])) {
   $response = array("mensaje"=>"Sesión no iniciada", "data"=>null, "estatus"=>false);

  }else{
    $id_usuario = $_SESSION['userID'];
    $nombre = $_SESSION['userName'];
    $apellido = $_SESSION["userLastname"]; 
    $user = $_SESSION["userUser"];

    $data[] = array("id"=>$id_usuario, "nombre"=>$nombre, "apellido"=>$apellido, "user"=>$user);

    $response = array("mensaje"=> "Sesión iniciada con exito", "data"=>$data, "estatus"=>true);
    

  }


  echo json_encode($response, JSON_UNESCAPED_UNICODE);




?>
