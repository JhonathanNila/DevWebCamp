<?php

namespace Controllers;

use MVC\Router;

class AttendeesController {
    public static function index(Router $router) {
        $router->render('admin/attendees/index', [
            'title' => 'Attendees'
        ]);
    }
}