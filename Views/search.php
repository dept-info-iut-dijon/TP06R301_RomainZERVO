<?php
require_once __DIR__ . '/../Models/UnitDAO.php';

use Models\UnitDAO;

$this->layout('template', ['title' => 'TP TFT - Search']);

include_once __DIR__ . '/Includes/Navbar.php';
?>

<h1 class="main-title">TFT - Set <?= $this->e($tftSetName) ?></h1>

