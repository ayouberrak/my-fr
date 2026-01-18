<?php

namespace App\Core;

use ReflectionClass;
use Exception;

class Container
{
    protected static $instance;
    protected array $bindings = [];
    protected array $instances = [];

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function singleton(string $key, callable $resolver): void
    {
        $this->bindings[$key] = function () use ($resolver, $key) {
            if (!isset($this->instances[$key])) {
                $this->instances[$key] = $resolver($this);
            }
            return $this->instances[$key];
        };
    }

    public function resolve(string $key)
    {
        if (isset($this->instances[$key])) {
            return $this->instances[$key];
        }



        if (isset($this->bindings[$key])) {
            $object = $this->bindings[$key]($this);
            return $object;
        }

        return $this->autowire($key);
    }

    protected function autowire(string $class)
    {
        if (!class_exists($class)) {
            throw new Exception("Class {$class} not found.");
        }

        $reflector = new ReflectionClass($class);

        if (!$reflector->isInstantiable()) {
            throw new Exception("Class {$class} is not instantiable.");
        }

        $constructor = $reflector->getConstructor();

        if (!$constructor) {
            return new $class;
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $type = $parameter->getType();
            if ($type && !$type->isBuiltin()) {
                $dependencies[] = $this->resolve($type->getName());
            } else {
                 if ($parameter->isDefaultValueAvailable()) {
                     $dependencies[] = $parameter->getDefaultValue();
                 } else {
                     throw new Exception("Cannot resolve parameter {$parameter->getName()} in class {$class}");
                 }
            }
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}
