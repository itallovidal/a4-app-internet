<?php

class Router
{
    // Lista de entidades que devem ser tratadas com acesso ao banco de dados
    private $dbEntities = ['home', 'products', 'news', 'admin', 'login', 'users'];

    public function run()
    {
        require_once __DIR__ . '/helper.php';

        // Verifica se existe um parâmetro na URL, caso contrário, define como home
        $url = $_GET['url'] ?? 'home';

        $urlParts = explode('/', $url);

        $firstUrlPart = $urlParts[0];
        $secondUrlPart = isset($urlParts[1]) ? $urlParts[1] : $urlParts[0];

        // Verifica se existe uma pasta com o nome da primeira parte da url
        $directoryPath = "../app/controllers/{$firstUrlPart}";

        if (is_dir($directoryPath)) {

            // Se for uma pasta, queremos acessar o controller de dentro dela
            $controllerName = ucfirst($secondUrlPart) . 'Controller';
            $controllerFile = "{$directoryPath}/{$secondUrlPart}Controller.php";

            $entity = $secondUrlPart; // A entidade, nesse caso, é o nome do controller dentro da pasta

            $secondUrlPart_exits = isset($urlParts[1]); // Verifica se existe uma segunda parte na URL

            // Verifica se existe uma terceira parte na URL, caso não exista, usa a segunda parte, e se não existir, usa a primeira parte
            $thirdUrlPart = isset($urlParts[2]) ? $urlParts[2] : ($secondUrlPart_exits ? $urlParts[1] : $urlParts[0]);

            $secondUrlPart = $thirdUrlPart; // Atualiza a segunda parte da URL para a terceira parte
        } else {

            // Se não for uma pasta, segue o fluxo padrão
            $controllerName = ucfirst($firstUrlPart) . 'Controller';
            $controllerFile = "../app/controllers/{$firstUrlPart}Controller.php";

            $entity = $firstUrlPart;
        }

        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Verifica se a classe precisa de acesso ao banco de dados
            if (in_array($entity, $this->dbEntities)) {
                require_once '../app/model/database.php';
                $database = new MySQLDatabase();
                $db = $database->connect();
                $controller = new $controllerName($db);
            } else {
                $controller = new $controllerName();
            }

            // Verifica se existe um método na classe com o nome da segunda parte da URL
            if (method_exists($controller, $secondUrlPart)) {
                
                $controller->$secondUrlPart();
                return;
            }
        }

        // Página não encontrada
        http_response_code(404);
        echo "Página não encontrada";
    }
}
