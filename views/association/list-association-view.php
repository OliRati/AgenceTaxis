<?php include PHP_ROOT . "/views/partials/head.php"; ?>

<h1 style="text-align: center; color: aqua">Liste des Affectations</h1>
<div style="margin: 1rem">
    <a href="<?= WEB_ROOT . "/association/add-association.php" ?>" role="button" class="outline">Creer une
        Affectation</a>

    <?php if (!empty($associationArray)) { ?>
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
                        <td><?= $asso['id_conducteur'] . ' - ' . $asso['nom'] . ' ' . $asso['prenom'] ?></td>
                        <td><?= $asso['id_vehicule'] . ' - ' . $asso['marque'] . ' ' . $asso['modele'] . ' - ' . $asso['couleur'] ?>
                        </td>
                        </td>
                        <td><a href="<?= WEB_ROOT . "/association/edit-association.php" . "?id=" . $asso['id_association'] ?>"
                                role="button" class="secondary">
                                Editer <img src="<?= WEB_ROOT . "/assets/img/edit_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Edit icon"></a>
                            <form action="<?= WEB_ROOT . "/association/del-association.php" ?>" method="post">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                <input type="hidden" name="id_association" value="<?= $asso['id_association'] ?>">
                                <button type="submit" name="supprimer" onclick="return confirm('Etes vous certain de vouloir supprimer cette affcetation ?');">
                                    Supprimer <img src="<?= WEB_ROOT . "/assets/img/delete_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" ?>" alt="Edit icon">
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="empty">Aucun affectation vehicule - conducteur est disponible.</p>
    <?php } ?>

</div>

<?php include PHP_ROOT . "/views/partials/tail.php"; ?>