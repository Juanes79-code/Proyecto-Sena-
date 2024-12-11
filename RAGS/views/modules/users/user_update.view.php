
    <main class="content">
				<div class="container-fluid p-0">
        <h1>Actualizar Usuario</h1>
    <form action="" method="POST">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="codigo_user" id="rol_code" value="<?php echo $userId->getCodigoUser();?>">
        <label for="rol_name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="rol_name" name="nombres_user" value="<?php echo $userId->getNombreUser();?>">
        <label for="rol_name" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="rol_name" name="last_name_user" value="<?php echo $userId->getLastNameUser();?>">
        <label for="rol_name" class="form-label">Rol</label>
        <input type="text" class="form-control" id="rol_name" name="nombre_rol" value="<?php echo $userId->getRolName();?>">
        <label for="rol_name" class="form-label">Cedula</label>
        <input type="text" class="form-control" id="rol_name" name="cedula_user" value="<?php echo $userId->getCedulaUser();?>">
        <input type="hidden" class="form-control" name="correo_user" id="rol_code" value="<?php echo $userId->getCorreoUser();?>">
        <input type="hidden" class="form-control" name="pass_user" id="rol_code" value="<?php echo $userId->getPassUser();?>">
        <label for="rol_name" class="form-label">Fecha</label>
        <input type="text" class="form-control" id="rol_name" name="fecha_ingreso" value="<?php echo $userId->getfechaIngreso();?>">
        <label for="rol_name" class="form-label">Hora de entrada</label>
        <input type="text" class="form-control" id="rol_name" name="hora_entrada_ingreso" value="<?php echo $userId->getentradaIngreso();?>">
        <label for="rol_name" class="form-label">Hora de entrada</label>
        <input type="text" class="form-control" id="rol_name" name="hora_salida_ingreso" value="<?php echo $userId->getsalidaIngreso();?>">
    </div>      
    <button type="submit" class="btn btn-primary">Actualizar</button>
    </form> 
        
       
				</div>
			</main>         