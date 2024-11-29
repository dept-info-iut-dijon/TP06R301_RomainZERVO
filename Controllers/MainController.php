<?php

namespace Controllers;

use Models\UnitDAO;
require_once __DIR__ . '/../Models/UnitDAO.php';

class MainController
{
    private \League\Plates\Engine $engine;

    public function index(): void
    {
        // Instantiation du DAO
        $unitDAO = new UnitDAO();

        // Récupération des données
        $units = $unitDAO->getAll();
        $unitByIdExists = $unitDAO->getById(1); // Exemple avec un ID existant
        $unitByIdNotExists = $unitDAO->getById(999); // Exemple avec un ID inexistant

        // Passage des données à la vue
        echo $this->engine->render('home', [
            'tftSetName' => 'Remix Rumble',
            'units' => $units,
            'unitByIdExists' => $unitByIdExists,
            'unitByIdNotExists' => $unitByIdNotExists
        ]);
    }

    /**
     * Constructeur de la classe MainController
     */
    public function __construct()
    {
        $this->engine = new \League\Plates\Engine(__DIR__ . "/../Views");
    }
}
