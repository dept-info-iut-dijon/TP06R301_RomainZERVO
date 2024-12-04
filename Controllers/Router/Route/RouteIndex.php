<?php

use Controllers\MainController;
use Controllers\Route;

class RouteIndex extends Route {
    private MainController $controller;

    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function get($params = []) {
        return $this->controller->index();
    }

    public function post($params = []) {
    }
}
