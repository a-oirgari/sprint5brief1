<?php

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $controller, $action, $middleware = [])
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function get($path, $controller, $action, $middleware = [])
    {
        $this->addRoute('GET', $path, $controller, $action, $middleware);
    }

    public function post($path, $controller, $action, $middleware = [])
    {
        $this->addRoute('POST', $path, $controller, $action, $middleware);
    }

    public function dispatch($uri, $method)
    {
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            $params = $this->matchRoute($uri, $route['path']);

            if ($params !== false && $route['method'] === $method) {
                if (!empty($route['middleware'])) {
                    $this->executeMiddleware($route['middleware']);
                }

                $controllerClass = $route['controller'];
                $action = $route['action'];

                if (!class_exists($controllerClass)) {
                    $this->notFound();
                    return;
                }

                $controller = new $controllerClass();

                if (!method_exists($controller, $action)) {
                    $this->notFound();
                    return;
                }

                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        $this->notFound();
    }

    private function matchRoute($uri, $pattern)
    {
        $uri = trim($uri, '/');
        $pattern = trim($pattern, '/');

        if ($uri === '' && $pattern === '') {
            return [];
        }

        if ($uri === $pattern) {
            return [];
        }

        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $pattern);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches);
            return $matches;
        }

        return false;
    }

    private function executeMiddleware($middleware)
    {
        if (is_array($middleware) && isset($middleware['auth'])) {
            AuthMiddleware::handle();
            if (!empty($middleware['auth'])) {
                AuthMiddleware::checkRole($middleware['auth']);
            }
        }
        elseif (in_array('auth', $middleware)) {
            AuthMiddleware::handle();
        }
    }

    private function notFound()
    {
        http_response_code(404);
        View::render('errors/404');
        exit;
    }
}