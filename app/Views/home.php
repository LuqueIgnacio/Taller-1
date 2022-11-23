
<main class="contenedor ">
    
    

    <div class="home-container">
        
        <div class="oferta-dia">
            <div class="oferta-dia-top">
                <p>Oferta del día</p>
            </div>
            <div class="card d-inline-block h-100" >
                <img src="assets/img/GWS-PICANHA.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Carne Picanha</h5>
                </div>
            </div>
        </div>
        
        <div id="carouselExampleCaptions " class="carousel slide h-100 " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ">
            <div class="carousel-item active">
            <img src="assets/img/GWS-Seafood3.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="..." class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        
    </div>

    <div id="productos" class="ofertas-container">
        <h2 class="">Ofertas</h2>
        <div class="lista-ofertas">
        <?php
            foreach($productos as $producto):
        ?>
            <div class="oferta">
                <div class="card d-inline-block" >
                    <img src="<?= "assets/img/productos/".$producto->Producto_Img ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto->Producto_Nombre ?></h5>
                        <p class="oferta-precio">$<?= $producto->Producto_Precio ?></p>
                        <button data-productoId="<?= $producto->Producto_Id ?>" type="button" class="btn btn-rojo btn-producto">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        

        </div>
    </div>
    
    

</main>