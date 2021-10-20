 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <!-- Validation wizard -->
		  <div class="row">
				<div class="col-lg-2 col-12"></div>
				<div class="col-lg-8 col-12">
						<div class="box box-default">
							<div class="box-header with-border">
							  <h4 class="box-title">Configuración</h4>
							  <h6 class="box-subtitle">Regístrate y revisa la información de tu empresa</h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body wizard-content">
								<form action="#" class="validation-wizard wizard-circle">
									<!-- Step 1 -->
									<h6>Información del cliente</h6>
									<section>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="wfirstName2"> Nombres : <span class="danger">*</span></label>
													<input type="text" class="form-control required" id="wfirstName2" name="firstName"> </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="wlastName2"> Apellidos : <span class="danger">*</span></label>
													<input type="text" class="form-control required" id="wlastName2" name="lastName"> </div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="wemailAddress2"> Correo : <span class="danger">*</span></label>
													<input type="email" class="form-control required" id="wemailAddress2" name="emailAddress"> </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="wphoneNumber2"> Teléfono :</label>
													<input type="tel" class="form-control" id="wphoneNumber2"> </div>
											</div>
										</div>
									</section>
									<!-- Step 2 -->
									<h6>Información de la empresa</h6>
									<section>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="jobTitle3">Nombre :</label>
													<input type="text" class="form-control required" id="jobTitle3">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="webUrl3">URL empresa :</label>
													<input type="url" class="form-control required" id="webUrl3" name="webUrl3"> </div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="jobTitle3">Teléfono :</label>
													<input type="text" class="form-control required" id="jobTitle3">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="webUrl3">Celular :</label>
													<input type="url" class="form-control required" id="webUrl3" name="webUrl3"> </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="wphoneNumber2"> NIT :</label>
													<input type="tel" class="form-control" id="wphoneNumber2"> </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="wphoneNumber2"> Dirección :</label>
													<input type="tel" class="form-control" id="wphoneNumber2"> </div>
											</div>
										</div>
									</section>
									<!-- Step 3 -->
									<h6>Configuración de facturación</h6>
									<section>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="wint1">Consecutivo factura :</label>
														<input type="text" class="form-control required" id="wint1">
												</div>
												<div class="form-group">
													<label for="wintType1">Responsabilidad tributaria :</label>
													<select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1">
														<option value="Banquet">No responsable del IVA</option>
														<option value="Fund Raiser">Responsable del IVA</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="wint1">Préfijo :</label>
														<input type="text" class="form-control required" id="wint1">
												</div>
												<div class="form-group">
													<label for="wLocation1">Términos de pago :</label>
													<select class="custom-select form-control required" id="wLocation1" name="wlocation">
														<option value="">Contado</option>
														<option value="India">Crédito</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="decisions2">Términos y condiciones</label>
													<textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
												</div>
											</div>
										</div>
									</section>
									<!-- Step 4 -->
									<h6>Finalizar</h6>
									<section>
										<!-- <div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="behName3">Behaviour :</label>
													<input type="text" class="form-control required" id="behName3">
												</div>
												<div class="form-group">
													<label for="participants3">Confidance</label>
													<input type="text" class="form-control required" id="participants3">
												</div>
												<div class="form-group">
													<label for="participants4">Result</label>
													<select class="custom-select form-control required" id="participants4" name="location">
														<option value="">Select Result</option>
														<option value="Selected">Selected</option>
														<option value="Rejected">Rejected</option>
														<option value="Call Second-time">Call Second-time</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="decisions2">Comments</label>
													<textarea name="decisions" id="decisions2" rows="4" class="form-control"></textarea>
												</div>
												<div class="form-group">
													<label>Rate Interviwer :</label>
													<div class="c-inputs-stacked">
														<input type="checkbox" id="checkbox_6">
														<label for="checkbox_6" class="d-block">1 star</label>
														<input type="checkbox" id="checkbox_7">
														<label for="checkbox_7" class="d-block">2 star</label>
														<input type="checkbox" id="checkbox_8">
														<label for="checkbox_8" class="d-block">3 star</label>
														<input type="checkbox" id="checkbox_9">
														<label for="checkbox_9" class="d-block">4 star</label>
														<input type="checkbox" id="checkbox_10">
														<label for="checkbox_10" class="d-block">5 star</label>
													</div>
												</div>
											</div>
										</div> -->
									</section>
								</form>
							</div>
							<!-- /.box-body -->
						  </div>
						  <!-- /.box -->
				</div>
				<div class="col-lg-2 col-12"></div>
		  </div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

   <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; 2020 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar">

	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>
			<p>Users</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="views/assets/js/pages/steps.js"></script>