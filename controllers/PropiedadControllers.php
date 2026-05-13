<?php

namespace Controllers;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;

class PropiedadControllers{

    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedores::all();
        $registro = null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'registro' => $registro

        ]);
    }
    public static function crear(Router $router) {
        $propiedad = new Propiedad;
        $vendedores = Vendedores::all();
        $errores =  [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $propiedad = new Propiedad($_POST['propiedad']);
            
            // CREAR NOMBRE UNICO DE IMAGEN
            $nombreImagen = md5( uniqid( rand(),  true))  . ".jpg";  
            
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
                $propiedad->setImage($nombreImagen);
            }
                
            $errores = $propiedad->validar();  

            // Ejecutar consulta sin errores
            
            if(empty($errores)){

                // CREA CARPETAS
                
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                chmod(CARPETA_IMAGENES, 0777);

                $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarRedireccionar('/public/admin');
        $vendedores = Vendedores::all();
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);
            // Ejecutar consulta sin errores

            $errores = $propiedad->validar();

            $nombreImagen = md5( uniqid( rand(),  true))  . ".jpg";  

            if($_FILES['propiedad']['tmp_name']['imagen']){
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
                $propiedad->setImage($nombreImagen);
            }

            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }
        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    if($tipo === 'propiedad'){
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();
                    }
                }
            }
        }
    }
}