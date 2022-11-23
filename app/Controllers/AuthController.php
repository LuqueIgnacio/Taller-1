<?php

namespace App\Controllers;

use App\Entities\Producto;
use App\Entities\Usuario;
use App\Models\UsuariosModel;


class AuthController extends BaseController{

    public function login(){

        $usuarioModel = new UsuariosModel();
        $datos["usuario"] = $usuario = new Usuario();
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $validacion = $this->validate([
                "User_Email" => "required|valid_email",
                "User_Password" => "required"
            ],
            [
                "User_Email" => [
                    "required" => "Debes ingresar un email",
                    "valid_email" => "Debes ingresar un email valido",
                ],
                "User_Password" => [
                    "required" => "Debes ingresar una contraseña"
                ]
            ]); 
            
            if($validacion){
                $datos["usuario"] = $usuarioModel->validarUsuario($_POST["User_Email"], $_POST["User_Password"] );
                if($datos["usuario"] ){
                    //Inicia la sesión
                    $session = session();
                    $session->set("User_Id", $datos["usuario"]->User_Id);
                    $session->set("User_Email", $datos["usuario"]->User_Email);
                    $session->set("User_Nombre", $datos["usuario"]->User_Nombre);
                    $session->set("User_Apellido", $datos["usuario"]->User_Apellido);
                    $session->set("User_Telefono", $datos["usuario"]->User_Telefono);
                    $session->set("User_Direccion", $datos["usuario"]->User_Direccion);
                    $session->set("User_DNI", $datos["usuario"]->User_DNI);
                    $session->set("nivel", $datos["usuario"]->User_Nivel); 
                    $session->set("sesionIniciada", true);
                    if(isset($_POST["mantener"])){
                        $config['sess_expiration'] = 9999999;
                    }
                    return redirect()->route("/");
                }else{
                    $datos["errores"]["User_Password"] = "Datos invalidos";
                }
            }else{
                $datos["errores"] = $this->validator->getErrors();
            }
           
        }

        echo view("templates/header", ["titulo" => "Login"]);
        echo view("auth/login", $datos);
        echo view("templates/footer");

    }

    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->route("/");
    }

    public function register(){
      
        $data["usuario"] = new Usuario();
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $usuarioModel = new UsuariosModel();
            //Verificamos si el email ingresado ya se encuentra registrado y confirmado
            $existeUsuario = $usuarioModel->existeUsuarioConfirmado($_POST["User_Email"]);
            //El email o no se encuentra registrado o no se encuentra confirmado, por lo que seguimos con el registro
            if(!$existeUsuario){
                if($_POST["User_Password"] != ""){
                    $_POST["User_Password"] = password_hash($_POST["User_Password"], PASSWORD_BCRYPT);
                }
                $data["usuario"]->fill($_POST);
                //Generamos el token para validar el email
                $_POST["User_Token"] = uniqid();
                $usuarioModel->save($_POST);
                $data["errores"] = $usuarioModel->errors();
                if(sizeof($data["errores"]) === 0){
                    $this->enviarMailRegistro((object)$_POST);
                    return redirect()->route("confirmar");
                }
            }else{
                
                $data["errores"]["User_Email"] = "El email ya se encuentra registrado";
            }
            
        }

        echo view("templates/header", ["titulo" => "Registro"]);
        echo view("auth/register", $data);
        echo view("templates/footer");
    }

    public function confirmar(){
        echo view("templates/header", ["titulo" => "Confirmar Email"]);
        echo view("auth/confirmarEmail");
        echo view("templates/footer");
    }

    public function confirmarRegistro(){
        $usuarioModel = new UsuariosModel();
        if($usuarioModel->confirmarRegistroUsuario($_GET["id"])){
            return redirect()->route("login");
        }else{
            return redirect()->route("");
        }
    }

    protected function enviarMailRegistro($usuario){
        $data["usuario"] = $usuario;
        $email = \Config\Services::email();
        $email->setFrom("carniceriaSoler@gmail.com");
        $email->setTo($usuario->User_Email);
        $email->setSubject("Confirmar registro en Carniceria Soler");
        $email->setMessage(view("mails/confirmarRegistro", $data));
        $email->send();
    }

}