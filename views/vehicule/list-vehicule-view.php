<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicules</title>
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/pico.min.css" ?>">
</head>

<body>
    <?php include PATH_PROJECT . "/views/nav/nav.php"; ?>
    <main>
        <h1 style="text-align: center; color: aqua">Liste des vehicules</h1>
        <div style="margin: 1rem">
            <a href="<?= WEB_ROOT . "/vehicule/add-vehicule.php" ?>" role="button">Ajouter un vehicule</a>
            <table>
                <thead>
                    <tr>
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
                            <td><?= $car['marque'] ?></td>
                            <td><?= $car['modele'] ?></td>
                            <td><?= $car['couleur'] ?></td>
                            <td><?= $car['immatriculation'] ?></td>
                            <td><a href="<?= WEB_ROOT . "/vehicule/edit-vehicule.php" . "?id=" . $car['id_vehicule'] ?>"
                                    role="button">Editer</a>
                                <a href="<?= WEB_ROOT . "/vehicule/del-vehicule.php" . "?id=" . $car['id_vehicule'] ?>"
                                    role="button"
                                    onclick="return confirm('Etes vous certain de vouloir supprimer ce vehicule ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>