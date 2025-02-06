<?php

namespace Tests\Lib\Routing;

use Lib\Routing\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    public function test_it_can_generate_correct_pattern()
    {
        $route = new Route('/test', 'GET', function () {});
        $this->assertEquals('#^/test$#', $route->getPattern());
    }

    public function test_it_can_generate_correct_pattern_with_one_param()
    {
        $route = new Route('/test/{param}', 'GET', function () {});
        $this->assertEquals('#^/test/([^/]+)$#', $route->getPattern());
    }

    public function test_it_can_generate_correct_pattern_with_two_param()
    {
        $route = new Route('/test/{param}/test_path/{param2}', 'GET', function () {});
        $this->assertEquals('#^/test/([^/]+)/test_path/([^/]+)$#', $route->getPattern());
    }
}
