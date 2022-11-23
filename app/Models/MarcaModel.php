<?php

namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model
{
    //Configuracion de CI
    protected $table      = 'marcas';
    protected $primaryKey = 'Marca_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['Marca_Nombre', "created_at", "updated_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = 'created_at';
    protected $updatedField  = "updated_at";
    protected $deletedField  = null;
    protected $validationRules    = [
        'Marca_Nombre'     => 'required|alpha_numeric_space',
    ];
    protected $validationMessages = [
        "Marca_Nombre" => [
            "required" => "Se requiere el campo nombre",
        ]
    ];
    protected $skipValidation     = false;

    public function busquedaPersonalizada($params){

        $db      = \Config\Database::connect();
        $builder = $db->table('marcas');
        //$query = "";
        if($params["busqueda"] != ""){
            if(isset($params["buscarPor"]) ){
                switch($params["buscarPor"]){
                    case 1: $builder->where("Marca_Id", $params["busqueda"]); break;
                    case 2: $builder->like("Marca_Nombre", $params["busqueda"]); break;
                }
            }
        }

        if(isset($params["orden"])){
            switch($params["orden"]){
                case 1: $builder->orderBy("Marca_Id"); break;
                case 2: $builder->orderBy("Marca_Nombre"); break;
                case 3: $builder->orderBy("created_at", "ASC"); break;
                case 4: $builder->orderBy("created_at", "DESC"); break;
            }
        }
        
        $query = $builder->get();
        return $query->getResult();
    }

}