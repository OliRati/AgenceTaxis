<?php
include 'fonctions.php';
require 'connexiondb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/pico.min.css" ?>">
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/style.css" ?>">
</head>

<body>
    <?php include PATH_PROJECT . "/views/nav/nav.php"; ?>

    <h1 style="text-align: center; color: aqua">Résumé</h1>

    <article style="width: 80vw; margin: 0 auto; border-radius: 1rem; padding: 1rem;">
        <p><span class="rubrique">Nombre de vehicules</span><span class="valeur"><?php echo getNbLigneTable($pdo, 'vehicule') ?></span></p>
        <hr>
        <p><span class="rubrique">Nombre de Chauffeurs</span><span class="valeur"><?php echo getNbLigneTable($pdo, 'conducteur') ?></span></p>
        <hr>
        <p><span class="rubrique">Vehicules non utilisés</span><span class="valeur"><?php echo getUnusedVehicule($pdo) ?></span></p>
        <hr>
        <p><span class="rubrique">Conducteurs non utilisés</span><span class="valeur"><?php echo getUnusedConducteur($pdo) ?></span></p>
    </article>
</body>

</html>