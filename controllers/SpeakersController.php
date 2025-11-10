<?php

namespace Controllers;

use MVC\Router;

class SpeakersController {
    public static function index(Router $router) {
        $router->render('admin/speakers/index', [
            'title' => 'Speakers / Presenters'
        ]);
    }
    public static function register(Router $router) {
        $alerts = [];
        $router->render('admin/speakers/register', [
            'title' => 'Register New Speaker',
            'alerts' => $alerts
        ]);
    }
}