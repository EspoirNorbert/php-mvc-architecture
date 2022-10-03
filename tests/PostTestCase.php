<?php

namespace App\Tests;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostTestCase {

    private $postRepository;

    public function __construct() {
        $this->postRepository = new PostRepository();
    }

    public function createPost(Post $post): void
    { 
        try 
        {
            $post = $this->postRepository->save($post);
            if ($post) echo "Un post a été cree avec success";
            
        } catch (\Throwable $e) {
            echo "Une erreur s'est arrivé lors de la creation d'un article  <br>";
            echo $e->getMessage();
        } 
    }

    public function findAllPost(): void
    {
       $posts = $this->postRepository->findAll();
       foreach($posts as $post){
           extract($post);
           //echo "#$id - $title - publié le $date <br>" ;
       }
    }

    public function findById(int $id)
    {
        try {
            # code...
            $post = $this->postRepository->findById($id);
            var_dump($post);
        } catch (\Throwable $e) {
            # code...
            echo $e->getMessage();
        }
    }

    public function UpdatePost($title ,$content , $id) : void {
        try 
        {
            $post = $this->postRepository->save($title ,$content ,$id);
            if ($post) echo "Un post N°$id a été mise à jour avec success <br>";
            
        } catch (\Throwable $e) {
            echo "Une erreur est arrivé lors de la mise à jour d'un article  <br>";
            echo $e->getMessage();
        } 
    }

    public function DeletePost(int $int) : void {
        try 
        {
            $post = $this->postRepository->delete(4);
            if ($post) echo "Un post N°4 a été supprimé avec success <br>";
            
        } catch (\Throwable $e) {
            echo "Une erreur est arrivé lors de la suppression d'un article  <br>";
            echo $e->getMessage();
        } 
    }

}

$postTestCase = new PostTestCase();
//$postTestCase->createPost(new Post(null , "Mon Cinquieme poste" , "Bonjour c'est mon 5éme poste"));
//$postTestCase->findAllPost();
//$postTestCase->UpdatePost("Mon Quatriéme post modifié" , "Modification" , 6);
//$postTestCase->findAllPost();
//$postTestCase->DeletePost(4);

//echo "Les articles apres suppression <br>" ;
//echo  "--------------------------------------<br>";
// $postTestCase->findById(9);
