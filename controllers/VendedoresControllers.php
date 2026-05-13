<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedores;

class VendedoresControllers{

    public static function crear(Router $router){
        $vendedor = new Vendedores;
        $errores = Vendedores::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor = new Vendedores($_POST['vendedor']);

            $errores = $vendedor->validar();
            
            if(empty($errores)){
                $vendedor->guardar();
            }
        }


        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarRedireccionar('public/admin');
        $vendedor = Vendedores::find($id);
        $errores = Vendedores::getErrores();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $args = $_POST['vendedor'];

            $vendedor->sincronizar($args);
            
            $vendedor->validar();

            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $tipo = $_POST['tipo'];
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($tipo === 'vendedor'){
                $vendedores = Vendedores::find($id);
                $vendedores->eliminar();
            }
        }
    }
}