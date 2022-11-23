<h2>Categorías</h3>

        <div class="panel-btns">
            <form class="d-flex" method="POST">
                <input class="form-control me-2" name="busqueda" type="search" placeholder="Busca algo" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <select name="buscarPor" class="form-select" aria-label="Default select example">
                    <option selected value="0">Buscar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Nombre</option>
                </select>
                <select name="orden" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Ordenar Por</option>
                    <option value="1">Nombre</option>
                    <option value="2">ID</option>
                    <option value="3">Más antiguo</option>
                    <option value="4">Más reciente</option>
                </select>
            </form>
            <a href="<?php echo base_url("/admin/categorias/crear")?>" class="btn btn-rojo">Agregar Categoría</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Creado el</th>
                    <th>Ultima actualización</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                    foreach($categorias as $categoria):
                ?>
                    <tr>
                        <td><?php echo $categoria->Categoria_Id?></td>
                        <td><?php echo $categoria->Categoria_Nombre?></td>
                        <td><?php echo $categoria->created_at?></td>
                        <td><?php echo $categoria->updated_at?></td>
                        <td>
                            <a href="<?php echo base_url("/admin/categorias/actualizar?id=$categoria->Categoria_Id")?>" class="btn btn-rojo">Actualizar</a>
                            <a onclick="return confirmar(event, 2)" href="<?php echo base_url("/admin/categorias/eliminar?id=$categoria->Categoria_Id")?>" class="btn btn-rojo">Quitar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>

        </table>
        
    </div>
</main>