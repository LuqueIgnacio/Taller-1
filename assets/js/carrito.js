document.addEventListener("DOMContentLoaded", iniciarCarrito);

function iniciarCarrito(){

    cargarCarrito();

    const btnCarrito = document.querySelector(".carrito");
    btnCarrito.addEventListener("click", e => {
        const carrito = document.querySelector(".carrito-div");
        carrito.classList.toggle("oculto");
    })
    //Se le agrega funcionalidad a los botones para modificar la cantidad de un producto
    const divCarritoProductos = document.querySelector(".carrito-productos");
    divCarritoProductos.addEventListener("click", e =>{
        if(e.target.classList.contains("btn-carrito")){
            const productoDiv = document.getElementById(e.target.dataset.productoid);
            const cantidad = productoDiv.querySelector(".producto-carrito-cantidad");
            const cantidadTotal = document.getElementById("cantidad");
            const precioTotal = document.getElementById("total");
            const precioUnidad = productoDiv.querySelector(".producto-carrito-precio");
            if(e.target.classList.contains("add")){
                actualizarArrayProductos(e.target.dataset.productoid, 1);
                cantidad.textContent = parseInt(cantidad.textContent) + 1;
                cantidadTotal.textContent = parseInt(cantidadTotal.textContent) + 1;
                precioTotal.textContent = parseInt(precioTotal.textContent) + parseInt(precioUnidad.textContent);
            }else if(e.target.classList.contains("min")){
                if(cantidad.textContent != 1){
                    actualizarArrayProductos(e.target.dataset.productoid, -1);
                    cantidad.textContent = parseInt(cantidad.textContent) - 1;
                    cantidadTotal.textContent = parseInt(cantidadTotal.textContent) - 1;
                    precioTotal.textContent = parseInt(precioTotal.textContent) - parseInt(precioUnidad.textContent);
                }
            }else{
                //Se apretó el boton para eliminar un producto del carrito
                eliminarProducto(e.target.dataset.productoid);
                cantidadTotal.textContent = parseInt(cantidadTotal.textContent) -  parseInt(cantidad.textContent);
                precioTotal.textContent = parseInt(precioTotal.textContent) - parseInt(precioUnidad.textContent) * parseInt(cantidad.textContent);
                document.getElementById(e.target.dataset.productoid).remove();
                if(divCarritoProductos.children.length === 2){
                    carritoVacio();
                }
            }
                 
        }
    
    });
}

const urlActual = window.location.pathname;
//Verificamos en qué página estamos para así llamar a unas funciones u otras
switch(urlActual){
    case "/LuqueIgnacio/": cargarProductos(); break;
    case "/LuqueIgnacio/productos": cargarProductos(); break;
} 

function cargarProductos(){

    const contenedorProductos = document.getElementById("productos");
    contenedorProductos.addEventListener("click", e =>{
        if(e.target.classList.contains("btn-producto")){

            const producto = {
                "id" : e.target.dataset.productoid,
                "nombre" : e.target.parentElement.children[0].textContent,
                "precio" : e.target.parentElement.children[1].textContent.substr(1),
                "img" : e.target.parentElement.parentElement.children[0].src,
                "cantidad" : 1
            };
            //console.log(producto);
            agregarProducto(producto);
        }
    });

}

function agregarProducto(producto){

    let productos = localStorage.getItem("productos");
    //Si no hay productos en el carrito
    if(!productos){
        localStorage.setItem("productos", JSON.stringify([producto]));
        const carritoDiv = document.querySelector(".carrito-productos");
        carritoDiv.innerHTML=
        `<div class="carrito-detalles">
            <p>Productos: <span id="cantidad" class="bold"></span></p>
            <p>Total: $<span id="total" class="bold"></span></p>   
        </div>                                                                      
        <a href="comprar" class="btn btn-rojo finalizar-compra">Finalizar Compra</a>`;
        agregarProductoAlCarrito(producto, true);
    }else{
        //En caso de que ya existan productos en el carrito
        productos = JSON.parse(productos);
        //Observamos si el producto ya se encuentra en el carrito
        let esProductoRepetido = false;
        let indiceProducto;
        for(let i=0; i<productos.length; i++){
            //Si ya se encuentra en el carrito solo aumentamos la cantidad del producto
            if(productos[i].id === producto.id){
                productos[i].cantidad++;
                localStorage.setItem("productos", JSON.stringify(productos) );
                esProductoRepetido = true;
                indiceProducto = i;
                break;
            }
        }
        if(esProductoRepetido){
            actualizarCarrito(indiceProducto, producto);
        }else{
            //En caso de que no se encuentre en el carrito, lo agregamos
            productos.push(producto );
            localStorage.setItem("productos", JSON.stringify(productos) )
            console.log(productos)
            agregarProductoAlCarrito(producto);
        }
        
    }
    
}

function agregarProductoAlCarrito(producto, esPrimerProducto = false){
    const carritoDiv = document.querySelector(".carrito-productos");
    const total = document.getElementById("total");
    const cantidad = document.getElementById("cantidad");
    if(esPrimerProducto){
        total.textContent = producto.precio;
        cantidad.textContent = 1;
    }else{
        total.textContent = parseInt(total.textContent) + parseInt(producto.precio);
        cantidad.textContent = parseInt(cantidad.textContent)+1;
    }
    
    const productoCarrito =
    `<div id="${producto.id}" class="producto-carrito">
        <div class="producto-carrito-datos">
            <div class="producto-carrito-img">
                <img src="${producto.img}" alt="">
            </div>
            <p>${producto.nombre}</p>
            <svg class="btn-carrito producto-carrito-basura" data-productoid="${producto.id}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M160 400C160 408.8 152.8 416 144 416C135.2 416 128 408.8 128 400V192C128 183.2 135.2 176 144 176C152.8 176 160 183.2 160 192V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V192C208 183.2 215.2 176 224 176C232.8 176 240 183.2 240 192V400zM320 400C320 408.8 312.8 416 304 416C295.2 416 288 408.8 288 400V192C288 183.2 295.2 176 304 176C312.8 176 320 183.2 320 192V400zM317.5 24.94L354.2 80H424C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94H317.5zM151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1C174.5 48 171.1 49.34 170.5 51.56L151.5 80zM80 432C80 449.7 94.33 464 112 464H336C353.7 464 368 449.7 368 432V128H80V432z"/></svg>   
        </div>
        <div class="producto-carrito-opciones">
            <p class="bold" >$<span class="producto-carrito-precio bold" >${producto.precio}</span></p>
            
            <svg class="btn-carrito producto-carrito-add min" data-productoid="${producto.id}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="producto-carrito-cantidad">1</p>
            <svg class="btn-carrito producto-carrito-add add" data-productoid="${producto.id}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

        </div>
    </div>`;

    carritoDiv.innerHTML+= productoCarrito;
}

function actualizarCarrito(indiceProducto, producto){
    const carritoDiv = document.querySelector(".carrito-productos");
    const total = document.getElementById("total");
    const cantidad = document.getElementById("cantidad");
    const productoDiv = carritoDiv.children[indiceProducto];
    let productoCantidad = productoDiv.querySelector(".producto-carrito-cantidad").textContent;
    productoDiv.querySelector(".producto-carrito-cantidad").textContent = parseInt(productoCantidad)+1;
    total.textContent = parseInt(total.textContent) + parseInt(producto.precio);
    cantidad.textContent = parseInt(cantidad.textContent)+1;
    
}

function actualizarArrayProductos(productoId, cantidad){
    let productos = localStorage.getItem("productos");
    productos = JSON.parse(productos);
    
    for(let i=0; i<productos.length; i++){
        if(productos[i].id == productoId){
            productos[i].cantidad+=cantidad;
            break;
        }
    }
    localStorage.setItem("productos", JSON.stringify(productos));
}

function eliminarProducto(productoId){
    let productos = localStorage.getItem("productos");
    productos = JSON.parse(productos);
    for(let i=0; i<productos.length; i++){
        if(productos[i].id == productoId){
            productos.splice(i, 1);
            break;
        }
    }
    localStorage.setItem("productos", JSON.stringify(productos));
    
}

function cargarCarrito(){

    let productos = localStorage.getItem("productos");
    const carritoDiv = document.querySelector(".carrito-productos");
    let cantidad = 0, precioTotal = 0;
    if(productos){
        productos = JSON.parse(productos);
        carritoDiv.innerHTML=
        `<div class="carrito-detalles">
            <p>Productos: <span id="cantidad" class="bold"></span></p> 
            <p>Total: $<span id="total" class="bold"></span></p>   
        </div>                                                                      
        <a href="http://localhost/LuqueIgnacio/comprar" class="btn btn-rojo finalizar-compra">Finalizar Compra</a>`;
        for(let i=0; i<productos.length; i++){
            precioTotal+=productos[i].precio * productos[i].cantidad;
            cantidad+=productos[i].cantidad;
            carritoDiv.innerHTML+=
            `<div id="${productos[i].id}" class="producto-carrito">
                <div class="producto-carrito-datos">
                    <div class="producto-carrito-img">
                        <img src="${productos[i].img}" alt="">
                    </div>
                    <p>${productos[i].nombre}</p>
                    <svg class="btn-carrito producto-carrito-basura" data-productoid="${productos[i].id}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M160 400C160 408.8 152.8 416 144 416C135.2 416 128 408.8 128 400V192C128 183.2 135.2 176 144 176C152.8 176 160 183.2 160 192V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V192C208 183.2 215.2 176 224 176C232.8 176 240 183.2 240 192V400zM320 400C320 408.8 312.8 416 304 416C295.2 416 288 408.8 288 400V192C288 183.2 295.2 176 304 176C312.8 176 320 183.2 320 192V400zM317.5 24.94L354.2 80H424C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94H317.5zM151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1C174.5 48 171.1 49.34 170.5 51.56L151.5 80zM80 432C80 449.7 94.33 464 112 464H336C353.7 464 368 449.7 368 432V128H80V432z"/></svg>   
                </div>
                <div class="producto-carrito-opciones">
                    <p class="bold" >$<span class="producto-carrito-precio bold" >${productos[i].precio}</span></p>
                    
                    <svg class="btn-carrito producto-carrito-add min" data-productoid="${productos[i].id}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path class="min" stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="producto-carrito-cantidad">${productos[i].cantidad}</p>
                    <svg class="btn-carrito producto-carrito-add add" data-productoid="${productos[i].id}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </div>
            </div>`;
        }
        document.getElementById("total").textContent = precioTotal;
        document.getElementById("cantidad").textContent = cantidad;
    }else{
        carritoVacio();
    }

}

function carritoVacio(){
    localStorage.removeItem("productos");
    const carritoDiv = document.querySelector(".carrito-productos");
    carritoDiv.innerHTML = 
    `<p>El carrito aún está vacío</p>
     <p>¡Empieza a llenarlo!</p>`;
}