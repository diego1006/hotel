<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<!-- Button trigger modal -->
			<div class="row">
				<div class="col-lg-1 col-12"></div>
				<div class="col-lg-10 col-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<h4 class="box-title text-primary"><i class="ti-user mr-15"></i> Clientes</h4>
							<button class="btn btn-rounded btn-primary btn-outline pull-right" data-toggle="modal" data-target="#modalCrearCliente">
								<i class="ti-plus"></i> Crear
							</button>
							<hr class="my-15">
							<div class="table-responsive">
								<table id="tablaClientes" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Documento</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Telefono</th>
											<th>Dirección</th>
											<th>Correo</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
	</div>
	</section>
</div>
</div>
<div class="modal fade" id="modalCrearCliente">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="box-title"><i class="ti-user mr-15"></i>Crear cliente</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="crearCliente" method="post" novalidate>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label>Tipo documento <span class="text-danger">*</span></label>
							  <div class="controls">
							  	<select class="form-control" name="tipoDocumento" required data-validation-required-message="Este campo es obligatorio">
							  		<option value="">Seleccione</option>
										<option value="Tarjeta de identidad">Tarjeta de identidad</option>
										<option value="Cedula de ciudadania">Cedula de ciudadania</option>
										<option value="Pasaporte">Pasaporte</option>
										<option value="Registro civil">Registro civil</option>
								  </select>
							  </div>
							</div>
							<div class="form-group">
							  <label>Nombre <span class="text-danger">*</span></label>
							  <div class="controls">
							  	<input type="text" class="form-control" placeholder="Nombre.." name="nombre" required data-validation-required-message="Este campo es obligatorio">
							  </div>
							</div>
							<div class="form-group">
							  <label>Genero</label>
							  <select class="form-control" name="genero">
							  	<option value="">Seleccione</option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
									<option value="Otro">Otro</option>
							  </select>
							</div>
							<div class="form-group">
							  <label>Teléfono <span class="text-danger">*</span></label>
							  <div class="controls">
							  	<input type="text" class="form-control" placeholder="310 588 5555.." required data-validation-required-message="Este campo es obligatorio" name="telefono">
							  </div>
							</div>
							<div class="form-group">
							  <label>Correo</label>
							  <input type="text" class="form-control" placeholder="example@example.com" name="correo">
							</div>
						</div>
						<div class="col-md-6">
		          <div class="form-group">
							  <label>Número documento <span class="text-danger">*</span></label>
							  <div class="controls">
							  	<input type="text" class="form-control" placeholder="documento.." name="documento" required data-validation-required-message="Este campo es obligatorio">
							  </div>
							</div>
							<div class="form-group">
							  <label>Apellido <span class="text-danger">*</span></label>
							  <div class="controls">
							  	<input type="text" class="form-control" name="apellido" placeholder="Apellido.." required data-validation-required-message="Este campo es obligatorio">
							  </div>
							</div>
							<div class="form-group">
								<label for="example-date-input">Fecha de nacimiento</label>
								<input class="form-control" type="date" id="example-date-input" name="fechaNacimiento">
							</div>
							<div class="form-group">
							  <label>Dirección</label>
							  <input type="text" class="form-control" placeholder="Dirección.." name="direccion">
							</div>
							<div class="form-group">
								<label>Tipo de sangre</label>
								<select class="form-control select2" name="tipoSangre" style="width: 100%;">
								  <option value="">Seleccione</option>
								  <option value="A-">A-</option>
								  <option value="A+">A+</option>
								  <option value="AB+">AB+</option>
								  <option value="AB-">AB-</option>
								  <option value="O+">O+</option>
								  <option value="O-">O-</option>
								</select>
						 	</div>
						</div>
					</div>
	        <div id="alerta"></div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-rounded btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-rounded btn-primary float-right" id="btnGuardar">Crear</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script src="views/assets/js/pages/validation.js"></script>
<script src="views/assets/js/pages/form-validation.js"></script>
<script>
	$("#tablaClientes").DataTable({
		"destroy": true,
		"ajax": {
			url: "ajax/clientes.ajax.php",
			method: "POST",
			data: {
				clientes: 0
			}
		},
		"deferRender": true,
		"retrieve": true,
		"processing": true,
		"language": {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
	});

	$('#crearCliente').submit(function (event){
			event.preventDefault();
			if ($('#crearCliente')[0].checkValidity() === false) {
		    event.stopPropagation();
			}else{
				$('#btnGuardar').attr("disabled", "disabled");
				$.ajax({
					url: "ajax/clientes.ajax.php",
					method: "POST",
					data: new FormData($('#crearCliente')[0]),
					cache: false,
					contentType: false,
					processData: false,
					success: function (respuesta) {
						if (respuesta == "ok"){
							$('#crearCliente')[0].reset();
							$('#btnGuardar').removeAttr("disabled");
                     $("#tablaClientes").DataTable().ajax.reload();
							swal({
								title: "Éxito!",
								text: "El cliente se ha creado con éxito",
								type: "success",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							});
						} else {
							$('#btnGuardar').removeAttr("disabled");
							swal({
								title: "¡Oops...😬!",
								text: "¡Algo salió mal: " + respuesta,
								type: "warning",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
							});
						}
					}
				})
			}
			// $('#crear_asesoria').addClass('was-validated');
	});
	function eliminar(id) {
	  swal({
      title: '¿Está seguro de eliminar el cliente?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Eliminar!'
	  }, function() {
      $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: {
          eliminar: id
        },
        dataType: "json",
        success: function(respuesta) {
          if (respuesta == "ok") {
						$.toast({
		            heading: '¡Exito!',
		            text: 'El cliente se ha eliminado correctamente	',
		            position: 'top-right',
		            loaderBg: '#ff6849',
		            icon: 'success',
		            hideAfter: 3500,
		            stack: 6
		        });
            setTimeout(function(){ $("#tablaClientes").DataTable().ajax.reload(); }, 1000);
          }
        }
      })
	  })
	}
</script>
