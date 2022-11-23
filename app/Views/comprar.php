<main class="contenedor-auth">

    <h2>Datos de tu compra</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Costo Total</th>
            </tr>    
        </thead>
        <tbody id="tabla-compras">
            
        </tbody>
    </table>
    <p class="compra-total">Total:</p>

    <?php
        $session = session();
        $userId = $session->get("User_Id") ?? null;
        
        if(!$userId):
    ?>

    <h2>Ingresa tus datos para terminar tu compra</h2>
    <form id="form-comprar" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="Venta_Nombre" class="form-control" value="" id="nombre" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Apellido</label>
            <input type="text" name="Venta_Apellido" class="form-control" value="" id="nombre" aria-describedby="emailHelp">
        </div>
       
        <div class="mb-3">
            <label for="nombre" class="form-label">DNI</label>
            <input type="text" name="Venta_DNI" class="form-control" value="" id="nombre" aria-describedby="emailHelp">
        </div> 
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Email</label>
            <input type="email" name="Venta_Email" class="form-control" value="" id="nombre" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Celular o Teléfono</label>
            <input type="tel" name="Venta_Telefono" class="form-control" value="" id="nombre" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Lugar donde entregaremos tu compra (Calle y altura)</label>
            <input type="text" name="Venta_Direccion" class="form-control" value="" id="nombre" aria-describedby="emailHelp">
        </div>
        
        

        <button  class="btn btn-rojo">Finalizar compra</button>
    </form>
    <?php
        else:
    ?>
    <button  class="btn btn-rojo">Finalizar compra</button>
    <?php
        endif
    ?>
    <script src="assets/js/finalizarCompra.js"></script>
</main>