<?php

declare(strict_types=1);

namespace PhpModularity\Routing;

use RuntimeException;
use PhpModularity\Core\Container\AppDIContainer;
use PhpModularity\Requests\Interfaces\RequestInterface;

class Router
{
    private array $routes;
    private AppDIContainer $container;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
        $this->container = new AppDIContainer();
    }

    public function direct(RequestInterface $request)
    {
        $url = $this->getRoute($request->getUrl());
        if (array_key_exists($url, $this->routes)) {
            $route = $this->routes[$url];
            $parameters = $this->getRouteParameters($url, $route);
            return $this->action($route['controller'], $route['method'], $route['type'], $parameters);
        }

        throw new RuntimeException('No route find - route');
    }

    private function getRoute(string $url): string
    {
        return htmlspecialchars(trim(parse_url($url, PHP_URL_PATH), '/'), ENT_QUOTES, 'utf-8');
    }

    private function getRouteParameters(string $url, array $route): array
    {
        return [];
    }

    private function action(string $controller, string $method, string $type, array $parameters)
    {
        if (method_exists($controller, $method)) {
            return ($this->container->resolve($controller))->$method();
        }

        throw new RuntimeException('No method find - controller');
    }

}