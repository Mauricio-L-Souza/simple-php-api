<?php

namespace Lib\Response;

interface IResponse
{
    public function transform(): string;
    public function getStatusCode(): int;
}
