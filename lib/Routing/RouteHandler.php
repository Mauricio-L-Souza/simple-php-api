<?php

namespace Lib\Routing;

use Lib\Request\Request;
use Lib\Response\IResponse;
use Lib\Response\JsonResponse;
use Lib\Response\PlainResponse;

class RouteHandler
{
    public function handle(Request $request): IResponse
    {
        $requestRoute = $request->getRoute();
        $route = $this->findRoute($requestRoute);

        if ($route === null) {
            $message = '404 route ' . $requestRoute . ' not found';
            if ($request->isJsonRequest()) {
                return new JsonResponse(['message' => $message], 404);
            }
            return new PlainResponse($message, 404);
        }

        return call_user_func($route->getCallable(), $request);
    }

    private function findRoute($requestRoute): ?Route
    {
        foreach (Router::$routes as $pattern => $route) {
            if (preg_match($pattern, $requestRoute)) {
                return $route;
            }
        }

        return null;
    }
}
