<?php $this->layout('template') ?>

<h1><?= htmlspecialchars($tftSetName) ?></h1>

<form action="index.php?action=add-unit-success" method="POST">
    <div class="form-group">
        <label for="name">Nom de l'unité :</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="cost">Coût :</label>
        <input type="number" id="cost" name="cost" required>
    </div>
    <div class="form-group">
        <label for="origin">Origine :</label>
        <input type="text" id="origin" name="origin" required>
    </div>
    <div class="form-group">
        <label for="url_img">URL de l'image :</label>
        <input type="text" id="url_img" name="url_img" required>
    </div>
    <button type="submit" class="submit-btn">Ajouter l'unité</button>
</form>
