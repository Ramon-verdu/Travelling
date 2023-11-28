<?php 
session_start();
$email=strval($_SESSION['email']);

if ($email=="" || $email==" "|| $email==null){

    header("Location: ./index.html");
}else {


?>

<!DOCTYPE html>
<html>

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
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image:url(&quot;assets/img/tech/image4.jpg&quot;);color:rgba(9, 162, 255, 0.85);">
            <div class="text">
                <h2>Bienvenidos Administrador</h2>
                <p>Esta es la pagina de Administradores y encargados superiores</p>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading"></div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="asset/img/travell.png"></div>
                    <div class="col-md-6">
                        <h3><br><strong>Nuestra misión</strong><br><br></h3>
                        <div class="getting-started-info">
                            <p><br>Existe la idea de que para hacer crecer un negocio hay que ser despiadado.&nbsp;Pero sabemos que hay una mejor manera de crecer.&nbsp;Uno en el que lo que es bueno para el resultado final también lo es para los clientes.&nbsp;Creemos que las empresas pueden crecer con conciencia y tener éxito con alma, y ​​que pueden hacerlo con inbound.&nbsp;Es por eso que hemos creado un ecosistema que une software, educación y comunidad para ayudar a las empresas a crecer mejor cada día.<br><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading"></div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4>Diseñador</h4>
                        <p><br>Un diseñador de moda&nbsp;<strong>es un profesional que está cualificado y capacitado para realizar el diseño de ropa y complementos</strong>. Para ello, el diseñador de moda tiene que estar completamente actualizado en lo que ser refiere al conocimiento de tendencias.<br><br></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-screen-desktop icon"></i>
                        <h4>Desarrollador web</h4>
                        <p><br>La función de un Desarrollador Web es&nbsp;<strong>diseñar, crear y mantener sitios web</strong>, proporcionando en el proceso un portal online coherente y fácil de usar para los clientes, compañeros de trabajo y otras partes implicadas.<br><br></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                        <h4>Desarrollador de app</h4>
                        <p><br>¿Qué es un desarrollador de aplicaciones? También llamados desarrolladores móviles, los desarrolladores de aplicaciones&nbsp;<strong>son los profesionales encargados de diseñar, crear una app y optimizarla para que pueda usarse en dispositivos móviles como teléfonos y tablets</strong>.<br><br></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-lock icon"></i>
                        <h4>Ciberseguridad</h4>
                        <p><br>La ciberseguridad&nbsp;<strong>es la práctica de proteger equipos, redes, aplicaciones de software, sistemas críticos y datos de posibles amenazas digitales</strong>. Las organizaciones tienen la responsabilidad de proteger los datos para mantener la confianza del cliente y cumplir la normativa.<br><br></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading"></div>
                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">
                        <div class="carousel-item active"><img class="w-100 h-100 d-block" src="asset/img/app.png" alt="Slide Image"></div>
                    
                      
                        <div class="carousel-item"><img class="w-100 h-100 d-block" src="asset/img/Camisetas.png" alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                        
                    </ol>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading"></div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="asset/img/avatars/ramon%20foto.png">
                            <div class="card-body info">
                                <h4 class="card-title">Ramon Felicidade Verdu</h4>
                                <p class="card-text">Jefe y fundador de esta empresa</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="asset/img/avatars/jefa.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Roberta Downturn</h4>
                                <p class="card-text">Recursos humano</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card text-center clean-card"><img class="card-img-top w-100 d-block" src="asset/img/avatars/jose.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Alejandro elBola</h4>
                                <p class="card-text">Ventas</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p>© 2023 Ramon Verdú :)</p>
        </div>
    </footer>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="asset/js/vanilla-zoom.js"></script>
    <script src="asset/js/theme.js"></script>
</body>

</html>
<?php }?>