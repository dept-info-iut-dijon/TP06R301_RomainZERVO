<?php
#region Import
/**
 * Made for import file
 */
require_once("Helpers/Psr4AutoloaderClass.php");

require_once("Controllers\RouterFile.php");
#endregion

#region use
/**
 * Made for import namespace
 */

use Helpers\Psr4AutoloaderClass;
#endregion

#region code
/**
 * Made for the algorithm part
 */
$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');
$loader->addNamespace('\Controllers', '/Controllers');
$loader->addNamespace('\Models', '/Models');
$loader->addNamespace('\Config', '/Config');

$router = new \Controllers\Router\RouterFile();
try {
    $router->routing($_GET, $_POST);
} catch (Exception $e) {
    throw new Exception("Erreur de routage : " . $e->getMessage());
}
#endregion
