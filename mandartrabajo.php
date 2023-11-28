<?php
  include 'conexion.php';
    $nombre = $mensage= "";
    $cargo=0;
    
     $nombre=$_POST['name'];
  $cargo=$_POST['cargo'];   

  $mensage=$_POST['message'];
     echo($nombre);
     echo($mensage);
     echo($cargo);
     $sql = "INSERT INTO trabajo(`nombre`, `id_p`, `mensaje`) VALUES ('$nombre',$cargo,'$mensage')";
  $conn->query($sql);
   
      header("Location: inicio.php");


    ?>