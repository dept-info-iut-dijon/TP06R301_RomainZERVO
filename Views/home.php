<?php
require_once __DIR__ . '/../Models/UnitDAO.php';

use Models\UnitDAO;

$this->layout('template', ['title' => 'TP TFT - Home Page']);

include_once __DIR__ . '/Includes/Navbar.php';

/*var_dump($units); // Liste des unités
var_dump($unitByIdExists); // Une unité existante
var_dump($unitByIdNotExists); // null si l'ID n'existe pas
*/
?>

<div class="cards-container">
    <?php foreach ($units as $unit): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($unit->getUrlImg()) ?>" alt="Unit Image" class="card-img">
            <div class="card-content">
                <h3 class="card-title"><?= htmlspecialchars($unit->getName()) ?: 'No Name' ?></h3>
                <p class="card-origin">Origin: <?= htmlspecialchars($unit->getOrigin()) ?: 'Unknown' ?></p>
                <p class="card-cost">Cost: <?= number_format($unit->getCost(), 2) ?> Gold</p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
