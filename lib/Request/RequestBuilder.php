<?php

namespace Lib\Request;

use Lib\Request\Request;

class RequestBuilder
{
    private string $host;
    private string $route;
    private string $method;
    private array $data = [];
    private bool $isJsonRequest = false;

    public function __construct(private array $serverData, private array $rawPostData, private array $rawQueryData)
    {
        $this->isJsonRequest = $serverData['HTTP_ACCEPT'] === 'application/json';
    }

    public static function init(array $serverData, array $rawPostData, array $rawQueryData): self
    {
        return new self($serverData, $rawPostData, $rawQueryData);
    }

    public function addPostData(): self
    {
        $postData = filter_var_array($this->rawPostData, FILTER_SANITIZE_SPECIAL_CHARS) ?: [];
        $this->data = array_merge($this->data, $postData);

        $jsonData = json_decode(file_get_contents('php://input'), true);
        if (is_array($jsonData)) {
            $this->data = array_merge($this->data, $jsonData);
        }

        return $this;
    }

    public function addQueryData(): self
    {
        $queryData = filter_var_array($this->rawQueryData, FILTER_SANITIZE_SPECIAL_CHARS) ?: [];
        $this->data = array_merge($this->data, $queryData);
        return $this;
    }

    public function addRouteData(): self
    {
        $this->route = strtok($this->serverData['REQUEST_URI'], '?');
        return $this;
    }

    public function addHostData(): self
    {
        $this->host = $this->serverData['HTTP_HOST'];
        return $this;
    }

    public function addMethodData(): self
    {
        $this->method = $this->serverData['REQUEST_METHOD'];
        return $this;
    }

    public function build(): Request
    {
        return new Request(
            data: $this->data,
            host: $this->host,
            route: $this->route,
            method: $this->method,
            isJsonRequest: $this->isJsonRequest
        );
    }
}
