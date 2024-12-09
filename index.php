<?php
date_default_timezone_set('Asia/Jakarta');
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
    '/about' => 'about.php',
    '/sign_out' => 'sign_out.php',
    '/test' => '../expired.php',
];
if (array_key_exists($path, $routes)) {
    require "pages/" . $routes[$path];
} else if (strpos($path, '/img/') === 0) {
    header('Content-Type: image/jpeg');
    readfile("img/" . substr($path, 5));
} else if ($path == '/seats') {
    require_once "database.php";
    $database = new Database();
    if (isset($_SESSION["user"]) && $database->hasTakenSeat($_SESSION['user']['id'])) {
        require "pages/countDown.php";
    } else {
        require "pages/seats.php";
    }
} else {
    http_response_code(404);
    echo "Page not found";
    exit();
}
