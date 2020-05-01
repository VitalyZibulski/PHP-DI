<?php

namespace App\Controllers;

use League\Plates\Engine;

class MainContoller {
    public $view;

    //call Engine::class => function(){
    //        return new Engine('../app/Views');
    //    }
    // __construct(Engine $engine)
    public function __construct(Engine $engine)
    {
        $this->view = $engine;
    }
}