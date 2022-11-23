<main class="contenedor-admin">
    <div class="admin-panel-opciones">
        <h2>Opciones de administración</h2>
        
        <div class="admin-opciones">
            <a href="<?php echo base_url("admin/productos") ?>" class="admin-opcion">Productos</a>
            <a href="<?php echo base_url("admin/marcas") ?>" class="admin-opcion">Marcas</a>
            <a href="<?php echo base_url("admin/categorias") ?>" class="admin-opcion">Categorías</a>
            <a href="<?php echo base_url("admin/usuarios") ?>" class="admin-opcion">Usuarios</a>
            <a href="<?php echo base_url("admin/ventas") ?>" class="admin-opcion">Ventas</a>
            <a href="<?php echo base_url("admin/cambios") ?>" class="admin-opcion">Cambios</a>
            <a href="<?php echo base_url("admin/consultas") ?>" class="admin-opcion">Consultas</a>
        </div>
        
    </div>
    <script src="<?=base_url('assets/js/sweetalert.min.js')?>"> </script>
    <script>
        async function confirmar(e, opcion){
            e.preventDefault()
            const mensajes = ["el producto", "la marca", "la categoría", "el usuario", "la consulta"];
            let recuperar;
            if(opcion == 0 || opcion == 3){
                recuperar = "recuperarlo"
            }else{
                recuperar = "recuperarla"
            }
            swal({
            title: "Estás seguro?",
            text: `Una vez que elimines ${mensajes[opcion]} no podras ${recuperar}`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Eliminado con éxito", {
                icon: "success",
                });
                setTimeout( () => window.location.href = e.target.href, 1000)
            } 
            });
        }
    </script>
    <div class="admin-panel"> 