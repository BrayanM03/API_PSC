<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Formulario</h4>
    usuario: 
    <input type="text" id="usuario" name="usuario">
    contrasena: 
    <input type="password" id="pass" name="pass">
    
    <button id="enviar" onclick="Enviar()">Enviar</button>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>

 function Enviar(e){
    event.preventDefault();

    let user = $("#usuario").val();
    let pass = $("#pass").val();
    $.ajax({
        type: "POST",
        url: "validar_usuario.php",
        data: {user:user, password:pass},
        dataType: "JSON",
        success: function (response) {
            console.log(response);
        }
    });
 }
    
</script>
</html>