<?php
// Autoload files or include them manually
    // membaca kode dari path yang ada
spl_autoload_register(function ($class) {
    $paths = ['controller', 'Model', 'view'];
    foreach ($paths as $path) {
        $file = __DIR__ . "/$path/$class.php";
        if (file_exists($file)) {
            include_once $file;
        }
    }
});

// Load routes from web.php
$routes = include __DIR__ . '/web.php';     

// Parse the current URL and request method
$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Find the matching route
$foundRoute = null;
$parameters = [];

foreach ($routes[$requestMethod] ?? [] as $route => $handler) {
    // Convert route pattern (e.g., "/user/{id}") to a regex pattern
    $pattern = preg_replace('/\{[^\/]+\}/', '([^/]+)', $route);
    $pattern = "#^" . $pattern . "$#";

    // Check if the current request matches the route pattern
    if (preg_match($pattern, $requestUri, $matches)) {
        $foundRoute = $handler;
        $parameters = array_slice($matches, 1); // Capture dynamic parameters
        break;
    }
}

if ($foundRoute) {
    // Extract controller and method from the handler
    list($controllerName, $methodName) = explode('@', $foundRoute);

    // Create an instance of the controller
    $controller = new $controllerName();

    // Call the controller method with parameters
    call_user_func_array([$controller, $methodName], $parameters);
} else {
    // Send a 404 response if no route matches
    http_response_code(404);
    echo "404 - Page Not Found";
}
