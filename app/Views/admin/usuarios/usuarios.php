<h2>Usuarios</h3>

        <div class="panel-btns">
            <form class="d-flex" method="POST">
                <input class="form-control me-2" name="busqueda" type="search" placeholder="Busca algo" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <select name="buscarPor" class="form-select" aria-label="Default select example">
                    <option selected value="0">Buscar Por</option>
                    <option value="1">ID</option>
                    <option value="2">DNI</option>
                    <option value="3">Email</option>
                    <option value="4">Nombre</option>
                    <option value="5">Nivel (0, 1 o 2)</option>
                </select>
                <select name="orden" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Ordenar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Nivel</option>
                    <option value="3">Más antiguo</option>
                    <option value="4">Más reciente</option>
                </select>
            </form>
        
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Nivel</th>
                    <th>Registrado el</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                        foreach($usuarios as $usuario):
                    ?>
                        <tr>
                            <td><?php echo $usuario->User_Id?></td>
                            <td><?php echo $usuario->User_Nombre?></td>
                            <td><?php echo $usuario->User_Apellido?></td>
                            <td><?php echo $usuario->User_Email?></td>
                            <td><?php echo $usuario->User_Telefono?></td>
                            <td><?php echo $usuario->User_DNI?></td>
                            <td><?php echo $usuario->User_Direccion?></td>
                            <td><?php echo $usuario->User_Nivel?></td>
                            <td><?php echo $usuario->created_at?></td>
                            <td>
                                <a onclick="return confirmar(event, 3)" href="<?php echo base_url("/admin/usuarios/eliminar?id=$usuario->User_Id")?>" class="btn btn-rojo">Eliminar</a>
                                <a href="<?php echo base_url("/admin/usuarios/actualizar?id=$usuario->User_Id")?>" class="btn btn-rojo">Actualizar</a>
                            </td>
                        </tr>
                <?php endforeach; ?>
                
            </tbody>

        </table>
        
    </div>
</main>

