<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Emprendedores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4">Emprendedores</h1>
    <a href="index.php" class="btn btn-secondary mb-3">⬅ Volver al inicio</a>

    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Listado de Emprendedores</h5>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Proyecto</th>
              <th>Correo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tabla-emprendedores"></tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    fetch("api/emprendedores/listar.php")
      .then(res => res.json())
      .then(data => {
        let tbody = document.getElementById("tabla-emprendedores");
        data.forEach(e => {
          tbody.innerHTML += `
            <tr>
              <td>${e.id}</td>
              <td>${e.nombre}</td>
              <td>${e.proyecto}</td>
              <td>${e.correo}</td>
              <td>
                <button class="btn btn-sm btn-warning">Editar</button>
                <button class="btn btn-sm btn-danger">Eliminar</button>
              </td>
            </tr>`;
        });
      });
  </script>
</body>
</html>
