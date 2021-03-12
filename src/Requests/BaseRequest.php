<?php

declare(strict_types=1);

namespace PhpModularity\Requests;

use http\Exception\RuntimeException;
use PhpModularity\Requests\Interfaces\RequestInterface;

class BaseRequest implements RequestInterface
{
    private array $parameters;
    private string $url;

    public function __construct(array $request, string $url)
    {
        $this->parameters = $request;
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getParameter(string $parameter): array
    {
        if (array_key_exists($parameter, $this->parameters)) {
            return [
                'parameter' => $this->parameters[$parameter]
            ];
        }
        throw new RuntimeException('Invalid parameter');
    }

    public function only(array $parameters): array
    {
        $request = [];
        foreach ($parameters as $parameter) {
            if (array_key_exists($parameter, $this->parameters)) {
                $request[$parameter] = $this->parameters[$parameter];
            }
        }
        return $request;
    }

    public function except(array $parameters): array
    {
        $request = [];
        $arrayParameters = array_diff($this->parameters, $parameters);
        foreach ($arrayParameters as $parameter) {
            $request[$parameter] = $this->parameters[$parameter];
        }
        return $request;
    }
}