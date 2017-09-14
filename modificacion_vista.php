<?php require "layout_top.php";?>
<fieldset>
	<legend>Modificar un Usuario</legend>
	<form method="post" action="">
		<?php if($form->tieneErrores()):?>
		<div class="alert alert-danger">
			Se encontraron errores al procesar el formulario.
		</div>
		<?php endif;?>
		<?php foreach($persona as $p):
		$Nnombre = $p->nombre;
		$Napellido = $p->apellido;
		$Nfechnac = $p->fechnac;
		$Nactivo = $p->activo;
		$Nnacionalidad = $p->nacionalidad_id;
		endforeach; ?>
		<?php $tiene_error = $form->tieneError('nombre') ? "has-error" : "";?>
		<div class="form-group <?php echo $tiene_error;?>">
			<label class="control-label" for="nombre">Nombre </label>
			<input type="text" class="form-control" name="nombre" id="nombre" value="<?php if(!empty($p)){echo $Nnombre;} else{echo $form->getValor("nombre");}?>">
			<span class="help-block"><?php echo $form->getError('nombre');?></span>
		</div>

		<?php $tiene_error = $form->tieneError('apellido') ? "has-error" : "";?>
		<div class="form-group <?php echo $tiene_error;?>">
			<label class="control-label" for="apellido">apellido </label>
			<input type="text" class="form-control" name="apellido" id="apellido" value="<?php if(!empty($p)){echo $Napellido;} else{echo $form->getValor("apellido");}?>">
			<span class="help-block"><?php echo $form->getError('apellido');?></span>
		</div>
		
		<?php $tiene_error = $form->tieneError('fecha') ? "has-error" : "";?>
		<div class="form-group <?php echo $tiene_error;?>">
			<label class="control-label" for="fecha">fecha </label>
			<input type="date" class="form-control" name="fecha" id="fecha" value="<?php if(!empty($p)){echo $Nfechnac;} else{echo $form->getValor("fecha");}?>">
			<span class="help-block"><?php echo $form->getError('fecha');?></span>
		</div>

		<?php $tiene_error = $form->tieneError('categoria') ? "has-error" : "";?>
		<div class="form-group <?php echo $tiene_error;?>">
			<label class="control-label" for="categoria">Categoría</label>
			<select class="form-control" name="categoria" id="categoria">
				<option value=""></option> 
				<?php foreach($form->categorias as $key => $item):?>
					<option value="<?php echo $key;?>" <?php if(!empty($p)){if($Nnacionalidad == $key){echo "selected";}} else{echo $form->getSelected('categoria', $key);}?>><?php echo $item;?></option> 
				<?php endforeach;?>
			</select>
			<span class="help-block"><?php echo $form->getError('categoria');?></span>
		</div>

		<?php $tiene_error = $form->tieneError('vigente') ? "has-error" : "";?>
		<div class="<?php echo $tiene_error;?>">
			<div class="checkbox">
			<label>
				<input type="checkbox" name="vigente" id="vigente" value="1" <?php if(!empty($p)){if($Nactivo == 1){echo "checked";}} else{echo $form->getChecked('vigente');}?>>
			Vigente
			</label>
		</div>
		
		
		<p><button type="submit" class="btn btn-primary">Modificar</button></p>
	</form>
	  <a href="inicio.php">Volver al inicio</a>
</fieldset>
<?php require "layout_bottom.php";?>