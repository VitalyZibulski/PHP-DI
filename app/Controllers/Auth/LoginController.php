<?php

namespace App\Controllers\Auth;

use App\Controllers\MainController;

class LoginController extends MainController {

    public function showForm()
    {
        echo $this->view->render('auth/login');
    }
}