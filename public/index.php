<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Controllers\PostController;
use Core\Route;


$route = new Route();
$route->get("/" ,'\App\Controllers\HomeController@index');
$route->mount('/posts', function() use ($route) {

    $route->get('/','\App\Controllers\PostController@index');
    $route->get('/create', '\App\Controllers\PostController@create');
    $route->post('/', '\App\Controllers\PostController@store');
    $route->post('/(\d+)/update', '\App\Controllers\PostController@update');
    $route->get('/(\d+)', function($id) {(new PostController())->detail(intval($id));});
    $route->get('/(\d+)/delete', function($id) {(new PostController())->delete(intval($id));});

});

$route->run();