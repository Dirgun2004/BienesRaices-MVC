<?php 
define('TEMPLATES_URL', __DIR__ . '/template');
define('FUNCIONES_URL', 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/public/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/$nombre.php";
};

function estaAutenticado(){
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
}

function verArray($propiedad){
    echo '<pre>';
    var_dump($propiedad);
    echo '</pre>';
    exit;
}

function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;

}

function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarAlerta($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'registro exitoso';
        break;
        case 2:
            $mensaje = 'actualizado correctamente';
        break;
        case 3:
            $mensaje = 'eliminado correctamente';
        break;
        default:
            $mensaje = false;
        break;
    }

    return $mensaje;
}

function validarRedireccionar( string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: $url");
    }

    return $id;
}