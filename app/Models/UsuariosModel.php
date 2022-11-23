<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    //Configuracion de CI
    protected $table      = 'usuarios';
    protected $primaryKey = 'User_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ["User_Nombre", "User_Apellido", "User_DNI", "User_Email", "User_Password", "User_Telefono", "User_Direccion", "User_Token",
                                "User_Nivel", "User_Confirmado", "created_at", "updated_at", "deleted_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = 'created_at';
    protected $updatedField  = "updated_at";
    protected $deletedField  = "deleted_at";
    protected $validationRules    = [
        "User_Nombre" => "required",
        "User_Apellido" => "required",
        "User_DNI" => "required",
        "User_Email" => "required|valid_email",
        "User_Password" => "required|min_length[6]",
        "User_Telefono" => "required|min_length[6]",
        "User_Direccion" => "required"
    ];
    protected $validationMessages = [
        "User_Nombre" => [
            "required" => "El campo Nombre es obligatorio"
        ],
        "User_Apellido" => [
            "required" => "El campo Apellido es obligatorio"
        ],
        "User_DNI" => [
            "required" => "El campo DNI es obligatorio"
        ],
        "User_Email" => [
            "required" => "El campo Email es obligatorio",
            "valid_email" => "Debes ingresar un Email válido"
        ],
        "User_Password" => [
            "required" => "Debes ingresar una contraseña",
            "min_length" => "La contraseña debe tener al menos 6 caracteres"
        ],
        "User_Telefono" => [
            "required" => "Debes ingresar un número de teléfono",
            "min_length" => "Debes ingresar un número de teléfono válido"
        ],
        "User_Direccion" => [
            "required" => "Debes ingresar una dirección"
        ]
    ];
    protected $skipValidation     = false;

    public function validarUsuario($email, $password){
        $db      = \Config\Database::connect();
        $builder = $db->table('usuarios');
        $builder->where("User_Email", $email);

        $query = $builder->get();
        $usuario = $query->getResult();
        
        if($usuario){
            $usuario = $usuario[0];
        }else{
            return false;
        }

        if(password_verify($password, $usuario->User_Password) ){
            return $usuario;
        }else{
            return false;
        }
        
    }

    public function existeUsuarioConfirmado($email){
        $db      = \Config\Database::connect();
        $builder = $db->table('usuarios');
        $builder->where("User_Email", $email);

        $query = $builder->get();
        $usuario = $query->getResult();
        if(isset($usuario[0])){
            if($usuario[0]->User_Confirmado == 1){
                return true;
            }else{
                $this->delete($usuario[0]->User_Id);
                return false;
            }
        }else{
            return false;
        }
    }

    public function confirmarRegistroUsuario($token){
        $db      = \Config\Database::connect();
        $builder = $db->table('usuarios');
        $builder->where("User_Token", $token);

        $query = $builder->get();
        $usuario = $query->getResult();
        if(isset($usuario[0]) && $usuario[0]->User_Token != null){
            $usuario = $usuario[0];
            $usuario->User_Confirmado = 1;
            $usuario->User_Token = null;
            $this->update($usuario->User_Id, $usuario );
            return true;
        }else{
            return false;
        }
    }

    public function busquedaPersonalizada($params){

        $db      = \Config\Database::connect();
        $builder = $db->table('usuarios');
       
        if($params["busqueda"] != ""){
            if(isset($params["buscarPor"]) ){
                switch($params["buscarPor"]){
                    case 1: $builder->where("User_Id", $params["busqueda"]); break;
                    case 2: $builder->like("User_DNI", $params["busqueda"]); break;
                    case 3: $builder->like("User_Email", $params["busqueda"]); break;
                    case 4: $builder->like("User_Nombre", $params["busqueda"]); $builder->like("User_Apellido", $params["busqueda"]); break;
                    case 5: $builder->where("User_Nivel", $params["busqueda"]); break;
                }
            }
        }

        if(isset($params["orden"])){
            switch($params["orden"]){
                case 1: $builder->orderBy("User_Id"); break;
                case 2: $builder->orderBy("User_Nivel"); break;
                case 3: $builder->orderBy("created_at", "ASC"); break;
                case 4: $builder->orderBy("created_at", "DESC"); break;
            }
        }
        
        $query = $builder->get();
        return $query->getResult();
    }

}