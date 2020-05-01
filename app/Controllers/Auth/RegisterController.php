<?php

namespace App\Controllers\Auth;

use App\Controllers\MainController;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class RegisterController extends MainController {

    public function showForm()
    {
        echo $this->view->render('auth/register');
    }

    public function register()
    {
        $this->validate();

        try {
            $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                //echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                $url = 'https://test.project/verify_email?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
                echo $url; exit;
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        }

        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            //User already exists
            flash()->error(['User already exists']);
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }

        return redirect('/register');
    }

    public function validate()
    {
        $validator = v::key('username', v::stringType()->notEmpty())
            ->key('email', v::email())
            ->key('password', v::stringType()->notEmpty())
            ->key('terms', v::trueVal())
            ->keyValue('password_confirmation', 'equals', 'password');

        try {
            $validator->assert($_POST);

        } catch (ValidationException $exception) {
            flash()->error($exception->getMessages());

            return redirect('/register');
        }
    }
}