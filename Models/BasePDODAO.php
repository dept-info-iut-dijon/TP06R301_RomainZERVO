<?php

declare(strict_types=1);

namespace Models;

use PDO;
use PDOStatement;
use Config\Config;
use Exception;

require_once __DIR__ . "/../Config/Config.php";

class BasePDODAO
{
    private ?PDO $db = null;

    /**
     * Instancie et retourne l'objet PDO si nécessaire.
     *
     * @return PDO
     * @throws Exception
     */
    public function getDb(): PDO
    {
        if ($this->db === null) {
            try {
                $dsn = Config::get('dsn');
                $user = Config::get('user');
                $pass = Config::get('pass');
                $this->db = new PDO($dsn, $user, $pass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                throw new Exception("Erreur lors de la connexion à la base de données : " . $e->getMessage());
            }
        }
        return $this->db;
    }

    /**
     * Exécute une requête SQL avec des paramètres optionnels.
     *
     * @param string $sql Requête SQL à exécuter.
     * @param array|null $params Paramètres pour la requête (par défaut : null).
     * @return PDOStatement|false Résultat de la requête ou false en cas d'échec.
     */
    protected function execRequest(string $sql, array $params = null): PDOStatement|false
    {
        try {
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute($params ?? []);
            return $stmt;
        } catch (Exception $e) {
            return false;
        }
    }
}
