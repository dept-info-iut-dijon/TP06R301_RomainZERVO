<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;
use Entities\Unit;
use Models;
use Models\UnitDAO;

class RouteAddUnit extends Route
{
    private UnitController $unitController;

    /**
     * @inheritDoc
     */
    public function __construct(UnitController $unitController)
    {
        parent::__construct();
        $this->unitController = $unitController;
    }

    function post(array $params = []): void
    {
        try {
            $unit = new Unit();
            $unit->setName($this->getParam($params, 'name', false));
            $unit->setCost($this->getParam($params, 'cost', false));
            $unit->setUrlImg($this->getParam($params, 'imgUrl', false));
            $unitDAO = new UnitDAO();
            $unitDAO->addUnit($unit);


            header('Location: /?message=' . urlencode('Unité ajoutée avec succès ! '));
        } catch (\Exception $e) {
            $this->controller->displayAddUnit("Erreur : " . $e->getMessage());
        }
    }

    public function get(array $params)
    {
    }
}