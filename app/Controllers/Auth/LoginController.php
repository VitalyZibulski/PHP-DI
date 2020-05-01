<?php

namespace App\Controllers\Auth;

use App\Controllers\MainController;

class LoginController extends MainController {

    public function showForm()
    {
        echo $this->view->render('auth/login');
    }

    public function login()
    {
        try {
            $this->auth->login($_POST['email'], $_POST['password']);

            return redirect('/');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}