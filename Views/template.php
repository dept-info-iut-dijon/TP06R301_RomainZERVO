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
    <?= include_once("Includes\Navbar.php") ?>
</header>
<!-- #contenu -->
<main id="contenu" class="template-content-container">
    <?= $this->section('content') ?> <!-- Modifier ici pour utiliser 'mainContent' au lieu de 'content' -->
</main>
<footer>

</footer>
</body>
</html>
