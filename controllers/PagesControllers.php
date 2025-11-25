<?php

namespace Controllers;

use Model\Day;
use Model\Time;
use MVC\Router;
use Model\Event;
use Model\Speaker;
use Model\Category;

class PagesControllers {
    public static function index(Router $router) {
        $router->render('pages/index', [
            'title' => 'Home'
        ]);
    }
    public static function devWebCamp(Router $router) {
        $router->render('pages/devwebcamp', [
            'title' => 'About DevWebCamp'
        ]);
    }
    public static function ticketBundles(Router $router) {
        $router->render('pages/ticket-bundles', [
            'title' => 'Ticket Bundles'
        ]);
    }
    public static function conferencesWorkshops(Router $router) {
        $events = Event::sort('time_id', 'ASC');
        $format_events = [];
        foreach ($events as $event) {
            $event->category = Category::find($event->category_id);
            $event->day = Day::find($event->day_id);
            $event->time = Time::find($event->time_id);
            $event->speaker = Speaker::find($event->speaker_id);
            if($event->day_id === "1" && $event->category_id === "1") {
                $format_events['conferences_f'][] = $event;
            }
            if($event->day_id === "2" && $event->category_id === "1") {
                $format_events['conferences_s'][] = $event;
            }
            if($event->day_id === "1" && $event->category_id === "2") {
                $format_events['workshops_f'][] = $event;
            }
            if($event->day_id === "2" && $event->category_id === "2") {
                $format_events['workshops_s'][] = $event;
            }
        }
        $router->render('pages/conferences-workshops', [
            'title' => 'Conferences / Workshops',
            'events' => $format_events
        ]);
    }
}