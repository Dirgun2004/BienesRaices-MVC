<?php

namespace Model;

class activeRecords{

    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = ""; 

    //ERRORES VALIDACION
    protected static $errores = [];

    // BASE DE DATOS
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if(isset($this->id)){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    // INSERTAR SQL
    public function crear(){
        // Sanitizar
        $atributos = $this->sanitizarAtributos();

        //Insertar en base de datos

        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= "')";
        $resultado = self::$db->query($query);

        if($resultado){
            header('Location: /public/admin?registro=1');
        }
    }

    public function actualizar(){
       // Sanitizar
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key=>$value){
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(", ", $valores); 
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "'";
        $query .= " LIMIT 1 ";
        
        $resultado = self::$db->query($query);
        
        if($resultado){
            header('Location: /public/admin?registro=2');
        }

    }

    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);


        if($resultado){
            $this->borrarImagen();
            header('Location: /public/admin?registro=3');
        }
    }

    //SANITIZAR LA BASE DE DATOS

    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna) { 
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public static function getErrores(){
        return static::$errores;
        }
        
        public function validar(){
        
        static::$errores = [];
        return static::$errores;
    }

    public function setImage($imagen){
        
        if(isset($this->imagenes)){
            $this->borrarImagen();
            }
        if($imagen){
            $this->imagenes = $imagen;
        }
    }

    public function borrarImagen(){
        $existeImg = file_exists(CARPETA_IMAGENES . $this->imagenes);
            if($existeImg){
                unlink(CARPETA_IMAGENES . $this->imagenes);
            }
    }

    // EXTRAER TODOS LOS REGISTROS DE BASE DE DATOS

    public static function all(){
    $query = "SELECT * FROM " . static::$tabla;    
    $resultado = self::consultarSql($query);

    return $resultado;
    }
    
    // EXTRAER REGISTRO DE BASE DE DATOS CON LIMITE
    
    public static function get($i){
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $i;    
    $resultado = self::consultarSql($query);

    return $resultado;
    }


    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";    
        $resultado = self::consultarSql($query);

        return array_shift($resultado);
    }

    public static function consultarSql($query){
        //Consultar Base de Datos
        
        $resultado = self::$db->query($query);

        // Iterar Resultados 

        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjetivo($registro);
        }
        // Liberar Memoria
        $resultado->free();
        
        //Retornar los Resultados
        return $array;
    }

    public static function crearObjetivo($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}