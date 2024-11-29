<?php

namespace Controllers\Router;
use Exception;

abstract class Route
{
    protected $controller;

    public abstract function action($params = [], $method = 'GET');

    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
    {
        if (isset($array[$paramName])) {
            return $array[$paramName];
        } elseif ($canBeEmpty) {
            return null;
        }
        throw new \Exception("Missing parameter: {$paramName}");
    }

    public abstract function get($params = []);
    public abstract function post($params = []);
}
