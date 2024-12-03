<h1>Actualizar Rol</h1>
    <form action="" method="POST">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="rol_code" id="rol_code" value="<?php echo $rolId->getRolCode();?>">
        <label for="rol_name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="rol_name" name="rol_name" value="<?php echo $rolId->getRolName();?>">
    </div>      
    <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>