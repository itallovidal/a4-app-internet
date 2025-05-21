<?php

class Router {
    // Entidades que precisam de conexão com banco
    private $dbEntities = ['user', 'admin', 'product', 'news', 'icecream'];
    
    public function run() {
        require_once __DIR__ . '/helper.php';
        $url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
        
        // Trata login como caso especial (redireciona para user/login)
        if ($url === 'login') {
            $url = 'user/login';
        }
        
        // Divide a URL: [entidade, ação, parâmetro]
        $urlParts = explode('/', $url);
        $entity = $urlParts[0];
        $action = isset($urlParts[1]) ? $urlParts[1] : 'index';
        $param = isset($urlParts[2]) ? $urlParts[2] : null;
        
        // Nome do controller (primeira letra maiúscula + Controller)
        $controllerName = ucfirst($entity) . 'Controller';
        $controllerFile = "../app/controllers/{$entity}Controller.php";
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            
            // Verifica se a entidade precisa de conexão com o banco
            if (in_array($entity, $this->dbEntities)) {
                require_once '../app/model/database.php';
                $database = new MySQLDatabase();
                $db = $database->connect();
                $controller = new $controllerName($db);
            } else {
                $controller = new $controllerName();
            }
            
            // Verifica se o método existe
            if (method_exists($controller, $action)) {
                // Chama o método com ou sem parâmetro
                if ($param !== null) {
                    $controller->$action($param);
                } else {
                    $controller->$action();
                }
                return;
            }
        }
        
        // Página não encontrada
        http_response_code(404);
        echo "Página não encontrada";
    }
}
