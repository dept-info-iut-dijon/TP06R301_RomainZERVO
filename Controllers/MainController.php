<?php

namespace Controllers;

use League\Plates\Template\Template;
use Models\UnitDAO;
require_once __DIR__ . '/../Models/UnitDAO.php';

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
}
