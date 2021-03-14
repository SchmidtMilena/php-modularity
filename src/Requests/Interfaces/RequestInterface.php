<?php

declare(strict_types=1);

namespace PhpModularity\Requests\Interfaces;

interface RequestInterface
{
    public function getUrl(): string;

    public function getType(): string;

    public function getParameter(string $parameter): array;

    public function only(array $parameters): array;

    public function except(array $parameters): array;

}