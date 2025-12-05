<?php

namespace Controllers;

use Model\Day;
use Model\Time;
use Model\User;
use MVC\Router;
use Model\Event;
use Model\Bundle;
use Model\Speaker;
use Model\Category;
use Model\EventsAttendees;
use Model\Gift;
use Model\Attendee;

class RegisterController {
    public static function register(Router $router) {
        if(!is_auth()) {
            header('Location: /');
            return;
        }
        $register = Attendee::where('user_id', $_SESSION['id']);
        if(isset($register) && ($register->bundle_id === "3" || $register->bundle_id === "2")) {
            header('Location: /pass?id=' . urlencode($register->token));
        }
        if(isset($register) && $register->bundle_id === "1") {
            header('Location: /register/conferences');
        }
        $router->render('register/register', [
            'title' => 'Finish Registration'
        ]);
    }
    public static function free(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }
                $register = Attendee::where('user_id', $_SESSION['id']);
            if(isset($register) && $register->bundle_id === "3") {
                header('Location: /pass?id=' . urlencode($register->token));
                return;
            }
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            $data = [
                'bundle_id' => 3,
                'payment_id' => '',
                'token' => $token,
                'user_id' => $_SESSION['id']
            ];
            $register = new Register($data);
            $result = $register->save();
            if($result) {
                header('Location: /pass?id=' . urlencode($register->token));return;
            }
        }
    }
    public static function pass(Router $router) {
        $id = $_GET['id'];
        if(!$id || !strlen($id) === 8) {
            header('Location: /');
            return;
        }
        $register = Attendee::where('token', $id);
        if(!$register) {
            header('Location: /');
            return;
        }
        $register->user = User::find($register->user_id);
        $register->bundle = Bundle::find($register->bundle_id);
        $router->render('register/pass', [
            'title' => 'Your Pass',
            'register' => $register
        ]);
    }
    public static function payment(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }
            $data = $_POST;
            $data['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
            $data['user_id'] = $_SESSION['id'];
            try {
                $register = new Register($data);
                $result = $register->save();
                echo json_encode($result);
            } catch (\Throwable $th) {
                echo json_encode([
                    'result' => 'error'
                ]);
            }
        }
    }
    public static function conferences(Router $router) {
        if(!is_auth()) {
            header('Location: /login');
            return;
        }
        $user_id = $_SESSION['id'];
        $register = Attendee::where('user_id', $user_id);
        if(isset($register) && $register->bundle_id === "2") {
            header('Location: /pass?id=' . urlencode($register->token));
            return;
        }
        if($register->bundle_id === "1") {
            header('Location: /');
            return;
        }
        if(isset($register->gift_id) && $register->bundle_id !== "1") {
            header('Location: /pass?id=' . urlencode($register->token));
            return;
        }
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
        $gifts = Gift::all('ASC');
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }
            $events = explode(',', $_POST['events']);
            if(empty($events)) {
                echo json_encode(['result' => false]);
                return;
            }
            $register = Attendee::where('user_id', $_SESSION['id']);
            if(!isset($register) || $register->bundle_id !== "1") {
                echo json_encode(['result' => false]);
                return;
            }
            $events_array = [];
            foreach ($events as $event_id) {
                $event = Event::find($event_id);
                if(!isset($event) || $event->capacity === "0") {
                    echo json_encode(['result' => false]);
                    return;
                }
                $events_array[] = $event;
            }
            foreach ($events_array as $event) {
                $event->capacity -= 1;
                $event->save();
                $data = [
                    'event_id' => (int) $event->id,
                    'attendee_id' => (int) $register->id
                ];
                $attendee_user = new EventsAttendees($data);
                $attendee_user->save();
            }
            $register->sync(['gift_id' => $_POST['gift_id']]);
            $result = $register->save();
            if($result) {
                echo json_encode([
                    'result' => $result,
                    'token' => $register->token
                ]);
            } else {
                echo json_encode(['result' => false]);
            }
            return;
        }
        $router->render('register/conferences', [
            'title' => 'Choose Conferences & Workshops',
            'events' => $format_events,
            'gifts' => $gifts
        ]);
    }
}