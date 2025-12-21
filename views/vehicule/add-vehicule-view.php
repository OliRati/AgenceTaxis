<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<style>
    .flex {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
</style>

<article>
    <h1>Ajouter un vehicule</h1>
    <form action="" method="POST">
        <div class="flex">
            <label for="marque">Marque</label>
            <input type="text" id="marque" name="marque" required>
        </div>
        <div class="flex">
            <label for="modele">Modele</label>
            <input type="text" id="modele" name="modele" required>
        </div>
        <div class="flex">
            <label for="couleur">Couleur</label>
            <input type="text" id="couleur" name="couleur" required>
        </div>
        <div class="flex">
            <label for="immatriculation">Immatriculation</label>
            <input type="text" id="immatriculation" name="immatriculation" required>
        </div>
        <div class="flex">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="button" role="button"
                onclick="window.location.href='<?= WEB_ROOT . "/vehicule/list-vehicule.php" ?>';">Annuler</button>
        </div>
    </form>
</article>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>