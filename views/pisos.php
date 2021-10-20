<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
			<!-- Button trigger modal -->
			<div class="row">
				<div class="col-lg-2 col-12"></div>
				<div class="col-lg-8 col-12">
				  <div class="box">
						<!-- /.box-header -->
							<div class="box-body">
								<h4 class="box-title text-primary"><i class="ti-direction-alt mr-15"></i> Pisos</h4>
									<button class="btn btn-rounded btn-primary btn-outline pull-right" data-toggle="modal" data-target="#modalCrearPiso">
									  <i class="ti-plus"></i> Crear
									</button>
								<hr class="my-15">
								<div class="table-responsive">
								  <table id="tablaPisos" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
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
				<div class="col-lg-2 col-12"></div>
			</div>
		</section>
	</div>
</div>

<div class="modal fade" id="modalCrearPiso">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
			<h4 class="box-title"><i class="ti-user mr-15"></i>Crear piso</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  	<span aria-hidden="true">&times;</span>
			</button>
	  </div>
	  <form id="crearPiso" method="post" novalidate>
	  	<div class="modal-body">
	  		<div class="form-group">
				  <label>Nombre <span class="text-danger">*</span></label>
				  <div class="controls">
				  	<input type="text" class="form-control" placeholder="Nombre.." name="nombre" required data-validation-required-message="Este campo es obligatorio">
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
  $("#tablaPisos").DataTable({
      "destroy": true,
      "ajax": {
          url: "ajax/pisos.ajax.php",
          method: "POST",
          data: {
            pisos: 0
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

  $('#crearPiso').submit(function (event){
		event.preventDefault();
		if ($('#crearPiso')[0].checkValidity() === false) {
	    event.stopPropagation();
		}else{
			$('#btnGuardar').attr("disabled", "disabled");
			$.ajax({
				url: "ajax/pisos.ajax.php",
				method: "POST",
				data: new FormData($('#crearPiso')[0]),
				cache: false,
				contentType: false,
				processData: false,
				success: function (respuesta) {
					if (respuesta == "ok"){
						$('#crearPiso')[0].reset();
						$('#btnGuardar').removeAttr("disabled");
						$("#tablaPisos").DataTable().ajax.reload();
						swal({
							title: "Éxito!",
							text: "El piso se ha creado con éxito",
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
	});
	function eliminar(id) {
	  swal({
      title: '¿Está seguro de eliminar el piso?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, Eliminar!'
	  }, function() {
      $.ajax({
        url: "ajax/pisos.ajax.php",
        method: "POST",
        data: {
          eliminar: id
        },
        dataType: "json",
        success: function(respuesta) {
          if (respuesta == "ok") {
						$.toast({
	            heading: '¡Exito!',
	            text: 'El piso se ha eliminado correctamente	',
	            position: 'top-right',
	            loaderBg: '#ff6849',
	            icon: 'success',
	            hideAfter: 3500,
	            stack: 6
		        });
            setTimeout(function(){ $("#tablaPisos").DataTable().ajax.reload();; }, 1000);
          }
        }
      })
	  })
	}
</script>