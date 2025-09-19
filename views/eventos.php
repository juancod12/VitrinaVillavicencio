<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Eventos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h1 class="mb-4">Eventos</h1>
    <a href="index.php" class="btn btn-secondary mb-3">⬅ Volver al inicio</a>

    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Listado de Eventos</h5>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Lugar</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tabla-eventos"></tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    fetch("api/eventos/listar.php")
      .then(res => res.json())
      .then(data => {
        let tbody = document.getElementById("tabla-eventos");
        data.forEach(ev => {
          tbody.innerHTML += `
            <tr>
              <td>${ev.id}</td>
              <td>${ev.nombre}</td>
              <td>${ev.fecha}</td>
              <td>${ev.lugar}</td>
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
