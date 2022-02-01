<?php

class Router
{

    private array $routes;

    public function dispatch(string $url): void
    {
        foreach ($this->routes as $key => $route) {
            if ($url===$key){
                var_dump($url, $route);
            }
        }
    }

    public function add(string $url, array $params): void
    {
        $this->routes[$url] = $params;
    }

}

$route1 = new Router();
$route1->add('', ['controller' => 'Home', 'action' => 'index']);
$route1->add('posts', ['controller' => 'PostsController', 'action' => 'show']);
$route1->add('posts/{id:\d+}', ['controller' => 'PostsController', 'action' => 'show']);
$route1->add('posts/{id:\d+}/edit', ['controller' => 'PostsController', 'action' => 'edit']);
$route1->dispatch('posts');
//$route1->dispatch('');

//var_dump($route1);
