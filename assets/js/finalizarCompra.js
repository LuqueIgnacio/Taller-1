let carrito = localStorage.getItem("productos");
if(!carrito){
    window.location.replace("http://localhost/LuqueIgnacio/");
}

document.addEventListener("DOMContentLoaded", () =>{

    const tablaCompras = document.getElementById("tabla-compras");
    let montoTotal = 0;
    productos = JSON.parse(carrito);
    productos.forEach( producto =>{
        montoTotal+=producto.cantidad*producto.precio;
        tablaCompras.innerHTML+= `
            <tr>
                <td>${producto.nombre}</td>
                <td>${producto.precio}</td>
                <td>${producto.cantidad}</td>
                <td>${producto.cantidad*producto.precio}</td>
            </tr>
        `;
    });

    document.querySelector(".compra-total").textContent+= ` $${montoTotal}`;

    const btnFinalizarCompra = document.querySelector(".btn");
    btnFinalizarCompra.addEventListener("click", async e =>{
        e.preventDefault();
        const formulario = document.getElementById("form-comprar");
        let formData;
        if(formulario){
            formData = new FormData(formulario);
        }else{
            formData = new FormData();
        }
        formData.append("productos", carrito);
        formData.append("Venta_Monto", montoTotal);
       
        const request = await fetch("http://localhost/LuqueIgnacio/comprar", {method:"POST", body:formData});
        const resultado = await request.json();

        console.log(resultado.respuesta)
        if(resultado.respuesta == 1){
            localStorage.removeItem("productos");
            window.location.replace("http://localhost/LuqueIgnacio/compraExitosa");
        }else if(resultado.respuesta == 0){
            localStorage.removeItem("productos");
            window.location.replace("http://localhost/LuqueIgnacio/compraFallida");
        }else{
            mostrarAlertas(resultado);
        }
    });

})

function mostrarAlertas(alertas){

    const formulario = document.getElementById("form-comprar");
    
    if(alertas.Venta_Nombre){
        formulario.children[0].innerHTML+=`
            <div class="alerta">${alertas.Venta_Nombre}</div>
        `;
    }
    if(alertas.Venta_Apellido){
        formulario.children[1].innerHTML+= `
            <div class="alerta">${alertas.Venta_Nombre}</div>
        `;
    }
    if(alertas.Venta_DNI){
        formulario.children[2].innerHTML+= `
            <div class="alerta">${alertas.Venta_Nombre}</div>
        `;
    }
    if(alertas.Venta_Email){
        formulario.children[3].innerHTML+= `
            <div class="alerta">${alertas.Venta_Nombre}</div>
        `;
    }
    if(alertas.Venta_Telefono){
        formulario.children[4].innerHTML+= `
            <div class="alerta">${alertas.Venta_Telefono}</div>
        `;
    }
    if(alertas.Venta_Direccion){
        formulario.children[5].innerHTML+= `
            <div class="alerta">${alertas.Venta_Direccion}</div>
        `;
    }

}