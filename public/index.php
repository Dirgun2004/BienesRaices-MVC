<?php

require_once __DIR__ . "/../includes/app.php";

use Controllers\LoginControllers;
use Controllers\PaginasControllers;
use MVC\Router;
use Controllers\PropiedadControllers;
use Controllers\VendedoresControllers;

$router = new Router;

$router->get('/admin', [PropiedadControllers::class, 'index']);
$router->get('/propiedades/crear', [PropiedadControllers::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadControllers::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadControllers::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadControllers::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadControllers::class, 'eliminar']);

// VENDEDORES

$router->get('/vendedores/crear', [VendedoresControllers::class, 'crear']);
$router->post('/vendedores/crear', [VendedoresControllers::class, 'crear']);
$router->post('/vendedores/eliminar', [VendedoresControllers::class, 'eliminar']);
$router->get('/vendedores/actualizar', [VendedoresControllers::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedoresControllers::class, 'actualizar']);

// PAGINAS PUBLICAS

$router->get('/', [PaginasControllers::class, 'index']);
$router->get('/nosotros', [PaginasControllers::class, 'nosotros']);
$router->get('/propiedades', [PaginasControllers::class, 'propiedades']);
$router->get('/propiedad', [PaginasControllers::class, 'propiedad']);
$router->get('/entrada', [PaginasControllers::class, 'entrada']);
$router->get('/blog', [PaginasControllers::class, 'blog']);
$router->get('/contacto', [PaginasControllers::class, 'contacto']);
$router->post('/contacto', [PaginasControllers::class, 'contacto']);
$router->get('/error404', [PaginasControllers::class, 'error404']);

// LOGIN

$router->get('/login', [LoginControllers::class, 'login']);
$router->post('/login', [LoginControllers::class, 'login']);
$router->get('/logout', [LoginControllers::class, 'logout']);

$router->comprobarRutas();