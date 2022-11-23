<main class="contenedor-auth">
    <h2>Escribenos y te contestaremos a la brevedad</h2>
    <form action="" method="POST" class="form">

        <?php if(!session()->User_Id): ?>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
            <input type="email" class="form-control" name="Consulta_Email" id="exampleFormControlTextarea1" placeholder="Escribe tu email" rows="3"></textarea>
        </div>
        <?php endif; ?>
        <?php  
            if(isset($errores["Consulta_Email"]) ){
                echo "<div class='alerta'>".$errores["Consulta_Email"]."</div>";
            }
        ?> 
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
            <textarea class="form-control" name="Consulta_Mensaje" id="exampleFormControlTextarea1" placeholder="Escribe tu mensaje aquí" rows="3"></textarea>
        </div>
        <?php 
            if(isset($errores["Consulta_Mensaje"]) ){
                echo "<div class='alerta'>".$errores["Consulta_Mensaje"]."</div>";
            }
        ?>
        <button type="submit" class="btn btn-verde">Enviar Mensaje</button>
        <button type="reset" class="btn btn-rojo">Borrar Campos</button>

    </form>

</main>