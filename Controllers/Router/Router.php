<?php

declare(strict_types=1);

namespace Controllers\Router;

use \Controllers\Router\Route\RouteIndex;

class Router
{
    private array $routeList = [];
    private array $ctrlList = [];
    private mixed $actionKey;

    public function __construct($name_of_action_key = "action")
    {
        $this->actionKey = $name_of_action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList(): void
    {
        $this->ctrlList['index'] = new \Controllers\MainController();
    }

    private function createRouteList(): void
    {
        $this->routeList['index'] = new RouteIndex($this->ctrlList['index']);
    }

    public function routing($get, $post)
    {
        $action = $get[$this->actionKey] ?? 'index'; // Par défaut, c'est 'index'
        if (isset($this->routeList[$action])) {
            $route = $this->routeList[$action];
            return $route->action($get, $_SERVER['REQUEST_METHOD']);
        }
        throw new \Exception("Route not found");
    }
}
