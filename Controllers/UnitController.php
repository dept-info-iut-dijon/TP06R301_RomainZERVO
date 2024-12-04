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

        echo $this->engines->render('home', [
            'title' => 'Liste des unités', // Définir le titre de la page
            'content' => $this->engines->render('list-units', [
                'tftSetName' => 'Unit List',
                'units' => $units,
            ])
        ]);
    }


    public function addUnit($data): void
    {
        $unitDAO = new UnitDAO();

        try {
            // Validation des données (par exemple, vérifier que toutes les informations sont présentes)
            if (empty($data['name']) || empty($data['cost']) || empty($data['origin']) || empty($data['url_img'])) {
                throw new \Exception('Toutes les informations doivent être remplies.');
            }

            // Insérer l'unité dans la base de données
            $unitDAO->insert(
                $data['name'],
                $data['cost'],
                $data['origin'],
                $data['url_img']
            );

            // Afficher un message de succès
            echo $this->engines->render('add-unit-success', [
                'tftSetName' => 'Add Unit',
                'message' => 'Unité ajoutée avec succès!',
            ]);
        } catch (\Exception $e) {
            // Gérer les erreurs et afficher un message d'erreur
            echo $this->engines->render('error', [
                'tftSetName' => 'Erreur',
                'message' => 'Échec de l\'ajout de l\'unité : ' . $e->getMessage(),
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
