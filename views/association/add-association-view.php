<?php include PATH_PROJECT . "/views/partials/head.php"; ?>

<style>
    .flex {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
</style>

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
                <option value="" disabled selected>Sélectionnez un conducteur</option>
                <?php
                if (!empty($conducteurs)) {
                    foreach ($conducteurs as $conducteur) { ?>
                        <option value="<?= $conducteur['id_conducteur'] ?>">
                            <?= $conducteur['nom'] . ' ' . $conducteur['prenom'] ?>
                        </option>
                    <?php }
                } else { ?>
                    <option disabled>Aucun conducteur disponible</option>
                    <?php
                } ?>
            </select>
        </div>
        <div class="flex">
            <label for="vehicule">Véhicule</label>
            <select id="vehicule" name="vehicule">
                <option value="" disabled selected>Selectionnez un vehicule</option>
                <?php if (!empty($vehicules)) {
                    foreach ($vehicules as $vehicule) { ?>
                        <option value="<?= $vehicule['id_vehicule'] ?>">
                            <?= $vehicule['marque'] . ' ' . $vehicule['modele'] . ' ' . $vehicule['couleur'] ?>
                        </option>
                    <?php }
                } else { ?>
                    <option disabled>Aucun véhicule disponible</option>
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
    document.getElementById('associationForm').addEventListener('submit', function(e) {
        const conducteur = document.getElementById('conducteur').value;
        const vehicule = document.getElementById('vehicule').value;
        if (!conducteur || !vehicule) {
            alert('Vous devez sélectionner un conducteur et un véhicule.');
            e.preventDefault();
        }
    });
</script>

<?php include PATH_PROJECT . "/views/partials/tail.php"; ?>