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
                    <th>Producto Id</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>    
            </thead>
            <tbody>
                <?php
                    foreach($ventas as $ventaDetalles):
                ?>
                    <tr>
                        <td><?php echo $ventaDetalles->VD_Id?></td>
                        <td><?php echo $ventaDetalles->VD_FacturaId?></td>
                        <td><?php echo $ventaDetalles->VD_ProdId?></td>
                        <td><?php echo $ventaDetalles->VD_Costo?></td>
                        <td><?php echo $ventaDetalles->VD_Precio?></td>
                        <td><?php echo $ventaDetalles->VD_Cantidad?></td>
                    </tr>
                <?php
                    endforeach
                ?>
            </tbody>

        </table>

    </div>
</main>