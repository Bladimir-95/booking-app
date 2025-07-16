<?php
session_start();
$_SESSION['autorizado'] = false;



$msg="";
$email="";

if(isset($_POST['email'], $_POST['password'])){

  if($_POST['email']==""){
    $msg.="Debe ingresar un email <br>";
  } else if ($_POST['password'] == ""){
    $msg.="Debe ingresar una clave <br>";
  } else {
    $email = strip_tags($_POST['email']);
    $password = sha1(strip_tags($_POST['password']));
    
    $mysqli = mysqli_connect("localhost", "root","", "hospedaje");
    
    if(!$mysqli){
      echo "Hubo un problema al conectarse a la base de datos";
    }

    $resultado = $mysqli->query("SELECT * FROM `usuarios` WHERE `email` = '".$email."' AND `password` = '".$password."' ");
    $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

    $_SESSION['email'] = $usuarios[0]['email'];
    $_SESSION['ultimo_login'] = $usuarios[0]['ultimo_login'];
    $_SESSION['rol'] = $usuarios[0]['rol'];
   
    $cantidad = count($usuarios);

    if($cantidad == 1){
      $hoy = date( "Y-m-d H:i:s" );
      $resultado = $mysqli->query("UPDATE `usuarios` SET `ultimo_login`= '".$hoy."' WHERE `email` = '".$email."' ");

      $msg.= "Exito!";

      $_SESSION['autorizado'] = true; 

    if($_SESSION['role'] == 'admin'){
        
        echo '<meta http-equiv="refresh" content="2; url=" />';
      } else {
        
        echo '<meta http-equiv="refresh" content="2; url=" />';
      }
    } else {
      $msg .= "Acceso denegado!";
      $_SESSION['autorizado'] = false;
    }

  }

}

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h2 class="text-center mb-4">Inicia Sesion</h2>

    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input name="email" type="email" class="form-control" id="correo" placeholder="Ingresa tu correo" required>
      </div>

      <div class="mb-3">
        <label for="contrasenia" class="form-label">Contraseña</label>
        <input name="password" type="password" class="form-control" id="contrasenia" placeholder="********" required>
      </div>
     
      <div class="d-grid col-6 offset-md-3">
        <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
      </div>
    </form>

    <p class="mt-2">
      <a href="register.php" class="text-center"> Registrar una cuenta </a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
