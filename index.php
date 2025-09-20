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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    /* Fondo solo en home */
    body.home {
      background: url('assets/img/llanos.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      width: 100%;
      color: #000;
    }

    /* Navbar azul con animación */
    .navbar {
      background-color: #1465bb !important;
      transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    .navbar a.nav-link.active {
      font-weight: bold;
      color: #ffffff !important;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }
    .navbar a.nav-link:hover {
      transform: scale(1.1);
      transition: transform 0.3s;
    }

    /* Animaciones de secciones */
    .fade-in {
      animation: fadeInUp 1s ease forwards;
      opacity: 0;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Home Section */
    .home-section {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      align-items: center;
      margin-bottom: 3rem;
      padding: 2rem;
      background-color: rgba(255,255,255,0.95);
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      color: #000;
    }
    .home-image {
      flex: 1 1 400px;
      max-width: 500px;
    }
    .home-image img {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .home-text {
      flex: 2 1 400px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #000;
    }
    .home-text h1 {
      font-size: 2.2rem;
      margin-bottom: 1rem;
    }
    .home-text h1 .color1 { color: #1a3e5c; }
    .home-text h1 .color2 { color: #333; }

    /* Sección propósito */
    .proposito {
      background-color: rgba(255,255,255,0.9);
      padding: 2rem;
      border-radius: 12px;
      margin-bottom: 3rem;
      font-size: 1.2rem;
      line-height: 1.6;
      color: #000;
      text-align: justify;
      animation: fadeInUp 1s ease forwards;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    /* Bloques de info abajo */
    .info-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      margin-bottom: 3rem;
    }
    .info-card {
      flex: 1 1 250px;
      background-color: rgba(255,255,255,0.95);
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
      color: #000;
    }
    .info-card:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }
    .info-card h3 { margin-bottom: 0.5rem; }
    .info-card p { font-size: 0.95rem; line-height: 1.4; }
    .info-card img { display: block; margin: 1rem auto 0; max-width: 80%; height: auto; border-radius: 8px; }

    .info-card.redes-sociales { text-align: center; }
    .social-buttons { display: flex; justify-content: center; gap: 15px; margin-top: 1rem; }
    .social-buttons a img { width: 50px; height: 50px; transition: transform 0.3s, box-shadow 0.3s; cursor: pointer; border-radius: 12px; }
    .social-buttons a img:hover { transform: scale(1.2); box-shadow: 0 5px 15px rgba(0,0,0,0.3); }

    .proposito-container a.btn-xl {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 12px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .proposito-container a.btn-xl:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body class="<?= $page=='home'?'home':'' ?>">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Principal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menú">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link <?= $page=='publicaciones'?'active':'' ?>" href="index.php?page=publicaciones">Publicaciones</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='emprendedores'?'active':'' ?>" href="index.php?page=emprendedores">Emprendedores</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='Perfil_emprendedor'?'active':'' ?>" href="index.php?page=Perfil_emprendedor">Perfil_emprendedor</a></li>
          <li class="nav-item"><a class="nav-link <?= $page=='eventos'?'active':'' ?>" href="index.php?page=eventos">Eventos</a></li>
          
          
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a href="index.php?page=login" class="btn btn-outline-light me-2 <?= $page=='login'?'active':'' ?>">Iniciar Sesión</a></li>
          <li class="nav-item"><a href="index.php?page=registrarse" class="btn btn-primary <?= $page=='registrarse'?'active':'' ?>">Registrarse</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido dinámico -->
  <div class="container py-4">
    <?php
    switch ($page) {
        case 'home':
    ?>
      <div class="home-section fade-in">
        <div class="home-image">
          <img src="assets/img/logo_meta.jpeg" alt="Emprendedores Meta Villavicencio">
        </div>
        <div class="home-text">
          <h1>
            <span class="color1">¡Bienvenidos a la comunidad de emprendedores del Meta y Villavicencio!</span><br>
            <span class="color2">Aquí encontrarás inspiración, apoyo y oportunidades para hacer crecer tus ideas y proyectos locales.</span>
          </h1>
        </div>
      </div>

      <div class="proposito-container fade-in" style="display: flex; flex-wrap: wrap; align-items: center; gap: 1.5rem;">
        <div class="proposito" style="flex: 2 1 400px;">
          Nuestra misión es conectar emprendedores locales, ofreciendo herramientas, recursos y un espacio seguro para compartir experiencias, aprender y potenciar proyectos. Buscamos fortalecer la innovación en el Meta y Villavicencio, creando una red colaborativa que impulse el desarrollo económico y social de la región.
        </div>
        <div style="flex: 1 1 200px; text-align: center;">
          <a href="index.php?page=publicaciones" class="btn btn-primary btn-lg animate__animated animate__pulse animate__infinite" style="padding: 1rem 2rem; font-size: 1.2rem;">
            ¡Mira todos los emprendimientos aquí!
          </a>
        </div>
      </div>

      <div class="info-cards fade-in">
        <div class="info-card redes-sociales">
          <h3>Redes Sociales</h3>
          <p>Encuentra y conecta con otros emprendedores locales en nuestras plataformas sociales.</p>
          <div class="social-buttons">
            <a href="https://www.facebook.com/GobMeta" target="_blank"><img src="assets/img/facebook.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/gobernaciondelmeta/" target="_blank"><img src="assets/img/insta.png" alt="Instagram"></a>
            <a href="https://x.com/GobMeta" target="_blank"><img src="assets/img/twitter.png" alt="Twitter"></a>
            <a href="https://www.tiktok.com/@gobmeta" target="_blank"><img src="assets/img/tiktok.png" alt="TikTok"></a>
          </div>
        </div>
        <div class="info-card" onclick="window.open('https://www.culturameta.gov.co/','_blank')">
          <h3>Instituto de Cultura</h3>
          <p>Visita el Instituto de Cultura del Meta para conocer programas y eventos locales.</p>
          <img src="assets/img/ie_cultura.png">
        </div>
        <div class="info-card" onclick="window.open('http://casaculturameta.gov.co/','_blank')">
          <h3>Casa de Cultura</h3>
          <p>Accede a la Casa de Cultura para talleres, capacitaciones y actividades culturales.</p>
          <img src="assets/img/casa.png">
        </div>
      </div>

    <?php
            break;
        default:
            include 'views/'.$page.'.php';
            break;
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
