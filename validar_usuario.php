<?php
include 'conexion.php';
$con = $conectando->conexion();

    $usuario = $_POST['user'];

    $pass = sha1($_POST['password']);
    $passSinCifrar = $_POST['password'];
   /*  $usuario = "soporte03";
    $pass = sha1("psc"); */

    $validar ="SELECT COUNT(*) total FROM usuarios WHERE user = ? AND password = ?";
    $result=  $con->prepare($validar);
    $result->bind_param('ss', $usuario, $pass);
    $result->execute();
    $result->bind_result($total);
    $result->fetch();
    $result->close();

    if ($total == 1) {
        $validarID ="SELECT id, Nombre , Apellido, user, rol, sucursal FROM usuarios WHERE user = ?";
        $results=  $con->prepare($validarID);
        $results->bind_param('s', $usuario);
        $results->execute();
        $results->bind_result($id, $nombre, $apellido, $user, $rol, $id_sucursal);

       while ($results->fetch()) {
           session_start();
           $_SESSION["userID"] = $id;
           $_SESSION["userName"] = $nombre;
           $_SESSION["userLastname"] = $apellido;
           $_SESSION["userUser"] = $user;
           $_SESSION["rol"] = $rol;
           $_SESSION["sucursal_id"] = $id_sucursal;

           $data[] = array("id"=>$id, "nombre"=>$nombre, "apellido"=>$apellido, "usuario"=>$user, "rol"=>$rol, "sucursal"=>$id_sucursal);

          $resp = array("mensaje" => "Credenciales correctas", "data" => $data, "estatus"=> true);
       }
        $results->close();

    }else{
        $resp = array("mensaje" => "Usuario o password incorrectos para $usuario y $passSinCifrar","data"=> null, "estatus"=> false);
    }

    echo json_encode($resp, JSON_UNESCAPED_UNICODE);




?>
