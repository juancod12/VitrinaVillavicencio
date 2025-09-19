<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cascarón Dinámico de Carrito y Productos</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fuente de letra -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <!-- Hoja de estilos propia -->
    <link href="assets/css/publicacionescss.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <div class="row align-items-center mb-4">
        <div class="col-auto">
            <img src="assets/img/publicaciones.png" class="img-thumbnail" alt="Portada" style="width:100px;">
        </div>
        <div class="col">
            <h2 class="mb-4 publicaciones-title">Publicaciones</h2>
        </div>
    </div>

    <div id="cartContainer"></div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    /* =====================================
        CASCARÓN DINÁMICO: Objeto JSON del carrito
       ===================================== */
    const carts = [
        {
            title: "Car trito Frutas Tropicales",
            image: "assets/img/emprendimiento1.jpg", // Imagen del carrito
            description: "Carrito con variedad de frutas frescas",
            phone: "3111234567",
            products: [
                {
                    title: "Mango",
                    image: "assets/img/mango.jpg",
                    description: "Mango dulce y fresco"
                },
                {
                    title: "Piña",
                    image: "assets/img/pina.jpg",
                    description: "Piña jugosa y madura"
                },
                {
                    title: "Banana",
                    image: "assets/img/banana.jpg",
                    description: "Banana orgánica"
                }
            ]
        }
    ];

    // Contenedor principal
    const cartContainer = document.getElementById('cartContainer');

    /**
     * Función para crear la card del carrito y sus productos
     * @param {Object} cart - Objeto con info del carrito y productos
     */
    function createCartCard(cart){
        const cartCard = document.createElement('div');
        cartCard.classList.add('card', 'mb-4');

        // Card del carrito
        cartCard.innerHTML = `
            <div class="row g-0">
                <!-- Imagen del carrito -->
                <div class="col-md-4">
                    <img src="${cart.image}" class="img-fluid rounded-start" alt="${cart.title}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${cart.title}</h5>
                        <p class="card-text">${cart.description}</p>
                        <p class="card-text"><small class="text-muted">Teléfono: ${cart.phone}</small></p>
                        <h6>Productos:</h6>
                        <!-- Contenedor de productos -->
                        <div class="row" id="products-${cart.title.replace(/\s/g,'')}"></div>
                    </div>
                </div>
            </div>
        `;

        cartContainer.appendChild(cartCard);

        // Insertar productos
        const productsContainer = cartCard.querySelector(`#products-${cart.title.replace(/\s/g,'')}`);
        cart.products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.classList.add('col-md-4', 'mb-3');

            productCard.innerHTML = `
                <div class="card h-100">
                    <img src="${product.image}" class="card-img-top" alt="${product.title}">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">${product.title}</h6>
                        <p class="card-text flex-grow-1">${product.description}</p>
                        <button class="btn btn-primary mt-auto">Pedir / Comprar</button>
                    </div>
                </div>
            `;
            productsContainer.appendChild(productCard);
        });
    }

    // Generar la card del carrito
    carts.forEach(cart => createCartCard(cart));
</script>
</body>
</html>
