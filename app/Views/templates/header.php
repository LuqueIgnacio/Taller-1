<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/inicio.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/styles.css")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="mensaje"><p>Ofertas todos los viernes</p></div>
    <header>
        <div class="logo">
            <h1><a href="<?php echo base_url("") ?>"><span class="rojo">Carnicería</span> y <span class="dorado">Kiosco</span> <br>Soler</a></h1>
        </div>
        <nav class="nav">
            <?php
                $session = session();
                $sesionActiva = $session->get("sesionIniciada");
                $nivel = $session->get("nivel");
            ?>
            <a href="<?php echo base_url("productos") ?>">Productos</a>
            <a href="<?php echo base_url("nosotros") ?>">Quienes Somos</a> 
            <a href='<?=base_url("contacto")?>'>Contactanos</a>
            <a href="<?php echo base_url("comercializacion") ?>">Comercialización</a>
            <?php
                if($sesionActiva){
                    echo ("<a href='". base_url("verCompras"). "'>Ver Compras</a>"); 
                    echo ("<a href='". base_url("logout"). "'>Cerrar Sesión</a>");
                    
                    if($nivel > 0){
                        echo ("<a href='". base_url("admin"). "'>Admin</a>");
                    }
                }else{
                    echo ("<a href='". base_url("login"). "'>Iniciar Sesión</a>");
                    echo ("<a href='". base_url("register"). "'>Registrarse</a>");
                }
            ?>
            

            <button class="carrito" href="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/></svg>
           
            </button>
               
        </nav>
    </header>
    <div class="contenedor-carrito">
    <div class="carrito-div oculto">
        <div class="carrito-productos"></div> 
    </div>
</div> 