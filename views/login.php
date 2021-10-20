<!-- Vendor JS -->
	<script src="views/assets/js/vendors.min.js"></script>
	<script src="views/assets/js/pages/chat-popup.js"></script>
  <script src="views/assets/icons/feather-icons/feather.min.js"></script>
  <script src="views/assets/js/pages/bootstrap-notify.min.js"></script>
<body class="hold-transition theme-primary bg-img" style="background-image: url(views/images/auth-bg/bg-1.jpg)">
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100" style="margin-top: 20%">
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded30 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Plantilla Base</h2>
								<p class="mb-0">Ingresar</p>
							</div>
							<div class="p-40">
								<form method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" class="form-control pl-15 bg-transparent" name="ingUsuario" placeholder="Username">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input type="password" class="form-control pl-15 bg-transparent" name="ingPassword" placeholder="Password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Recuérdame</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-right">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Olvidaste la contraseña?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">Entrar</button>
										</div>
										<!-- /.col -->
									  </div>
									  <?php
									  	$login = new ControladorUsuarios();
									  	$login -> ctrIngresoUsuario();
									  ?>
								</form>
								<div class="text-center">
									<p class="mt-15 mb-0">¿No tienes una cuenta? <a href="auth_register.html" class="text-warning ml-5">Regístrese</a></p>
								</div>
							</div>
						</div>
						<div class="text-center">
						  <p class="mt-20 text-white">- Síguenos -</p>
						  <p class="gap-items-2 mb-20">
							  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
							  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>