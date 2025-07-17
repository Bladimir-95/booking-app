<?php
  $msg="";
  $name="";

  if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['retype_password'])){

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $retype_password = strip_tags($_POST['retype_password']);

    if($password != $retype_password){
      $msg.= "Las contraseñas no coinciden <br>";
    } else if (strlen($password)<8) {
      $msg.= "La contraseña debe tener al menos 8 caracteres <br>";
    } else {

      $mysqli = mysqli_connect("localhost", "root", "", "hospedaje");

      if(!$mysqli){
      echo "Hubo un problema al concectarse a a la base de datos";
      die();
      }

      $resultado = $mysqli->query("SELECT * FROM `usuarios` WHERE `email` = '".$email."' ");
      $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);

      $cantidad = count($usuarios);

      if($cantidad == 0){
        $password = sha1($password);
        $mysqli->query("INSERT INTO `usuarios` (`name`, `email`, `password`) VALUE ('".$name."', '".$email."', '".$password."')");
        $msg .= "Usuario creado correctamente, ingrese haciendo <a href='login.php'>clic aquí</a> <br>";
      }else{
        $msg .= "El mail ingresado ya existe <br>";
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
    <h2 class="text-center mb-4">Regístrate</h2>

    <form action="register.php" method="post">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre completo</label>
        <input name="name" type="text" class="form-control" id="nombre" placeholder="Tu nombre completo" value="<?php echo $name; ?>" required >
      </div>

      <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input name="email" type="email" class="form-control" id="correo" placeholder="Ingresa tu correo" required>
      </div>

      <div class="mb-3">
        <label for="contrasenia" class="form-label">Contraseña</label>
        <input name="password" type="password" class="form-control" id="contrasenia" placeholder="********" required>
      </div>

      <div class="mb-3">
        <label for="repetirContrasenia" class="form-label">Repetir contraseña</label>
        <input name="retype_password" type="password" class="form-control" id="repetirContrasenia" placeholder="********" required>
      </div>

      <div class="mb-3">
        <label for="tipoUsuario" class="form-label">Tipo de usuario</label>
        <select class="form-select" id="tipoUsuario" required>
          <option value="" disabled selected>Selecciona una opción</option>
          <option value="normal">Usuario</option>
          <option value="admin">Administrador</option>
        </select>
      </div>
     
      <div class="d-grid col-4 offset-md-4">
        <button type="submit" class="btn btn-primary">Registrarse</button>
      </div>
      <p class="mt-2">
        <a href="login.php" class="text-center"> Ya tengo una cuenta </a>
      </p>
        </div>
    </form>
      <div style="color: gray;">
        <br><?php echo $msg;?> <br>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
