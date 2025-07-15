<!doctype html>
<html lang="en">
 
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Booking-app</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Register Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
   
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
  
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
  
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    
  </head>
  
  <body class="register-page bg-body-secondary">
    <div class="register-box">
      <div class="register-logo">
       <!-- <img src="imagenes/PHPTube.jpeg" style="width: 250px;" alt=""> -->
      </div>
      
      <div class="card">
        <div class="card-body register-card-body" style="border-radius: 10px;">
          <p class="register-box-msg">Registrate</p>
          
          <form action="register.php" method="post">
            <div class="input-group mb-3">
              <input name="name" type="text" class="form-control" placeholder="Escribe tu nombre completo" value="<?= $name;?>"/>
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>

            <div class="input-group mb-3">
              <input name="email" type="email" class="form-control" placeholder="Email" value="<?= $email;?>"/>
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>

            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>

            </div>

            <div class="input-group mb-3">
              <input name="retype_password" type="password" class="form-control" placeholder="Retype Password" />
              <div class="input-group-text"><span class="bi bi-shield-lock"></span></div>
            </div>

            
            <div class="row">
              <div class="col-8">
                <label>
                  <input name="de_acuerdo" type="checkbox" required>Acepto <a href="https://www.google.com/">términos y condiciones</a>
                </label>
              </div>
              
              <div class="col-4 offset-md-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Registrate</button>
                </div>
              </div>
             
            </div>
            
            <div style="color: red;">
            <br><?php echo $msg;?> <br>
            </div>
          </form>
          
          
          <p class="mb-0">
            <a href="login.php" class="text-center"> Ya tengo una cuenta </a>
          </p>
        </div>       
      </div>
    </div>    
  </body> 
</html>
