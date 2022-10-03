<?php

require_once (dirname(__DIR__) . "/config/Route.php");
require_once (dirname(__DIR__) . "/controllers/HomeController.php");

$route = new Route();

/*** Home Routes*/
$route->get("/" , function(){
    $homeController = new HomeController();
    $homeController->index();
});

/*** Post routes */
$route->mount('/posts', function() use ($route) {

    require_once ("controllers/PostController.php");

    /**
     * Display Post list page
     */
    $route->get('/', function() {
        (new PostController())->index();
    });


    /**
     * Display form for create a post
     */
    $route->get('/create', function() {
        (new PostController())->create();
    });

    /**
     * Store a post
     */
    $route->post('/', function() {
        (new PostController())->store();
    });

    /**
     * Update a post
    */
    $route->post('/(\d+)/update', function() {
        (new PostController())->update();
    });
    
    
    
    /**
     * Get one post
    */
    $route->get('/(\d+)', function($id) {
        (new PostController())->detail(intval($id));
    });

    /**
     * Delete a post
     */
    $route->get('/(\d+)/delete', function($id) {
        (new PostController())->delete(intval($id));
    });

});

$route->run();