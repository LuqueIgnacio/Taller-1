<main class="contenedor contenedor-nosotros">
<h2 style="text-align: center">Mis Compras</h2>
    <div class="contenedor-compras">
        <?php
            foreach($compras as $compra):
                ?>
            <div class="card" style="width: 30rem;">
                <img src="assets/img/productos/<?= $compra->Producto_Img?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?= $compra->Producto_Nombre?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Precio: $<?= $compra->VD_Precio?></li>
                    <li class="list-group-item">Cantidad: <?= $compra->VD_Cantidad?></li>
                    <li class="list-group-item">Total: $<?= $compra->VD_Precio * $compra->VD_Cantidad?></li>
                    <li class="list-group-item">Fecha: <?= $compra->created_at?></li>
                </ul>
                
            </div>
        <?php endforeach; ?>
    </div>        
    
</main>