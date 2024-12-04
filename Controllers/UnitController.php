<?php

namespace Controllers;

use Entities\OriginDAO;
use Exception;

class UnitController
{
    private $templates;

    public function __construct()
    {
        $this->templates = new \League\Plates\Engine('Views');
    }

    public function displayAddUnit(?string $message = null): void {
        $originDAO = new \Models\OriginDAO();
        $origins = $originDAO->getAll();

        echo $this->templates->render('upsert-unit', [
            'origins' => $origins,
            'message' => $message
        ]);
    }

    public function displayAddOrigin(?string $message = null):void {
        echo $this->templates->render('add-origin', [
            'message' => $message
        ]);
    }

    public function displayEditUnit(string $id, ?string $message = null): void
    {
        $unitDAO = new \Models\UnitDAO();
        $unit = $unitDAO->getByID($id);

        $originDAO = new \Models\OriginDAO();
        $origins = $originDAO->getAll();

        echo $this->templates->render('upsert-unit', [
            'unit' => $unit,
            'origins' => $origins,
            'message' => $message
        ]);
    }

    /**
     * @throws Exception If the unit is not found
     */
    public function deleteUnits(string $id): void
    {
        $unitDAO = new \Models\UnitDAO();
        if ($unitDAO->deleteUnit($id) === 0) {
            throw new Exception("Unit not found");
        }
    }
}