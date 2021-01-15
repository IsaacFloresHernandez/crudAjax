<?php 

require_once "Conexion.php";
class Categorias extends conectar{
	public function agregarCategoria($datos){
		$conexion = conectar::conexion();

		$sql = "INSERT INTO t_categorias (id_usuario, nombre) 
		VALUES (?,?)";
		$query = $conexion->prepare($sql);
		$query->bind_param("is", $datos['idUsuario'], 
			$datos['categoria']);
		$respuesta = $query->execute();
		$query->close();

		return $respuesta;
	}

	public function eliminarCategoria($idCategoria){
		$conexion = conectar::conexion();

		$sql = "DELETE FROM t_usuarios 
		WHERE id_usuario = ?";
		$query = $conexion->prepare($sql);
		$query->bind_param('i', $idCategoria);
		$respuesta = $query->execute();
		$query->close();
		return $respuesta;
	}

	public function obtenerCategoria($idCategoria){
		$conexion=conectar::conexion();

		$sql = "SELECT id_usuario,
						nombre,
							apellidos,
							email,
							usuario,
							pass,
							telefono
				FROM t_usuarios 
				WHERE id_usuario = '$idCategoria'";
		$result = mysqli_query($conexion,$sql);

		$categoria = mysqli_fetch_array($result);

		$datos = array(
			"idCategoria" => $categoria['id_usuario'],
            "nombreCategoria"=>$categoria['nombre'],
            "apellidos"=>$categoria['apellidos'],
            "email"=>$categoria['email'],
            "usuario"=>$categoria['usuario'],
            "pass"=>$categoria['pass'],
            "telefono"=>$categoria['telefono']
            
		);
		return $datos;
	}

	public function actualizarCategoria($datos){
		$conexion=conectar::conexion();

		$sql = "UPDATE t_usuarios 
				SET nombre = ?,
                    apellidos= ?,
                    email= ?,
                    usuario= ?,
                    pass= ?,
                    telefono= ? 
				WHERE id_usuario = ?";
		$query = $conexion->prepare($sql);
        $query->bind_param('si', $datos['categoria'],
                                 $datos['apellidos'],
                                 $datos['email'],
                                 $datos['usuario'],
                                 $datos['pass'],
                                 $datos['telefono'],
								 $datos['idCategoria']);
		$respuesta = $query->execute();
		$query->close();
		return $respuesta;
	}
}

?>