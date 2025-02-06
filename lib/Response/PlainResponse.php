<?php

namespace Lib\Response;

class PlainResponse implements IResponse
{
    public function __construct(private string $data, private int $statusCode) {}

    public function transform(): string
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
