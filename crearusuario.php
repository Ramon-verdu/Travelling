<?php 
session_start();
$email=strval($_SESSION['email']);

if ($email=="" || $email==" "|| $email==null){

    header("Location: ./index.html");
}else {


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Travelling Jefe</title>
        <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="asset/fonts/simple-line-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="asset/css/vanilla-zoom.min.css">
    </head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="color: rgb(59,153,224);">
        <div class="container"><a class="navbar-brand logo" href="#" style="color: rgb(59,153,224);">Travelling</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto" style="margin-left: 41% !important;">
                    <li class="nav-item"><a class="nav-link active" href="inicio.php" style="color: rgb(59,153,224);">Home</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="contact-us.php" style="color: rgb(59,153,224);">mandar trabajos</a></li>
                    <li class="nav-item"><a class="nav-link" href="crearusuario.php" style="color: rgb(59,153,224);">Crear usuario</a></li>
                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">mas opciones</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="listado.php">Listado de Trabajadores</a></li>
      <li><a class="dropdown-item" href="chat-gpt/index.html">Chat con el asistente</a></li>
      <li><a class="dropdown-item" href="tutrabajo.php">Tu trabajo</a></li>
      <li><a class="dropdown-item" href="logout.php">salir de la cuenta</a></li>

    </ul>
  </li>
 
         
              
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 12%;">     
        <form action="Registro.php" method="post">
            <h2 class="visually" style="margin-bottom: 6%;">Crear usuario</h2>
            <div class="illustration">
                <div class="mb-3"><input class="form-control" type="email" name="email" required  placeholder="Email" value="" ></div>
                <div class="mb-3"><input class="form-control" type="password" name="password" required placeholder="Contraseña" value="" ></div>
                <div class="mb-3"><input class="form-control" type="text" required name="nombre" placeholder="Nombre" value=""></div>
                <div class="mb-3"> <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="cargo">
                    <option value="1">Jefe</option>
                    <option value="2">Desarrollador web</option>
                    <option value="3">Desarrollador app</option>
                    <option value="4">Ciberseguridad</option>
                    <option value="5">Diseñador</option>
                </select></div>
                <div class="mb-3"> <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="mode">
                    <option value="Admin">ADMIN</option>
                    <option value="trabajador">Trabajador</option>
                </select></div>
           
           
            </div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style=" margin-top: 4%;">Crear usuario</button></div>
        </form>
        </div> 
 
        <script src="asset/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script src="asset/js/vanilla-zoom.js"></script>
        <script src="asset/js/theme.js"></script>
</body>

</html>
<?php }?>