
        <h2>Editar Producto</h3>
        
        <form class="form-crear" method="POST" enctype="multipart/form-data">
         
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="Producto_Nombre" value="<?php echo $producto->Producto_Nombre?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <?php 
                if(isset($errores["Producto_Nombre"]) ){
                    echo "<div class='alerta'>".$errores["Producto_Nombre"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Código</label>
                <input type="text" name="Producto_Cod" value="<?php echo $producto->Producto_Cod?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["Producto_Cod"]) ){
                    echo "<div class='alerta'>".$errores["Producto_Cod"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="number" name="Producto_Precio" value="<?php echo $producto->Producto_Precio?>" min="1" max="9999" step="any" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["Producto_Precio"]) ){
                    echo "<div class='alerta'>".$errores["Producto_Precio"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Costo</label>
                <input type="number" name="Producto_Costo" value="<?php echo $producto->Producto_Costo?>" min="1" max="9999" step="any" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["Producto_Costo"]) ){
                    echo "<div class='alerta'>".$errores["Producto_Costo"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Stock</label>
                <input type="number" name="Producto_Stock" value="<?php echo $producto->Producto_Stock?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php 
                if(isset($errores["Producto_Stock"]) ){
                    echo "<div class='alerta'>".$errores["Producto_Stock"]."</div>";
                }
            ?>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Marca</label>
                <select name="Producto_Marca" id="">
                    <?php
                        foreach($marcas as $marca):
                    ?>
                        <option <?php  echo $marca->Marca_Id===$producto->Producto_Marca ?  "selected" : "" ?> value="<?php echo $marca->Marca_Id ?>"><?php echo $marca->Marca_Nombre ?></option>
                    <?php
                        endforeach
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Categoria</label>
                <select name="Producto_Categoria" id="">
                    <?php
                        foreach($categorias as $categoria):
                    ?>
                        <option <?php  echo $categoria->Categoria_Id===$producto->Producto_Categoria ?  "selected" : "" ?> value="<?php echo $categoria->Categoria_Id ?>"><?php echo $categoria->Categoria_Nombre ?></option>
                    <?php
                        endforeach
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Imagen</label>
                <input type="file" name="Producto_Img" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Listado</label>
                <select name="Producto_Listado" id="">
                    <option value="0">Si</option>
                    <option value="1">No</option>
                </select>
            </div>

           
            <button type="submit" class="btn btn-verde">Actualizar</button>
            <button type="reset" class="btn btn-rojo">Borrar Campos</button>
        </form>   
        
    </div>
</main>