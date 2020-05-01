<?php

namespace App\Controllers;

class HomeController extends MainController {

    public function index()
    {
        echo $this->view->render('pages/index');
    }
}