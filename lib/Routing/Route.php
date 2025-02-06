<?php


namespace Lib\Routing;

class Route
{
    private string $pattern;
    private array $params;
    private $callable;

    public function __construct(private string $path, private string $method, callable $callable)
    {
        $this->callable = $callable;
        $this->prepare();
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getCallable(): callable
    {
        return $this->callable;
    }

    private function prepare()
    {
        $paramNames = [];
        $pattern = preg_replace_callback('/\{(\w+)\}/', function ($matches) use (&$paramNames) {
            $paramNames[] = $matches[1];
            return '([^/]+)';
        }, $this->path);

        $this->pattern = "#^" . $pattern . "$#";
        $this->params = $paramNames;
    }
}
