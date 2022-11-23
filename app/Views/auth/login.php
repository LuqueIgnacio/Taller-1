<main class="contenedor-auth">
    <h2>Inicia Sesión</h2>
    <form method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="User_Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nunca compartiremos tu email.</div>
    </div>
    <?php 
        if(isset($errores["User_Email"]) ){
            echo "<div class='alerta'>".$errores["User_Email"]."</div>";
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
    <div class="mb-3 form-check">
        <input type="checkbox" name="mantener" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Mantener sesión iniciada</label>
    </div>
    <button type="submit" class="btn btn-rojo">Entrar</button>
    </form>
    
</main>