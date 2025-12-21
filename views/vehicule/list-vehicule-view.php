<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<h1 style="text-align: center; color: aqua">Liste des vehicules</h1>
<div style="margin: 1rem">
    <a href="<?= WEB_ROOT . "/vehicule/add-vehicule.php" ?>" role="button" class="outline">Ajouter un
        vehicule</a>

    <?php if (!empty($vehiculeArray)) { ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Couleur</th>
                    <th>Immatriculation</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($vehiculeArray as $car): ?>
                    <tr>
                        <td><?= $car['id_vehicule'] ?></td>
                        <td><?= $car['marque'] ?></td>
                        <td><?= $car['modele'] ?></td>
                        <td><?= $car['couleur'] ?></td>
                        <td><?= $car['immatriculation'] ?></td>
                        <td><a href="<?= WEB_ROOT . "/vehicule/edit-vehicule.php" . "?id=" . $car['id_vehicule'] ?>"
                                role="button" class="secondary">
                                Editer <img src="<?= WEB_ROOT . "/assets/img/edit_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Edit icon"></a>
                            <a href="<?= WEB_ROOT . "/vehicule/del-vehicule.php" . "?id=" . $car['id_vehicule'] ?>"
                                role="button"
                                onclick="return confirm('Etes vous certain de vouloir supprimer ce vehicule ?');">
                                Supprimer <img src="<?= WEB_ROOT . "/assets/img/delete_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Edit icon"></a>
                            <?php if (!isset($car['id_conducteur'])) { ?>
                                <a href="<?= WEB_ROOT . "/association/add-association.php" . "?car=" . $car['id_vehicule'] ?>"
                                    role="button">
                                    Affecter <img src="<?= WEB_ROOT . "/assets/img/add_link_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Link icon"></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="empty">Aucun vehicule est disponible.</p>
    <?php } ?>

</div>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>