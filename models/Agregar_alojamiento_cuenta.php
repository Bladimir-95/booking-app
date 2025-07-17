<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Alojamientos_usuarios.php';


session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['alojamiento_id'])) {
    $alojamiento_id = $_POST['alojamiento_id'];
    $user_id = $_SESSION['user_id'];

    $database = new Database();
    $db = $database->getConnection();

    $alojamientosUsuarios = new Alojamientos_usuarios($db);
    $alojamientosUsuarios->agregarAlojamiento($user_id, $alojamiento_id);

    header("Location: index.php");
    exit();
} else {
    echo "Error: no se recibió el ID del alojamiento.";
}

?>