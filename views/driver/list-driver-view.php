<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chauffeurs</title>
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/pico.min.css" ?>">
    <link rel="stylesheet" href="<?= WEB_ROOT . "/assets/css/style.css" ?>">
</head>

<body>
    <?php include PATH_PROJECT . "/views/nav/nav.php"; ?>
    <main>
        <h1 style="text-align: center; color: aqua">Liste des chauffeurs</h1>
        <div style="margin: 1rem">
            <a href="<?= WEB_ROOT . "/driver/add-driver.php" ?>" role="button" class="outline">Ajouter un conducteur</a>
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
                    <?php foreach ($driverArray as $driver): ?>
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
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>