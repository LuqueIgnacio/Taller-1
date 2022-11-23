<h2>Registro de cambios</h3>

        <div class="panel-btns">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Busca algo" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <select name="busqueda" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Buscar Por</option>
                    <option value="1">ID</option>
                    <option value="3">ID Usuario</option>
                    <option value="3">Tipo de cambio</option>
                </select>
                <select name="orden" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Ordenar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Fecha</option>
                </select>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Entidad Id</th>
                    <th>Objeto</th>
                    <th>Usuario Id</th>
                    <th>Tipo de Cambio</th>
                    <th>Realizado el</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
            <?php
                    foreach($cambios as $cambio):
                ?>
                    <tr>
                        <td><?php echo $cambio->Cambio_Id?></td>
                        <td><?php 
                            switch($cambio->Cambio_EntidadId){
                                case 1: echo "Producto"; break;
                                case 2: echo "Marca"; break;
                                case 3: echo "Categoría"; break;
                                case 4: echo "Usuario"; break;
                            }
                            ?>
                        </td>
                        <td><?php echo $cambio->Cambio_ObjetoId?></td>
                        <td><?php echo $cambio->Cambio_UserId?></td>
                        <td><?php echo $cambio->Cambio_Tipo?></td>
                        <td><?php echo $cambio->created_at?></td>
                        <td>
                            <a href="<?php echo base_url("/admin/verCambio?id=$cambio->Cambio_Id")?>" class="btn btn-rojo">Ver detalle</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>

        </table>
        
    </div>
</main>