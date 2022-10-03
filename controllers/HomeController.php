<?php

require_once('Controller.php');
require_once("config/View.php");

class HomeController extends Controller {

    public function index() {
        echo "call";
       $this->render("homepage");
    }

}


