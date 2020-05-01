<?php

namespace App\Controllers;

use League\Plates\Engine;

class HomeController {
    public $view;

    //call Engine::class => function(){
    //        return new Engine('../app/Views');
    //    }
    // __construct(Engine $engine)
    public function __construct(Engine $engine)
    {
        $this->view = $engine;
    }

    public function index()
    {
        echo $this->view->render('pages/index');
    }

    public function showForm()
    {
        echo $this->view->render('auth/login');
    }
}