<?php include PATH_PROJECT . "/views/partials/head.php"; ?>

<style>
    .flex {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
</style>

<article>
    <h1>Editer une affectation Chauffeur - Vehicule</h1>
    <form action="?id=<?= $idAssociation ?>" method="POST">
        <div class="flex">
            <label for="conducteur">Conducteur</label>
            <select id="conducteur" name="conducteur">
                <?php foreach ($conducteurs as $conducteur) { ?>
                    <option value="<?= $conducteur['id_conducteur'] ?>" <?php
                      if ($conducteur['id_conducteur'] === $association['id_conducteur'])
                          echo "selected";
                      ?>>
                        <?= $conducteur['nom'] . ' ' . $conducteur['prenom'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class=" flex">
            <label for="vehicule">Véhicule</label>
            <select id="vehicule" name="vehicule">
                <?php foreach ($vehicules as $vehicule) { ?>
                    <option value="<?= $vehicule['id_vehicule'] ?>" <?php
                      if ($vehicule['id_vehicule'] === $association['id_vehicule'])
                          echo "selected";
                      ?>>
                        <?= $vehicule['marque'] . ' ' . $vehicule['modele'] . ' ' . $vehicule['couleur'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="flex">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="submit" name="annuler"
                onclick="window.location.href='<?= WEB_ROOT . "/association/list-association.php" ?>';">Annuler</button>
        </div>
    </form>
</article>

<?php include PATH_PROJECT . "/views/partials/tail.php"; ?>