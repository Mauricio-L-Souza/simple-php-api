<?php

namespace Lib\Routing;

class Router
{
    static $routes = [];

    public static function get(string $uri, callable $callable)
    {
        $route = new Route($uri, 'GET', $callable);
        self::$routes[$route->getPattern()] = $route;
    }

    public static function post(string $uri, callable $callable)
    {
        $route = new Route($uri, 'POST', $callable);
        self::$routes[$route->getPattern()] = $route;
    }
}
