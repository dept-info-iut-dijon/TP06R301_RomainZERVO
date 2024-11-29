<?php
namespace Config;

use Exception;

class Config {
    private static $param;

    public static function get($nom, $valeurParDefaut = null) {
        if (isset(self::getParameter()[$nom])) {
            return self::getParameter()[$nom];
        }
        return $valeurParDefaut;
    }

    // Charge les paramètres depuis un fichier ini
    private static function getParameter() {
        if (self::$param == null) {
            $cheminFichier = "Config/prod.ini"; // Fichier pour la prod
            if (!file_exists($cheminFichier)) {
                $cheminFichier = "Config/dev.ini"; // Fallback en dev
            }
            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            self::$param = parse_ini_file($cheminFichier);
        }
        return self::$param;
    }
}
