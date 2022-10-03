<?php

namespace App\Repositories;

use App\Interfaces\IPostRepository;
use App\Models\Post;
use Core\Helper;

class PostRepository extends Repository implements IPostRepository {

    public function __construct() {
       parent::__construct();  
    }

    /**
     * Retrieve all posts
     *
     * @return void
     */
    public function findAll(): array 
    {
        $posts = [];
        $statement= $this->query("select * from posts order by creation_date desc");
        $datas = $this->fetchRows($statement);
      
        foreach($datas as $data){
            $post = new Post();
            $post->hydrate($data);
            $posts[] = $post;
        }

        return $posts;
    }

    /**
     * Save a post
     * @throws Exception
     * @param Post $post
     * @return boolean
     */
    public function save(Post $post): bool {

        $query = ($post->getId() == 0) ? "INSERT INTO posts values(null,?,?,now())" : "UPDATE posts SET title=?,content=? where post_id=?";
        $params = ($post->getId() == 0) ? array($post->getTitle() ,$post->getContent()) : array($post->getId(),$post->getTitle(),$post->getContent());
        $statement =  $this->query($query ,$params);
        
        if ($statement) 
            return true;
        else {
            throw new \Exception("Sauvegarde impossible!");
            return false;
        }
    }

    public function findById(int $id) : Post {
        $statement =  $this->query("select * from posts where post_id= ?" ,array($id));

        if ($statement) {
            $data = $this->fetchRow($statement);
            $post = new Post();
            $post->hydrate($data);
            return $post;
        }
        else
            throw new \Exception("Aucun post ne correspond à l'identifiant '$id'");
        
    }

    /**
     * Delete a post
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id){
        $statement= $this->query('delete from posts where post_id=?',array($id));
        if($statement)
            return true;
        else
            throw new \Exception("Aucun post ne correspond à l'identifiant '$id'");
    }
}