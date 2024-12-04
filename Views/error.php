<?php
$this->layout('template', ['title' => 'Erreur']); ?>

<div class="error-container">
    <h1>Erreur</h1>
    <p><?= htmlspecialchars($message ?? "Une erreur est survenue.") ?></p>
    <a href="index.php" class="btn">Retour à l'accueil</a>
</div>
