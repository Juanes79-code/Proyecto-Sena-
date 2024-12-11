<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- <link rel="stylesheet" href="assets/landing/css/login/login.css"> -->
    <script>
        function validateForm() {
            let correo = document.getElementById('username').value;
            let contrasena = document.getElementById('password').value;

            if (!correo.includes('@')) {
                alert('Por favor, ingresa un correo electrónico válido.');
                return false;
            }

            if (contrasena.length < 8) {
                alert('La contraseña debe tener al menos 6 caracteres.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form action="" method="POST" class="login-form" onsubmit="return validateForm()">
            <label for="username">Correo:</label>
            <input type="email" id="username" name="correo_user" placeholder="Ingresa tu correo" required>
            
            <label for="password">Contraseña: con min 8 caracteres</label>
            <input type="password" id="password" name="pass_user" placeholder="Ingresa tu contraseña" required>
            
            <button type="submit">Ingresar</button>
        </form>
        <p class="register-link">
            ¿Deseas volver oprime aqui? <a href="?">Volver al inicio</a>.
        </p>
    </div>
</body>
</html>
