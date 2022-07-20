
<body>
	<div class="container mx-auto mt-5">

		<form class="form-login" method="POST" action="<?=base_url() ?>auth">
			<div class="row">
				<div class="mb-3">
					<label>Usuario :</label>
					<input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" />
				</div>
				<div class="mb-3">
					<label>Contraseña :</label>
					<input type="password" class="form-control" placeholder="Ingrese su contraseña " name="contrasena" />
				</div>
				<div class="mb-3">
					<input type="submit" class="form-control btn btn-primary"  value="Ingresar..." />
				</div>
				<?php if (validation_errors()!=''): ?>
					
				
				<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
				</div>
				<?php endif ?>
			</div>
		</form>

	</div>	
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>