<?php

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\UnitController;

class RouterFile
{
    private array $routes;

    public function __construct()
    {
        // Initialisation des routes avec méthodes des contrôleurs
        $this->routes = [
            'index' => [MainController::class, 'index'],
            'add-unit' => [MainController::class, 'displayAddUnit'],
            'list-units' => [UnitController::class, 'listUnits'],
            'save-unit' => [UnitController::class, 'addUnit'],
            'delete-unit' => [UnitController::class, 'deleteUnit'],
        ];
    }

    public function routing($get, $post): void
    {
        $action = $get['action'] ?? 'index';
        $method = !empty($post) ? 'POST' : 'GET';

        if (isset($this->routes[$action])) {
            [$controllerClass, $method] = $this->routes[$action];
            $controller = new $controllerClass();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($action === 'delete-unit' && isset($post['id'])) {
                    $controller->$method($post['id']);
                } else {
                    $controller->$method($post);
                }
            } else {
                $controller->$method($get);
            }
        } else {
            throw new \Exception("Action '$action' non trouvée.");
        }
    }

}
