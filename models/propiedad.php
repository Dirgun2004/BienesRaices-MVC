<?php

namespace Model;

class Propiedad extends activeRecords{

    protected static $tabla = 'propiedades'; 
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagenes', 'descripcion', 'habitaciones', 'WC', 'estacionamiento', 'creado', 'vendedores_id'];

    
    public $id;
    public $titulo;
    public $precio;
    public $imagenes;
    public $descripcion;
    public $habitaciones;
    public $WC;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

        function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagenes = $args['imagen'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->WC = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['idVendedor'] ?? '';
    }

        public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }
        if(!$this->descripcion){
            self::$errores[] = "Debes añadir una descripcion";
        }
        if(!$this->habitaciones){
            self::$errores[] = "Debes añadir un numero de habitaciones";
        }
        if(!$this->WC){
            self::$errores[] = "Debes añadir un numero de baños";
        }
        if(!$this->vendedores_id >= 1){
            self::$errores[] = "Elige un vendedor";
        }
         if(!$this->imagenes){
            self::$errores[] = "Debe subir una imagen";
        }
    
        return self::$errores;
    }
}