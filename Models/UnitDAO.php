<?php

declare(strict_types=1);

namespace Models;

use Entities\Unit;
use PDO;

require_once __DIR__ . '/../Models/BasePDODAO.php';
require_once __DIR__ . '/../Models/Unit.php';

class UnitDAO extends BasePDODAO
{
    /**
     * Récupère toutes les unités.
     *
     * @return Unit[] Liste des unités.
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM unit";
        $stmt = $this->execRequest($sql);

        $units = [];
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $units[] = $this->createUnitFromRow($row);
            }
        }
        return $units;
    }

    /**
     * Récupère une unité par son ID.
     *
     * @param int $id ID de l'unité.
     * @return Unit|null L'unité ou null si introuvable.
     */
    public function getById(int $id): ?Unit
    {
        $sql = "SELECT * FROM unit WHERE id = :id";
        $stmt = $this->execRequest($sql, ['id' => $id]);

        if ($stmt && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $this->createUnitFromRow($row);
        }
        return null;
    }

    /**
     * Crée une entité Unit à partir d'un tableau associatif.
     *
     * @param array $row Données de la base.
     * @return Unit
     */
    private function createUnitFromRow(array $row): Unit
    {
        return new Unit(
            (int)$row['id'],
            $row['name'],
            (float)$row['cost'],
            $row['origin'],
            $row['url_img']
        );
    }
}
