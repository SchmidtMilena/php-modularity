<?php

declare(strict_types=1);

namespace PhpModularity\Requests;

use RuntimeException;
use PhpModularity\Requests\Interfaces\RequestInterface;

class BaseRequest implements RequestInterface
{
    private array $request;
    private string $url;
    private string $type;

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->url = $_SERVER['REQUEST_URI'];
        $this->type = $_SERVER['REQUEST_METHOD'];
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getParameter(string $parameter): array
    {
        if (array_key_exists($parameter, $this->request)) {
            return [
                'parameter' => $this->request[$parameter]
            ];
        }
        throw new RuntimeException('Invalid parameter');
    }

    public function only(array $parameters): array
    {
        $request = [];
        foreach ($parameters as $parameter) {
            if (array_key_exists($parameter, $this->request)) {
                $request[$parameter] = $this->request[$parameter];
            }
        }
        return $request;
    }

    public function except(array $parameters): array
    {
        $request = [];
        $arrayParameters = array_diff($this->request, $parameters);
        foreach ($arrayParameters as $parameter) {
            $request[$parameter] = $this->request[$parameter];
        }
        return $request;
    }
}