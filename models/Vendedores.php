<?php

namespace Model;

class Vendedores extends activeRecords{

    protected static $tabla = 'vendedores'; 
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

        function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "es obligatorio el nombre";
        }
        if(!$this->apellido){
            self::$errores[] = "es obligatorio el apellido";
        }
        if(!$this->telefono){
            self::$errores[] = "es obligatorio el número telefono";
        }elseif(!preg_match(' /[0-9]{9}/', $this->telefono)){
            self::$errores[] = "es incorrecto el formato del número de telefono";
        }

        return self::$errores;
    }
}