<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    //Configuracion de CI
    protected $table      = 'productos';
    protected $primaryKey = 'Producto_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'App\Entities\Producto';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['Producto_Cod', 'Producto_Nombre', "Producto_Img", "Producto_Precio", "Producto_Costo", "Producto_Categoria", "Producto_Marca",
                                "Producto_Stock", "Producto_Listado", "created_at", "updated_at", "deleted_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = 'created_at';
    protected $updatedField  = "updated_at";
    protected $deletedField  = "deleted_at";

    protected $validationRules    = [
        'Producto_Nombre'     => 'required|alpha_numeric_space|min_length[3]',
        'Producto_Cod'     => 'required|alpha_numeric_space|min_length[3]',
        'Producto_Precio'     => 'required|decimal',
        'Producto_Costo'     => 'required|decimal',
        'Producto_Categoria'     => 'required|decimal',
        'Producto_Marca'     => 'required|decimal',
        'Producto_Stock'     => 'required|decimal',
        'Producto_Listado'     => 'required|decimal',
    ];
    protected $validationMessages = [
        "Producto_Nombre" => [
            "required" => "Se requiere el campo nombre",
            "min_length" => "El nombre es muy corto"
        ],
        "Producto_Cod" => [
            "required" => "Se requiere el campo Código",
        ],
        "Producto_Precio" => [
            "required" => "Se requiere el campo precio",
            "decimal" => "Solo se aceptan números"
        ],
        "Producto_Costo" => [
            "required" => "Se requiere el campo costo",
            "decimal" => "Solo se aceptan números"
        ],
        "Producto_Categoria" => [
            "required" => "Se requiere el campo categoría",
            "decimal" => "Solo se aceptan números"
        ],
        "Producto_Marca" => [
            "required" => "Se requiere el campo marca",
            "decimal" => "Solo se aceptan números"
        ],
        "Producto_Stock" => [
            "required" => "Se requiere el campo stock",
            "decimal" => "Solo se aceptan números"
        ]
    ];
    protected $skipValidation     = false;

    public function guardarImg($img, $nombreImg){
        $imageEditor = \Config\Services::image(); 
        $img->move("assets/img/productos", $nombreImg );
        $imageEditor->withFile("assets/img/productos/". $nombreImg)
        ->fit(500,500)
        ->save("assets/img/productos/". $nombreImg );

    }

    public function busquedaPersonalizada($params){

        $db      = \Config\Database::connect();
        $builder = $db->table('productos');
        //$query = "";
        if($params["busqueda"] != ""){
            if(isset($params["buscarPor"]) ){
                switch($params["buscarPor"]){
                    case 1: $builder->where("Producto_Id", $params["busqueda"]); break;
                    case 2: $builder->where("Producto_Cod", $params["busqueda"]); break;
                    case 3: $builder->where("Producto_Marca", $params["busqueda"]); break;
                    case 4: $builder->where("Producto_Categoria", $params["busqueda"]); break;
                    case 5: $builder->like("Producto_Nombre", $params["busqueda"]); break;
                }
            }
        }

        if(isset($params["orden"])){
            switch($params["orden"]){
                case 1: $builder->orderBy("Producto_Id"); break;
                case 2: $builder->orderBy("Producto_Nombre"); break;
                case 3: $builder->orderBy("Producto_Precio", "DESC"); break;
                case 4: $builder->orderBy("Producto_Precio", "ASC"); break;
                case 5: $builder->orderBy("Producto_Costo", "DESC"); break;
                case 6: $builder->orderBy("Producto_Costo", "ASC"); break;
                case 7: $builder->orderBy("created_at", "ASC"); break;
                case 8: $builder->orderBy("created_at", "DESC"); break;
            }
        }
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function busquedaPersonalizadaEnTienda($params){
        $db      = \Config\Database::connect();
        $builder = $db->table('productos');

        if(isset($params["nombre"])){
            $builder->like("Producto_Nombre", $params["nombre"]);
        }

        if($params["marca"] != 0){
            $builder->where("Producto_Marca", $params["marca"]);
        }
        if($params["categoria"] != 0){
            $builder->where("Producto_Categoria", $params["categoria"]);
        }

        $builder->where("Producto_Stock >", 0)->where("deleted_at", NULL)->where("Producto_Listado", 0);
        $query = $builder->get();
        return $query->getResult();
    }

}