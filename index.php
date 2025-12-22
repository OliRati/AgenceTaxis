<?php
require '.env.php';
require 'includes.php';

include PHP_ROOT . "/views/partials/head.php";
?>

<h1 style="text-align: center; color: aqua">Résumé</h1>

<article style="width: 80vw; margin: 0 auto; border-radius: 1rem; padding: 1rem;">
    <p><span class="rubrique">Nombre de vehicules</span><span
            class="valeur"><?php echo getNbLigneTable($pdo, 'vehicule') ?></span></p>
    <hr>
    <p><span class="rubrique">Nombre de Chauffeurs</span><span
            class="valeur"><?php echo getNbLigneTable($pdo, 'conducteur') ?></span></p>
    <hr>
    <p><span class="rubrique">Vehicules non utilisés</span><span
            class="valeur"><?php echo getUnusedVehicule($pdo) ?></span></p>
    <hr>
    <p><span class="rubrique">Conducteurs non utilisés</span><span
            class="valeur"><?php echo getUnusedConducteur($pdo) ?></span></p>
</article>
</main>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>