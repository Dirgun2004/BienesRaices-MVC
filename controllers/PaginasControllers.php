<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasControllers{
    public static function index(Router $router){
        $inicio = true;
        $propiedades = Propiedad::get(3);
        $router->render('paginas/index', [
            'inicio' => $inicio,
            'propiedades' => $propiedades
        ]);
    }
    
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', [

        ]);
    }
    
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);

    }
    
    public static function propiedad(Router $router){
        $id = validarRedireccionar('/public/propiedades');
        $propiedades = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedades
        ]);
    }
    
    public static function entrada(Router $router){
        $router->render('paginas/entrada', [
            
        ]);
    }
    
    public static function blog(Router $router){
        $router->render('paginas/blog', [
            
        ]);
    }
    
    public static function contacto(Router $router){
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $respuestas = $_POST['contacto'];

            // Instancia de PHPMailer
            $mail = new PHPMailer();

            // Configuracion de Instancia
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'e47c013d4f9168';
            $mail->Password = 'dc235c69b4524f';
            $mail->SMTPSecure = 'tls';

            // Configurar Contenido del Email

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Nueva Propiedad para Publicar';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Contenido Email
            $contenido = '<html>';
            $contenido .= '<h1>' . $respuestas['nombre'] .' te quiere contactar</h1>';
            $contenido .= '<p>Informacion de contacto: </p>';
            $contenido .= '<p>Deseo ser contactado por ';

            if($respuestas['contacto'] === 'email'){
                $contenido .= 'correo: ' . ($respuestas['correo']) . '</p>';

            }else{
                $contenido .= 'telefono: ' . ($respuestas['telefono']) . '</p>';

                $contenido .= '<p>Fecha de contacto: </p>' . ($respuestas['fecha']) . ' a las ' . ($respuestas['hora']);

            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Deseo realizar una: ' . ($respuestas['tipo'] == 2 ? 'compra' : 'venta') . '</p>';
            $contenido .= '<p>Precio o presupuesto: ' . $respuestas['precio'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Este es un mensaje pero sin html';

            if($mail->send()){
                $mensaje = 'Mensaje enviado correctamente';
            }else{
                $mensaje = 'Error al enviar';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

        public static function error404(Router $router){
        $router->render('paginas/error_404', [

        ]);
    }
    
    }