<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultasModel extends Model
{
    //Configuracion de CI
    protected $table      = 'consultas';
    protected $primaryKey = 'Consulta_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['Consulta_Mensaje', "Consulta_Email", "deleted_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = "deleted_at";
    protected $validationRules    = [
        'Consulta_Mensaje'     => 'required',
        "Consulta_Email" => "required|valid_email" 
    ];
    protected $validationMessages = [
        "Consulta_Mensaje" => [
            "required" => "Se requiere un mensaje",
        ],
        "Consulta_Email" => [
            "required" => "Se requiere un email",
            "valid_email" => "Se requiere un email valido"
        ]
    ];
    protected $skipValidation     = false;

}