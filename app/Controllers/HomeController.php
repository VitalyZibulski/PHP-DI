<?php

namespace App\Controllers;

class HomeController {
    public function index(){
        // Create new Plates instance
        $templates = new \League\Plates\Engine('../app/Views');

        // Render a template
        echo $templates->render('pages/index');
    }
}