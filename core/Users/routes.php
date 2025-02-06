<?php

use Lib\Routing\Router;
use Lib\Request\Request;
use Lib\Response\PlainResponse;

Router::get('/users', function (Request $request) {
    return new PlainResponse("Hello World! from users route.", 200);
});

Router::get('/hello', function (Request $request) {
    return new PlainResponse("Hello {$request->getData()['name']}.", 200);
});
