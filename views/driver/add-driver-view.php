<?php include PATH_PROJECT . "/views/partials/head.php"; ?>

<style>
    .flex {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
</style>

<article>
    <h1>Ajouter un conducteur</h1>
    <form action="" method="POST">
        <div class="flex">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="flex">
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="flex">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="button"
                onclick="window.location.href='<?= WEB_ROOT . "/driver/list-driver.php" ?>';">Annuler</button>
        </div>
    </form>
</article>

<?php include PATH_PROJECT . "/views/partials/tail.php"; ?>