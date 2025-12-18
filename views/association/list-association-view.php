<?php include PATH_PROJECT . "/views/partials/head.php"; ?>

<h1 style="text-align: center; color: aqua">Liste des Affectations</h1>
<div style="margin: 1rem">
    <a href="<?= WEB_ROOT . "/association/add-association.php" ?>" role="button" class="outline">Creer une
        Affectation</a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>id_conducteur</th>
                <th>id_vehicule</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($associationArray as $asso): ?>
                <tr>
                    <td><?= $asso['id_association'] ?></td>
                    <td><?= $asso['id_conducteur'] ?></td>
                    <td><?= $asso['id_vehicule'] ?></td>
                    </td>
                    <td><a href="<?= WEB_ROOT . "/association/edit-association.php" . "?id=" . $asso['id_association'] ?>"
                            role="button" class="secondary">Editer</a>
                        <a href="<?= WEB_ROOT . "/association/del-association.php" . "?id=" . $asso['id_association'] ?>"
                            role="button"
                            onclick="return confirm('Etes vous certain de vouloir supprimer ce conducteur ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include PATH_PROJECT . "/views/partials/tail.php"; ?>