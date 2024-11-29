<?php
require_once __DIR__ . '/../Models/UnitDAO.php';

use Models\UnitDAO;

$this->layout('template', ['title' => 'TP TFT - Home Page']);

var_dump($units); // Liste des unités
var_dump($unitByIdExists); // Une unité existante
var_dump($unitByIdNotExists); // null si l'ID n'existe pas
?>

<?= include_once __DIR__ . '/Includes/Navbar.php'?>
