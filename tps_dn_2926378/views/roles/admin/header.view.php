<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control </title>
    <!-- Estilos -->
    <!-- <link rel="shortcut icon" href="img/css.png"> -->
    <link rel="stylesheet" href="assets/dashboard/css/all.css">
    <link rel="stylesheet" href="assets/dashboard/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dashboard/css/styles.css">    
</head>
<body>    
    <!-- Contenedor -->
    <div class="container">        
        <!-- Navegador -->        
        <nav class="row border">
            <div class="col-12 p-3">
                <a href="?c=Logout">Cerrar Sesión</a>
            </div>
        </nav>
        <section class="row">
            <!-- Panel Lateral -->
            <aside class="col-3 border">
                <h2>Usuarios</h2>
                <div>
                    <a href="?c=Users&a=rolCreate">Registrar Rol</a>
                </div>
                <div>
                    <a href="?c=Users&a=rolRead">Consultar Roles</a>
                </div>
                <div>
                    <a href="?c=Users&a=userCreate">Registrar Usuario</a>
                </div>
                <div>
                    <a href="?c=Users&a=userRead">Consultar Usuarios</a>
                </div>
                
            </aside>
            <!-- Área Principal -->
            <main class="col-9 border">