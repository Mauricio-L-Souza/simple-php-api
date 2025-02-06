<?php

namespace Tests\Builders;

class ServerDataBuilder
{
    private array $serverData = [];

    public function withHost(string $host): self
    {
        $this->serverData['HTTP_HOST'] = $host;
        return $this;
    }

    public function withMethod(string $method): self
    {
        $this->serverData['REQUEST_METHOD'] = $method;
        return $this;
    }

    public function withRoute(string $route): self
    {
        $this->serverData['REQUEST_URI'] = $route;
        return $this;
    }

    public function forJsonRequest(): self
    {
        $this->serverData['HTTP_ACCEPT'] = 'application/json';
        return $this;
    }

    public function build(): array
    {
        return $this->serverData;
    }
}
