<?php 

namespace MVC;

class Router{
    public $rutasGet = [];
    public $rutasPost = [];

    public function get($url, $fn){
        $this->rutasGet[$url] = $fn;
    }
    public function post($url, $fn){
        $this->rutasPost[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? NULL;
        $urLogin = '/login';
        $rutasProtegidas = [
            '/admin',
            '/propiedades/actualizar',
            '/propiedades/crear',
            '/propiedades/eliminar',
            '/vendedores/crear',
            '/vendedores/eliminar',
            '/vendedores/actualizar'
            ];
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo == 'GET'){
            $fn = $this->rutasGet[$urlActual] ?? NULL;
            }else{
            $fn = $this->rutasPost[$urlActual] ?? NULL;
        }

        if(in_array($urlActual, $rutasProtegidas) && !$auth){
            header('Location: /public');
        }elseif($urLogin == $urlActual && $auth){
            header('Location: /public/admin');            
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            header('Location: /public/error404');
        }

    }

    public function render($view, $datos = []) {

    foreach($datos as $key => $value){
        $$key = $value;
    }

        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}