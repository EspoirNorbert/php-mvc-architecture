<?php

namespace App\Controllers;

require_once('Controller.php');
require_once("config/View.php");
require_once("models/Post.php");

class PostController extends Controller {

    public function __construct() {
        $this->post = new Post();
    }

    public function index(): void {
        $posts = $this->post->findAll(); // get post list
        $totalPost = count($posts);
        $this->render("posts/index" ,compact('posts' , 'totalPost'));
    }

    public function create(): void {
        $this->render("posts/create");
    }

    private function save(): void {
        $inputs = $_POST;
        $errors = [];
        $id =  (isset($id))  ? $id : 0;
        extract($inputs);

        if((isset($title) && !empty($title)) && (isset($content) && !empty($content))) 
        {
            if ($this->post->save($title, $content , $id)){
                $this->index();
            } else {
                echo "A problem occur while saving post";
            }
    
        } else {
            $errors [] = [
                'title' => 'Title is required',
                'content' => 'Content is required'
            ];
            $renderViewError = $id == 0 ? 'create' : "details";
            $this->render("posts/${renderViewError}" , compact('errors'));
        }
    }

    public function store(): void {
        $this->save(); 
    }

    public function update()
    {
        $this->save(); 
    }
    
    public function detail(int $id): void {
        try {
            # code...
            $post = $this->post->findById($id);
            $this->render("posts/update" , compact('post')); 
        } catch (\Throwable $e) {
            # code...
            echo $e->getMessage();
        }  
    }

    public function delete($id): void
    {
        $post = $this->post->delete($id);
        if ($post) {
            header("location: /posts");
        } else {
            echo  "Suppression echoué";
        }
    }

}


