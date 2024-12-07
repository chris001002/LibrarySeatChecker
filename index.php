<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => 'home.php',
    '/log_in' => 'log_in.php',
    '/sign_up' => 'sign_up.php',
    '/logout' => 'logout.php',
    '/addUser' => 'addUser.php',
    '/delete' => 'delete.php',
    '/update' => 'update.php',
    '/seats' => 'seats.php',
    '/about' => 'about.php',
    '/sign_out' => 'sign_out.php'
];
if (array_key_exists($path, $routes)) {
    require "pages/" . $routes[$path];
} else if (strpos($path, '/img/') === 0) {
    header('Content-Type: image/jpeg');
    readfile("img/" . substr($path, 5));
} else {
    http_response_code(404);
    echo "Page not found";
}
