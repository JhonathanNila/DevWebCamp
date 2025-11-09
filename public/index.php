<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;

$router = new Router();


// LOGIN, SIGN UP, FORGOT PASSWORD, NEW PASSWORD AND ACCOUNT CONFIRMATION

//GETS
$router->get('/login', [AuthController::class, 'login']);
$router->get('/signup', [AuthController::class, 'signup']);
$router->get('/forgot', [AuthController::class, 'forgot']);
$router->get('/reset', [AuthController::class, 'reset']);
$router->get('/message', [AuthController::class, 'message']);
$router->get('/confirm-account', [AuthController::class, 'confirmAccount']);

//POST
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);
$router->post('/signup', [AuthController::class, 'signup']);
$router->post('/forgot', [AuthController::class, 'forgot']);
$router->post('/reset', [AuthController::class, 'reset']);

$router->verifyRoutes();