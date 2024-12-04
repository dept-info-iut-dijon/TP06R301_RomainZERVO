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
            'save-unit' => [UnitController::class, 'addUnit'], // Exemple pour POST
        ];
    }

    public function routing($get, $post): void
    {
        try {
            // Déterminer l'action (par défaut : 'index')
            $action = $get['action'] ?? 'index';

            if (!isset($this->routes[$action])) {
                throw new \Exception("Action '$action' non trouvée.");
            }

            // Récupération du contrôleur et de la méthode
            [$controllerClass, $method] = $this->routes[$action];
            $controller = new $controllerClass();

            // Vérifier la méthode HTTP et appeler la bonne méthode du contrôleur
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->$method($post);
            } else {
                $controller->$method($get);
            }
        } catch (\Exception $e) {
            // En cas d'erreur, afficher une page d'erreur
            $errorController = new MainController(); // Utiliser MainController pour afficher les erreurs
            $errorController->renderError($e->getMessage());
        }
    }
}
