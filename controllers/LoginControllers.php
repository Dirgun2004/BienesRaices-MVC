<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginControllers{
    public static function login(Router $router){
    $errores = Admin::getErrores();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $auth = new Admin($_POST);

        $errores = $auth->validar();

        if(empty($errores)){
            $resultado = $auth->existeUsuario();

            if(!$resultado){
                $errores = Admin::getErrores();
            }else{
                $autenticado = $auth->comprobarPass($resultado);

                if($autenticado){
                    $auth->autenticado();
                }else{
                    $errores = Admin::getErrores();
                }
            }
        }
    }

    $router->render('auth/login', [
        'errores' => $errores
    ]);

    }
    public static function logout(){
        session_start();

        $_SESSION = [];

        header('Location: /public');
    }


}