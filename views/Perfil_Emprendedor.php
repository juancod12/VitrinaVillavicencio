@ -0,0 +1,245 @@
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Emprendedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
  body {
    background: linear-gradient(
        rgba(0, 0, 0, 0.6),   /* capa oscura */
        rgba(0, 0, 0, 0.6)
      ),
      url('assets/img/caballos.jpg'); /* tu imagen */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: #fff; /* texto claro para que contraste */
  }
    .card {
      border-radius: 12px;
      transition: transform 0.2s ease-in-out, box-shadow 0.2s;
    }
    .card:hover {
      transform: scale(1.02);
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
    }
    .btn-custom {
      transition: all 0.3s ease-in-out;
    }
    .btn-custom:hover {
      transform: scale(1.05);
      box-shadow: 0px 6px 15px rgba(13,110,253,0.5);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4 text-center">👤 Perfil del Emprendedor</h1>
    <a href="index.php" class="btn btn-secondary mb-3">⬅ Volver al inicio</a>

    <div class="row">
      <!-- Columna izquierda -->
      <div class="col-md-4">
        <div class="card shadow mb-4 text-center p-4">
          <img id="foto-emprendedor" src="img/default.png" class="rounded-circle mb-3 shadow" width="150" height="150" alt="Foto">
          <h4 id="nombre-emprendedor">Nombre del Emprendedor</h4>
        </div>
      </div>

      <!-- Columna derecha -->
      <div class="col-md-8">
        <div class="card shadow p-4">
          <h5 class="card-title mb-3">📌 Información del Perfil</h5>
          <p><strong>Email:</strong> <span id="email-emprendedor"></span></p>
          <p><strong>Descripción:</strong> <span id="descripcion-emprendedor"></span></p>
          <p><strong>Redes Sociales:</strong> <span id="redes-emprendedor"></span></p>
          <p><strong>Ubicación:</strong> <span id="ubicacion-emprendedor"></span></p>
        </div>
      </div>
    </div>

    <!-- Sección de publicaciones -->
    <div class="card shadow mt-5 p-4">
      <h4 class="mb-3">📰 Nueva Publicación</h4>
      <form id="form-publicacion">
        <div class="mb-3">
          <label for="nombre-publicacion" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre-publicacion" required>
        </div>
        <div class="mb-3">
          <label for="descripcion-publicacion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion-publicacion" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label for="banner-publicacion" class="form-label">Banner principal</label>
          <input type="file" class="form-control" id="banner-publicacion">
        </div>
        <button type="submit" class="btn btn-primary btn-custom">Publicar</button>
      </form>
    </div>

    <!-- Productos dentro de la publicación -->
    <div class="card shadow mt-4 p-4">
      <h4 class="mb-3">🛍️ Productos de la Publicación</h4>
      <div class="text-center mb-3">
        <button class="btn btn-success btn-custom" id="btnAgregar">➕ Agregar Producto</button>
      </div>

      <!-- Formulario de productos -->
      <div id="formProducto" class="card shadow-lg p-4 mb-4" style="display: none; animation: fadeIn 0.5s;">
        <h5 class="mb-3">Nuevo Producto</h5>
        <form id="productoForm">
          <div class="mb-3">
            <label class="form-label">Título del producto</label>
            <input type="text" class="form-control" name="titulo" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select class="form-select" name="categoria" required>
              <option value="">Seleccione...</option>
              <option value="Ropa">Ropa</option>
              <option value="Comida">Comida</option>
              <option value="Tecnología">Tecnología</option>
              <option value="Otros">Otros</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen" accept="image/*">
          </div>
          <input type="hidden" name="fecha" id="fechaPublicacion">
          <div class="text-end">
            <button type="submit" class="btn btn-success btn-custom">✅ Confirmar Producto</button>
          </div>
        </form>
      </div>

      <!-- Lista de productos -->
      <div id="listaProductos" class="row g-3">
        <!-- Aquí se mostrarán los productos -->
      </div>
    </div>
  </div>

  <script>
    
    // ================= PERFIL (ejemplo de carga simulada) =================
    fetch("api/emprendedor/perfil.php")
      .then(res => res.json())
      .then(data => {
        document.getElementById("nombre-emprendedor").innerText = data.nombre;
        document.getElementById("email-emprendedor").innerText = data.email;
        document.getElementById("descripcion-emprendedor").innerText = data.descripcion;
        document.getElementById("redes-emprendedor").innerText = data.redes;
        document.getElementById("ubicacion-emprendedor").innerText = data.ubicacion;
        if(data.foto){
          document.getElementById("foto-emprendedor").src = data.foto;
        }
      });

    // ================= PUBLICACIÓN (a futuro se guarda en BD) =================
    document.getElementById("form-publicacion").addEventListener("submit", (e) => {
      e.preventDefault();
      alert("✅ Publicación creada con éxito (fecha: " + new Date().toLocaleString() + ")");
    });

    // ================= PRODUCTOS =================
    const btnAgregar = document.getElementById("btnAgregar");
    const formProducto = document.getElementById("formProducto");
    const productoForm = document.getElementById("productoForm");
    const listaProductos = document.getElementById("listaProductos");
    const fechaInput = document.getElementById("fechaPublicacion");

    btnAgregar.addEventListener("click", () => {
      formProducto.style.display = formProducto.style.display === "none" ? "block" : "none";
      fechaInput.value = new Date().toLocaleString();
    });

    productoForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const datos = new FormData(productoForm);

      const card = document.createElement("div");
      card.className = "col-md-4";
      card.innerHTML = `
        <div class="card shadow-lg h-100">
          <img src="${datos.get("imagen") ? URL.createObjectURL(datos.get("imagen")) : "https://via.placeholder.com/400x200"}" 
               class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">${datos.get("titulo")}</h5>
            <p class="card-text">${datos.get("descripcion")}</p>
            <p><strong>Categoría:</strong> ${datos.get("categoria")}</p>
            <p><strong>Precio:</strong> $${datos.get("precio")}</p>
            <p class="text-muted"><small>📅 ${datos.get("fecha")}</small></p>
          </div>
        </div>
      `;

      listaProductos.appendChild(card);

      productoForm.reset();
      formProducto.style.display = "none";
    });
  </script>
  <!-- Listado de publicaciones -->
<div class="card shadow mb-4 animate__animated animate__fadeInUp">
  <div class="card-body">
    <h5 class="card-title">Mis Publicaciones</h5>
    <table class="table table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Descripción</th>
          <th>Banner</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="tabla-publicaciones"></tbody>
    </table>
  </div>
</div>

<script>
  // Cargar publicaciones
  fetch("api/publicaciones/listar.php")
    .then(res => res.json())
    .then(data => {
      let tbody = document.getElementById("tabla-publicaciones");
      tbody.innerHTML = ""; // limpiar antes de cargar
      data.forEach(pub => {
        tbody.innerHTML += `
          <tr>
            <td>${pub.id}</td>
            <td>${pub.nombre}</td>
            <td>${pub.descripcion}</td>
            <td><img src="${pub.banner}" width="80" class="rounded shadow"></td>
            <td>${pub.fecha}</td>
            <td>
              <button class="btn btn-sm btn-info">Ver</button>
              <button class="btn btn-sm btn-danger">Eliminar</button>
            </td>
          </tr>
        `;
      });
    });
</script>

</body>
</html>