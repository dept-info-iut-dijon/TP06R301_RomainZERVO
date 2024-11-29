<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;

class RouteIndex extends Route
{
    protected $controller;

    public function __construct(MainController $controller)
    {
        $this->controller = $controller;
    }

    public function action($params = [], $method = 'GET')
    {
        if ($method === 'POST') {
            return $this->post($params);
        }
        return $this->get($params);
    }

    public function get($params = [])
    {
        // Appel du contrôleur et rendu de la vue pour GET
        $this->controller->index();
    }

    public function post($params = [])
    {
        // Logique pour POST, si applicable
    }
}