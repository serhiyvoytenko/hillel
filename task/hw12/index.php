<?php

class Router
{
    private const DEFAULT_URL = [
        'controller' => 'Home',
        'action' => 'index',
    ];

    protected array $routes = [];

    public function add(string $route, array $params = []): void
    {
        $route = $this->convertToPreg($route);
        $this->routes[$route] = $params;
    }

    public function dispatch(string $url): void
    {
        $allData = $this->checkMatch($url);
        var_dump($allData);
    }

    public function checkMatch(string $url): array
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $parts)) {
                array_shift($parts);
                $parts = array_slice($parts, 0, 1);
                    foreach ($parts as $param => $value){
                        $this->routes[$route]['params'][$param] = (int)$value;
                }
                return $this->routes[$route];
            }
        }
        return self::DEFAULT_URL;
    }

    public function convertToPreg(string $route): string
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/{([a-z]+):([^}]+)}/', '(?P<\1>\2)', $route);
        return '/^' . $route . '$/i';
    }


}


$route = new Router();
$route->add('', ['controller' => 'Home', 'action' => 'index']);
$route->add('posts', ['controller' => 'PostsController', 'action' => 'show']);
$route->add('posts/{id:\d+}', ['controller' => 'PostsController', 'action' => 'show']);
$route->add('posts/create', ['controller' => 'PostsController', 'action' => 'create']);
$route->add('posts/{id:\d+}/edit', ['controller' => 'PostsController', 'action' => 'edit']);
$route->add('posts/{param:\d+}/view', ['controller' => 'PostsController', 'action' => 'view']);

$route->dispatch('posts/12/edit');
$route->dispatch('posts');
$route->dispatch('posts/create');
$route->dispatch('posts/34/view');
$route->dispatch('');