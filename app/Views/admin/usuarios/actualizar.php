
        <h2>Editar Usuario</h3>
        
        <form class="form-crear" method="POST">
         
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="User_Nombre" value="<?php echo $usuario->User_Nombre?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <?php 
                if(isset($errores["User_Nombre"]) ){
                    echo "<div class='alerta'>".$errores["User_Nombre"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido</label>
                <input type="text" name="User_Apellido" value="<?php echo $usuario->User_Apellido?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["User_Apellido"]) ){
                    echo "<div class='alerta'>".$errores["User_Apellido"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">DNI</label>
                <input type="text" name="User_DNI" value="<?php echo $usuario->User_DNI?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["User_DNI"]) ){
                    echo "<div class='alerta'>".$errores["User_DNI"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Dirección</label>
                <input type="text" name="User_Direccion" value="<?php echo $usuario->User_Direccion?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["User_Direccion"]) ){
                    echo "<div class='alerta'>".$errores["User_Direccion"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" name="User_Email" value="<?php echo $usuario->User_Email?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["User_Email"]) ){
                    echo "<div class='alerta'>".$errores["User_Email"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Teléfono</label>
                <input type="text" name="User_Telefono" value="<?php echo $usuario->User_Telefono?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["User_Telefono"]) ){
                    echo "<div class='alerta'>".$errores["User_Telefono"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nivel</label>
                <select name="User_Nivel" id="">
                    <option value="0">Usuario</option>
                    <option value="1">Moderador</option>
                    <option value="2">Admin</option>
                </select>
            </div>
             
            <button type="submit" class="btn btn-verde">Actualizar</button>
        </form>   
        
    </div>
</main>