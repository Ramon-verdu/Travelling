<?php
    include_once "conexion.php";
    session_start();

        
        foreach ($_POST['idEliminar'] as $id) {
            $insertsql="SELECT * FROM `trabajo` WHERE id=$id"; 
            $results = $conn->query($insertsql);
            $row = $results->fetch_assoc();
            $nombre = $row['nombre'];
            $id_p = $row['id_p'];
            $mensaje = $row['mensaje'];
            
            $sqlcreate="INSERT INTO `historico_trabajo`( `nombre`, `id_p`, `mensaje`) VALUES ('$nombre ',' $id_p',' $mensaje')";
            $conn->query($sqlcreate);
            $sql = "DELETE FROM trabajo WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

       

        header('Location: tutrabajo.php');

?>