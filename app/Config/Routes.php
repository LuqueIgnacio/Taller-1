<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Rutas de las paginas con acceso libre para todos los usuarios
$routes->group("", function($routes){
    $routes->get('/', 'Home::index');
    $routes->get('/a', 'Home::plantilla');
    $routes->get('/login', 'AuthController::login');
    $routes->post('/login', 'AuthController::login');
    $routes->get('/logout', 'AuthController::logout');
    $routes->get('/confirmar', 'AuthController::confirmar');
    $routes->get('/confirmarRegistro', 'AuthController::confirmarRegistro');
    $routes->get('/register', 'AuthController::register');
    $routes->post('/register', 'AuthController::register');
    $routes->get('/contacto', 'Home::contacto');
    $routes->post('/contacto', 'Home::contacto');
    $routes->get('/productos', 'Home::productos');
    $routes->post('/productos', 'Home::productos');
    $routes->get('/nosotros', 'Home::nosotros');
    $routes->get('/legales', 'Home::legales');
    $routes->get("/comprar", "Home::comprar");
    $routes->post("/comprar", "Home::comprar");
    $routes->get("/compraExitosa", "Home::compraExitosa");
    $routes->get("/compraFallida", "Home::compraFallida");
    $routes->get("/comercializacion", "Home::comercializacion");
    $routes->get("/verCompras", "Home::verCompras");
});

//Rutas del panel de administracion
$routes->group("admin", ["filter" => "auth"] ,function($routes){
   
    $routes->get("", "AdminController::index");
    //Productos
    $routes->get("productos", "AdminController::productos");
    $routes->post("productos", "AdminController::productos");
    $routes->get("productos/crear", "AdminController::productosCrear");
    $routes->post("productos/crear", "AdminController::productosCrear");
    $routes->get("productos/actualizar", "AdminController::productosActualizar");
    $routes->post("productos/actualizar", "AdminController::productosActualizar");
    $routes->get("productos/eliminar", "AdminController::productosEliminar");
    //Categorias
    $routes->get("categorias", "AdminController::categorias");
    $routes->post("categorias", "AdminController::categorias");
    $routes->get("categorias/crear", "AdminController::categoriasCrear");
    $routes->post("categorias/crear", "AdminController::categoriasCrear");
    $routes->get("categorias/actualizar", "AdminController::categoriasActualizar");
    $routes->post("categorias/actualizar", "AdminController::categoriasActualizar");
    $routes->get("categorias/eliminar", "AdminController::categoriaEliminar");
    //Marcas
    $routes->get("marcas", "AdminController::marcas");
    $routes->post("marcas", "AdminController::marcas");
    $routes->get("marcas/crear", "AdminController::marcasCrear");
    $routes->post("marcas/crear", "AdminController::marcasCrear");
    $routes->get("marcas/actualizar", "AdminController::marcasActualizar");
    $routes->post("marcas/actualizar", "AdminController::marcasActualizar");
    $routes->get("marcas/eliminar", "AdminController::marcaEliminar");
    //Usuarios
    $routes->get("usuarios", "AdminController::usuarios");
    $routes->post("usuarios", "AdminController::usuarios");
    $routes->get("usuarios/actualizar", "AdminController::usuariosActualizar");
    $routes->post("usuarios/actualizar", "AdminController::usuariosActualizar");
    $routes->get("usuarios/historial", "AdminController::usuariosHistorial");
    //Ventas
    $routes->get("ventas", "AdminController::ventas");
    $routes->get("ventaDetalles", "AdminController::ventaDetalles");
    //Cambios
    $routes->get("cambios", "AdminController::cambios");
    //Consultas
    $routes->get("consultas", "AdminController::consultas");
    $routes->get("consultas/eliminar", "AdminController::consultasEliminar");
    //Eliminar usuario
    $routes->get("usuarios/eliminar", "AdminController::usuariosEliminar");
    
    }
);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
