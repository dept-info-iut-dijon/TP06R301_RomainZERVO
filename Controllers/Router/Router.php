<?php

declare(strict_types=1);

namespace Controllers\Router;

use Controllers\AddUnitController;
use Controllers\MainController;
use Controllers\Router\Route\RouteAddOrigin;
use Controllers\Router\Route\RouteAddUnit;
use \Controllers\Router\Route\RouteIndex;
use Controllers\UnitController;
use Exception;

class Router
{
    private array $routeList = [];
    private array $ctrlList = [];
    private mixed $action_key;

    public function __construct($name_of_action_key = "action")
    {
        $this->action_key = $name_of_action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList(): void
    {
        $this->ctrlList = [
            "home" => new MainController(),
            "add-unit" => new UnitController(),
        ];
    }

    private function createRouteList(): void
    {
        $this->routeList = [
            "home" => new RouteIndex($this->ctrlList["home"]),
            "add-unit" => new RouteAddUnit($this->ctrlList["add-unit"]),
        ];
    }


    public function routing($get, $post): void
    {
        if (isset($get["action"])) {
            $this->action_key = $get["action"];

            if (array_key_exists($this->action_key, $this->routeList)) {
                if (!empty($post)) {
                    $this->routeList[$this->action_key]->action($post,'POST');
                } else {
                    $this->routeList[$this->action_key]->action($get, 'GET');
                }
            } else {
                throw new Exception("Undefined action key: " . $this->action_key);
            }

        } else {
            $this->routeList["home"]->action($get,'GET' );
        }
    }
}
