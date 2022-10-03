<?php

namespace App\Models;

use Core\Database;

abstract class Model {

    private $database;

    public function __construct() { 
       $this->database = Database::getConnexion();
    }

    /**
     * Execute Prepares and executes an SQL statement 
     *
     * @param [string] $query
     * @param [array] $params
     * @return void
     */
    public function query(string $query , array $params = null) :  \PDOStatement {
       
        if ($params == null) 
        {

            $resultat = $this->database->query($query); // exécution directe
        }
        else {
            $resultat = $this->database->prepare($query); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
    
 
}