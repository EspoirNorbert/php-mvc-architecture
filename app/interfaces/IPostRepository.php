<?php

namespace App\Interfaces;

use App\Models\Post;

interface IPostRepository
{
    public function findAll();
    public function findById(int $id);
    public function save(Post $post);
    public function delete(int $id);
}