<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\MarcaModel;
use App\Models\ProductoModel;
use App\Models\VentasModel;
use App\Models\ConsultasModel;

class Home extends BaseController
{   
    public function index()
    {
        $productoModel = new ProductoModel();

        echo view("templates/header", ["titulo" => "Carnicería Soler"]);
        echo view("home", ["productos" => $productoModel->findAll(4)]);
        echo view("templates/footer");
    }

    public function contacto(){

        $errores = []; 
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
            $consultaModel = new ConsultasModel();
            if(session()->User_Id){
                $datos["Consulta_Email"] = session()->User_Email;
            }else{
                $datos["Consulta_Email"] = $_POST["Consulta_Email"];
            }

            $datos["Consulta_Mensaje"] = esc($_POST["Consulta_Mensaje"]);
            if($consultaModel->insert($datos)){
                return redirect()->route("/");
            }else{
                $errores["errores"] = $consultaModel->errors();
            }
              
        } 

        echo view("templates/header", ["titulo" => "Contactanos"]);
        echo view("contacto", $errores);
        echo view("templates/footer");
    }

    public function productos(){

        $productosModel = new ProductoModel();
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $datos["productos"] = $productosModel->busquedaPersonalizadaEnTienda($_POST);
        }else{
            $datos["productos"] = $productosModel->where("Producto_Listado", 0)->where("Producto_Stock >", 0)->findAll();
        }
        
        $categoriasModel = new CategoriaModel();
        $datos["categorias"] = $categoriasModel->findAll();
        $marcasModel = new MarcaModel();
        $datos["marcas"] = $marcasModel->findAll();

        echo view("templates/header", ["titulo" => "Catálogo"]);
        echo view("productos", $datos);
        echo view("templates/footer");
    }

    public function nosotros(){
        echo view("templates/header", ["titulo" => "Nosotros"]);
        echo view("nosotros");
        echo view("templates/footer");
    }

    public function legales(){
        echo view("templates/header", ["titulo" => "legales"]);
        echo view("legales");
        echo view("templates/footer");
    }

    public function comprar(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            
            $session = session();
            $userId = $session->get("User_Id") ?? null;


            $validacion = $this->validate([
                "Venta_Nombre" => "required|alpha_numeric_punct",
                "Venta_Apellido" => "required|alpha_numeric_punct",
                "Venta_DNI" => "required",
                "Venta_Email" => "required|valid_email",
                "Venta_Telefono" => "required",
                "Venta_Direccion" => "required|alpha_numeric_punct"
            ],
            [
                "Venta_Nombre" => [
                    "required" => "El campo nombre es obligatorio"
                ],
                "Venta_Apellido" => [
                    "required" => "El campo apellido es obligatorio"
                ],
                "Venta_DNI" => [
                    "required" => "El campo DNI es obligatorio"
                ],
                "Venta_Email" => [
                    "required" => "Debes ingresar un número para poder contactarte"
                ],
                "Venta_Telefono" => [
                    "required" => "Debes ingresar un email para poder contactarte"
                ],
                "Venta_Direccion" => [
                    "required" => "Debes ingresar una dirección para que podamos entregar tu compra"
                ]
            ]);

            if($userId || $validacion){
                $ventaModel = new VentasModel();
                if($userId){
                    $session = session();
                    $_POST["Venta_UserId"] = $userId;
                    $_POST["Venta_Nombre"] = $session->get("User_Nombre");
                    $_POST["Venta_Apellido"] = $session->get("User_Apellido");
                    $_POST["Venta_Email"] = $session->get("User_Email");
                    $_POST["Venta_DNI"] = $session->get("User_DNI");
                    $_POST["Venta_Telefono"] = $session->get("User_Telefono");
                    $_POST["Venta_Direccion"] = $session->get("User_Direccion");
                }
 
                if($ventaModel->guardarVenta($_POST)){
                    return json_encode(["respuesta" => 1]);
                }else{
                    return json_encode(["respuesta" => 0]);
                }

            }else{
                return json_encode($this->validator->getErrors() );
            }
        }

        echo view("templates/header", ["titulo" => "Comprando"]);
        echo view("comprar");
        echo view("templates/footer");
    }

    public function compraExitosa(){
        echo view("templates/header", ["titulo" => "Gracias por tu compra"]);
        echo view("compraExitosa");
        echo view("templates/footer");
    }

    public function compraFallida(){
        echo view("templates/header", ["titulo" => "Lo sentimos..."]);
        echo view("compraFallida");
        echo view("templates/footer");
    }

    public function comercializacion(){
        echo view("templates/header", ["titulo" => "Comercialización"]);
        echo view("comercializacion");
        echo view("templates/footer");
    }

    public function verCompras(){

        //Si el usuario no inicio sesión se lo redirecciona al home
        $idUsuario = session()->User_Id;
        if(!$idUsuario){
            return redirect()->route("/");
        }

        $ventaModel = new VentasModel();
        $compras = $ventaModel->select("VD_Precio, VD_Cantidad, Producto_Nombre, Producto_Img, ventas.created_at")->join("ventas_detalle", "VD_FacturaId = Venta_Id")
        ->join("productos", "Producto_Id = VD_ProdId")->where("Venta_UserId", $idUsuario)->findAll();

        echo view("templates/header", ["titulo" => "Comercialización"]);
        echo view("compras", ["compras" => $compras]);
        echo view("templates/footer");
    }
} 
