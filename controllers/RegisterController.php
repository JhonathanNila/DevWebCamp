<?php

namespace Controllers;

use Model\Bundle;
use Model\Register;
use Model\User;
use MVC\Router;

class RegisterController {
    public static function register(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }
        $register = Register::where('user_id', $_SESSION['id']);
        if(isset($register) && $register->bundle_id === "3") {
            header('Location: /pass?id=' . urlencode($register->token));
        }
        $router->render('register/register', [
            'title' => 'Finish Registration'
        ]);
    }
    public static function free(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
            }
                $register = Register::where('user_id', $_SESSION['id']);
            if(isset($register) && $register->bundle_id === "3") {
                header('Location: /pass?id=' . urlencode($register->token));
            }
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            $data = array(
                'bundle_id' => 3,
                'payment_id' => '',
                'token' => $token,
                'user_id' => $_SESSION['id']
            );
            $register = new Register($data);
            $result = $register->save();
            if($result) {
                header('Location: /pass?id=' . urlencode($register->token));
            }
        }
    }
    public static function pass(Router $router) {
        $id = $_GET['id'];
        if(!$id || !strlen($id) === 8) {
            header('Location: /');
        }
        $register = Register::where('token', $id);
        if(!$register) {
            header('Location: /');
        }
        $register->user = User::find($register->user_id);
        $register->bundle = Bundle::find($register->bundle_id);
        $router->render('register/pass', [
            'title' => 'Your Pass',
            'register' => $register
        ]);
    }
}