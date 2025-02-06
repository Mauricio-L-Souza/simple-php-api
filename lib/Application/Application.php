<?php

namespace Lib\Application;

use Lib\Request\Request;
use Lib\Routing\RouteHandler;

class Application
{
    public function run(Request $request)
    {
        $handler = new RouteHandler();
        $response = $handler->handle($request);
        echo $response->transform();
        exit;
    }
}
