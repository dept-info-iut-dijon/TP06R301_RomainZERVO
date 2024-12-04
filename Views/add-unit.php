<h1><?= htmlspecialchars($tftSetName) ?></h1>
<form method="POST" action="?action=save-unit">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="cost">Cost:</label>
    <input type="number" id="cost" name="cost" required>

    <label for="origin">Origin:</label>
    <input type="text" id="origin" name="origin" required>

    <label for="url_img">Image URL:</label>
    <input type="text" id="url_img" name="url_img" required>

    <button type="submit">Add Unit</button>
</form>
