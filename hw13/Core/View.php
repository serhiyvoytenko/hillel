<?php

namespace MVC\Core;

class View
{
    protected static string $viewPath = '/App/Views/';

    public static function render($view, $args = []): void
    {
        extract($args, EXTR_SKIP);

        $file = BASE_DIR . static::$viewPath . $view . '.php';

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \RuntimeException("{$file} not found");
        }
    }
}