<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtraVago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- -->
<body>
    <style>
  .carousel-control-prev,
  .carousel-control-next {
    background-color: #343a40; /* Un fondo oscuro */
    width: 40px;
    height: 40px;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
  }
</style>
    <!--Navbar-->
<header class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand">ExtraVago</a>
    <div class="w-100 d-flex justify-content-center">
      <form class="row g-2 align-items-end justify-content-center mx-auto" method="POST" action="./index.php?action=search" style="max-width: 500px; width: 100%;">
        <div class="col-9">
          <label for="destination" class="form-label text-white">Destino</label>
          <div class="input-group">
            <div class="input-group-text">📍</div>
            <input type="text" class="form-control" name="destination" placeholder="Buscar un destino...">
          </div>
        </div>
        <div class="col-3 d-grid">
          <label class="form-label text-white invisible">Buscar</label>
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </form>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<!--Tabla de opciones-->
<!--al dar click mostrara los resultados con la categoria mostrada-->
<!--carrucel de boostrap personalizado & con un script de funcionamiento abajo que proviene de boostrap-->
<div class="container py-4">
  <h2 class="mb-3">Explora nuestras categorías</h2>

  <div id="opcionesCarousel" class="carousel slide" data-bs-interval="false">
    
    <div class="carousel-inner">
      
      <div class="carousel-item active">
        <div class="d-flex justify-content-center gap-3">
          <div class="card text-center" style="width: 12rem;">
            <div class="card-body">
              <h5 class="card-title">Playa</h5>
              <p class="card-text">🌴</p>
              <a href="index.php?action=search&lugar=Playa" class="btn btn-sm btn-outline-primary">Ver más</a>
            </div>
          </div>
          <div class="card text-center" style="width: 12rem;">
            <div class="card-body">
              <h5 class="card-title">Bosque</h5>
              <p class="card-text">⛰️</p>
              <a href="index.php?action=search&lugar=Bosque" class="btn btn-sm btn-outline-primary">Ver más</a>
            </div>
          </div>
          <div class="card text-center" style="width: 12rem;">
            <div class="card-body">
              <h5 class="card-title">Ciudad</h5>
              <p class="card-text">🏙️</p>
              <a href="index.php?action=search&lugar=Ciudad" class="btn btn-sm btn-outline-primary">Ver más</a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#opcionesCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#opcionesCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>


<!--Contenedor en el que se podra ver el resultado de la busqueda // trae una plantilla de ejemplo-->

<!--No se deberia de ver hasta que se pase la informacion entonces alli lo modifican para que
hasta que no se precione el boton con info no se vea.-->
<main class="container py-4">
<div class="container py-4">

  <h2 class="mb-4">Resultados de tu Búsqueda</h2>

  <ul class="list-unstyled row g-4">
    <?php foreach($alojaminetos as $alojamiento): ?>
      
      <li class="col-md-4">
        <div class="card h-100">
          <img src="<?php echo htmlspecialchars($alojamiento['imagen']); ?>" class="card-img-top" alt="Imagen de <?php echo htmlspecialchars($alojamiento['titulo']); ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($alojamiento['titulo']); ?></h5>
            <p class="card-text mb-1"><strong>Precio:</strong> <?php echo htmlspecialchars($alojamiento['precio']); ?></p>
            <p class="card-text mb-1"><strong>Alojamiento:</strong> <?php echo htmlspecialchars($alojamiento['alojamiento']); ?></p>
            <p class="card-text mb-1"><strong>Disponibilidad:</strong> <?php echo htmlspecialchars($alojamiento['disponibilidad']); ?></p>
            <p class="card-text mb-1"><strong>Lugar:</strong> <?php echo htmlspecialchars($alojamiento['lugar']); ?></p>
            <p class="card-text mb-1"><strong>Calificación:</strong> <?php echo htmlspecialchars($alojamiento['calificacion']); ?>⭐ </p>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
</main>
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>