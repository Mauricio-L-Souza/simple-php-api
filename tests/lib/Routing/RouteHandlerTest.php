<?php

namespace Tests\Lib\Routing;

use Lib\Routing\Route;
use Lib\Routing\RouteHandler;
use Lib\Response\JsonResponse;
use Lib\Request\RequestBuilder;
use PHPUnit\Framework\TestCase;
use Tests\Builders\ServerDataBuilder;

class RouteHandlerTest extends TestCase
{
    public function test_it_can_handle_correct_route()
    {
        $SERVER_DATA = (new ServerDataBuilder)->withHost('localhost')
            ->withMethod('GET')
            ->withRoute('/test')
            ->forJsonRequest()
            ->build();

        $request = RequestBuilder::init($SERVER_DATA, [], [])
            ->addRouteData()
            ->addMethodData()
            ->addHostData()
            ->build();

        $handler = new RouteHandler();
        $response = $handler->handle($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(json_encode(['message' => '404 route /test not found'], JSON_PRETTY_PRINT), $response->transform());
        $this->assertEquals(404, $response->getStatusCode());
    }
}
