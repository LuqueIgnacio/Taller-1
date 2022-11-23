<h2>Marcas</h3>

        <div class="panel-btns">
            <form class="d-flex" method="POST">
                <input class="form-control me-2" name="busqueda" type="search" placeholder="..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <select name="buscarPor" class="form-select" aria-label="Default select example">
                    <option selected value="0">Buscar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Nombre</option>
                </select>
                <select name="orden" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Ordenar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Nombre</option>
                    <option value="3">Más antiguo</option>
                    <option value="4">Más reciente</option>
                </select>
            </form>
            <a href="<?php echo base_url("/admin/marcas/crear")?>" class="btn btn-rojo">Agregar Marca</a>
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
                    foreach($marcas as $marca):
                ?>
                    <tr>
                        <td><?php echo $marca->Marca_Id?></td>
                        <td><?php echo $marca->Marca_Nombre?></td>
                        <td><?php echo $marca->created_at?></td>
                        <td><?php echo $marca->updated_at?></td>
                        <td>
                            <a href="<?php echo base_url("/admin/marcas/actualizar?id=$marca->Marca_Id")?>" class="btn btn-rojo">Actualizar</a>
                            <a onclick="return confirmar(event, 1)" href="<?php echo base_url("/admin/marcas/eliminar?id=$marca->Marca_Id")?>" class="btn btn-rojo">Quitar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>

        </table>
        
    </div>
</main>