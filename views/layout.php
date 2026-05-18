<?php 
if(!isset($_SESSION)){
session_start();
}
$auth = $_SESSION['login'] ?? false;

if(!isset($inicio)){
    $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Document</title>
</head>
<body>
<div class="espacio-footer">
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="">
                    <img src="build/img/logo.svg" alt="Logo">
                </a>
                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="Boton de desplegar menu">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg" alt="boton modo oscuro">

                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth) : ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php endif; ?>    
                    </nav>
                </div>
            </div>
            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : ''; ?>
        </div>
    </header>

    <?php echo $contenido; ?>
  
    <?php $fecha = date('Y'); ?>

<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo $fecha; ?> &copy;</p>
    </footer>
</div>
    <script src="build/js/bundle.min.js"></script>
</body>
</html>