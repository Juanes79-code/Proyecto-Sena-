<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Rol</title>
    <link rel="stylesheet" href="assets/landing/css/login/login.css">
    <script>
        function validateForm() {
            let nombreRol = document.getElementById('rol_name').value;

            if (nombreRol.trim() === "") {
                alert('Por favor, ingresa un nombre para el rol.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <main class="content">
        <div class="container-fluid p-0">
            <h1>Actualizar Rol</h1>
            <form action="" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="rol_code" id="rol_code" value="<?php echo $rolId->getRolCode(); ?>">
                    <label for="rol_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="rol_name" name="rol_name" value="<?php echo $rolId->getRolName(); ?>">
                </div>      
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </main>
</body>
</html>
  