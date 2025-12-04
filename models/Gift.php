<?php

namespace Model;

class Gift extends ActiveRecord {
    public static $table = 'gifts';
    public static $rowsDB = ['id', 'name'];

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
    }
}