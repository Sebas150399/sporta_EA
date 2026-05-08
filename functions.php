<?php
function conexion(){
    $conexion = new Mysqli("localhost","root","","login");
    if($conexion->connect_error){
        die("Error de conexión: " . $conexion->connect_error);
    }
    return $conexion;
}
function login($user,$pass){

    $con = conexion();

    $sql = "SELECT * FROM usuarios WHERE usuario='$user'";

    $resultado = $con->query($sql);

    if($resultado->num_rows != 1){
        return "Usuario no encontrado";
    }

    $datos = $resultado->fetch_assoc();

    $contra = hash('sha256', $pass);

    if($datos['contra'] !== $contra){
        return "Contraseña incorrecta";
    }
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $_SESSION['usuario'] = new Usuario(
        $datos['nombre'],
        $datos['rol']
    );

    return true;
}
?>