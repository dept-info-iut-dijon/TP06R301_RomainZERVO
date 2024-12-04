<?php

namespace Models;

use \Models\Unit;
use PDO;
use PDOException;

class UnitDAO
{
    private PDO $db;

    public function __construct()
    {
        // Connexion à la base de données
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=tptftr301;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    public function getAll(): array
    {
        $query = $this->db->query("SELECT * FROM unit");
        $unitsData = $query->fetchAll(PDO::FETCH_ASSOC);

        // Retourner des objets Unit plutôt que des tableaux associatifs
        $units = [];
        foreach ($unitsData as $unitData) {
            $units[] = new Unit(
                $unitData['id'],
                $unitData['name'],
                $unitData['cost'],
                $unitData['origin'],
                $unitData['url_img']
            );
        }
        return $units;
    }

    public function getById(string $id): ?Unit
    {
        $query = $this->db->prepare("SELECT * FROM unit WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $unitData = $query->fetch(PDO::FETCH_ASSOC);

        // Retourner un objet Unit ou null si aucune unité n'est trouvée
        return $unitData ? new Unit($unitData['id'], $unitData['name'], $unitData['cost'], $unitData['origin'], $unitData['url_img']) : null;
    }

    public function insert(string $name, string $cost, string $origin, string $url_img): bool
    {
        // S'assurer que le coût est bien un entier
        $cost = intval($cost);  // Convertir en entier si nécessaire

        // Générer un identifiant unique avec uniqid()
        $id = uniqid();

        $query = $this->db->prepare("
            INSERT INTO unit (id, name, cost, origin, url_img) 
            VALUES (:id, :name, :cost, :origin, :url_img)
        ");

        return $query->execute([
            ':id' => $id,
            ':name' => $name,
            ':cost' => $cost,
            ':origin' => $origin,
            ':url_img' => $url_img
        ]);
    }

    public function delete(string $id): bool
    {
        $query = $this->db->prepare("DELETE FROM unit WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        return $query->execute();
    }

    public function update(string $id, string $name, int $cost, string $origin, string $url_img): bool
    {
        $query = $this->db->prepare("
            UPDATE unit 
            SET name = :name, cost = :cost, origin = :origin, url_img = :url_img 
            WHERE id = :id
        ");

        return $query->execute([
            ':id' => $id,
            ':name' => $name,
            ':cost' => $cost,
            ':origin' => $origin,
            ':url_img' => $url_img
        ]);
    }
}
