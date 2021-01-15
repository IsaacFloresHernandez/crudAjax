<?php

require_once "../../../clases/Usuario.php";

$fechaNacimiento = explode("-", $_POST['fechaNacimiento']);
$fechaNacimiento = $fechaNacimiento[2]."-".$fechaNacimiento[1]."-".$fechaNacimiento[0];
$password = $_POST['pass'];
$datos    = array(
	"id_usuario" => $_POST['id_usuario'],
            "nombre"=>$_POST['nombre'],
            "apellidos"=>$_POST['apellidos'],
            "correo"=>$_POST['email'],
            "usuario"=>$_POST['usuario'],
            "pass"=>$_POST['pass'],
            "telefono"=>$_POST['telefono']
            
		);

$usuario = new Usuario();
echo $usuario->agregarUsuario($datos);
?>