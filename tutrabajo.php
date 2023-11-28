<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {

}
$EMAILADMIN = $_SESSION['email'];
$idcargo=$_SESSION["cargo"];
$mode=$_SESSION["mode"];
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
                    <li class="nav-item"><a class="nav-link active" href="inicio.php" style="color: rgb(59,153,224);">Home</a></li>
                    
                    <li class="nav-item"><a class="nav-link" href="contact-us.php" style="color: rgb(59,153,224);">mandar trabajos</a></li>
                    <li class="nav-item"><a class="nav-link" href="crearusuario.php" style="color: rgb(59,153,224);">Crear usuario</a></li>
                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">mas opciones</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="listado.php">Listado de Trabajadores</a></li>
      <li><a class="dropdown-item" href="chat-gpt/index.html">Chat con el asistente</a></li>
      <li><a class="dropdown-item" href="logout.php">salir de la cuenta</a></li>

    </ul>
  </li>
 
         
              
                </ul>
            </div>
        </div>
    </nav>
                 
        <div class="container" style="margin-top: 14%;">
            <form action="trabajoRealizado.php" method="post" name="f1">
                <table class="table table-dark table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>CARGO</th>
                            <th scope='col'>NOMBRE</th>
                            <th scope='col'>MENSAJE</th>
                            <th scope='col'><input class='btn btn-primary' type='submit' name='btnEliminar' value='Trabajo Realizado' /></th>
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

                    $sql = "SELECT trabajo.id,trabajo.nombre, trabajo.mensaje, cargos.cargo FROM `trabajo`,`cargos` WHERE cargos.id=trabajo.id_p AND cargos.id=$idcargo";
                    $sqlNull = "SELECT trabajo.id,trabajo.nombre, trabajo.mensaje, cargos.cargo FROM `trabajo`,`cargos` WHERE cargos.id=trabajo.id_p AND cargos.id=$idcargo";
                    $results = $conn->query($sql);
                    $resultsNull = $conn->query($sqlNull);
                    $rownull = $resultsNull->fetch_assoc();
                    $numeroFilas = $resultsNull->num_rows;
                   
                    $paginacion = ceil($numeroFilas / $resultadoPorPaginas);
                    $primeraPagina = ($pagina - 1) * $resultadoPorPaginas;
                    $sqlPaginacion = "SELECT trabajo.id,trabajo.nombre, trabajo.mensaje, cargos.cargo FROM `trabajo`,`cargos` WHERE cargos.id=trabajo.id_p AND cargos.id=$idcargo LIMIT ". $primeraPagina . ',' . $resultadoPorPaginas;
                    $resultsPagina = $conn->query($sqlPaginacion);

                    if ($resultsPagina->num_rows > 0) {
                        while ($row = $resultsPagina->fetch_assoc()) {
                            $id = $row['id'];
                            $EMAIL = $row['cargo'];
                            $PERFIL = $row['nombre'];
                            $mode = $row['mensaje'];

                          
                            echo "<tbody>";
                            echo "
            <tr>
                <td scope='col'>$id</td>
                <td scope='col'>$EMAIL</td>
                <td scope='col'>$PERFIL</td>
                <td scope='col'>$mode</td>
                <td scope='col'><input type='checkbox' name='idEliminar[]' value='$id' /></td>
             
            </tr>";
                        }
                        echo "</tbody></table>";
                    ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $pagina == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="tutrabajo.php?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>

                                <?php for ($i = 1; $i <= $paginacion; $i++) {
                                ?>
                                    <li class="page-item <?php echo $pagina == $i ? 'active' : '' ?>"><a class="page-link" href="tutrabajo.php?pagina=<?php echo ($i); ?>"><?php echo ($i); ?></a></li>
                                <?php }  ?>

                                <li class="page-item <?php echo $pagina < $paginacion ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?php if ($pagina>=$paginacion) {
                                        # code...
                                    }else{ echo 'tutrabajo.php?pagina'; }?>" aria-label="Next">
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
                <div class="mt-0">
                    <button type="button" class="btn btn-primary" onclick="seleccionar_todo()">Marcar Todo</button>
                    <button type="button" class="btn btn-primary" onclick="deseleccionar_todo()">Desmarcar Todo</button>
            </form>
        </div>
            <a class="btn btn-primary" href="inicio.php" style="margin-top: 6%;">Volver menu</a>
       
    </section>
    <script type="text/javascript">
          function seleccionar_todo(){
           for (i=0;i<document.f1.elements.length;i++)
              if(document.f1.elements[i].type == 'checkbox')
                 document.f1.elements[i].checked=1
        } 
        function deseleccionar_todo(){
           for (i=0;i<document.f1.elements.length;i++)
              if(document.f1.elements[i].type == 'checkbox')
                 document.f1.elements[i].checked=0
        } 
    </script>
</body>

</html>