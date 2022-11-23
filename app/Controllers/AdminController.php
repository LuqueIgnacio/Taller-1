<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Entities\Producto;
use App\Models\CategoriaModel;
use App\Entities\Categoria;
use App\Models\MarcaModel;
use App\Models\CambiosModel;
use App\Models\ConsultasModel;
use App\Models\UsuariosModel;
use App\Models\VentasModel;

use function PHPUnit\Framework\isEmpty;

class AdminController extends BaseController{

    public function index(){

        echo view("templates/header", ["titulo" => "Administración"]);
        echo view("admin/index");
        echo view("admin/inicio");
        echo view("templates/footer");

    }

    public function productos(){

        $productoModel = new ProductoModel();
        $session = session();
        //La petición es POST si el usuario modificó los parámetros de búsqueda
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $datos["productos"] = $productoModel->busquedaPersonalizada($_POST);
        }else{
            $productos = $productoModel->findAll();
            $datos["productos"] = $productos;
        }
        

        echo view("templates/header", ["titulo" => "Administración | Productos"]);
        echo view("admin/index");
        echo view("admin/productos/productos", $datos);
        echo view("templates/footer");
    }
    public function productosCrear(){

        $datos = [];
        $datos["producto"] = new Producto();
        $marcaModel = new MarcaModel();
        $datos["marcas"] = $marcaModel->findAll();
        $categoriaModel = new CategoriaModel();
        $datos["categorias"] = $categoriaModel->findAll();
        $datos["errores"] = [];
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $productoModel = new ProductoModel();
            $datos["producto"] = (object)$_POST;
            $img = $this->request->getFile("Producto_Img");

            $subioImg = $this->validate(
                ["Producto_Img" => "uploaded[Producto_Img]|is_image[Producto_Img]"],
                ["Producto_Img" => ["uploaded" => "Debes ingresar una imagen", "is_image" => "Debes ingresar una imagen"] ]
            );
              
            if($subioImg){
                $nombreImg = $img->getRandomName();
                $_POST["Producto_Img"] = $nombreImg;
                $datos["producto"]->Producto_Id = $productoModel->insert($_POST); 
            }
        
            $datos["errores"] = $productoModel->errors();
            if(!$subioImg){
                $datos["errores"]["Producto_Img"] = array_pop($this->validator->getErrors());
            }

            if(sizeof($datos["errores"]) == 0 && $subioImg){
                $productoModel->guardarImg($img, $nombreImg);
                $cambios = new CambiosModel();
                $cambios->registrarCambioProducto((object)$datos["producto"]);
                return redirect()->route('admin/productos');
            }
        }
        
        echo view("templates/header", ["titulo" => "Administración | Productos"]);
        echo view("admin/index");
        echo view("admin/productos/crear", $datos);
        echo view("templates/footer");
    }
    public function productosActualizar(){
        $datos = [];
        $marcaModel = new MarcaModel();
        $datos["marcas"] = $marcaModel->findAll();
        $categoriaModel = new CategoriaModel();
        $datos["categorias"] = $categoriaModel->findAll();
        $datos["errores"] = []; 
        $productoModel = new ProductoModel();
        $productoAnterior  = $productoModel->find($_GET["id"]);
        $datos["producto"] = $productoAnterior;
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $img = $this->request->getFile("Producto_Img");
            //Se actualiza la imagen
            if($img->isValid()){
                $nombreImg = $img->getRandomName();
                $_POST["Producto_Img"] = $nombreImg;  
            }
            $productoModel->update($_GET["id"], $_POST);
            $datos["errores"] = $productoModel->errors(); 
            if(sizeof($datos["errores"]) == 0 ){
                if($img->isValid()){
                    $productoModel->guardarImg($img, $nombreImg);
                }
                $cambios = new CambiosModel();
                $cambios->registrarCambioProducto($productoAnterior, new Producto($_POST));
                return redirect()->route('admin/productos');
            }
        }

        echo view("templates/header", ["titulo" => "Administración | Productos"]);
        echo view("admin/index");
        echo view("admin/productos/actualizar", $datos);
        echo view("templates/footer");
    }

    public function productosEliminar(){
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($_GET["id"]);

        $productoModel->delete($_GET["id"]);

        return redirect()->route('admin/productos');
    }

    public function marcas(){

        $marcaModel = new MarcaModel();
        //El usuario modifico los parametros de busqueda
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $datos["marcas"] = $marcaModel->busquedaPersonalizada($_POST);
        }else{
            $datos["marcas"] = $marcaModel->findAll();
        } 

        echo view("templates/header", ["titulo" => "Administración | Marcas"]);
        echo view("admin/index");
        echo view("admin/marcas/marcas", $datos);
        echo view("templates/footer");
    }
    public function marcasCrear(){
        $datos["marca"] = [];
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $marcaModel = new MarcaModel();
            $datos["marca"] = (object)$_POST;
            $datos["marca"]->Marca_Id = $marcaModel->insert($_POST);
            $datos["errores"] = $marcaModel->errors();
            if(sizeof($datos["errores"]) === 0){
                $cambios = new CambiosModel();
                $cambios->registrarCambioMarca($datos["marca"]);
                return redirect()->route('admin/marcas');
            }
        }

        echo view("templates/header", ["titulo" => "Administración | Marcas"]);
        echo view("admin/index");
        echo view("admin/marcas/crear", $datos);
        echo view("templates/footer");
    }
    public function marcasActualizar(){

        $marcaModel = new MarcaModel();
        $datos["marca"] = $marcaModel->find($_GET["id"]);

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $marcaModel->update($_GET["id"], $_POST);
            $datos["errores"] = $marcaModel->errors();
            if(sizeof($datos["errores"]) === 0){
                $cambios = new CambiosModel();
                $cambios->registrarCambioMarca((object)$datos["marca"], (object)$_POST);
                return redirect()->route("admin/marcas");
            }
        }

        echo view("templates/header", ["titulo" => "Administración | Marcas"]);
        echo view("admin/index");
        echo view("admin/marcas/actualizar", $datos);
        echo view("templates/footer");
    }
 
    public function marcaEliminar(){

        $marcaModel = new MarcaModel();
        $marcaModel->delete($_GET["id"]);

        return redirect()->route("admin/marcas");
    }

    public function categorias(){

        $categoriaModel = new CategoriaModel();
        //Si el usuario modifico los parametros de busqueda
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $datos["categorias"] = $categoriaModel->busquedaPersonalizada($_POST);
        }else{
            $datos["categorias"] = $categoriaModel->findAll();
        }

        echo view("templates/header", ["titulo" => "Administración | Categorías"]);
        echo view("admin/index");
        echo view("admin/categorias/categorias", $datos);
        echo view("templates/footer");
    }
    public function categoriasCrear(){
        
        $datos["errores"] = [];

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $categoriaModel = new CategoriaModel();
            $categoria = new Categoria(esc($_POST));
            $categoria->Categoria_Id = $categoriaModel->insert($categoria);
            $datos["errores"] = $categoriaModel->errors();

            if(sizeof($datos["errores"]) == 0 ){
                $cambios = new CambiosModel();
                $cambios->registrarCambioCategoria($categoria);
                return redirect()->route('admin/categorias');
            }
        }

        echo view("templates/header", ["titulo" => "Administración | Categorías"]);
        echo view("admin/index");
        echo view("admin/categorias/crear", $datos);
        echo view("templates/footer");
    }
    public function categoriasActualizar(){

        $categoriaModel = new CategoriaModel();
        $datos["categoria"] = $categoriaModel->find($_GET["id"]);
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $categoriaModel->update($_GET["id"], $_POST);
            $datos["errores"] = $categoriaModel->errors();
            if(sizeof($datos["errores"]) === 0){
                $cambios = new CambiosModel();
                $cambios->registrarCambioCategoria((object)$datos["categoria"], (object)$_POST);
                return redirect()->route("admin/categorias");
            }
        }

        echo view("templates/header", ["titulo" => "Administración | Categorías"]);
        echo view("admin/index");
        echo view("admin/categorias/actualizar", $datos);
        echo view("templates/footer");
    }

    public function categoriaEliminar(){

        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($_GET["id"]);

        return redirect()->route("admin/categorias");
    }

    public function usuarios(){

        $usuariosModel = new UsuariosModel();
        //Si el usuario cambio los parametros de busqueda
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $datos["usuarios"] = $usuariosModel->busquedaPersonalizada($_POST);
        }else{
            $datos["usuarios"] = $usuariosModel->findAll();
        }
        

        echo view("templates/header", ["titulo" => "Administración | Usuarios"]);
        echo view("admin/index");
        echo view("admin/usuarios/usuarios", $datos);
        echo view("templates/footer");
    }

    public function usuariosActualizar(){

        $usuariosModel = new UsuariosModel();
        $datos["usuario"] = $usuariosModel->find($_GET["id"]);

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $usuariosModel->update($_GET["id"], $_POST);
            $datos["errores"] = $usuariosModel->errors();

            if(sizeof($datos["errores"]) === 0){
                $cambios = new CambiosModel();
                $cambios->registrarCambioUsuario((object)$datos["usuario"], (object)$_POST);
                return redirect()->route("admin/usuarios");
            }
        }

        echo view("templates/header", ["titulo" => "Administración | Usuarios"]);
        echo view("admin/index");
        echo view("admin/usuarios/actualizar", $datos);
        echo view("templates/footer");
    }

    public function usuariosEliminar(){

        $usuariosModel = new UsuariosModel();
        var_dump($usuariosModel->delete($_GET["id"]) ); 
        
        return redirect()->route("admin/usuarios");
    }

    public function ventas(){

        $ventasModel = new VentasModel();
        $datos["ventas"] = $ventasModel->findAll();

        echo view("templates/header", ["titulo" => "Administración | Ventas"]);
        echo view("admin/index");
        echo view("admin/ventas/index", $datos);
        echo view("templates/footer");
    }

    public function ventaDetalles(){

        $ventasModel = new VentasModel();
        $datos["ventas"] = $ventasModel->getVentaDetalles($_GET["id"]);

        echo view("templates/header", ["titulo" => "Administración | Ventas"]);
        echo view("admin/index");
        echo view("admin/ventas/detalles", $datos);
        echo view("templates/footer");
    }

    public function cambios(){

        $cambiosModel = new CambiosModel();
        $datos["cambios"] = $cambiosModel->findAll();

        echo view("templates/header", ["titulo" => "Administración | Cambios"]);
        echo view("admin/index");
        echo view("admin/cambios", $datos);
        echo view("templates/footer");
    }
    
    public function consultas(){

        $consultasModel = new ConsultasModel();
        $data["consultas"] = $consultasModel->findAll();

        echo view("templates/header", ["titulo" => "Administración | Consultas"]);
        echo view("admin/index");
        echo view("admin/consultas", $data);
        echo view("templates/footer");
    }

    public function consultasEliminar(){

        $consultasModel = new ConsultasModel();
        $consultasModel->delete($_GET["id"]);

        return redirect()->route("admin/consultas");
    }



}