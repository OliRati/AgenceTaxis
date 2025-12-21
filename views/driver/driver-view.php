<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<style>
    .flex {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
</style>

<article>
    <h1>Editer un conducteur</h1>
    <form action="?id=<?= $idConducteur ?>" method="POST">
        <div class="flex">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?= $driver['nom'] ?>">
        </div>
        <div class="flex">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?= $driver['prenom'] ?>">
        </div>
        <div class="flex">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="button" role="button"
                onclick="window.location.href='<?= WEB_ROOT . "/driver/list-driver.php" ?>';">Annuler</button>
        </div>
    </form>
</article>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>