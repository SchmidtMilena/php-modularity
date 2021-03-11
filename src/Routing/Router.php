<?php

declare(strict_types=1);

namespace PhpModularity\Routing;

use RuntimeException;

class Router
{
    protected array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function direct(string $url)
    {
        $url = $this->getRoute($url);
        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            return $this->action($route['controller'], $route['method'], $route['type']);
        }

        throw new RuntimeException('No route find - route');
    }

    private function getRoute(string $url): string
    {
        return trim($url, '/');
    }

    private function action(string $controller, string $method, string $type)
    {
        if (method_exists($controller, $method)) {
            return (new $controller())->$method();
        }

        throw new RuntimeException('No route find - controller');
    }
}