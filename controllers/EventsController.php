<?php

namespace Controllers;

use Classes\Pager;
use Model\Category;
use Model\Day;
use Model\Event;
use Model\Speaker;
use Model\Time;
use MVC\Router;

class EventsController {
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $current_page = $_GET['page'];
        $current_page = filter_var($current_page, FILTER_VALIDATE_INT);
        if(!$current_page || $current_page < 1) {
            header('Location: /admin/events?page=1');
        }
        $per_pages = 10;
        $total = Event::total();
        $pager = new Pager($current_page, $per_pages, $total);
        $events = Event::pagination($per_pages, $pager->offset());
        foreach($events as $event) {
            $event->category = Category::find($event->category_id);
            $event->day = Day::find($event->day_id);
            $event->time = Time::find($event->time_id);
            $event->speaker = Speaker::find($event->speaker_id);
        }
        $router->render('admin/events/index', [
            'title' => 'Conference / Workshops',
            'events' => $events,
            'pager' => $pager->pager()
        ]);
    }
    public static function register(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alerts = [];
        $categories = Category::all('ASC');
        $days = Day::all('ASC');
        $time = Time::all('ASC');
        $event = new Event;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
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
    public static function edit(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alerts = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin/events');
        }
        $categories = Category::all('ASC');
        $days = Day::all('ASC');
        $time = Time::all('ASC');
        $event = Event::find($id);
        if(!$event) {
            header('Location: /admin/events');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            $event->sync($_POST);
            $alerts = $event->validate();
            if(empty($alerts)) {
                $result = $event->save();
                if($result) {
                    header('Location: /admin/events');
                }
            }
        }
        $router->render('admin/events/edit', [
            'title' => 'Edit Event',
            'alerts' => $alerts,
            'categories' => $categories,
            'days' => $days,
            'time' => $time,
            'event' => $event
        ]);
    }
    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            if(!is_admin()) {
                header('Location: /login');
            }
            $id = $_POST['id'];
            $event = Event::find($id);
            if(!isset($event)) {
                header('Location: /admin/events');
            }
            $result = $event->delete();
            if($result) {
                header('Location: /admin/events');
            }
        }
    }
}