<?php

declare(strict_types=1);

namespace PhpModularity\Core\Container;

use ReflectionClass;
use ReflectionMethod;
use ReflectionException;
use http\Exception\RuntimeException;

class AppDIContainer
{
    public function resolve(string $class)
    {
        try {
            $reflection = new ReflectionClass($class);
            if ($constructor = $reflection->getConstructor()) {
                return $reflection->newInstanceArgs($this->getDependencies($constructor));
            }
        } catch (ReflectionException $e) {
            throw new RuntimeException($e->getMessage());
        }
        return new $class();
    }

    private function getDependencies(ReflectionMethod $constructor): array
    {
        $dependencies = [];
        foreach ($constructor->getParameters() as $parameter) {
            $dependencies[] = $this->resolve($parameter->getClass()->name);
        }
        return $dependencies;
    }
}