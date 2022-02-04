<?php

class Router
{
    private const DEFAULT_URL = [
        '' => ['controller' => 'Home', 'action' => 'index'],
    ];

    protected array $routes = [];

    public function add(string $route, array $params = []): void
    {
        $route = $this->convertToPreg($route);

        $this->routes[$route] = $params;
    }

    public function dispatch($url): void
    {
        $allData = $this->checkMatch($url);
        var_dump($allData);
    }

    public function checkMatch($url): array
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url)){
                return $this->routes[$route];
            }
        }
        return self::DEFAULT_URL;
    }

    public function convertToPreg(string $route): string
    {
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/{([a-z]+)}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/{([a-z]+):([^}]+)}/', '(?P<\1>\2)', $route);

        return '/^'. $route .'$/i';
    }


}


$route = new Router();
$route->add('', ['controller' => 'Home', 'action' => 'index']);
$route->add('posts', ['controller' => 'PostsController', 'action' => 'show']);
$route->add('posts/{id:\d+}', ['controller' => 'PostsController', 'action' => 'show']);
$route->add('posts/{id:\d+}/edit', ['controller' => 'PostsController', 'action' => 'edit']);
//$route1->dispatch('posts');
//$route1->dispatch('');

$route->dispatch('posts');
var_dump($route);