<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    //Configuracion de CI
    protected $table      = 'categorias';
    protected $primaryKey = 'Categoria_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'App\Entities\Categoria';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['Categoria_Nombre', "created_at", "updated_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = 'created_at';
    protected $updatedField  = "updated_at";
    protected $deletedField  = null;
    protected $validationRules    = [
        'Categoria_Nombre'     => 'required|alpha_numeric_space',
    ];
    protected $validationMessages = [
        "Categoria_Nombre" => [
            "required" => "Se requiere el campo nombre",
        ]
    ];
    protected $skipValidation     = false;

    public function busquedaPersonalizada($params){

        $db      = \Config\Database::connect();
        $builder = $db->table('categorias');
        //$query = "";
        if($params["busqueda"] != ""){
            if(isset($params["buscarPor"]) ){
                switch($params["buscarPor"]){
                    case 1: $builder->where("Categoria_Id", $params["busqueda"]); break;
                    case 2: $builder->like("Categoria_Nombre", $params["busqueda"]); break;
                }
            }
        }

        if(isset($params["orden"])){
            switch($params["orden"]){
                case 1: $builder->orderBy("Categoria_Id"); break;
                case 2: $builder->orderBy("Categoria_Nombre"); break;
                case 3: $builder->orderBy("created_at", "ASC"); break;
                case 4: $builder->orderBy("created_at", "DESC"); break;
            }
        }
        
        $query = $builder->get();
        return $query->getResult();
    }

}