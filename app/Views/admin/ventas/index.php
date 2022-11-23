<h2>Ventas</h3>

        <div class="panel-btns">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Busca algo" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <select name="busqueda" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Buscar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Nombre</option>
                    <option value="3">Desde x Fecha</option>
                    <option value="4">Hasta x Fecha</option>
                    <option value="4">Mayor que x Monto</option>
                    <option value="5">Menor que x Monto</option>
                    <option value="6">Monto exacto</option>
                </select>
                <select name="orden" class="form-select" aria-label="Default select example">
                    <option selected disabled value="1">Ordenar Por</option>
                    <option value="1">ID</option>
                    <option value="2">Total</option>
                    <option value="3">Fecha</option>
                </select>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Factura Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Realizado el</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                    foreach($ventas as $venta):
                ?>
                    <tr>
                        <td><?php echo $venta->Venta_Id?></td>
                        <td><?php echo $venta->Venta_UserId?></td>
                        <td><?php echo $venta->Venta_Apellido?></td>
                        <td><?php echo $venta->Venta_Nombre?></td>
                        <td><?php echo $venta->Venta_DNI?></td>
                        <td><?php echo $venta->Venta_Telefono?></td>
                        <td><?php echo $venta->Venta_Email?></td>
                        <td><?php echo $venta->created_at?></td>
                        <td><?php echo $venta->Venta_Monto?></td>
                        <td>
                            <a href="<?php echo base_url("admin/ventaDetalles?id=$venta->Venta_Id") ?>" class="btn btn-rojo">Ver detalle</a>
                        </td>
                    </tr>
                <?php
                    endforeach
                ?>
            </tbody>

        </table>

    </div>
</main>