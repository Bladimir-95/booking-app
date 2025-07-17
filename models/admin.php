<?php

session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../session/login.php");
    exit;
}

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $imagen = $_POST['imagen'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $alojamiento = $_POST['alojamiento'] ?? 0;
    $disponibilidad = $_POST['disponibilidad'] ?? 0;
    $calificacion = 0.00;

    $sql = "INSERT INTO alojamientos (imagen, titulo, precio, alojamiento, disponibilidad, calificacion)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdiii", $imagen, $titulo, $precio, $alojamiento, $disponibilidad, $calificacion);

    if ($stmt->execute()) {
        $mensaje = "Alojamiento agregado con éxito.";
    } else {
        $mensaje = "Error al agregar alojamiento: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Administración de Alojamientos</title>
</head>
<body>

<header class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="home.php" class="navbar-brand">ExtraVago</a>
  </div>
       
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../session/register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../session/login.php">LogIn</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
   
    <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

    <div class="container mt-5">
        <h2 class="mb-4">Agregar Alojamiento</h2>
        <form method="POST" action="" class="border p-4 rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Nombre de la imagen</label>
                <input type="text" name="imagen" id="imagen" class="form-control" placeholder="Nombre de la imagen" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio" class="form-control" placeholder="Precio" required>
            </div>
            <div class="mb-3">
                <label for="alojamiento" class="form-label">Capacidad</label>
                <input type="number" name="alojamiento" id="alojamiento" class="form-control" placeholder="Capacidad" required>
            </div>
            <div class="mb-3">
                <label for="disponibilidad" class="form-label">Disponibilidad</label>
                <input type="number" name="disponibilidad" id="disponibilidad" class="form-control" placeholder="Disponibilidad" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>
