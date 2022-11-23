
        <h2>Editar Marca</h3>
        
        <form class="form-crear" method="POST">
         
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="Marca_Nombre" value="<?php echo $marca->Marca_Nombre?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <?php 
                if(isset($errores["Marca_Nombre"]) ){
                    echo "<div class='alerta'>".$errores["Marca_Nombre"]."</div>";
                }
            ?>

            <button type="submit" class="btn btn-verde">Actualizar</button>
        </form>   
        
    </div>
</main>