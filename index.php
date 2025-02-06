<?php

use Lib\Request\RequestBuilder;
use Lib\Application\Application;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/core/modules.php';

function bootstrap()
{
    $request = RequestBuilder::init($_SERVER, $_POST, $_GET)
        ->addHostData()
        ->addRouteData()
        ->addPostData()
        ->addQueryData()
        ->addMethodData()
        ->build();

    $app = new Application();
    $app->run($request);
}

bootstrap();
