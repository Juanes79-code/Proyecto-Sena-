<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Rol</title>
    <link rel="stylesheet" href="assets/landing/css/login/login.css">
    <script>
        function validateForm() {
            let nombreRol = document.getElementById('rolCode').value;

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
            <h1 class="h3 mb-3"><strong>Registrar</strong> Rol</h1>
            <form action="" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="rolCode" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="rolCode" name="nombreRol">
                </div>      
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
