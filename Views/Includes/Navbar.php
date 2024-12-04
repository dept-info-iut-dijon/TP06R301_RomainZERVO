<?php
require_once __DIR__ . '/../../Models/UnitDAO.php';

use Models\UnitDAO;
?>

<div class="navbar-container">
    <nav class="navbar">
        <div class="navbar-content">
            <!-- Logo à gauche -->
            <img src="https://brand.riotgames.com/static/a91000434ed683358004b85c95d43ce0/8a20a/lol-logo.png" alt="League of Legends" class="logo-img">

            <!-- Liste des éléments du menu -->
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
        </div>
    </nav>
</div>
