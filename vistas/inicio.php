




<?php
	session_start();

	if(isset($_SESSION['usuario'])){
		include "header.php";

require_once "../clases/Conexion.php";
$idUsuario= $_SESSION['idUsuario'];
$conexion= new conectar();
$conexion = $conexion->conexion();

?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaCategoriasDataTable">
		<thead>
			<tr>
				<th style="text-align: center;">Nombre</th>
				<th style="text-align: center;">Apellidos</th>
				<th style="text-align: center;">Correo</th>
				<th style="text-align: center;">Usuario</th>
				<th style="text-align: center;">Password</th>
				<th style="text-align: center;">Telefono</th>
				<th style="text-align: center;">Editar</th>
				<th style="text-align: center;">Eliminar</th>	
			</tr>
		</thead>
		<tbody>

			<?php
				$sql = "SELECT id_usuario,
							nombre,
							apellidos,
							email,
							usuario,
							pass,
							telefono
						FROM t_usuarios 
						";
				$result = mysqli_query($conexion,$sql);

				while($mostrar = mysqli_fetch_array($result)){
					$idCategoria=$mostrar['id_usuario'];
			?>
				<tr>
					<td align="center"><?php echo $mostrar['nombre']; ?></td>
					<td align="center"><?php echo $mostrar['apellidos']; ?></td>
					<td align="center"><?php echo $mostrar['email']; ?></td>
					<td align="center"><?php echo $mostrar['usuario']; ?></td>
					<td align="center"><?php echo $mostrar['pass']; ?></td>
					<td align="center"><?php echo $mostrar['telefono']; ?></td>
					




					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" 
								onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" 
								data-toggle="modal" data-target="#modalActualizarCategoria">
							<span class="fas fa-edit"></span>
						</span>
					</td>

					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" 
								onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
							<span class="fas fa-trash-alt"></span>
						</span>
					</td>
					
				</tr>
			<?php 
				}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>







<?php 
		include "footer.php";
	} else {
		header("location:../index.php");
	}
?>