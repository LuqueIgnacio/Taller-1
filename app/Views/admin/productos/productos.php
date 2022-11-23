<h2>Productos</h3>
        
        <div class="panel-btns">
            <form class="d-flex" method="POST">
                <input class="form-control me-2" name="busqueda" type="search" placeholder="Busca algo" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <select name="buscarPor" class="form-select" aria-label="Default select example">
                    <option selected value="0">Buscar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Código</option>
                    <option value="3">Marca (ID)</option>
                    <option value="4">Categoria (ID)</option>
                    <option value="5">Nombre</option>
                </select>
                <select name="orden" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Ordenar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Nombre</option>
                    <option value="3">Más caro</option>
                    <option value="4">Más barato</option>
                    <option value="5">Costo más caro</option>
                    <option value="6">Costo más barato</option>
                    <option value="7">Más antiguo</option>
                    <option value="8">Más reciente</option>
                </select>
            </form>
            <a href="<?php echo base_url("/admin/productos/crear")?>" class="btn btn-rojo">Agregar Producto</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cod</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Creado el</th>
                    <th>Ultima actualización</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                    foreach($productos as $producto):
                ?>
                    <tr>
                        <td><?php echo $producto->Producto_Id ?></td>
                        <td><?php echo $producto->Producto_Nombre ?></td>
                        <td><?php echo $producto->Producto_Cod ?></td>
                        <td><?php echo $producto->Producto_Stock ?></td>
                        <td><?php echo $producto->Producto_Marca ?></td>
                        <td><?php echo $producto->Producto_Categoria ?></td>
                        <td><?php echo $producto->Producto_Costo ?></td>
                        <td><?php echo $producto->Producto_Precio ?></td>
                        <td><?php echo $producto->created_at ?></td>
                        <td><?php echo $producto->updated_at ?></td>
                        <td>
                            <a href="<?php echo base_url("/admin/productos/actualizar?id=$producto->Producto_Id")?>" class="btn btn-rojo">Actualizar</a>
                            <a onclick="return confirmar(event, 0)" href="<?php echo base_url("/admin/productos/eliminar?id=$producto->Producto_Id")?>" class="btn btn-rojo">Quitar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
        
            </tbody>

        </table>
        
        
    </div>
</main>