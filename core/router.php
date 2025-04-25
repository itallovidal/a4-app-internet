<?php

class Router {
    public function run() {
        require_once __DIR__ . '/helper.php';
        $url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
        
        if (empty($url)) {
            $url = 'home/index';
        }
        
        [$controllerName, $method] = explode('/', $url) + [1 => 'index'];

        $controllerName = ucfirst($controllerName) . 'Controller';
        $path = "../app/controllers/$controllerName.php";

        if (file_exists($path)) {
            require_once $path;
            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                $controller->$method();
                return;
            }
        }

        http_response_code(404);
        echo "Página não encontrada";
    }
}
