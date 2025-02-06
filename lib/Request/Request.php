<?php

namespace Lib\Request;

class Request
{
    public function __construct(
        public array $data,
        private string $host,
        private string $route,
        private string $method,
        private bool $isJsonRequest
    ) {}

    public function getHost(): string
    {
        return $this->host;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function isJsonRequest(): bool
    {
        return $this->isJsonRequest;
    }
}
