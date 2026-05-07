<?php
include "functions.php";

abstract class Persona{
    
    protected $nombre,$apellido,$localidad,$email,$celular,$dni;

    #region Getters
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function getDni(){
        return $this->dni;
    }
    #endregion
    #region Setters
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setCelular($celular){
        $this->celular = $celular;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    #endregion

    }

class Usuario extends Persona{
    
    private $usuario, $rol, $direccion, $localidad;

    public function __construct($nombre,$apellido,$email,$celular,$dni,$usuario,$rol,$direccion,$localidad){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->celular = $celular;
        $this->dni = $dni;
        $this->usuario = $usuario;
        $this->rol = $rol;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
    
    }

    public static function iniciarSesion($usuario,$pass){
        if(!check_user($usuario)){
            return "<script>alert('Usuario no encontrado')</script>";
        }
        if(!check_password($usuario,$pass)){
            return "<script>alert('Contraseña incorrecta')</script>";
        }
        $roles = [
            'admin' => 'admin.php',
            'empleado' => 'empleado.php'
        ];

        $rol = $_SESSION['usuario']->getRol();

        if (isset($roles[$rol])) {
            header("Location: {$roles[$rol]}");
            exit;
        }else{
            return "<script>alert('Error en roles')</script>";
        }
    }

}
?>