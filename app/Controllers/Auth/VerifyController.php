<?php


namespace App\Controllers\Auth;

use App\Controllers\MainController;

class VerifyController extends MainController
{
    public function verify()
    {
        try {
            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);

            flash()->success('User verified');
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('InvalidSelectorTokenPairException');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('TokenExpiredException');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('UserAlreadyExistsException');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('TooManyRequestsException');
        }

        return redirect('/login');
    }
}