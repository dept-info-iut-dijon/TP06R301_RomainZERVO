<?php

namespace Controllers;

use League\Plates\Template\Template;
use Models\UnitDAO;

class MainController
{
    private $engines;

    public function __construct()
    {
        $this->engines = new \League\Plates\Engine(__DIR__ . "/../Views");
    }

    public function index(): void
    {
        $unitDAO = new UnitDAO();
        $units = $unitDAO->getAll();
        $unitByIdExists = $unitDAO->getById(1);
        $unitByIdNotExists = $unitDAO->getById(999);

        echo $this->engines->render('home', [
            'tftSetName' => 'Remix Rumble',
            'units' => $units,
            'unitByIdExists' => $unitByIdExists,
            'unitByIdNotExists' => $unitByIdNotExists
        ]);
    }

    public function displayAddUnit(): void
    {
        echo $this->engines->render('add-unit', [
            'tftSetName' => 'Add Unit',
        ]);
    }

    public function displaySearch(): void
    {
        echo $this->engines->render('search', [
            'tftSetName' => 'Search',
        ]);
    }

    public function displayUnitOrigin(): void
    {
        echo $this->engines->render('add-unit-origin', [
            'tftSetName' => 'Add Unit Origin',
        ]);
    }

    public function displayAddUnitSuccess(): void
    {
        echo $this->engines->render('add-unit-success', [
            'tftSetName' => 'Add Unit Success',
        ]);
    }

    public function renderError(string $message): void
    {
        echo $this->engines->render('error', [
            'message' => $message,
        ]);
    }

}
