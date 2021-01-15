function agregarCategoria(){
	var categoria = $('#nombreCategoria').val();

	if (categoria == "") {
		swal("Debes de agregar una categoria");
		return false;
	} else{
		$.ajax({
			type: "POST",
			data: "categoria="+ categoria,
			url: "../procesos/categorias/agregarCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();
				if (respuesta == 1) {
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					$('#nombreCategoria').val("");
					swal(":D","Agregado con exito","success");
				} else {
					swal(":(","Fallo al algregar","error");
				}
			}
		});
	}
}

function eliminarCategorias(idCategoria){
	idCategoria = parseInt(idCategoria);
	if (idCategoria < 1) {
		swal("No tienes id de categoria");
		return false;
	} else{
		//*******************************************************
		swal({
			title: "¿Estas seguro de eliminar esta categoria?",
			text: "Una vez eliminada, no se podra recuperarse!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type:"POST",
					data:"idCategoria=" + idCategoria,
					url:"../procesos/categorias/eliminarCtegoria.php",
					success:function(respuesta){
						respuesta = respuesta.trim();
						if (respuesta ==1) {
							$('#tablaCategorias').load("../inicio.php");
							swal("Eliminado con exito!", {
								icon: "success",
							});
						} else{
							swal(":(","Error al eliminar","error");
						}
					}
				});
			} 
		});
		//*******************************************************
	}
}

function obtenerDatosCategoria(idCategoria){
	$.ajax({
        type:"POST",
        data:"idCategoria=" + idCategoria,
        url:"../procesos/categorias/obtenerCategoria.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);

			$('#id_usuario').val(respuesta['idCategoria']);
			$('#nombre').val(respuesta['nombre']);
			$('#apellidos').val(respuesta['apellidos']);
			$('#email').val(respuesta['email']);
			$('#usuario').val(respuesta['usuario']);
			$('#pass').val(respuesta['pass']);
			$('#telefono').val(respuesta['telefono']);
        }
    });
}

function actualizaCategoria(){
	if ($('#categoriaU').val() ==  "") {
		swal("No hay categoria");
		return false;
	}else{
		$.ajax({
			type: "POST",
			data: $('#frmActualizaCategoria').serialize(),
			url: "../procesos/categorias/actualizaCategoria.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				if (respuesta == 1) {
					$('#tablaCategorias').load("categorias/tablaCategoria.php");
					$('#btnCerrarUpdateCategoria').click();
					swal(":D","Actualizado con exito","success");
				}else {
					swal(":(","Error al Actualizar","error");
				}
			}
		});
	}
}