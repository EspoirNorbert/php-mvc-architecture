<?php

class ErrorController extends Controller {

    public function Error404() {
        $this->render("erros/404");
    }
}