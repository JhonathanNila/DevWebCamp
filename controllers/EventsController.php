<?php

namespace Controllers;

use Model\Category;
use Model\Day;
use Model\Event;
use Model\Time;
use MVC\Router;

class EventsController {
    public static function index(Router $router) {
        $router->render('admin/events/index', [
            'title' => 'Events'
        ]);
    }
    public static function register(Router $router) {
        $alerts = [];
        $categories = Category::all('ASC');
        $days = Day::all('ASC');
        $time = Time::all('ASC');
        $event = new Event;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event->sync($_POST);
            $alerts = $event->validate();
            if(empty($alerts)) {
                $result = $event->save();
                if($result) {
                    header('Location: /admin/events');
                }
            }
        }
        $router->render('admin/events/register', [
            'title' => 'Register New Event',
            'alerts' => $alerts,
            'categories' => $categories,
            'days' => $days,
            'time' => $time,
            'event' => $event
        ]);
    }
}