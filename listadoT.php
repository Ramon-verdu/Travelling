<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {

}
$EMAILADMIN = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LISTADO DE TRABAJADORES</title>
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
                <li class="nav-item"><a class="nav-link active" href="inicioT.php" style="color: rgb(59,153,224);">Home</a></li>
                    
                

                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">mas opciones</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="listadoT.php">Listado de Trabajadores</a></li>
      <li><a class="dropdown-item" href="chat-gptT/index.html">Chat con el asistente</a></li>
      <li><a class="dropdown-item" href="tutrabajoT.php">Tu trabajo</a></li>
      <li><a class="dropdown-item" href="logout.php">salir de la cuenta</a></li>

    </ul>
  </li>
            </div>
        </div>
    </nav>
                 
        <div class="container" style="margin-top: 14%;">
            <form action="modifica-borra_Usuarios.php" method="post" name="f1">
                <table class="table table-dark table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>EMAIL</th>
                            <th scope='col'>NOMBRE</th>
                            <th scope='col'>MODO</th>
                       </tr>
                    </thead>
                    <?php

                    include 'conexion.php';
                    $resultadoPorPaginas = 4;

                    if (!isset($_GET['pagina'])) {
                        $pagina = 1;
                    } else {
                        $pagina = $_GET['pagina'];
                    }

                    $sql = "SELECT * FROM usuarios  WHERE email  NOT LIKE '$EMAILADMIN'";
                    $sqlNull = "SELECT * FROM usuarios  WHERE email  NOT LIKE '$EMAILADMIN'";
                    $results = $conn->query($sql);
                    $resultsNull = $conn->query($sqlNull);
                    $rownull = $resultsNull->fetch_assoc();
                    $numeroFilas = $resultsNull->num_rows;
                   
                    $paginacion = ceil($numeroFilas / $resultadoPorPaginas);
                    $primeraPagina = ($pagina - 1) * $resultadoPorPaginas;
                    $sqlPaginacion = "SELECT * FROM usuarios  WHERE email  NOT LIKE '$EMAILADMIN' LIMIT ". $primeraPagina . ',' . $resultadoPorPaginas;
                    $resultsPagina = $conn->query($sqlPaginacion);

                    if ($resultsPagina->num_rows > 0) {
                        while ($row = $resultsPagina->fetch_assoc()) {
                            $id = $row['id'];
                            $EMAIL = $row['email'];
                            $PERFIL = $row['nombre'];
                            $mode = $row['mode'];

                          
                            echo "<tbody>";
                            echo "
            <tr>
                <td scope='col'>$id</td>
                <td scope='col'>$EMAIL</td>
                <td scope='col'>$PERFIL</td>
                <td scope='col'>$mode</td>
              
            </tr>";
                        }
                        echo "</tbody></table>";
                    ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $pagina == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="listadoT.php?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>

                                <?php for ($i = 1; $i <= $paginacion; $i++) {
                                ?>
                                    <li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"><a class="page-link" href="listadoT.php?pagina=<?php echo ($i); ?>"><?php echo ($i); ?></a></li>
                                <?php }  ?>

                                <li class="page-item <?php echo $pagina < $paginacion ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?php if ($pagina>=$paginacion) {
                                        # code...
                                    }else{ echo 'listadoT.php?pagina'; }?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <br>
                        <?php
                    } else {
                        echo "0 results";
                    }
                    include 'desconexion.php';
                        ?>
                </table>
         
            <a class="btn btn-primary" href="inicioT.php" style="margin-top: 6%;">Volver menu</a>
       
    </section>
  
</body>

</html>