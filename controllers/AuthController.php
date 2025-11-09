<?php

namespace Controllers;

use Classes\Email;
use Model\User;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($_POST);
            $alerts = $user->validateLogin();
            if(empty($alerts)) {
                $user = User::where('email', $user->email);
                if(!$user || !$user->confirm ) {
                    User::setAlert('error', 'The user does not exist or is not confirmed');
                } else {
                    if( password_verify($_POST['password'], $user->password) ) {
                        session_start();    
                        $_SESSION['id'] = $user->id;
                        $_SESSION['name'] = $user->name;
                        $_SESSION['lastname'] = $user->lastname;
                        $_SESSION['email'] = $user->email;
                        $_SESSION['admin'] = $user->admin ?? null;
                        if($user->admin) {
                            header('Location: /admin/dashboard');
                        } else {
                            header('Location: /register');
                        }
                    } else {
                        User::setAlert('error', 'Incorrect password');
                    }
                }
            }
        }
        $alerts = User::getAlerts();
        $router->render('auth/login', [
            'title' => 'Log in',
            'alerts' => $alerts
        ]);
    }
    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /login');
        }
    }
    public static function signup(Router $router) {
        $alerts = [];
        $user = new User;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST);
            $alerts = $user->validateAccount();
            if(empty($alerts)) {
                $userExists = User::where('email', $user->email);
                if($userExists) {
                    User::setAlert('error', 'The user is already registered');
                    $alerts = User::getAlerts();
                } else {
                    $user->hashPassword();
                    unset($user->password2);
                    $user->createToken();
                    $result =  $user->save();
                    $email = new Email($user->email, $user->name, $user->token);
                    $email->sendConfirmation();
                    if($result) {
                        header('Location: /message');
                    }
                }
            }
        }
        $router->render('auth/signup', [
            'title' => 'Sign up on DevWebcamp',
            'user' => $user, 
            'alerts' => $alerts
        ]);
    }
    public static function forgot(Router $router) {
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($_POST);
            $alerts = $user->validateEmail();
            if(empty($alerts)) {
                $user = User::where('email', $user->email);
                if($user && $user->confirm) {
                    $user->createToken();
                    unset($user->password2);
                    $user->save();
                    $email = new Email( $user->email, $user->name, $user->token );
                    $email->sendInstructions();
                    $alerts['success'][] = 'We’ve sent the instructions to your email';
                } else {
                    $alerts['error'][] = 'The user does not exist or is not confirmed';
                }
            }
        }
        $router->render('auth/forgot', [
            'title' => 'Forgot Password',
            'alerts' => $alerts
        ]);
    }
    public static function reset(Router $router) {
        $token = s($_GET['token']);
        $valid_token = true;
        if(!$token) header('Location: /');
        $user = User::where('token', $token);
        if(empty($user)) {
            User::setAlert('error', 'Invalid token, please try again');
            $valid_token = false;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST);
            $alerts = $user->validatePassword();
            if(empty($alerts)) {
                $user->hashPassword();
                $user->token = null;
                $result = $user->save();
                if($result) {
                    header('Location: /login');
                }
            }
        }
        $alerts = User::getAlerts();
        $router->render('auth/reset', [
            'title' => 'Reset Password',
            'alerts' => $alerts,
            'valid_token' => $valid_token
        ]);
    }
    public static function message(Router $router) {
        $router->render('auth/message', [
            'title' => 'Account created successfully'
        ]);
    }
    public static function confirmAccount(Router $router) {
        $token = s($_GET['token']);
        if(!$token) header('Location: /');
        $user = User::where('token', $token);
        if(empty($user)) {
            User::setAlert('error', 'Invalid token, the account was not confirmed');
        } else {
            $user->confirm = 1;
            $user->token = '';
            unset($user->password2);
            $user->save();
            User::setAlert('success', 'Account verified successfully');
        }
        $router->render('auth/confirm-account', [
            'title' => 'Account confirmed',
            'alerts' => User::getAlerts()
        ]);
    }
}