<?php

namespace Controllers\Router;
use Exception;

abstract class Route
{
    //protected $controller;
    public function  __construct()
    {
    }
    //protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
    //{
    //    if (isset($array[$paramName])) {
    //        return $array[$paramName];
    //    } elseif ($canBeEmpty) {
    //        return null;
    //    }
    //    throw new \Exception("Missing parameter: {$paramName}");
    //}
    public function action(array $params, string $method = 'GET'): void
    {
        if ($_SERVER['REQUEST_METHOD'] == $method) {
            $this->get($params);
        }
        else {
            $this->post($params);
        }
    }

    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
    {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        } else {
            throw new Exception("Paramètre '$paramName' absent");
        }
    }

    public abstract function get(array $params);
    public abstract function post(array $params);
}
