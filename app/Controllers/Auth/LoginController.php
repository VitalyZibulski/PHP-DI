<?php

namespace App\Controllers\Auth;

use App\Controllers\MainContoller;

class LoginController extends MainContoller {

    public function showForm()
    {
        echo $this->view->render('auth/login');
    }
}