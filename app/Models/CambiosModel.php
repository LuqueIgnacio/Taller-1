<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isEmpty;

class CambiosModel extends Model
{
    //Configuracion de CI
    protected $table      = 'cambios';
    protected $primaryKey = 'Cambio_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['Cambio_EntidadId', "Cambio_ObjetoId", "Cambio_Tipo", "Cambio_UserId", "Cambio_Descripcion", "created_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = 'created_at';
    protected $updatedField  = null;
    protected $deletedField  = null;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function registrarCambioProducto($productoAnt, $productoAct = null){
        
        $mensaje = "";
        $entidadId = 1;
        $objetoId = null;
        $userId = 1;
        //Se actualiza el producto
        if($productoAct != null){
            $cambioTipo = 1; //0 Crear 1 Actualizar 2 Borrar
            $objetoId = $productoAnt->Producto_Id;
            if(strcmp($productoAnt->Producto_Nombre, $productoAct->Producto_Nombre)){
                $mensaje.= "Nombre anterior: $productoAnt->Producto_Nombre | Nombre actual: $productoAct->Producto_Nombre\n";
            }
            if(strcmp($productoAnt->Producto_Cod, $productoAct->Producto_Cod) ){
                $mensaje.= "Cod anterior: $productoAnt->Producto_Cod | Cod actual: $productoAct->Producto_Cod\n";
            }
            if(strcmp($productoAnt->Producto_Marca, $productoAct->Producto_Marca) ){
                $mensaje.= "Marca anterior: $productoAnt->Producto_Marca | Marca actual: $productoAct->Producto_Marca\n";
            }
            if(strcmp($productoAnt->Producto_Categoria, $productoAct->Producto_Categoria) ){
                $mensaje.= "Categoria anterior: $productoAnt->Producto_Categoria | Categoria actual: $productoAct->Producto_Categoria\n";
            }
            if(strcmp($productoAnt->Producto_Precio, $productoAct->Producto_Precio) ){
                $mensaje.= "Precio anterior: $productoAnt->Producto_Precio | Precio actual: $productoAct->Producto_Precio\n";
            }
            if(strcmp($productoAnt->Producto_Costo, $productoAct->Producto_Costo) ){
                $mensaje.= "Costo anterior: $productoAnt->Producto_Costo | Costo actual: $productoAct->Producto_Costo\n";
            }
            if(strcmp($productoAnt->Producto_Stock, $productoAct->Producto_Stock) ){
                $mensaje.= "Stock anterior: $productoAnt->Producto_Stock | Stock actual: $productoAct->Producto_Stock\n";
            }
            if(strcmp($productoAnt->Producto_Listado, $productoAct->Producto_Listado) ){
                $mensaje.= "Listado anterior: $productoAnt->Producto_Listado | Listado actual: $productoAct->Producto_Listado\n";
            }
            
        }else{
            $cambioTipo = 0; //0 Crear 1 Actualizar 2 Borrar
            $objetoId = $productoAnt->Producto_Id;
            $mensaje.= "Nombre: $productoAnt->Producto_Nombre\n
            Código: $productoAnt->Producto_Cod\n
            Marca: $productoAnt->Producto_Marca\n
            Categoria: $productoAnt->Producto_Categoria\n
            Precio: $productoAnt->Producto_Precio\n
            Costo: $productoAnt->Producto_Costo\n
            Stock: $productoAnt->Producto_Stock\n
            Listado: $productoAnt->Producto_Listado";

        }

        if($mensaje != ""){
            $this->insert(["Cambio_EntidadId" => $entidadId, "Cambio_ObjetoId" => $objetoId, "Cambio_Tipo" => $cambioTipo, "Cambio_UserId" => $userId, "Cambio_Descripcion" => $mensaje] );
        }
        
    }

    public function registrarCambioMarca($marcaAnt, $marcaAct = null){

        $mensaje = "";
        $entidadId = 2; //1 Producto 2 Marca 3 Categoria
        $userId = 1;
        //Se actualiza la marca
        if($marcaAct != null){
            $cambioTipo = 1;
            $objetoId = $marcaAnt->Marca_Id;
            $mensaje.= "Nombre anterior: $marcaAnt->Marca_Nombre Nombre actual: $marcaAct->Marca_Nombre";
        }else{
            $cambioTipo = 0;
            $objetoId = $marcaAnt->Marca_Id;
            $mensaje.= "Nombre de la marca: $marcaAnt->Marca_Nombre";
            
        }

        $this->insert(["Cambio_EntidadId" => $entidadId, "Cambio_ObjetoId" => $objetoId, "Cambio_Tipo" => $cambioTipo, "Cambio_UserId" => $userId, "Cambio_Descripcion" => $mensaje] );

    }

    public function registrarCambioCategoria($categoriaAnt, $categoriaAct = null){

        $mensaje = "";
        $entidadId = 3; //1 Producto 2 Marca 3 Categoria
        $userId = 1;
        //Se actualiza la marca
        if($categoriaAct != null){
            $cambioTipo = 1;
            $objetoId = $categoriaAnt->Categoria_Id;
            $mensaje.= "Nombre anterior: $categoriaAnt->Categoria_Nombre Nombre actual: $categoriaAct->Categoria_Nombre";
        }else{
            $cambioTipo = 0;
            $objetoId = $categoriaAnt->Categoria_Id;
            $mensaje.= "Nombre de la categoría: $categoriaAnt->Categoria_Nombre";
        }

        $this->insert(["Cambio_EntidadId" => $entidadId, "Cambio_ObjetoId" => $objetoId, "Cambio_Tipo" => $cambioTipo, "Cambio_UserId" => $userId, "Cambio_Descripcion" => $mensaje] );

    }

    public function registrarCambioUsuario($usuarioAnt, $usuarioAct){

        $mensaje = "";
        $entidadId = 4; //1 Producto 2 Marca 3 Categoria 4 Usuario
        $objetoId = $usuarioAnt->User_Id;
        $userId = 1;
        
        if(strcmp($usuarioAnt->User_Nombre, $usuarioAct->User_Nombre)){
            $mensaje.= "Nombre anterior: $usuarioAnt->User_Nombre | Nombre actual: $usuarioAct->User_Nombre";
        }
        if(strcmp($usuarioAnt->User_Apellido, $usuarioAct->User_Apellido)){
            $mensaje.= "Apellido anterior: $usuarioAnt->User_Apellido | Apellido actual: $usuarioAct->User_Apellido";
        }
        if(strcmp($usuarioAnt->User_DNI, $usuarioAct->User_DNI)){
            $mensaje.= "DNI anterior: $usuarioAnt->User_DNI | DNI actual: $usuarioAct->User_DNI";
        }
        if(strcmp($usuarioAnt->User_Telefono, $usuarioAct->User_Telefono)){
            $mensaje.= "Teléfono anterior: $usuarioAnt->User_Telefono | Teléfono actual: $usuarioAct->User_Telefono";
        }
        if(strcmp($usuarioAnt->User_Email, $usuarioAct->User_Email)){
            $mensaje.= "Email anterior: $usuarioAnt->User_Email | Email actual: $usuarioAct->User_Email";
        }
        if(strcmp($usuarioAnt->User_Nivel, $usuarioAct->User_Nivel)){
            $mensaje.= "Nivel anterior: $usuarioAnt->User_Nivel | Nivel actual: $usuarioAct->User_Nivel";
        }

        $this->insert(["Cambio_EntidadId" => $entidadId, "Cambio_ObjetoId" => $objetoId, "Cambio_Tipo" => 1, "Cambio_UserId" => $userId, "Cambio_Descripcion" => $mensaje] );

    }
}