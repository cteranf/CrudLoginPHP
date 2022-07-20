
<body>
<?php //var_dump(validation_errors()) ?>
	<div class="container mx-auto">
		<form method="POST" action="" >
			<h1>AGREGAR USUARIO</h1>
			<div class="row mt-5">
				<div class="col-6">
					<label class="label">
						NOMBRE
					</label>
					<input type="text" class="form-control form-control-lg" name="nombre">
				</div>
				<div class="col-6">
					<label class="label">
						APELLIDO
					</label>
					<input type="text" class="form-control form-control-lg" name="apellido">
				</div>
			</div>	
			<div class="row mt-3">	
				<div class="col-6">
					<label class="label">
						USUARIO
					</label>
					<input type="email" class="form-control form-control-lg" name="usuario">
				</div>
				<div class="col-6">
					<label class="label">
						CONTRASEÑA
					</label>
					<input type="password" class="form-control form-control-lg" name="contrasena">
				</div>

			</div>
		
			<div class="row mt-5 mx-auto text-center">
				<div class="col-12">
					<input type="submit" value="GUARDAR" class="ps-5 pe-5 btn btn-primary" >
				</div>
			</div>
			<?php if (validation_errors()!=''): ?>
				<div class="alert alert-danger mt-3">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif ?>	
			<?php if($this->session->flashdata('success')) { ?>
				<h5 id="alert_success" class="alert alert-info mt-5" role="alert"><?php echo $this->session->flashdata('success');?></h5>
			<?php } ?>
		</form>
	</div>
</body>
</html>