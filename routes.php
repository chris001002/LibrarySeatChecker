<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => 'index.php',
    '/register' => 'register.php',
    '/login' => 'login.php',
    '/logout' => 'logout.php',
    '/add' => 'add.php',
    '/delete' => 'delete.php',
    '/update' => 'update.php'
];
if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    http_response_code(404);
    echo "Page not found";
}
