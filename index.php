<?php
$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Mi App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menú">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link <?= $page=='clientes'?'active':'' ?>" href="index.php?page=clientes">Clientes</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='emprendedores'?'active':'' ?>" href="index.php?page=emprendedores">Emprendedores</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='eventos'?'active':'' ?>" href="index.php?page=eventos">Eventos</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='pedidos'?'active':'' ?>" href="index.php?page=pedidos">Pedidos</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='productos'?'active':'' ?>" href="index.php?page=productos">Productos</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='publicaciones'?'active':'' ?>" href="index.php?page=publicaciones">Publicaciones</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='transacciones'?'active':'' ?>" href="index.php?page=transacciones">Transacciones</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='usuarios'?'active':'' ?>" href="index.php?page=usuarios">Usuarios</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido dinámico -->
  <div class="container py-4">
    <?php
    switch ($page) {
        case 'clientes':
            include 'views/clientes.php';
            break;
        case 'emprendedores':
            include 'views/emprendedores.php';
            break;
        case 'eventos':
            include 'views/eventos.php';
            break;
        case 'pedidos':
            include 'views/pedidos.php';
            break;
        case 'productos':
            include 'views/productos.php';
            break;
        case 'publicaciones':
            include 'views/publicaciones.php';
            break;
        case 'transacciones':
            include 'views/transacciones.php';
            break;
        case 'usuarios':
            include 'views/usuarios.php';
            break;
        default:
            include 'views/home.php';
            break;
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
