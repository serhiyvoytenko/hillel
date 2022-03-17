<?php

namespace DI;

use ReflectionClass;
use stdClass;

class Container
{
    private array $objects;

    public function __construct()
    {
        $this->objects = [
            Db::class => fn() => new Db(),
            UserRepository::class => fn() => new UserRepository($this->get(Db::class)),
            UserController::class => fn() => new UserController($this->get(UserRepository::class)),
        ];
    }

    public function has(string $id): bool
    {
        return isset($this->objects[$id]) || class_exists($id);
    }

    /**
     * @throws \ReflectionException
     */
    public function get(string $id): mixed
    {
        $this->prepareObject($id);
        return ($this->objects[$id]) ? $this->objects[$id]() : $this->prepareObject($id); //TODO add prepareObject
//        return ($this->objects[$id]) ? $this->objects[$id]() : null; //TODO add prepareObject
    }

    /**
     * @throws \ReflectionException
     */
    private function prepareObject(string $class): object
    {
        $reflectionObject = new ReflectionClass($class);
        $constructorObject = $reflectionObject->getConstructor();
//        var_dump($constructorObject);

        if (empty($constructorObject)) {
            return new $class;
        }

        return new $class;
    }

}