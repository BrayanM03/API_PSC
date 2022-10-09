<?php


include 'conexion.php';
$con = $conectando->conexion();
date_default_timezone_set("America/Matamoros");
$id_usuario = $_POST["id_user"];

$query = "SELECT COUNT(*) FROM usuarios WHERE id = ?";
$resp = $con->prepare($query);
$resp->bind_param('s', $id_usuario);
$resp->execute();
$resp->bind_result($user_encontrados);
$resp->fetch();
$resp->close();


if($user_encontrados > 0) { 

       /*  $sqlTraerOxxo="SELECT * FROM usuarios WHERE id = '$id_usuario'";
        $resultado = mysqli_query($con, $sqlTraerOxxo);
        while($fila= $resultado->fetch_assoc()){
            $user_data = $fila;
        } */


        $reportesPendientes = "SELECT COUNT(*) FROM reportes_pendientes WHERE id_usuario =?";
        $respo = $con->prepare($reportesPendientes);
        $respo->bind_param('s', $id_usuario);
        $respo->execute();
        $respo->bind_result($reportes_encontrados);
        $respo->fetch();
        $respo->close();


        if($reportes_encontrados > 0){
            $sqlTraerReportes="SELECT * FROM reportes_pendientes WHERE id_usuario = '$id_usuario'";
            $resultado = mysqli_query($con, $sqlTraerReportes);
            while($fila2= $resultado->fetch_assoc()){
                $pending_reports[]= $fila2;
            }

        }else{
            $pending_reports = array();
        }

        $response = array("estatus"=>true, "mensaje"=>"Se econtraron resultados", "reportes_pendientes"=>$pending_reports);


    }

echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>