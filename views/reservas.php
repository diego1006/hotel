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
								<h4 class="box-title text-primary"><i class="ti-layout mr-15"></i> Reservas</h4>
									<button class="btn btn-rounded btn-primary btn-outline pull-right" data-toggle="modal" data-target="#modalCrearHabitacion">
									  <i class="ti-plus"></i> Crear
									</button>
								<hr class="my-15">
								<div class="table-responsive">
								  <table id="tablaHabitaciones" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th>Piso</th>
											<th>Tipo</th>
											<th>Precio</th>
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
<div class="modal fade" id="modalCrearHabitacion">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
			<h4 class="box-title"><i class="ti-layout mr-15"></i>Crear habitación</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  	<span aria-hidden="true">&times;</span>
			</button>
	  </div>
	  <form id="crearHabitacion" method="post" novalidate>
	  	<div class="modal-body">
	  		<div class="row">
	  			<div class="col-md-6">
	  				<div class="form-group">
						  <label>Nombre <span class="text-danger">*</span></label>
						  <div class="controls">
						  	<input type="text" class="form-control" placeholder="Nombre.." name="nombre" required data-validation-required-message="Este campo es obligatorio">
						  </div>
						</div>
						<div class="form-group">
						  <label>Piso <span class="text-danger">*</span></label>
						  <div class="controls">
						  	<select class="form-control" name="piso" id="pisos" required data-validation-required-message="Este campo es obligatorio">
							  </select>
						  </div>
						</div>
						<div class="form-group">
						  <label>Tipo <span class="text-danger">*</span></label>
						  <div class="controls">
						  	<select class="form-control" name="tipo"  required data-validation-required-message="Este campo es obligatorio">
						  		<option value="">Seleccione </option>
						  		<option value="Sencilla">Sencilla</option>
						  		<option value="Doble">Doble</option>
						  		<option value="Multiple">Múltiple</option>
							  </select>
						  </div>
						</div>
						<div class="form-group">
							<h5>Ventilacion </h5>
							<div class="controls">
								<fieldset>
									<input type="checkbox" id="checkbox_1" value="1" name="ventilador">
									<label for="checkbox_1">Ventilador</label>
								</fieldset>
								<fieldset>
									<input type="checkbox" id="checkbox_2" value="1" name="aire">
									<label for="checkbox_2">Aire</label>
								</fieldset>
							</div>
						</div>
	  			</div>
	  			<div class="col-md-6">
	  				<div class="form-group">
						  <label>Camas dobles </label>
						  <div class="controls">
						  	<input type="text" class="form-control" placeholder="camas dobles.." name="camasDobles">
						  </div>
						</div>
						<div class="form-group">
						  <label>Camas sencillas </label>
						  <div class="controls">
						  	<input type="text" class="form-control" placeholder="camas sencillas.." name="camasSencillas">
						  </div>
						</div>
						<div class="form-group">
						  <label>Capacidad </label>
						  <div class="controls">
						  	<input type="text" class="form-control" placeholder="capacidad.." name="capacidad">
						  </div>
						</div>
						<div class="form-group">
							<h5>Adiciones <span class="text-danger">*</span></h5>
							<div class="controls">
								<fieldset>
									<input type="checkbox" id="checkbox_3" value="1" name="tv">
									<label for="checkbox_3">Tv</label>
								</fieldset>
								<fieldset>
									<input type="checkbox" id="checkbox_4" value="1" name="nevera">
									<label for="checkbox_4">Nevera</label>
								</fieldset>
							</div>
						</div>
	  			</div>
	  		</div>
	  		<div class="form-group">
				  <label>Precio <span class="text-danger">*</span></label>
				  <div class="controls">
				  	<input type="text" class="form-control" placeholder="Precio.." name="precio" required data-validation-required-message="Este campo es obligatorio">
				  </div>
				</div>
	  	</div>
	  	<div class="modal-footer">
				<button type="submit" class="btn btn-danger" data-dismiss="modal">Cerrar </button>
				<button type="submit" class="btn btn-primary float-right" id="btnGuardar">Crear </button>
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
  $("#tablaHabitaciones").DataTable({
      "destroy": true,
      "ajax": {
          url: "ajax/habitaciones.ajax.php",
          method: "POST",
          data: {
            habitaciones: 0
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

  $('#crearHabitacion').submit(function (event){
			event.preventDefault();
			if ($('#crearHabitacion')[0].checkValidity() === false) {
		    event.stopPropagation();
			}else{
				$('#btnGuardar').attr("disabled", "disabled");
				$.ajax({
					url: "ajax/habitaciones.ajax.php",
					method: "POST",
					data: new FormData($('#crearHabitacion')[0]),
					cache: false,
					contentType: false,
					processData: false,
					success: function (respuesta) {
						if (respuesta == "ok"){
							$('#crearHabitacion')[0].reset();
							$('#btnGuardar').removeAttr("disabled");
							$("#tablaHabitaciones").DataTable().ajax.reload();
							swal({
								title: "Éxito!",
								text: "La habitación se ha creado con éxito",
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
	$(document).ready(function () {
		$.ajax({
	    url: "ajax/habitaciones.ajax.php",
	    method: "POST",
	    data: {
	      pisos: 0
	    },
	    dataType: "json",
	    success: function (respuesta) {
	    	console.log(respuesta)
	      $("#pisos").children().remove()
	      $("#pisos").append("<option value=''>Seleccione el piso</option>")
	      respuesta.forEach(function (element, index) {
	        $("#pisos").append("<option  value='" + element.pis_id + "'>" + element.pis_nombre +"</option>")
	      })
	    }
	  })
	})
	function eliminar(id) {
	  swal({
      title: '¿Está seguro de eliminar la habitación?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Eliminar!'
	  }, function() {
      $.ajax({
        url: "ajax/habitaciones.ajax.php",
        method: "POST",
        data: {
          eliminar: id
        },
        dataType: "json",
        success: function(respuesta) {
          if (respuesta == "ok") {
						$.toast({
	            heading: '¡Exito!',
	            text: 'La habitación se ha eliminado correctamente	',
	            position: 'top-right',
	            loaderBg: '#ff6849',
	            icon: 'success',
	            hideAfter: 3500,
	            stack: 6
		        });
            setTimeout(function(){ $("#tablaHabitaciones").DataTable().ajax.reload();; }, 1000);
          }
        }
      })
	  })
	}
</script>
