<?php

namespace App\Core;

class Router{
    private static array $routes = [];
    private const DEFAULT_PATH = "/login";
    public static function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[] = new Route($method, $path, $controller, $function);
    }

    private static function matchRequestWithRoute(string $method, string $path): ?Route
    {
        foreach (self::$routes as $route) {
            /** @var Route $route */
            if ($route->path === $path && $route->method === $method) {
                return $route;
            }
        }
        return null;
    }

    public static function run(): void
    {
        $pathInfo = $_SERVER["PATH_INFO"] ?? self::DEFAULT_PATH;
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $matchedRoute = self::matchRequestWithRoute($requestMethod, $pathInfo);

        if ($matchedRoute) {
            $controller = new $matchedRoute->controller;
            $function = $matchedRoute->function;
            $controller->$function();
            return;
        }
        http_response_code(404);
        echo "CONTROLLER NOT FOUND";
    }
}