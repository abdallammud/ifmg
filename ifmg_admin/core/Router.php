<?php
/**
 * Custom Router class
 */

class Router
{
    private $routes = [];

    public function add($url, $controller, $action, $middleware = [])
    {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function dispatch()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        foreach ($this->routes as $route) {
            $pattern = preg_replace('/\{([a-zA-Z0-9]+)\}/', '(?P<$1>[^/]+)', $route['url']);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $url, $matches)) {
                // Execute Middleware if any
                if (!empty($route['middleware'])) {
                    $mwClass = $route['middleware'][0];
                    $mwMethod = $route['middleware'][1];
                    $mwClass::$mwMethod();
                }

                $controllerName = $route['controller'];
                $actionName = $route['action'];

                // params from regex
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    call_user_func_array([$controller, $actionName], $params);
                    return;
                } else {
                    $this->error404("Controller not found: $controllerName");
                }
            }
        }

        $this->error404("Route not found: $url");
    }

    private function error404($message = "Page not found")
    {
        http_response_code(404);
        echo "404 - " . $message;
        exit();
    }
}
