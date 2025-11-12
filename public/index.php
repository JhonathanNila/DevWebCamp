<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AttendeesController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\EventsController;
use Controllers\GiftsController;
use Controllers\SpeakersController;

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

// ADMIN ZONE

// GETS
$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/speakers', [SpeakersController::class, 'index']);
$router->get('/admin/speakers/register', [SpeakersController::class, 'register']);
$router->get('/admin/events', [EventsController::class, 'index']);
$router->get('/admin/attendees', [AttendeesController::class, 'index']);
$router->get('/admin/gifts', [GiftsController::class, 'index']);

// POSTS
$router->post('/admin/speakers/register', [SpeakersController::class, 'register']);


$router->verifyRoutes();