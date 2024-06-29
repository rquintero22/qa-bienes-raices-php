<?php 

namespace App;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id',
                                        'nombre',
                                        'apellido',
                                        'telefono'
                                       ];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args= []) 
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';

    }
       
    public function validar() {
        if (!$this->nombre) {
           self::$errores[] = "Debes añadir un nombre";
        }

        if (!$this->apellido) {
           self::$errores[] = "El apellido es requerido";
        }

        if (!$this->telefono) {
           self::$errores[] = "El teléfono es requerido";
        }

        if(!preg_match('/[0-9]{8}/', $this -> telefono)) {
            self::$errores[] = "Formato inválido";
        }

        return self::$errores;
    }
}