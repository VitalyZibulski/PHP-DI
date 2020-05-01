<?php

namespace App\Controllers;

class HomeController extends MainContoller {

    public function index()
    {
        echo $this->view->render('pages/index');
    }
}