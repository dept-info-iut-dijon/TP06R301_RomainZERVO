<?php
require_once __DIR__ . '/../../Models/UnitDAO.php';

use Models\UnitDAO;
?>

<div class="navbar-container">
    <h1 class="main-title">TFT - Set <?= $this->e($tftSetName) ?></h1>
    <nav>
        <a href="index.php" class="navbar-link">Accueil</a>

        <a href="index.php?action=add-unit" class="navbar-link">Ajouter une unité</a>
        <a href="index.php?action=add-unit-origin" class="navbar-link">Ajouter une origine</a>
        <a href="index.php?action=search" class="navbar-link">Rechercher</a>
    </nav>
</div>
