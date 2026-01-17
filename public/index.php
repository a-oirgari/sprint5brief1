<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../src/helpers.php';
require_once __DIR__ . '/../src/Models/Database.php';
require_once __DIR__ . '/../src/Core/View.php';
require_once __DIR__ . '/../src/Core/Router.php';
require_once __DIR__ . '/../src/Models/Role.php';
require_once __DIR__ . '/../src/Models/User.php';
require_once __DIR__ . '/../src/Middleware/AuthMiddleware.php';
require_once __DIR__ . '/../src/Controllers/AuthController.php';
require_once __DIR__ . '/../src/Controllers/CandidateController.php';
require_once __DIR__ . '/../src/Controllers/RecruiterController.php';
require_once __DIR__ . '/../src/Controllers/AdminController.php';


$router = new Router();


$router->get('/', 'AuthController', 'home');
$router->get('/register', 'AuthController', 'showRegisterForm');
$router->post('/register', 'AuthController', 'register');
$router->get('/login', 'AuthController', 'showLoginForm');
$router->post('/login', 'AuthController', 'login');
$router->get('/logout', 'AuthController', 'logout', ['auth']);


$router->get('/candidate/dashboard', 'CandidateController', 'dashboard', [
    'auth' => ['candidate']
]);
$router->get('/candidate/profile', 'CandidateController', 'profile', [
    'auth' => ['candidate']
]);


$router->get('/recruiter/dashboard', 'RecruiterController', 'dashboard', [
    'auth' => ['recruiter']
]);
$router->get('/recruiter/profile', 'RecruiterController', 'profile', [
    'auth' => ['recruiter']
]);


$router->get('/admin/dashboard', 'AdminController', 'dashboard', [
    'auth' => ['admin']
]);
$router->get('/admin/users', 'AdminController', 'manageUsers', [
    'auth' => ['admin']
]);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = rtrim($basePath, '/');


if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}


$uri = '/' . ltrim($uri, '/');

$method = $_SERVER['REQUEST_METHOD'];

try {
    $router->dispatch($uri, $method);
} catch (Exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    echo "Une erreur est survenue : " . $e->getMessage();
}