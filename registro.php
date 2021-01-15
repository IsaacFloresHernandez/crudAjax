<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Registro de Usuario</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
					<label>Nombre personal</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">

					<label>Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" required="">

					<label>E-mail o correo</label>
					<input type="email" name="email" id="email" class="form-control" required="">

					<label>Nombre de Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">

					<label>Password o contraeña</label>
					<input type="password" name="pass" id="pass" class="form-control" required="">

					<label>Telefono</label>
					<input type="number" name="telefono" id="telefono" class="form-control" required="">

					
					
					

					




					
					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
							<button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
							<a href="index.php" class="btn btn-success">Login</a>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script src="librerias/js/jquery-3.5.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>

	<script type="text/javascript">


		

		function agregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){
					console.log(respuesta);
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						swal(":(", "FALLO AL AGREGAR", "error");
					}else if (respuesta == 2) {
						swal("NOMBRE DE USUARIO YA EXISTE, POR FAVOR, ESCRIBE OTRO!!!");
					}else {
						$('#frmRegistro')[0].reset();
						swal(":D", "Agregado con exito", "success");
					}
				}
			});

			return false;
		}
	</script>
</body>
</html>
