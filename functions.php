<?php
function conexion(){
    $conexion = new Mysqli("localhost","root","","login");
    if($conexion->connect_error){
        die("Error de conexión: " . $conexion->connect_error);
    }
    return $conexion;
}
function check_password($user,$pass){
    $con = conexion();
    $contra = hash('sha256', $pass);
    $sql = "SELECT * FROM usuarios WHERE usuario='$user' AND contra='$contra';";
    $resultado = $con->query($sql);
        if($resultado->num_rows == 1){
            return true;
        }else{
            return false;
        }  
}
function check_user($user){
    $con = conexion();
    $sql = "SELECT * FROM usuarios WHERE usuario='$user';";
    $resultado = $con->query($sql);

        if($resultado->num_rows>0){
            return true;
        }else{
            return false;
        }
}
?>