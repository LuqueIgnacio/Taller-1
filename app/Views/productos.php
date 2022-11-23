<main class="contenedor">
    <div id="productos" class="grid-tienda">
        <form method="POST">
            <div class="div-opciones-productos">
                <p>Buscar por</p>
                <div class="filtro-producto">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="" >
                </div>

                <p>Categoria</p>
                <div class="filtros-producto">
                    <label for="">Cualquiera</label>
                    <input checked type="radio" name="categoria" id="" value="0">
                    <?php
                        foreach($categorias as $categoria):
                    ?>
                        <label for=""><?php echo $categoria->Categoria_Nombre ?></label>
                        <input type="radio" name="categoria" id="" value="<?php echo $categoria->Categoria_Id ?>">
                    <?php
                        endforeach
                    ?>
                </div>

                
                
                <input class="btn btn-verde" type="submit" value="Buscar">
            </div>
        </form>

        <div class="container-productos">
            <div class="grid-productos">
                <?php
                    foreach($productos as $producto):
                ?>
                    <div class="oferta">
                    <div class="card d-inline-block" >
                        <img src="assets/img/productos/<?php echo $producto->Producto_Img?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto->Producto_Nombre?></h5>
                            <p class="oferta-precio">$<?php echo $producto->Producto_Precio?></p>
                            <button data-productoId="<?php echo $producto->Producto_Id?>" type="button" class="btn btn-rojo btn-producto">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach
                ?>
                

            </div>
        </div>               
       
    </div>
    <script src="assets/js/tienda.js"></script>
</main>