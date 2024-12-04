<?= include_once "Includes\Navbar.php" ?>

<h1><?= htmlspecialchars($tftSetName) ?></h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Origin</th>
        <th>Image</th>
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
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
