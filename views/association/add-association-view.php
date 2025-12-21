<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<article>
    <h1>Ajouter une affectation Chauffeur - Vehicule</h1>

    <?php if (!empty($errors)) { ?>
        <div class="error">
            <?php foreach ($errors as $error) {
                echo $error . "<br>";
            } ?>
        </div>
    <?php } ?>

    <form action="" method="POST" id="associationForm">
        <div class="flex">
            <label for="conducteur">Conducteur</label>
            <select id="conducteur" name="conducteur">
                <?php if (!empty($conducteurs)) { ?>
                    <option value="" disabled selected>Sélectionnez un conducteur</option>
                    <?php foreach ($conducteurs as $conducteur) { ?>
                        <option value="<?= $conducteur['id_conducteur'] ?>">
                            <?= $conducteur['nom'] . ' ' . $conducteur['prenom'] ?>
                        </option>
                    <?php }
                } else { ?>
                    <option disabled selected>Aucun conducteur disponible</option>
                <?php } ?>
            </select>
        </div>
        <div class="flex">
            <label for="vehicule">Véhicule</label>
            <select id="vehicule" name="vehicule">
                <?php if (!empty($vehicules)) { ?>
                    <option value="" disabled selected>Selectionnez un vehicule</option>
                    <?php foreach ($vehicules as $vehicule) { ?>
                        <option value="<?= $vehicule['id_vehicule'] ?>">
                            <?= $vehicule['marque'] . ' ' . $vehicule['modele'] . ' ' . $vehicule['couleur'] ?>
                        </option>
                    <?php }
                } else { ?>
                    <option disabled selected>Aucun véhicule disponible</option>
                <?php } ?>
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
    document.getElementById('associationForm').addEventListener('submit', function (e) {
        const conducteur = document.getElementById('conducteur').value;
        const vehicule = document.getElementById('vehicule').value;
        if (!conducteur || !vehicule) {
            alert('Vous devez sélectionner un conducteur et un véhicule.');
            e.preventDefault();
        }
    });
</script>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>