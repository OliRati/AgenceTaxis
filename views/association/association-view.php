<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<style>
    .flex {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
</style>

<article>
    <h1><?= $pageTitle ?></h1>

    <?php if (!empty($errors)) { ?>
        <div class="error">
            <?php foreach ($errors as $error) {
                echo $error . "<br>";
            } ?>
        </div>
    <?php } ?>

    <form action="?id=<?= $idAssociation ?>" id="associationForm" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <div class="flex">
            <label for="conducteur">Conducteur</label>
            <select id="conducteur" name="conducteur">
                <?php if (empty($conducteurs)) { ?>
                    <option value="" disabled selected>Aucun conducteur est disponible</option>
                <?php } else { ?>
                    <option value="" disabled selected>Sélectionnez un conducteur</option>
                    <?php foreach ($conducteurs as $conducteur) { ?>
                        <option value="<?= $conducteur['id_conducteur'] ?>" <?php
                                                                            if (isset($idConducteur) && $conducteur['id_conducteur'] === $idConducteur)
                                                                                echo "selected";
                                                                            ?>>
                            <?= $conducteur['nom'] . ' ' . $conducteur['prenom'] ?>
                        </option>
                <?php }
                } ?>
            </select>
        </div>
        <div class=" flex">
            <label for="vehicule">Véhicule</label>
            <select id="vehicule" name="vehicule">
                <?php if (empty($vehicules)) { ?>
                    <option value="" disabled selected>Aucun vehicule est disponible</option>
                <?php } else { ?>
                    <option value="" disabled selected>Selectionnez un vehicule</option>
                    <?php foreach ($vehicules as $vehicule) { ?>
                        <option value="<?= $vehicule['id_vehicule'] ?>" <?php
                                                                        if (isset($idVehicule) && $vehicule['id_vehicule'] === $idVehicule)
                                                                            echo "selected";
                                                                        ?>>
                            <?= $vehicule['marque'] . ' ' . $vehicule['modele'] . ' ' . $vehicule['couleur'] ?>
                        </option>
                <?php }
                } ?>
            </select>
        </div>
        <div class="flex">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="button" role="button"
                onclick="window.location.href='<?= WEB_ROOT . "/association/list-association.php" ?>';">Annuler</button>
        </div>
    </form>
</article>

<script>
    // Basic client-side validation
    document.getElementById('associationForm').addEventListener('submit', function(e) {
        const conducteur = document.getElementById('conducteur').value;
        const vehicule = document.getElementById('vehicule').value;
        if (!conducteur || !vehicule) {
            alert('Vous devez sélectionner un conducteur et un véhicule.');
            e.preventDefault();
        }
    });
</script>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>