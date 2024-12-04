<?php
require_once __DIR__ . '/../../Models/UnitDAO.php';

use Models\UnitDAO;
?>

<div class="navbar-container">
    <h1 class="main-title">TFT - Set <?= $this->e($tftSetName) ?></h1>
    <nav class="navbar">
        <ul class="navbar-list">
            <li class="navbar-item">
                <a href="index.php" class="navbar-link">Accueil</a>
            </li>
            <li class="navbar-item">
                <a href="index.php?action=add-unit" class="navbar-link">Ajouter une unité</a>
            </li>
            <li class="navbar-item">
                <a href="index.php?action=add-unit-origin" class="navbar-link">Ajouter une origine</a>
            </li>
            <li class="navbar-item">
                <a href="index.php?action=search" class="navbar-link">Rechercher</a>
            </li>
        </ul>
    </nav>
</div>
