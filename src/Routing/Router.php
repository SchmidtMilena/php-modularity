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

    public function __construct(array $routes, AppDIContainer $container)
    {
        $this->routes = $routes;
        $this->container = $container;
    }

    public function direct(RequestInterface $request)
    {
        $url = $this->getRoute($request->getUrl());
        $route = $this->routes[$url];
        if (array_key_exists($url, $this->routes) && $this->checkType($request, $route)) {
            $parameters = $this->getRouteParameters($url, $route);
            return $this->action($route['controller'], $route['method'], $request->getType(), $parameters);
        }

        throw new RuntimeException('No route find - route');
    }

    private function getRoute(string $url): string
    {
        $route = htmlspecialchars(trim(parse_url($url, PHP_URL_PATH), '/'), ENT_QUOTES, 'utf-8');
        return $route === '' ? '/' : $route;
    }

    private function checkType(RequestInterface $request, array $route)
    {
        $requestType = $request->getType();
        if (is_array($route['type'])) {
            return in_array($request->getType(), $route['type'], true);
        }

        return $requestType === $route['type'];
    }

    private function getRouteParameters(string $url, array $route): array
    {
        preg_match_all('/{(.*?)}/', key($route), $parameters);
        if ($parameters[1]) {
            return $parameters[1];
        }
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