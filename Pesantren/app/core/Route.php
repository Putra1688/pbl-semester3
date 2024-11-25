<?php

namespace App\Core;
class Route
{
    public string $method;
    public string $path;
    public string $controller;
    public string $function;
    public array $params;

    public function __construct(string $method, string $path, string $controller, string $function, $params = [])
    {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
        $this->function = $function;
        $this->params = $params;
    }
}