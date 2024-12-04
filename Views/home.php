<?= include_once "Includes\Navbar.php"?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Origin</th>
        <th>Image</th>
        <th>Actions</th> <!-- Colonne pour la croix -->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($units as $unit): ?>
        <tr>
            <td><?= htmlspecialchars($unit->getId()) ?></td>
            <td><?= htmlspecialchars($unit->getName()) ?></td>
            <td><?= htmlspecialchars($unit->getCost()) ?></td>
            <td><?= htmlspecialchars($unit->getOrigin()) ?></td>
            <td>
                <img src="<?= htmlspecialchars($unit->getUrlImg()) ?>" alt="<?= htmlspecialchars($unit->getName()) ?>" style="max-width: 100px;">
            </td>
            <td>
                <!-- Formulaire de suppression -->
                <form action="index.php?action=delete-unit" method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($unit->getId()) ?>">
                    <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">&#x2716;</button> <!-- Croix rouge -->
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
