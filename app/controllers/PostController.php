<?php

namespace App\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Core\Helper;

class PostController extends Controller {

    private $postRepository;

    public function __construct() {
        $this->postRepository = new PostRepository();
    }

    public function index(): void {
        $posts = $this->postRepository->findAll(); // get post list
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
            $post = new Post($id , $title , $content);
            if ($this->postRepository->save($post)){
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
            $post = $this->postRepository->findById($id);
            $this->render("posts/update" , compact('post')); 
        } catch (\Throwable $e) {
            # code...
            echo $e->getMessage();
        }  
    }

    public function delete($id): void
    {
        $post = $this->postRepository->delete($id);
        if ($post) {
            header("location: /posts");
        } else {
            echo  "Suppression echoué";
        }
    }

}


