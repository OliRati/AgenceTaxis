<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<h1 style="text-align: center; color: aqua">Liste des chauffeurs</h1>
<div style="margin: 1rem">
    <a href="<?= WEB_ROOT . "/driver/add-driver.php" ?>" role="button" class="outline">Ajouter un
        conducteur</a>

    <?php if (!empty($driverArray)) { ?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($driverArray as $driver) : ?>
                    <tr>
                        <td><?= $driver['id_conducteur'] ?></td>
                        <td><?= $driver['nom'] ?></td>
                        <td><?= $driver['prenom'] ?></td>
                        </td>
                        <td><a href="<?= WEB_ROOT . "/driver/edit-driver.php" . "?id=" . $driver['id_conducteur'] ?>"
                                role="button" class="secondary">
                                Editer <img src="<?= WEB_ROOT . "/assets/img/edit_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Edit icon"></a>
                            <form action="<?= WEB_ROOT . "/driver/del-driver.php" ?>" method="post">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                <input type="hidden" name="id_conducteur" value="<?= $driver['id_conducteur'] ?>">
                                <button type="submit" name="supprimer" onclick="return confirm('Etes vous certain de vouloir supprimer ce conducteur ?');">
                                    Supprimer <img src="<?= WEB_ROOT . "/assets/img/delete_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Edit icon">
                                </button>
                            </form>
                            <?php if (!isset($driver['id_vehicule'])) { ?>
                                <a href="<?= WEB_ROOT . "/association/add-association.php" . "?driver=" . $driver['id_conducteur'] ?>"
                                    role="button">
                                    Affecter <img src="<?= WEB_ROOT . "/assets/img/add_link_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Link icon"></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="empty">Aucun conducteur est disponible.</p>
    <?php } ?>

</div>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>