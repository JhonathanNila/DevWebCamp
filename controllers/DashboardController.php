<?php

namespace Controllers;

use Model\Attendee;
use Model\Event;
use Model\User;
use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        $attendees = Attendee::get(5);
        foreach ($attendees as $attendee) {
            $attendee->user = User::find($attendee->user_id);
        }
        $virtuals = Attendee::total('bundle_id', 2);
        $onSite = Attendee::total('bundle_id', 1);
        $earnings = ($virtuals * 46.41) + ($onSite * 189.54);
        $fewest_capacity = Event::sortLimit('capacity', 'ASC', 5);
        $most_capacity = Event::sortLimit('capacity', 'DESC', 5);
        $router->render('admin/dashboard/index', [
            'title' => 'Dashboard Admin',
            'attendees' => $attendees,
            'earnings' => $earnings,
            'fewest_capacity' => $fewest_capacity,
            'most_capacity' => $most_capacity
        ]);
    }
}