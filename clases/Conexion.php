<?php 
class conectar{
    public function conexion(){
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $baseDatos = "crudromualdo";
        $conexion = mysqli_connect($servidor, 
            $usuario, 
            $password, 
            $baseDatos);
        return $conexion;
    }
}
?>