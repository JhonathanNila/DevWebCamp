<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'users';
    protected static $columnasDB = ['id', 'name', 'lastname', 'email', 'password', 'confirm', 'token', 'admin'];

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $password2;
    public $confirm;
    public $token;
    public $admin;

    public $current_password;
    public $new_password;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->confirm = $args['confirm'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? '';
    }

    // Validar el Login de Usuarios
    public function validateLogin() {
        if(!$this->email) {
            self::$alerts['error'][] = 'The Email is required';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alerts['error'][] = 'Invalid Email';
        }
        if(!$this->password) {
            self::$alerts['error'][] = 'The password cannot be empty';
        }
        return self::$alerts;

    }

    // Validación para cuentas nuevas
    public function validateAccount() {
        if(!$this->name) {
            self::$alerts['error'][] = 'The Name is required';
        }
        if(!$this->lastname) {
            self::$alerts['error'][] = 'The Lastname is required';
        }
        if(!$this->email) {
            self::$alerts['error'][] = 'The Email is required';
        }
        if(!$this->password) {
            self::$alerts['error'][] = 'The password cannot be empty';
        }
        if(strlen($this->password) < 6) {
            self::$alerts['error'][] = 'The Password must containt at least 6 characters';
        }
        if($this->password !== $this->password2) {
            self::$alerts['error'][] = 'The passwords are different';
        }
        return self::$alerts;
    }

    // Valida un email
    public function validateEmail() {
        if(!$this->email) {
            self::$alerts['error'][] = 'The Email is required';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alerts['error'][] = 'Invalid Email';
        }
        return self::$alerts;
    }

    // Valida el Password 
    public function validatePassword() {
        if(!$this->password) {
            self::$alerts['error'][] = 'The password cannot be empty';
        }
        if(strlen($this->password) < 6) {
            self::$alerts['error'][] = 'The Password must containt at least 6 characters';
        }
        return self::$alerts;
    }

    public function new_password() : array {
        if(!$this->current_password) {
            self::$alerts['error'][] = 'The Current Password cannot be empty';
        }
        if(!$this->new_password) {
            self::$alerts['error'][] = 'The Current Password cannot be empty';
        }
        if(strlen($this->new_password) < 6) {
            self::$alerts['error'][] = 'The Password must containt at least 6 characters';
        }
        return self::$alerts;
    }

    // Comprobar el password
    public function verify_password() : bool {
        return password_verify($this->current_password, $this->password );
    }

    // Hashea el password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un Token
    public function createToken() : void {
        $this->token = uniqid();
    }
}