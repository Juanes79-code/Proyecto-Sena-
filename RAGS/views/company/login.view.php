<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/landing/css/login/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form action="" method="POST" class="login-form">
            <label for="username">Correo:</label>
            <input type="email" id="username" name="correo_user" placeholder="Ingresa tu correo" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="pass_user" placeholder="Ingresa tu contraseña" required>
            
            <button type="submit">Ingresar</button>
        </form>
        <p class="register-link">
            ¿No tienes una cuenta? <a href="register.html">Regístrate aquí</a>.
        </p>
    </div>
</body>
</html>
