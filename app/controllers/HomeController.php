<?php

namespace App\Controllers;

class HomeController extends Controller {

    public function index() {
        echo "call";
       $this->render("homepage");
    }

}


