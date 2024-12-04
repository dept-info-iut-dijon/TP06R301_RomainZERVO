<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link href="public/css/main.css" rel="stylesheet">
    <link href="public/css/navbar.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
</head>

<body>
    <header>
    </header>
    <!-- #contenu -->
    <main id="contenu" class="template-content-container">
        <?= $this->section('content') ?>
    </main>
    <footer>

    </footer>
</body>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
</html>