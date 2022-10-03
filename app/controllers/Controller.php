<?php

namespace App\Controllers;

abstract class Controller {
    
    /**
     * Display view
     *
     * @param string $file
     * @param array $data
     * @return void
     */
    public function render(string $file, array $data = []){
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // Crée le chemin et inclut le fichier de vue
        require_once('views/'.$file.'.php');
    }

}