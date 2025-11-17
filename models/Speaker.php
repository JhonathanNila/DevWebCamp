<?php 

namespace Model;

class Speaker extends ActiveRecord {
    protected static $table = 'speakers';
    protected static $rowsDB = ['id', 'name', 'lastname', 'city', 'contry', 'photo', 'tags', 'social'];

    public function __construct($args = []) {
            $this->id = $args['id'] ?? null;
            $this->name = $args['name'] ?? '';
            $this->lastname = $args['lastname'] ?? '';
            $this->city = $args['city'] ?? '';
            $this->contry = $args['contry'] ?? '';
            $this->photo = $args['photo'] ?? '';
            $this->tags = $args['tags'] ?? '';
            $this->social = $args['social'] ?? '';
    }
    public function validate() {
        if(!$this->name) {
            self::$alerts['error'][] = 'The Name is required';
        }
        if(!$this->lastname) {
            self::$alerts['error'][] = 'The Last name is required';
        }
        if(!$this->city) {
            self::$alerts['error'][] = 'The City is required';
        }
        if(!$this->contry) {
            self::$alerts['error'][] = 'The Contry is reauired';
        }
        if(!$this->photo) {
            self::$alerts['error'][] = 'The Photo is required';
        }
        if(!$this->tags) {
            self::$alerts['error'][] = 'The “Areas” field is required';
        }
        return self::$alerts;
    }
}