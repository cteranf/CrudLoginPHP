
<body>
	<div class="container mx-auto">
		<div class="table">
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>NOMBRE y APELLIDO</th>
							<th>USUARIO</th>
							<th>CONTRASEÑA</th>
							<th><a href="<?php echo base_url() ?>Home/add">AGREGAR</a></th>
						</tr>
						<?php foreach ($usuarios as $lu): ?>
							<tbody>
								<tr>
									<td><?php echo $lu->id; ?></td>
									<td><?php echo  $lu->NOMBRE." ".$lu->APELLIDO; ?></td>
									<td><?php echo  $lu->USUARIO; ?></td>
									<td><?php echo  $lu->CONTRASENA; ?></td>
									<td><a href="<?php echo base_url() ?>Home/edit/<?php echo $lu->id ?>">EDITAR</a>
										<a href="<?php echo base_url() ?>Home/delete/<?php echo $lu->id ?>">ELIMINAR</a>
									</td>
								</tr>
							</tbody>

						<?php endforeach ?>
					</thead>
				</table>
			</div>

		</div>
		
	</div>
</body>
</html>