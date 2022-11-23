        <h2>Agregar Categoría</h2>
    
        <form class="form-crear" method="POST">
         
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="Categoria_Nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <?php 
                if(isset($errores["Categoria_Nombre"]) ){
                    echo "<div class='alerta'>".$errores["Categoria_Nombre"]."</div>";
                }
            ?>

            <button type="submit" class="btn btn-verde">Crear</button>
        </form>   
        
    </div>
</main>