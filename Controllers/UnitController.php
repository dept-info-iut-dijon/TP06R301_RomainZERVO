<?php

namespace Controllers;

use Models\UnitDAO;

class UnitController
{
    private \League\Plates\Engine $engines;

    public function __construct()
    {
        $this->engines = new \League\Plates\Engine(__DIR__ . "/../Views");
    }

    public function listUnits(): void
    {
        $unitDAO = new UnitDAO();
        $units = $unitDAO->getAll();

        echo $this->engines->render('list-units', [
            'tftSetName' => 'Unit List',
            'units' => $units,
        ]);
    }

    public function addUnit($data): void
    {
        $unitDAO = new UnitDAO();

        try {
            $unitDAO->insert(
                $data['name'],
                $data['cost'],
                $data['origin'],
                $data['url_img']
            );

            echo $this->engines->render('add-unit-success', [
                'tftSetName' => 'Add Unit',
                'message' => 'Unit added successfully!',
            ]);
        } catch (\Exception $e) {
            echo $this->engines->render('error', [
                'tftSetName' => 'Error',
                'message' => 'Failed to add unit: ' . $e->getMessage(),
            ]);
        }
    }

    public function deleteUnit(string $id): void
    {
        $unitDAO = new UnitDAO();

        try {
            // Supprimer l'unité
            $unitDAO->delete($id);

            // Rediriger vers la page précédente (ou vers la liste des unités)
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit(); // Assure-toi que l'exécution du script s'arrête ici
        } catch (\Exception $e) {
            echo $this->engines->render('error', [
                'tftSetName' => 'Error',
                'message' => 'Failed to delete unit: ' . $e->getMessage(),
            ]);
        }
    }
}
