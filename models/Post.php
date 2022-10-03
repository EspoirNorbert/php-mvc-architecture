<?php

require_once ("models/Model.php");

class Post extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Retrieve all posts
     *
     * @return void
     */
    public function findAll()
    {
        $posts = [];
        $statement = $this->query("select * from posts order by creation_date desc");
    
        while (($row = $statement->fetch())) {
            $post = [
                "id" => $row['post_id'],
                "title" => $row['title'],
                "content" => $row['content'],
                "date" => $row['creation_date'],
            ];

            $posts[] = $post;
        }
        return $posts;
    }


    /**
     * Save a post
     *
     * @return void
     */
    public function save(string $title , string $content ,int $id = 0) {
        $query = ($id == 0) ? "INSERT INTO posts values(null , ?,?,now())" : "UPDATE posts SET title = ? , content = ? where post_id = ?";
        $array = ($id == 0) ? array($title , $content) : array($id , $title ,$content);
      
        $statement = $this->query($query ,$array);
        
        if($statement) 
            return true;
        else 
            throw new Exception("Sauvegarde impossible!");
    }

    public function findById(int $id){
        $statement = $this->query("select * from posts where post_id= ?" , array($id));
        if ($statement->rowCount() == 1)
            return $statement->fetch(PDO::FETCH_ASSOC); // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun post ne correspond à l'identifiant '$id'");

    }

    /**
     * Delete a post
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id){
        $query="delete from posts where post_id=?";
        $statement=$this->query($query,array($id));
        if($statement)
            return true;
        else
            throw new Exception("Aucun post ne correspond à l'identifiant '$id'");
    }
}