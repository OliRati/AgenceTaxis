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
                                role="button" class="secondary">Editer</a>
                            <a href="<?= WEB_ROOT . "/driver/del-driver.php" . "?id=" . $driver['id_conducteur'] ?>"
                                role="button"
                                onclick="return confirm('Etes vous certain de vouloir supprimer ce conducteur ?');">Supprimer</a>
                            <?php if (!isset($driver['id_vehicule'])) { ?>
                                <a href="<?= WEB_ROOT . "/association/add-association.php" . "?id=" . $driver['id_conducteur'] ?>"
                                    role="button">Affecter</a>
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