<?php

namespace App\Controllers;

use Delight\Auth\Auth;
use League\Plates\Engine;

class MainController {
    public $view;
    public $auth;

    //call Engine::class => function(){
    //        return new Engine('../app/Views');
    //    }
    // __construct(Engine $engine)
    public function __construct(Engine $engine, Auth $auth)
    {
        $this->view = $engine;
        $this->auth = $auth;
    }
}