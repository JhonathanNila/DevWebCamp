<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\ApiEvents;
use Controllers\ApiSpeakers;
use Controllers\AttendeesController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\EventsController;
use Controllers\GiftsController;
use Controllers\PagesControllers;
use Controllers\RegisterController;
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
$router->get('/admin/speakers/edit', [SpeakersController::class, 'edit']);
$router->get('/admin/speakers/delete', [SpeakersController::class, 'delete']);
$router->get('/admin/events', [EventsController::class, 'index']);
$router->get('/admin/events/register', [EventsController::class, 'register']);
$router->get('/admin/events/edit', [EventsController::class, 'edit']);
$router->get('/admin/attendees', [AttendeesController::class, 'index']);
$router->get('/admin/gifts', [GiftsController::class, 'index']);

// POSTS
$router->post('/admin/speakers/register', [SpeakersController::class, 'register']);
$router->post('/admin/speakers/edit', [SpeakersController::class, 'edit']);
$router->post('/admin/speakers/delete', [SpeakersController::class, 'delete']);
$router->post('/admin/events/register', [EventsController::class, 'register']);
$router->post('/admin/events/edit', [EventsController::class, 'edit']);
$router->post('/admin/events/delete', [EventsController::class, 'delete']);

//APIs
$router->get('/api/events-time', [ApiEvents::class, 'index']);
$router->get('/api/speakers', [ApiSpeakers::class, 'index']);
$router->get('/api/speaker', [ApiSpeakers::class, 'speaker']);

// PUBLIC ZONE

// GETs
$router->get('/', [PagesControllers::class, 'index']);
$router->get('/devwebcamp', [PagesControllers::class, 'devWebCamp']);
$router->get('/ticket-bundles', [PagesControllers::class, 'ticketBundles']);
$router->get('/conferences-workshops', [PagesControllers::class, 'conferencesWorkshops']);
$router->get('/404', [PagesControllers::class, 'error']);

// BUNDLES, PAYMENTS AND PASSES

// GETs
$router->get('/register', [RegisterController::class, 'register']);
$router->get('/pass', [RegisterController::class, 'pass']);
$router->get('/register/conferences', [RegisterController::class, 'conferences']);

// POSTS
$router->post('/register/free', [RegisterController::class, 'free']);
$router->post('/register/payment', [RegisterController::class, 'payment']);
$router->post('/register/conferences', [RegisterController::class, 'conferences']);

$router->verifyRoutes();