/* The code block is adding an event listener to the "DOMContentLoaded" event, which is fired when the
initial HTML document has been completely loaded and parsed. Inside the event listener function, it
selects all elements with the class "carousel__lista" using the querySelectorAll method and stores
them in the "carousels" variable. */

document.addEventListener('DOMContentLoaded', function() {
    var carousels = document.querySelectorAll('.carousel__lista');

    carousels.forEach(function(carousel) {
        var id = carousel.parentElement.parentElement.getAttribute('data-id');
        var glider= new Glider(carousel, {
            slidesToShow: 1,
            slidesToScroll: 1,

            dots: '.carousel[data-id="' + id + '"] .carousel__indicadores',
            arrows: {
                prev: '.carousel[data-id="' + id + '"] .carousel__anterior',
                next: '.carousel[data-id="' + id + '"] .carousel__siguiente'
            },
            responsive: [
                {
                    // screens greater than >= 450px
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },{
                    // screens greater than >= 800px
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                }
            ]
        });
        glider.refresh(true);
    });
});

/**Para mostrar los datos en el carro de compras */
/* The code block is adding an event listener to each element with the class "add-compra". When one of
these elements is clicked, the function inside the event listener is executed. */
/*
window.onload = function() {
    localStorage.clear();
    var botonesCompra = document.querySelectorAll('.add-compra');
    var botonCarrito = document.getElementById('btn-carro');

    botonesCompra.forEach(function(boton) {
        boton.addEventListener('click', function() {
            var contador = document.getElementById('contador');
            contador.textContent = parseInt(contador.textContent) + 1;
            contador.style.background = 'red';
            contador.style.color = 'white';
            contador.style.padding = '5px';
            contador.style.borderRadius = '50%';
            contador.style.width = 'auto';
            contador.style.height = 'auto';
            var producto = JSON.parse(this.dataset.producto);
            var carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.push(producto);
            localStorage.setItem('carrito', JSON.stringify(carrito));
        });
    });

    botonCarrito.addEventListener('click', function() {
        mostrarCarrito();
        var modal = new bootstrap.Modal(document.getElementById('carritoModal'));
        modal.show();
    });
}

function mostrarCarrito() {
    var carrito = JSON.parse(localStorage.getItem('carrito'));
    var contenedorCarrito = document.getElementById('contenedor-carrito');
    var contador = document.getElementById('contador');

    contenedorCarrito.innerHTML = '';
    carrito.forEach(function(producto, index) {
        var elementoProducto = document.createElement('div');
        if (producto.image) {
            var imagenProducto = document.createElement('img');
            imagenProducto.src = producto.image;
            imagenProducto.width = 60;
            imagenProducto.height = 60;
            elementoProducto.appendChild(imagenProducto);
        }
        var nombreProducto = document.createElement('p');
        nombreProducto.textContent = producto.name;
        elementoProducto.appendChild(nombreProducto);

        var precioProducto = document.createElement('p');
        precioProducto.textContent = producto.price;
        elementoProducto.appendChild(precioProducto);

        var stockProducto = document.createElement('p');
        stockProducto.textContent = producto.stock;
        elementoProducto.appendChild(stockProducto);

        var btnPagar = document.createElement('button');
        btnPagar.textContent = 'Pagar';
        btnPagar.className = 'btn btn-success btn-pago';
        btnPagar.style.marginBottom = '10px';

        btnPagar.addEventListener('click', function() {
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            var cont = contador.textContent = parseInt(contador.textContent) - 1;
            //si el contador es cero aplicar estilos
            if (cont == 0) {
                contador.style.color = 'black';
                contador.style.background = 'transparent';
            }
            mostrarCarrito(); // Actualizar el modal después de eliminar el producto

        });

        elementoProducto.appendChild(btnPagar);
        contenedorCarrito.appendChild(elementoProducto);
    });
}
*/
