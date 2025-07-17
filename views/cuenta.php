<?php
session_start();

// si el usuario no esta logiado lo mando para el lobby
if (!isset($_SESSION['user_id'])) {
    header("Location: ../session/login.php");
    exit();
}
    

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Alojamientos_usuarios.php';

// conecto la base de datos
$database = new Database();
$db = $database->getConnection();


$alojamientosUsuarios = new Alojamientos_usuarios($db);

// obtengo el id del usuario que inicio sesion y los alojamientos de la tabla de alojamientos
$user_id = $_SESSION['user_id'];
if (isset($_POST['eliminar_alojamiento_id'])) {
    $alojamiento_id = $_POST['eliminar_alojamiento_id'];
    $alojamientosUsuarios->delete($_SESSION['user_id'], $alojamiento_id);
}
    // header("Location: /MVC/booking-app/views/cuenta.php");

$sentencia = $alojamientosUsuarios->obtenerAlojamientos($user_id);
$alojamientos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Cuenta - Alojamientos Guardados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container py-4">
        <h2>Alojamientos guardados en tu cuenta</h2>

        <?php if (count($alojamientos) > 0): ?>
            <ul class="list-group">
                <?php foreach ($alojamientos as $alojamiento): ?>
                    <li class="list-group-item">
                        <h5><?= htmlspecialchars($alojamiento['titulo']) ?></h5>
                        <p>Precio: <?= htmlspecialchars($alojamiento['precio']) ?></p>
                        <p>Lugar: <?= htmlspecialchars($alojamiento['lugar']) ?></p>
                        <form method="POST" style="margin:0;">
                             <input type="hidden" name="eliminar_alojamiento_id" value="<?= $alojamiento['id'] ?>">
                             <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                         </form>
                    </li>

                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No tienes alojamientos guardados aún.</p>
        <?php endif; ?>

        <a href="home.php" class="btn btn-primary mt-3">Volver a Inicio</a>
    </div>
</body>
</html>
