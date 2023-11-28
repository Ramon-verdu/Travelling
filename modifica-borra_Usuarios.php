<?php
    include_once "conexion.php";
    session_start();

        
        foreach ($_POST['idEliminar'] as $id) {
            $insertsql="SELECT * FROM `usuarios` WHERE id=$id"; 
            $results = $conn->query($insertsql);
            $row = $results->fetch_assoc();
            $mode = $row['mode'];
            $E = $row['email'];
            $PERFIL = $row['nombre'];
            $cargo = $row['cargo'];
            $password = $row['password'];
            $sqlcreate="INSERT INTO `hitorico_usuario`(`mode`, `nombre`, `cargo`, `email`, `password`) VALUES ('$mode','$PERFIL',' $cargo',' $E',' $password')";
            $conn->query($sqlcreate);
          $sql = "DELETE FROM usuarios WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error deleting record: " . $conn->error;
            }  
            
        }

        foreach ($_POST['idModificar'] as $id) {
            $insertsql="SELECT * FROM `usuarios` WHERE id=$id"; 
            $results = $conn->query($insertsql);
            $row = $results->fetch_assoc();
            $mode = $row['mode'];

            if ($mode=='Admin') {
                $sql = "UPDATE usuarios SET mode ='trabajador' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }else{
                $sql = "UPDATE usuarios SET mode ='Admin' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
          
        }

        header('Location: listado.php');

?>