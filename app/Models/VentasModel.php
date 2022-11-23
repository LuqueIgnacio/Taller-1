<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    //Configuracion de CI
    protected $table      = 'ventas';
    protected $primaryKey = 'Venta_Id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ["Venta_Monto", "Venta_UserId", "Venta_Nombre", "Venta_Apellido", "Venta_Telefono", "Venta_DNI", "Venta_Email", "Venta_Direccion", "created_at"];
    protected $useTimestamps = true;
    protected $dateFormat = "datetime";
    protected $createdField  = 'created_at';
    protected $updatedField  = null;
    protected $deletedField  = null;
    protected $validationRules    = null;
    protected $validationMessages = null;
    protected $skipValidation     = true;

    public function guardarVenta($venta){
        $db      = \Config\Database::connect();
        $builderProductos = $db->table('productos');

        $productos = json_decode( $venta["productos"], true);
        $productosIds = [];
        //Recorremos el array para guardar las ids de los productos en un array
        foreach($productos as $producto){
            $productosIds[] = $producto["id"];
        }
        $builderProductos->select("Producto_Id, Producto_Costo, Producto_Precio, Producto_Stock");
        $builderProductos->whereIn("Producto_Id", $productosIds);
        $productosDB = $builderProductos->get()->getResult();

        //Verificamos que la compra no supere el stock actual
        for($i=0; $i<sizeof($productosDB); $i++){  
            //var_dump($productos[$i]["cantidad"] > $productosDB[$i]->Producto_Stock );
            //var_dump($productosDB[$i] );
            //var_dump($productosDB[$i]->Producto_Costo );
            if($productos[$i]["cantidad"] > $productosDB[$i]->Producto_Stock ){
                return false;
            }
        }

        //Si tenemos suficiente stock creamos la cabecera de la venta
        $data["VD_FacturaId"] = $this->insert($venta);

        //Conectamos con la tabla de ventas
        $builderVentas = $db->table('ventas_detalle');
        //Recorremos el array de productos para guardar el detalle de la venta
        //y actualizamos el stock de los productos
        for($i=0; $i<sizeof($productosDB); $i++){
            $data["VD_ProdId"] = $productosDB[$i]->Producto_Id;
            $data["VD_Precio"] = $productosDB[$i]->Producto_Precio;
            $data["VD_Costo"] = $productosDB[$i]->Producto_Costo;
            $data["VD_Cantidad"] = $productos[$i]["cantidad"];
            $builderProductos->where("Producto_Id", $productosDB[$i]->Producto_Id)->update( ["Producto_Stock" => ($productosDB[$i]->Producto_Stock - $productos[$i]["cantidad"]) ]);
            $builderVentas->insert($data); 
        }
 
        return true;
    }

    public function getVentaDetalles($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('ventas_detalle');

        $builder->where("VD_FacturaId", $id);
        $query = $builder->get();

        return $query->getResult();
    }

}