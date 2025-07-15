<!doctype html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Booking-app</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page" />
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

  <body class="login-page bg-body-secondary">
    <div class="login-box">
      <div class="login-logo">
       <!--<img src="imagenes/PHPTube.jpeg" style="width: 250px;" alt="">-->
      </div>

      <div class="card" >
        <div class="card-body login-card-body" style="border-radius: 10px;">
          <p class="login-box-msg">Inicia Sesion</p>
          
          <form action="login.php" method="post">
            <div class="input-group mb-3">
              <input name="email" type="email" class="form-control" placeholder="Email"/>
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password" />
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>

            <div class="row">
              <div class="col-">                
              </div>

              <div class="col-4 offset-md-4" >
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
              </div>
            </div>
            <br><?php echo $msg;?> <br>
          </form>
          
          <p class="mb-0">
            <a href="register.php" class="text-center"> Registrar una cuenta </a>
          </p>
        </div>
      </div>
    </div> 
  </body>
</html>