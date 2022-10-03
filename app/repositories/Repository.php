<?php

namespace App\Repositories;

use Core\Database;
use PDO;
use PDOStatement;

/**
 * Make Request to database
 */
abstract class Repository {
 
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
    public function query(string $query , array $params = null) {
       
      try {
          # code...
          if ($params == null) 
          {
              $resultat = $this->database->query($query); // exécution directe
          }
          else {
              $resultat = $this->database->prepare($query); // requête préparée
              $resultat->execute($params);
          }
      } catch (\Throwable $e) {
          # code...
          echo $e->getMessage();
      }
        return $resultat;
    }


    /**
     *  Fetch all row
     *
     * @param \PDOStatement $statement
     * @return array
     */
    public function fetchRows(\PDOStatement $statement) : array {
        $datas = [];
        while (($row = $statement->fetchAll(PDO::FETCH_ASSOC)) ) {
                $datas = $row;
        }
        return $datas;
    }

    
    /**
     *  Fetch one row with PDO::FETCH_COLUMN
     *
     * @param \PDOStatement $statement
     * @return void
     */
    public function fetchRow(\PDOStatement $statement){
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }


}