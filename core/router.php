<?php

class Router {
    private $dbEntities = ['users', 'admin', 'login', 'products', 'news', 'icecream'];

    public function run() {
        require_once __DIR__ . '/helper.php';
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        $urlParts = explode('/', $url);

        $entity = $urlParts[0]; // Pode ser pasta ou entidade simples
        $action = isset($urlParts[1]) ? $urlParts[1] : $urlParts[0];
        $param = isset($urlParts[2]) ? $urlParts[2] : null;

        // Verifica se existe uma pasta com o nome da entidade
        $directoryPath = "../app/controllers/{$entity}";

        if (is_dir($directoryPath)) {
            // Se for uma pasta, o controller está dentro dela
            $controllerName = ucfirst($action) . 'Controller';
            $controllerFile = "{$directoryPath}/{$action}Controller.php";

            $finalEntity = $action; // A entidade, nesse caso, é o nome do controller dentro da pasta

            $action = isset($urlParts[2]) ? $urlParts[2] : (isset($urlParts[1]) ? $urlParts[1] : $urlParts[0]);
            // $param = isset($urlParts[3]) ? $urlParts[3] : $urlParts[1];
        } else {
            // Se não for uma pasta, segue o fluxo padrão
            $controllerName = ucfirst($entity) . 'Controller';
            $controllerFile = "../app/controllers/{$entity}Controller.php";

            $finalEntity = $entity;
        }

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            if (in_array($finalEntity, $this->dbEntities)) {
                require_once '../app/model/database.php';
                $database = new MySQLDatabase();
                $db = $database->connect();
                $controller = new $controllerName($db);
            } else {
                $controller = new $controllerName();
            }

            if (method_exists($controller, $action)) {
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

