<?php

require_once 'controllers/Controller.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'])['path'];
$controller = new Controller();

if ($requestUri === '/') {
    $controller->login();
} elseif ($requestUri === '/profile') {
    $controller->profile();
}
elseif ($requestUri === '/logout') {
    $controller->logout();
}
 else {
    http_response_code(404);
    echo "Page not found";
}
?>
