<?php
include 'conexion.php';
$con = $conectando->conexion();

$validar ="SELECT COUNT(*) total FROM usuarios";
    $result=  $con->prepare($validar);
    $result->execute();
    $result->bind_result($total);
    $result->fetch();
    $result->close();

   // print($total);
    if ($total > 0) {
        //$user = $_POST['user'];
        $user = $_GET['user'];
        $validarID ="SELECT * FROM usuarios WHERE user = '$user'";
        $resultado = mysqli_query($con, $validarID);

       while ($fila= $resultado->fetch_assoc()) {
        $id = $fila['id'];
        $Nombre = $fila['Nombre'];
        $Apellido = $fila['Apellido'];
        $user = $fila['user'];
        $rol = $fila['rol'];
        $sucursal = $fila['sucursal'];
        $urlProfileImage = "https://service.powerpsc.com.mx/vistas/dist/img/users/$user.jpg";


        $data[] = array("id"=>$id, "nombre"=>$Nombre , "apellido"=>$Apellido,
        "usuario"=> $user, "rol"=> $rol, "sucursal"=> $sucursal, "image_url"=>$urlProfileImage);

       }
       $response = array("mensaje"=> "Resultados encontrados", "data"=> $data, "estatus"=> true);
    }else{
        $response = array("mensaje"=> "Sin resultados", "estatus"=> false);
    }

   // print_r($response);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);