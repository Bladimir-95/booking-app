<?php

session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../login.php");
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
    <title>Administración de Alojamientos</title>
</head>
<body>
    <h2>Agregar nuevo alojamiento</h2>
    <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>
    <form method="POST" action="">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <input type="text" name="imagen" placeholder="Nombre de la imagen" required><br>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required><br>
        <input type="number" name="alojamiento" placeholder="Capacidad" required><br>
        <input type="number" name="disponibilidad" placeholder="Disponibilidad" required><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
