<?php

namespace MVC\Core;

class Controller
{
    protected string $validation = "";

    public function __call($name, $args): void
    {
        $args = $args[0] ?? $args;

        if ($this->before($name)) {
            call_user_func_array([$this, $name], $args);
            $this->after();
        } else {
            throw new \RuntimeException($this->validation);
        }
    }

    protected function before($actionName): bool
    {
        return true;
    }

    protected function after(): void
    {}
}