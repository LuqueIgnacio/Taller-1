<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Registro</title>
</head>
<body>
    <h1>Confirma tu Registro en Carnicería Soler</h1>
    <p>Hola <?php echo ($usuario->User_Nombre . " " . $usuario->User_Apellido) ?> para confirmar tu registro 
        en la página Carnicería Soler, por favor haz click en este link y luego inicia sesión: <a href="<?php echo base_url("confirmarRegistro?id=".$usuario->User_Token) ?>">Click aquí</a>
    </p>
</body>
</html>