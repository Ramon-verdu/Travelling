<?php
  include 'conexion.php';
    $EMAIL = $nombre = $mode =$cargo= "";
    $ENCUENTRAERROR = $PASSWORDNOVALIDA = 0;
    $EMAILERR = $PASSWORDERR = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      if (empty($_POST['email'])) {
        $EMAILERR = "Email es un campo obligatorio";
        $ENCUENTRAERROR = 1;
      } else {
        $EMAIL = test_input($_POST['email']);
      }
  
      if (empty($_POST['password'])) {
        $PASSWORDERR = "La contraseña es un campo obligatorio";
        $ENCUENTRAERROR = 1;
      } else {
        $PASSWORD = test_input($_POST['password']);
        if (strlen($PASSWORD )<8) {
          $ENCUENTRAERROR = 1;
          $PASSWORDERR="Minimo 8 carácteres";
        }
        elseif (!preg_match('`[A-Z]`',$PASSWORD)) {
          $ENCUENTRAERROR = 1;
          $PASSWORDERR="Introduce al menos una letra mayúscula";
        }
      }
  $mode=$_POST['mode'];
  $cargo=$_POST['cargo'];   
     $nombre=$_POST['nombre'];
    }
    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  
    if ($ENCUENTRAERROR == 1) {
      echo $EMAILERR;
      echo $PASSWORDERR;
      
    } else {
      echo "entro en comprobar email";
      //compruebo si ya esta el mail en la BBDD
      $sql = "SELECT email FROM usuarios WHERE email = '$EMAIL'";
      $results = $conn->query($sql);
      if ($results->num_rows > 0) {
        $_SESSION['email'] = $EMAIL;
     
        $_SESSION['EMAILEXISTE']= "visibility:visible";
  
       
        
        include 'desconexion.php'; 
        header("Location: crearusuario.php");
      }else{
        $sql = "INSERT INTO usuarios (`mode`, `nombre`, `cargo`, `email`, `password`) VALUES ('$mode', '$nombre', '$cargo','$EMAIL','$PASSWORD')";
        if ($conn->query($sql)===TRUE) {
          echo "Usuario creado correctamente";
          header("Location: inicio.php");
        }else{
            echo "Error en crear usuarios";
        }
        }
    }