<?php

namespace Controllers;

use Exception;

abstract class Route {
    protected array $params = [];

    public function action($params = [], $method = 'GET') {
        if ($method === 'GET') {
            return $this->get($params);
        } elseif ($method === 'POST') {
            return $this->post($params);
        }
        throw new Exception("Méthode $method non prise en charge.");
    }

    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true) {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        }
        throw new Exception("Paramètre '$paramName' absent");
    }

    abstract public function get($params = []);
    abstract public function post($params = []);
}