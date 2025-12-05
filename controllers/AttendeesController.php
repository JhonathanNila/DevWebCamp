<?php

namespace Controllers;

use MVC\Router;
use Classes\Pager;
use Model\Attendee;
use Model\Bundle;
use Model\User;

class AttendeesController {
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
            return;
        }
        $current_page = $_GET['page'];
        $current_page = filter_var($current_page, FILTER_VALIDATE_INT);
        if(!$current_page || $current_page < 1) {
            header('Location: /admin/attendees?page=1');
        }
        $entries_per_page = 10;
        $total = Attendee::total();
        $pager = new Pager($current_page, $entries_per_page, $total);
        if($pager->total_pages() < $current_page) {
            header('Location: /admin/attendees?page=1');
        }
        $attendees = Attendee::pagination($entries_per_page, $pager->offset());
        foreach ($attendees as $attendee) {
            $attendee->user = User::find($attendee->user_id);
            $attendee->bundle = Bundle::find($attendee->bundle_id);
        }
        $router->render('admin/attendees/index', [
            'title' => 'Attendees',
            'attendees' => $attendees,
            'pager' => $pager->pager()
        ]);
    }
}