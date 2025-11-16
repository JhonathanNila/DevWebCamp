<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Model\Speaker;
use MVC\Router;

class SpeakersController {
    public static function index(Router $router) {
        $speakers = Speaker::all();
        if(!is_admin()) {
            header('Location: /login');
        }
        $router->render('admin/speakers/index', [
            'title' => 'Speakers / Presenters',
            'speakers' => $speakers
        ]);
    }
    public static function register(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alerts = [];
        $speaker = new Speaker;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            if(!empty($_FILES['photo']['tmp_name'])) {
                $images_folder = '../public/img/speakers';
                if(!is_dir($images_folder)) {
                    mkdir($images_folder, 0777, true);
                }
                $png_image = Image::make($_FILES['photo']['tmp_name'])->fit(800,800)->encode('png', 80);
                $webp_image = Image::make($_FILES['photo']['tmp_name'])->fit(800,800)->encode('webp', 80);
                $image_name = md5(uniqid(rand(), true));
                $_POST['photo'] = $image_name;
            }
            $_POST['social'] = json_encode($_POST['social'], JSON_UNESCAPED_SLASHES);
            $speaker->sync($_POST);
            $alerts = $speaker->validate();
            if(empty($alerts)) {
                $png_image->save($images_folder . '/' . $image_name . ".png");
                $webp_image->save($images_folder . '/' . $image_name . ".webp");
                $result = $speaker->save();
                if($result) {
                    header('Location: /admin/speakers');
                }
            }
        }
        $router->render('admin/speakers/register', [
            'title' => 'Register New Speaker',
            'alerts' => $alerts,
            'speaker' => $speaker,
            'social' => json_decode($speaker->social)
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
            header('Location: /admin/speakers');
        }
        $speaker = Speaker::find($id);
        if(!$speaker) {
            header('Location: /admin/speakers');
        }
        $speaker->current_photo = $speaker->photo;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            if(!empty($_FILES['photo']['tmp_name'])) {
                $images_folder = '../public/img/speakers';
                if(!is_dir($images_folder)) {
                    mkdir($images_folder, 0777, true);
                }
                $png_image = Image::make($_FILES['photo']['tmp_name'])->fit(800,800)->encode('png', 80);
                $webp_image = Image::make($_FILES['photo']['tmp_name'])->fit(800,800)->encode('webp', 80);
                $image_name = md5(uniqid(rand(), true));
                $_POST['photo'] = $image_name;
            }else {
                $_POST['photo'] = $speaker->current_photo;
            }
            $_POST['social'] = json_encode($_POST['social'], JSON_UNESCAPED_SLASHES);
            $speaker->sync($_POST);
            $alerts = $speaker->validate();
            if(empty($alerts)) {
                if(isset($image_name)) {
                    $png_image->save($images_folder . '/' . $image_name . ".png");
                    $webp_image->save($images_folder . '/' . $image_name . ".webp");
                }
                $result = $speaker->save();
                if($result) {
                    header('Location: /admin/speakers');
                }
            }
        }
        $router->render('admin/speakers/edit', [
            'title' => 'Edit Speaker',
            'alerts' => $alerts,
            'speaker' => $speaker,
            'social' => json_decode($speaker->social)
        ]);
    }
    public static function delete() {
        if(!is_admin()) {
            header('Location: /login');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            $id = $_POST['id'];
            $speaker = Speaker::find($id);
            if(!isset($speaker)) {
                header('Location: /admin/speakers');
            }
            $result = $speaker->delete();
            if($result) {
                header('Location: /admin/speakers');
            }
        }
    }
}
