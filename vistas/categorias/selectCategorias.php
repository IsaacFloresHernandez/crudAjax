<?php 

	session_start();
	require_once "../../clases/Conexion.php";
	$c = new conectar();
	$conexion = $c->conexion();
	
	$idUsuario = $_SESSION['idUsuario'];
	$sql = "SELECT id_usuario,
					nombre,
					apellidos,
					email,
					usuario,
					pass,
					telefono 
			FROM t_usuarios 
			WHERE id_usuario = '$idUsuario'";
	$result = mysqli_query($conexion, $sql);
 ?>


 <select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
 	<?php 
 		while ($mostrar = mysqli_fetch_array($result)) {
 		$idCategoria = $mostrar['id_usuario'];
 	?>
 		<option value="<?php echo $idCategoria ?>"><?php echo $mostrar['nombre']; ?></option>
 	<?php 
 		}
 	 ?>
 </select>