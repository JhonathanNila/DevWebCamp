<?php
namespace Model;

#[\AllowDynamicProperties]
class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $table = '';
    protected static $rowsDB = [];

    // Alertas y Mensajes
    protected static $alerts = [];
    
    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    // Setear un tipo de Alerta
    public static function setAlert($type, $message) {
        static::$alerts[$type][] = $message;
    }
    // Obtener las alertas
    public static function getAlerts() {
        return static::$alerts;
    }
    // Validación que se hereda en modelos
    public function validate() {
        static::$alerts = [];
        return static::$alerts;
    }
    // Consulta SQL para crear un objeto en Memoria (Active Record)
    public static function querySQL($query) {
        // Consultar la base de datos
        $result = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($register = $result->fetch_assoc()) {
            $array[] = static::createObject($register);
        }

        // liberar la memoria
        $result->free();

        // retornar los resultados
        return $array;
    }
    // Crea el objeto en memoria que es igual al de la BD
    protected static function createObject($register) {
        $object = new static;

        foreach($register as $key => $value ) {
            if(property_exists( $object, $key  )) {
                $object->$key = $value;
            }
        }
        return $object;
    }
    // Identificar y unir los atributos de la BD
    public function atributtes() {
        $atributtes = [];
        foreach(static::$rowsDB as $column) {
            if($column === 'id') continue;
            $atributtes[$column] = $this->$column;
        }
        return $atributtes;
    }
    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizateAtributtes() {
        $atributtes = $this->atributtes();
        $sanitized = [];
        foreach($atributtes as $key => $value ) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }
    // Sincroniza BD con Objetos en memoria
    public function sync($args=[]) { 
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
            }
        }
    }
    // Registros - CRUD
    public function save() {
        $result = '';
        if(!is_null($this->id)) {
            // actualizar
            $result = $this->update();
        } else {
            // Creando un nuevo registro
            $result = $this->create();
        }
        return $result;
    }
    // Obtener todos los Registros
    public static function all($sort = 'DESC') {
        $query = "SELECT * FROM " . static::$table . " ORDER BY id {$sort}";
        $result = self::querySQL($query);
        return $result;
    }
    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$table  ." WHERE id = {$id}";
        $result = self::querySQL($query);
        return array_shift( $result ) ;
    }
    // Obtener Registros con cierta cantidad
    public static function get($limit) {
        $query = "SELECT * FROM " . static::$table . " LIMIT {$limit} ORDER BY id DESC" ;
        $result = self::querySQL($query);
        return array_shift( $result ) ;
    }
    public static function pagination($per_page, $offset) {
        $query = "SELECT * FROM " . static::$table . " ORDER BY id ASC LIMIT {$per_page} OFFSET {$offset}" ;
        $result = self::querySQL($query);
        return $result;
    }
    // Busqueda Where con Columna 
    public static function where($column, $value) {
        $query = "SELECT * FROM " . static::$table . " WHERE {$column} = '{$value}'";
        $result = self::querySQL($query);
        return array_shift( $result ) ;
    }
    public static function sort($column, $order) {
        $query = "SELECT * FROM " . static::$table . " ORDER BY {$column} {$order}";
        $result = self::querySQL($query);
        return $result;
    }
    public static function whereArray($array = []) {
        $query = "SELECT * FROM " . static::$table . " WHERE ";
        foreach ($array as $key => $value) {
            if($key == array_key_last($array)) {
                $query .= " {$key} = '{$value}';";
            } else {
                $query .= " {$key} = '{$value}' AND ";
            }
        }
        $result = self::querySQL($query);
        return $result;
    }
    public static function total($column = '', $value = '') {
        $query = "SELECT COUNT(*) FROM " . static::$table;
        if($column) {
            $query .= " WHERE {$column} = {$value}" . ";";
        }
        $result = self::$db->query($query);
        $total = $result->fetch_array();
        return array_shift($total);
    }
    // Crea un nuevo registro
    public function create() {
        // Sanitizar los datos
        $atributtes = $this->sanitizateAtributtes();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($atributtes));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributtes));
        $query .= " ') ";

        // debuguear($query); // Descomentar si no te funciona algo

        // Resultado de la consulta
        $result = self::$db->query($query);
        return [
            'result' =>  $result,
            'id' => self::$db->insert_id
        ];
    }
    // Actualizar el registro
    public function update() {
        // Sanitizar los datos
        $atributtes = $this->sanitizateAtributtes();

        // Iterar para ir agregando cada campo de la BD
        $values = [];
        foreach($atributtes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$table ." SET ";
        $query .=  join(', ', $values );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualizar BD
        $result = self::$db->query($query);
        return $result;
    }
    // Eliminar un Registro por su ID
    public function delete() {
        $query = "DELETE FROM "  . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $result = self::$db->query($query);
        return $result;
    }
}