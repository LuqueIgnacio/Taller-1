<main class="contenedor-auth">
    <h2>Crea una cuenta</h2>
    <form method="POST" class="form">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="User_Nombre" class="form-control" value="<?php echo $usuario->User_Nombre ?>" id="nombre" aria-describedby="emailHelp">
    </div>   
    <?php 
        if(isset($errores["User_Nombre"]) ){
            echo "<div class='alerta'>".$errores["User_Nombre"]."</div>";
        }
    ?>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="User_Apellido" class="form-control" value="<?php echo $usuario->User_Apellido ?>" id="apellido" aria-describedby="emailHelp">
    </div> 
    <?php 
        if(isset($errores["User_Apellido"]) ){
            echo "<div class='alerta'>".$errores["User_Apellido"]."</div>";
        }
    ?>
    <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" name="User_DNI" class="form-control" value="<?php echo $usuario->User_DNI ?>" id="dni" aria-describedby="emailHelp">
    </div> 
    <?php 
        if(isset($errores["User_DNI"]) ){
            echo "<div class='alerta'>".$errores["User_DNI"]."</div>";
        }
    ?>   
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="User_Email" class="form-control" value="<?php echo $usuario->User_Email ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <?php 
        if(isset($errores["User_Email"]) ){
            echo "<div class='alerta'>".$errores["User_Email"]."</div>";
        }
    ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Teléfono</label>
        <input type="tel" name="User_Telefono" class="form-control" value="<?php echo $usuario->User_Telefono ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <?php 
        if(isset($errores["User_Telefono"]) ){
            echo "<div class='alerta'>".$errores["User_Telefono"]."</div>";
        }
    ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Dirección</label>
        <input type="tel" name="User_Direccion" class="form-control" value="<?php echo $usuario->User_Direccion ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <?php 
        if(isset($errores["User_Direccion"]) ){
            echo "<div class='alerta'>".$errores["User_Direccion"]."</div>";
        }
    ?>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" name="User_Password" class="form-control" id="exampleInputPassword1">
    </div>
    <?php 
        if(isset($errores["User_Password"]) ){
            echo "<div class='alerta'>".$errores["User_Password"]."</div>";
        }
    ?>

    <button type="submit" class="btn btn-verde">Registrarse</button>
    <button type="reset" class="btn btn-rojo">Borrar Campos</button>
    </form>
    
</main>