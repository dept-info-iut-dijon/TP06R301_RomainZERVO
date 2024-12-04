<?php $this->layout('template') ?>

<h1><?= htmlspecialchars($tftSetName) ?></h1>
<div class="card-container">
<?php foreach ($units as $unit): ?>
    <div class="card">
        <div class="card-header">
            <form action="index.php?action=delete-unit" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($unit->getId()) ?>">
                <button type="submit" class="delete-btn">&times;</button>
            </form>
        </div>

        <!-- Image de l'unité -->
        <img src="<?= htmlspecialchars($unit->getUrlImg()) ?>" alt="<?= htmlspecialchars($unit->getName()) ?>" class="card-img">

        <div class="card-body">
            <h2><?= htmlspecialchars($unit->getName()) ?></h2>
            <p>Coût: <?= htmlspecialchars($unit->getCost()) ?></p>
            <p>Origine: <?= htmlspecialchars($unit->getOrigin()) ?></p>
        </div>
    </div>
<?php endforeach; ?>

</div>
