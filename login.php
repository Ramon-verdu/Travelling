<?php
session_start();
$_SESSION['EMAIL'] = "";
include 'conexion.php';

// Credenciales de la base de datos
$servidor = "localhost";
$usuario_bd = "root";
$contrasena_bd = "";
$base_de_datos = "travelling";

// Datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['password'];

// Crear la conexión a la base de datos
$conexion = new mysqli($servidor, $usuario_bd, $contrasena_bd, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Escapar el email para evitar inyección SQL (mejor aún, utiliza sentencias preparadas)
$email = $conexion->real_escape_string($email);

// Consulta SQL para buscar al usuario por email
$consulta = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = $conexion->query($consulta);

// Verificar si se encontró un usuario con ese email
if ($resultado->num_rows == 1) {
    // Usuario encontrado, obtener los datos
    $fila = $resultado->fetch_assoc();
    $contrasena_hash = $fila['password'];

    // Verificar si la contraseña coincide
    if ($contrasena==$contrasena_hash) {
    
        if ($fila['mode'] == "Admin" ) {
            
            $_SESSION["email"] = $fila['email'];
            $_SESSION["nombre"] = $fila['nombre'];
            $_SESSION["cargo"] = $fila['cargo'];
            $_SESSION["mode"] = $fila['mode'];
    

        // Contraseña correcta, el usuario puede iniciar sesión
        header("location:./inicio.php");}else{
            $_SESSION["email"] = $fila['email'];
            $_SESSION["nombre"] = $fila['nombre'];
            $_SESSION["cargo"] = $fila['cargo'];
            $_SESSION["mode"] = $fila['mode'];
    
            header("location:./inicioT.php");
        }
    } else {
        // Contraseña incorrecta
        header("location:./index.html");
    }
} else {
    // Usuario no encontrado
    echo "Usuario no encontrado.";
    header("location:./index.html");
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>